<?php

declare(strict_types=1);
?>
<header class="site-header" data-site-header>
    <div class="header-inner">
        <a class="brand-mark" href="<?= e(urlFor('inicio')) ?>" aria-label="Ir al inicio de Ciare Group">
            <img
                class="brand-logo"
                src="<?= e(assetPath('img/ciare-logo.png')) ?>"
                alt="Ciare Group"
                width="150"
                height="42"
            >
        </a>

        <button class="menu-button" type="button" data-menu-button aria-expanded="false" aria-controls="site-navigation">
            <span></span>
            <span></span>
            <span></span>
            Menú
        </button>

        <nav class="site-nav" id="site-navigation" data-site-nav aria-label="Navegación principal">
            <?php foreach ($site['navigation'] as $item): ?>
                <a
                    href="<?= e(urlFor($item['slug'])) ?>"
                    class="<?= isActiveRoute($currentSlug, $item['slug']) ? 'is-active' : '' ?>"
                >
                    <?= e($item['label']) ?>
                </a>
            <?php endforeach; ?>
        </nav>

        <a class="header-cta" href="<?= e(urlFor('contacto')) ?>">Solicitar información</a>
    </div>
</header>
