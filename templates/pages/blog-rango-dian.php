<?php

declare(strict_types=1);
?>
<article class="article-layout">
    <header class="article-header">
        <p class="eyebrow">Facturación electrónica</p>
        <h1>Cómo pedir en la DIAN el rango para comenzar a facturar electrónicamente</h1>
        <p>
            Antes de emitir facturas electrónicas necesitas una autorización de numeración. Ese rango define los
            consecutivos que usará tu negocio y luego debe asociarse al sistema de facturación que vayas a usar.
        </p>
        <p class="post-meta">Actualizado: 05/09/2026 · Lectura estimada: 6 minutos</p>
    </header>

    <?php
    renderImage(
        assetPath('img/Fachada-Dian-2026(Presidencia).jpg.webp'),
        'Fachada de la Dirección de Impuestos y Aduanas Nacionales (DIAN)',
        'La solicitud de rangos se realiza a través del portal oficial de la DIAN.'
    );
    ?>

    <div class="article-body">
        <p class="notice">
            Esta guía es informativa. Revisa siempre los enlaces oficiales de la DIAN antes de hacer el trámite,
            porque los nombres de menús, formularios o requisitos pueden cambiar.
        </p>

        <h2>Qué es el rango de numeración</h2>
        <p>
            La autorización de numeración es el permiso que entrega la DIAN para usar una secuencia de números en
            tus facturas. En la práctica, define desde qué número hasta qué número puede facturar tu empresa y
            con qué prefijo, modalidad y vigencia.
        </p>

        <h2>Antes de entrar a MUISCA</h2>
        <ul>
            <li>Ten acceso al usuario registrado de la DIAN.</li>
            <li>Revisa que el RUT tenga nombre, dirección, responsabilidad para facturar y establecimientos actualizados.</li>
            <li>Define si usarás prefijo. Si manejas varios establecimientos, conviene diferenciar cada punto.</li>
            <li>Ten claro el rango que vas a solicitar y la modalidad: factura electrónica de venta.</li>
        </ul>

        <h2>Pasos generales para solicitar el rango</h2>
        <ol>
            <li>Entra a <a href="https://www.dian.gov.co" target="_blank" rel="noopener">dian.gov.co</a> y accede como usuario registrado.</li>
            <li>Ingresa al sistema MUISCA y busca la opción de numeración de facturación.</li>
            <li>Selecciona la solicitud para autorizar numeración de facturación.</li>
            <li>Verifica la información del contribuyente y del RUT antes de continuar.</li>
            <li>Elige la opción para autorizar rango y diligencia prefijo, modalidad, rango desde, rango hasta y establecimiento.</li>
            <li>Agrega la información y revisa el borrador del formato de solicitud.</li>
            <li>Firma electrónicamente la solicitud y finaliza el proceso para generar la autorización.</li>
            <li>Guarda el documento de autorización, porque contiene la vigencia y los rangos autorizados.</li>
        </ol>

        <h2>Después de tener la autorización</h2>
        <p>
            Cuando ya tengas el rango autorizado, debes asociarlo al sistema de facturación electrónica que uses.
            La DIAN indica que, después de solicitar los rangos, puede ser necesario esperar antes de asociar
            prefijos en el ambiente correspondiente. Conserva el documento de autorización y registra la
            información exactamente como aparece allí.
        </p>

        <h2>Cómo encaja MALLOR en este proceso</h2>
        <p>
            MALLOR no reemplaza el trámite ante la DIAN. Su objetivo es ayudarte después de tener la información
            correcta: prefijo, rango, vigencia y modalidad. Con esos datos, el software puede integrarse al flujo
            operativo de ventas, facturación e inventario.
        </p>

        <h2>Fuentes oficiales</h2>
        <ul class="source-list">
            <?php foreach ($site['official_sources'] as $source): ?>
                <li>
                    <a href="<?= e($source['url']) ?>" target="_blank" rel="noopener">
                        <?= e($source['label']) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</article>
