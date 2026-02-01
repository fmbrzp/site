<?php
/**
 * Template Name: Contato
 */
get_header();

$sent = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['fmbrzp_contact_nonce'])) {
  if (!wp_verify_nonce($_POST['fmbrzp_contact_nonce'], 'fmbrzp_contact_send')) {
    $error = 'Falha de validação. Recarregue a página e tente novamente.';
  } else {
    $name    = sanitize_text_field($_POST['name'] ?? '');
    $email   = sanitize_email($_POST['email'] ?? '');
    $phone   = sanitize_text_field($_POST['phone'] ?? '');
    $subject = sanitize_text_field($_POST['subject'] ?? '');
    $message = sanitize_textarea_field($_POST['message'] ?? '');

    if (empty($name) || empty($email) || empty($subject) || empty($message) || !is_email($email)) {
      $error = 'Preencha os campos obrigatórios corretamente.';
    } else {
      $to = 'contato@fmbrzp.com.br';

      $mail_subject = '[FMBRZP] ' . $subject;
      $body  = "Nome: {$name}\n";
      $body .= "E-mail: {$email}\n";
      if (!empty($phone)) $body .= "Telefone/WhatsApp: {$phone}\n";
      $body .= "Assunto: {$subject}\n\n";
      $body .= "Mensagem:\n{$message}\n";

      $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . $name . ' <' . $email . '>',
      ];

      $sent = wp_mail($to, $mail_subject, $body, $headers);

      if (!$sent) {
        $error = 'Não foi possível enviar agora. Tente novamente em instantes ou use o WhatsApp.';
      }
    }
  }
}
?>

<div class="fmbrzp-contato-page">

  <!-- HERO padrão, compacto e dentro do container -->
  <section class="fmbrzp-cal-hero fmbrzp-contato-hero" aria-label="Hero Contato" style="--fmbrzp-hero-bg: url('<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/img/hero-institucional.png'); ?>');">
    <div class="fmbrzp-cal-hero__inner">
      <h1 class="fmbrzp-cal-hero__title">Contato</h1>
      <div class="fmbrzp-cal-hero__bar" aria-hidden="true"></div>
      <p class="fmbrzp-cal-hero__sub">
        Fale com a Federação para dúvidas, filiação, eventos e comunicados oficiais.
      </p>
    </div>
  </section>

  <?php if ($sent): ?>
    <div class="fmbrzp-contato-alert fmbrzp-contato-alert--ok">
      Mensagem enviada com sucesso. Retornaremos o quanto antes.
    </div>
  <?php elseif (!empty($error)): ?>
    <div class="fmbrzp-contato-alert fmbrzp-contato-alert--err">
      <?php echo esc_html($error); ?>
    </div>
  <?php endif; ?>

  <div class="fmbrzp-contato-grid">

    <!-- CANAIS: compacto (sem blocos gigantes) -->
    <section class="fmbrzp-contato-panel" aria-label="Canais oficiais">
      <h2 class="fmbrzp-section-title">Canais oficiais</h2>

      <div class="fmbrzp-contact-list">
        <div class="fmbrzp-contact-item">
          <strong>E-mail</strong>
          <a href="mailto:contato@fmbrzp.com.br">contato@fmbrzp.com.br</a>
          <a class="fmbrzp-contact-action" href="mailto:contato@fmbrzp.com.br">Enviar e-mail</a>
        </div>

        <div class="fmbrzp-contact-item">
          <strong>WhatsApp</strong>
          <a href="https://wa.me/5532999908251" target="_blank" rel="noopener">(32) 99990-8251</a>
          <a class="fmbrzp-contact-action" href="https://wa.me/5532999908251" target="_blank" rel="noopener">Chamar no WhatsApp</a>
        </div>

        <div class="fmbrzp-contact-item">
          <strong>Instagram</strong>
          <a href="https://www.instagram.com/fmbrzp/" target="_blank" rel="noopener">@fmbrzp</a>
          <a class="fmbrzp-contact-action" href="https://www.instagram.com/fmbrzp/" target="_blank" rel="noopener">Abrir Instagram</a>
        </div>

        <div class="fmbrzp-contact-item">
          <strong>Facebook</strong>
          <a href="https://www.facebook.com/fmbrzp/" target="_blank" rel="noopener">facebook.com/fmbrzp</a>
          <a class="fmbrzp-contact-action" href="https://www.facebook.com/fmbrzp/" target="_blank" rel="noopener">Abrir Facebook</a>
        </div>
      </div>
    </section>

    <!-- FORMULÁRIO: compacto e limpo -->
    <section class="fmbrzp-contato-panel" aria-label="Formulário de contato">
      <h2 class="fmbrzp-section-title">Formulário</h2>

      <form class="fmbrzp-form" method="post" action="">
        <?php wp_nonce_field('fmbrzp_contact_send', 'fmbrzp_contact_nonce'); ?>

        <div class="fmbrzp-field">
          <label for="fmbrzp-name">Nome <span>*</span></label>
          <input id="fmbrzp-name" name="name" type="text" required autocomplete="name" />
        </div>

        <div class="fmbrzp-field">
          <label for="fmbrzp-email">E-mail <span>*</span></label>
          <input id="fmbrzp-email" name="email" type="email" required autocomplete="email" />
        </div>

        <div class="fmbrzp-field">
          <label for="fmbrzp-phone">Telefone/WhatsApp</label>
          <input id="fmbrzp-phone" name="phone" type="text" autocomplete="tel" />
        </div>

        <div class="fmbrzp-field">
          <label for="fmbrzp-subject">Assunto <span>*</span></label>
          <select id="fmbrzp-subject" name="subject" required>
            <option value="" selected disabled>Selecione</option>
            <option>Filiação / Clubes</option>
            <option>Calendário / Competições</option>
            <option>Regulamentos / Documentos</option>
            <option>Imprensa / Comunicação</option>
            <option>Outros</option>
          </select>
        </div>

        <div class="fmbrzp-field">
          <label for="fmbrzp-message">Mensagem <span>*</span></label>
          <textarea id="fmbrzp-message" name="message" rows="4" required></textarea>
        </div>

        <button class="fmbrzp-btn fmbrzp-btn--solid" type="submit">Enviar mensagem</button>

        <p class="fmbrzp-form-note">
          As mensagens são respondidas por ordem de recebimento. Para assuntos urgentes, utilize o WhatsApp.
        </p>
      </form>
    </section>

  </div>
</div>

<?php get_footer(); ?>
