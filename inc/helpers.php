<?php
/** Funções auxiliares usadas em todo o site. */

function cfg(string $k) { static $c; $c ??= require __DIR__ . '/config.php'; return $c[$k] ?? ''; }

/** Escapa texto para HTML (proteção XSS). */
function e(?string $s): string { return htmlspecialchars((string)$s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }

/** Mostra marcadores [PREENCHER: ...] de forma visível. */
function ph(string $s): string {
    return preg_match('/\[PREENCHER/', $s) ? '<mark class="ph">' . e($s) . '</mark>' : e($s);
}

function start_session(): void {
    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params(['httponly' => true, 'samesite' => 'Lax', 'secure' => !empty($_SERVER['HTTPS'])]);
        session_start();
    }
}

function csrf_token(): string {
    start_session();
    return $_SESSION['csrf'] ??= bin2hex(random_bytes(32));
}

function csrf_ok(?string $t): bool {
    start_session();
    return is_string($t) && isset($_SESSION['csrf']) && hash_equals($_SESSION['csrf'], $t);
}

/** Total de horas de um conjunto de disciplinas por ano. */
function horas_ano(array $plano, int $ano): int {
    return array_sum(array_map(fn($d) => $d['horas'][$ano - 1], $plano['disciplinas']));
}
