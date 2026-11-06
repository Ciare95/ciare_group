<?php

declare(strict_types=1);
?>
<section class="page-hero compact-hero">
    <p class="eyebrow">Contacto</p>
    <h1>Cuéntanos sobre tu negocio y revisamos si MALLOR puede ayudarte.</h1>
    <p>
        El formulario está preparado para conectar un correo o proveedor de formularios cuando Ciare Group tenga
        el canal definitivo.
    </p>
</section>

<section class="contact-layout">
    <form class="contact-form" action="#" method="post" data-contact-form>
        <div class="form-row">
            <label for="name">Nombre</label>
            <input id="name" name="name" type="text" autocomplete="name" required>
        </div>
        <div class="form-row">
            <label for="business">Negocio o empresa</label>
            <input id="business" name="business" type="text" autocomplete="organization">
        </div>
        <div class="form-row">
            <label for="phone">Teléfono o WhatsApp</label>
            <input id="phone" name="phone" type="tel" autocomplete="tel">
        </div>
        <div class="form-row">
            <label for="email">Correo</label>
            <input id="email" name="email" type="email" autocomplete="email">
        </div>
        <div class="form-row full-row">
            <label for="message">Mensaje</label>
            <textarea id="message" name="message" rows="6" required></textarea>
        </div>
        <button class="button button-primary" type="submit">Enviar solicitud</button>
        <p class="form-feedback" data-form-feedback hidden>
            Gracias. El formulario visual funciona, pero falta configurar el canal real de recepción.
        </p>
    </form>

    <aside class="contact-panel">
        <h2>Canales pendientes</h2>
        <p>
            Aún no hay número de contacto ni correo configurado. Este espacio queda preparado para publicar el
            canal oficial de Ciare Group.
        </p>
        <div class="social-links vertical">
            <?php foreach ($site['social'] as $social): ?>
                <a
                    href="<?= e($social['url']) ?>"
                    data-pending-link="<?= $social['url'] === '#' ? 'true' : 'false' ?>"
                    data-message="<?= e($site['pending_contact_message']) ?>"
                >
                    <?= e($social['name']) ?>
                </a>
            <?php endforeach; ?>
        </div>
    </aside>
</section>
