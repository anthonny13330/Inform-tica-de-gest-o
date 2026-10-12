<?php
require __DIR__ . '/inc/layout.php';

/* ---- Tratamento do formulário (validação + anti-spam) ---- */
$erros = []; $enviado = false; $v = ['nome' => '', 'email' => '', 'assunto' => '', 'msg' => ''];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($v as $k => $_) $v[$k] = trim((string)($_POST[$k] ?? ''));
    if (!csrf_ok($_POST['csrf'] ?? null)) $erros[] = 'O formulário expirou ou foi enviado depressa demais. Recarrega a página e tenta de novo.';
    if (($_POST['website'] ?? '') !== '') $erros[] = 'Pedido inválido.';                      // honeypot
    if (isset($_COOKIE['ig_ultimo']) && (int)$_COOKIE['ig_ultimo'] > time() - 30) $erros[] = 'Aguarda uns segundos antes de enviar outra mensagem.';
    if (mb_strlen($v['nome']) < 2 || mb_strlen($v['nome']) > 80) $erros[] = 'Indica o teu nome.';
    if (!filter_var($v['email'], FILTER_VALIDATE_EMAIL) || preg_match('/[\r\n]/', $v['email'])) $erros[] = 'Indica um email válido.';
    if (mb_strlen($v['msg']) < 10 || mb_strlen($v['msg']) > 2000) $erros[] = 'A mensagem deve ter entre 10 e 2000 caracteres.';
    if (empty($_POST['rgpd'])) $erros[] = 'Tens de aceitar o tratamento dos dados para responder ao teu pedido.';
    if (!$erros) {
        $assunto = preg_replace('/[\r\n]+/', ' ', mb_substr($v['assunto'] ?: 'Contacto pelo site', 0, 100));
        $corpo = "Nome: {$v['nome']}\nEmail: {$v['email']}\n\n{$v['msg']}";
        $ok = false; $to = cfg('form_mail_to');
        if ($to) {
            $ok = @mail($to, '=?UTF-8?B?' . base64_encode('[Site IG] ' . $assunto) . '?=', $corpo, "From: no-reply@" . preg_replace('/[^a-z0-9.-]/i', '', $_SERVER['SERVER_NAME'] ?? 'localhost') . "\r\nReply-To: {$v['email']}\r\nContent-Type: text/plain; charset=UTF-8");
        }
        if (!$ok) {   // sem email a funcionar: tenta guardar localmente (pasta protegida)
            $ok = @file_put_contents(__DIR__ . '/storage/mensagens.jsonl', json_encode(['data' => date('c'), 'assunto' => $assunto] + $v, JSON_UNESCAPED_UNICODE) . "\n", FILE_APPEND | LOCK_EX) !== false;
        }
        if ($ok) { setcookie('ig_ultimo', (string)time(), ['expires' => time() + 60, 'path' => '/', 'httponly' => true, 'samesite' => 'Lax']); $enviado = true; $v = array_map(fn() => '', $v); }
        else $erros[] = 'Não foi possível enviar a mensagem agora. Contacta a secretaria por telefone ou email.';
    }
}

page_start(['title' => 'Contactos', 'desc' => 'Morada, telefone, email e mapa do Agrupamento de Escolas da Cidadela, em Cascais.']);
page_hero('Contactos', 'Fala connosco');
$mapa = 'https://www.openstreetmap.org/search?query=' . rawurlencode(cfg('morada') . ', ' . cfg('codigo_postal'));
?>
<section>
  <div class="wrap grid-2">
    <div>
      <h2>Onde estamos</h2>
      <address>
        <strong><?= e(cfg('escola_sede')) ?> – <?= e(cfg('escola')) ?></strong><br>
        <?= e(cfg('morada')) ?><br><?= e(cfg('codigo_postal')) ?><br>
        Tel. <a href="tel:<?= e(cfg('telefone_href')) ?>"><?= e(cfg('telefone')) ?></a><br>
        Secretaria: <a href="mailto:<?= e(cfg('email')) ?>"><?= e(cfg('email')) ?></a><br>
        Direção do agrupamento: <a href="mailto:<?= e(cfg('email_direcao')) ?>"><?= e(cfg('email_direcao')) ?></a><br>
        Direção de curso: <?= e(cfg('direcao_curso')) ?> – <a href="mailto:<?= e(cfg('direcao_curso_email')) ?>"><?= e(cfg('direcao_curso_email')) ?></a>
      </address>
      <p>Horário de atendimento: <mark class="ph">[PREENCHER: horário da secretaria]</mark></p>
      <p><a class="btn ghost" href="<?= e($mapa) ?>" rel="noopener" target="_blank">Abrir no mapa<span class="sr"> (abre noutra janela)</span></a></p>
    </div>
    <div>
      <h2>Envia-nos uma mensagem</h2>
      <?php if ($enviado): ?><p class="ok" role="status">Mensagem enviada. Obrigado!</p><?php endif; ?>
      <?php if ($erros): ?><div class="err" role="alert"><ul><?php foreach ($erros as $er): ?><li><?= e($er) ?></li><?php endforeach; ?></ul></div><?php endif; ?>
      <form class="f" method="post" action="contactos.php" novalidate>
        <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
        <div class="hp" aria-hidden="true"><label>Website<input type="text" name="website" tabindex="-1" autocomplete="off"></label></div>
        <div><label for="nome">Nome</label><input id="nome" name="nome" type="text" required maxlength="80" autocomplete="name" value="<?= e($v['nome']) ?>"></div>
        <div><label for="email">Email</label><input id="email" name="email" type="email" required maxlength="120" autocomplete="email" value="<?= e($v['email']) ?>"></div>
        <div><label for="assunto">Assunto</label><input id="assunto" name="assunto" type="text" maxlength="100" value="<?= e($v['assunto']) ?>"></div>
        <div><label for="msg">Mensagem</label><textarea id="msg" name="msg" rows="6" required maxlength="2000"><?= e($v['msg']) ?></textarea></div>
        <div><label class="check"><input type="checkbox" name="rgpd" value="1"> Aceito que os meus dados sejam usados apenas para responder a este pedido (ver <a href="privacidade.php">Privacidade</a>).</label></div>
        <button class="btn" type="submit">Enviar mensagem</button>
      </form>
    </div>
  </div>
</section>
<?php page_end();
