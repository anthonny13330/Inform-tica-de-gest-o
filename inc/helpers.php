<?php
/** Funções auxiliares usadas em todo o site. */

function cfg(string $k) { static $c; $c ??= require __DIR__ . '/config.php'; return $c[$k] ?? ''; }

/** Escapa texto para HTML (proteção XSS). */
function e(?string $s): string { return htmlspecialchars((string)$s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }

/** Mostra marcadores [PREENCHER: ...] de forma visível. */
function ph(string $s): string {
    return preg_match('/\[PREENCHER/', $s) ? '<mark class="ph">' . e($s) . '</mark>' : e($s);
}

/** Segredo para assinar tokens. Em produção define a variável de ambiente SITE_SECRET. */
function site_secret(): string { return getenv('SITE_SECRET') ?: hash('sha256', __DIR__ . php_uname('n') . 'ig-cidadela'); }

/** Token anti-CSRF assinado e com hora (não precisa de sessão). */
function csrf_token(): string {
    $t = (string)time();
    return $t . '.' . hash_hmac('sha256', $t, site_secret());
}

/** Valida o token; devolve false se inválido, expirado (>2 h) ou enviado em menos de 3 s. */
function csrf_ok(?string $tok): bool {
    if (!is_string($tok) || substr_count($tok, '.') !== 1) return false;
    [$t, $sig] = explode('.', $tok);
    if (!ctype_digit($t) || !hash_equals(hash_hmac('sha256', $t, site_secret()), $sig)) return false;
    $idade = time() - (int)$t;
    return $idade >= 3 && $idade <= 7200;
}

/** Total de horas de um conjunto de disciplinas por ano. */
function horas_ano(array $plano, int $ano): int {
    return array_sum(array_map(fn($d) => $d['horas'][$ano - 1], $plano['disciplinas']));
}
