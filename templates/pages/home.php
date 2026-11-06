<?php

declare(strict_types=1);
?>
<section class="hero-section">
    <div class="hero-copy">
        <p class="eyebrow">Ciare Group presenta MALLOR</p>
        <h1>Facturación electrónica clara para negocios que no pueden detenerse.</h1>
        <p class="hero-lead">
            MALLOR ayuda a manejar facturación electrónica, inventario y ventas desde una experiencia pensada
            para comercios colombianos que necesitan orden sin procesos difíciles.
        </p>
        <div class="hero-actions">
            <a class="button button-primary" href="<?= e(urlFor('contacto')) ?>">Quiero conocer MALLOR</a>
            <a class="button button-secondary" href="<?= e(urlFor('blog/rango-dian-facturacion-electronica')) ?>">
                Ver guía DIAN
            </a>
        </div>
    </div>

    <div class="hero-card" aria-label="Resumen visual de MALLOR">
        <img
            class="brand-logo"
            src="<?= e(assetPath('img/mallor-logo.png')) ?>"
            alt="MALLOR"
            width="180"
            height="56"
        >
        <ul class="hero-list">
            <li>Facturación electrónica lista para asociar tu rango DIAN.</li>
            <li>Inventario con entradas, salidas y existencias claras.</li>
            <li>Operación diaria pensada para vender y seguir trabajando.</li>
        </ul>
    </div>
</section>

<section class="section-grid section-with-rule">
    <div>
        <p class="eyebrow">Lo esencial primero</p>
        <h2>Menos vueltas para emitir, controlar y continuar vendiendo.</h2>
    </div>
    <div class="feature-list">
        <article class="feature-card">
            <span class="feature-number">01</span>
            <h3>Facturación electrónica</h3>
            <p>
                Prepara tu operación para emitir documentos electrónicos de venta con un flujo entendible y
                orientado al trabajo real del negocio.
            </p>
        </article>
        <article class="feature-card">
            <span class="feature-number">02</span>
            <h3>Gestión de inventario</h3>
            <p>
                Consulta existencias, organiza productos y reduce el desorden entre lo que compras, vendes y
                tienes disponible.
            </p>
        </article>
        <article class="feature-card">
            <span class="feature-number">03</span>
            <h3>Operación diaria</h3>
            <p>
                MALLOR se construye para que facturación, ventas e inventario se entiendan como parte de una
                misma jornada de trabajo.
            </p>
        </article>
    </div>
</section>

<section class="story-band">
    <div class="story-content">
        <p class="eyebrow">Pensado para Colombia</p>
        <h2>Una herramienta para negocios que deben cumplir, pero también vender.</h2>
        <p>
            La facturación electrónica no debería sentirse como una barrera técnica. El enfoque de MALLOR es
            acercar los pasos administrativos al lenguaje de la tienda, el punto de venta, el inventario y la
            caja diaria.
        </p>
        <a class="text-link" href="<?= e(urlFor('quienes-somos')) ?>">Conocer a Ciare Group</a>
    </div>
    <?php
    renderImage(
        assetPath('img/administradora.jpg'),
        'Administradora de un comercio colombiano revisando una factura electrónica en computador',
        'La operación diaria de MALLOR acompaña a quienes atienden el negocio cada día.'
    );
    ?>
</section>

<section class="conversion-strip">
    <div>
        <p class="eyebrow">Embudo inicial</p>
        <h2>Primero conoce si MALLOR encaja con tu negocio.</h2>
    </div>
    <a class="button button-primary" href="<?= e(urlFor('contacto')) ?>">Dejar mis datos</a>
</section>
