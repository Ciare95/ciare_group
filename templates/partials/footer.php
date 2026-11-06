<?php

declare(strict_types=1);
?>
<footer class="site-footer">
    <div class="footer-grid">
        <div>
            <div class="footer-logos">
                <img
                    class="brand-logo"
                    src="<?= e(assetPath('img/mallor-logo.png')) ?>"
                    alt="<?= e($site['product']) ?>"
                    width="150"
                    height="40"
                >
                <img
                    class="brand-logo"
                    src="<?= e(assetPath('img/ciare-logo.png')) ?>"
                    alt="<?= e($site['name']) ?>"
                    width="150"
                    height="40"
                >
            </div>
            <p>
                MALLOR es el producto principal de Ciare Group para acompañar a negocios que necesitan facturar,
                vender y controlar inventario con una herramienta clara.
            </p>
        </div>

        <div>
            <h2>Navegación</h2>
            <ul class="footer-list">
                <?php foreach ($site['navigation'] as $item): ?>
                    <li><a href="<?= e(urlFor($item['slug'])) ?>"><?= e($item['label']) ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div>
            <h2>Redes sociales</h2>
            <div class="social-links">
                <?php foreach ($site['social'] as $social): ?>
                    <a
                        href="<?= e($social['url']) ?>"
                        aria-label="<?= e($social['label']) ?>"
                        data-pending-link="<?= $social['url'] === '#' ? 'true' : 'false' ?>"
                        data-message="<?= e($site['pending_contact_message']) ?>"
                    >
                        <?= e($social['name']) ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <span>&copy; <?= date('Y') ?> <?= e($site['name']) ?>. Todos los derechos reservados.</span>
        <span>MALLOR, software contable y operativo.</span>
    </div>
</footer>
