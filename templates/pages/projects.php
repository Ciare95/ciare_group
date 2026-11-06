<?php

declare(strict_types=1);
?>
<section class="page-hero compact-hero">
    <p class="eyebrow">Proyectos</p>
    <h1>Productos de Ciare Group para resolver necesidades reales de operación.</h1>
    <p>
        Por ahora el producto activo es MALLOR. Esta página queda lista para sumar nuevos proyectos cuando
        Ciare Group amplíe su portafolio.
    </p>
</section>

<section class="project-feature">
    <div class="project-copy">
        <p class="eyebrow">Producto estrella</p>
        <h2>MALLOR</h2>
        <p>
            Software contable y operativo para facturación electrónica, inventario, ventas y gestión diaria de
            negocios colombianos.
        </p>
        <ul>
            <li>Facturación electrónica con enfoque de uso simple.</li>
            <li>Control de productos y existencias.</li>
            <li>Base para crecer hacia más procesos administrativos.</li>
        </ul>
        <a class="button button-primary" href="<?= e(urlFor('contacto')) ?>">Solicitar información</a>
    </div>
    <?php
    renderImagePlaceholder(
        'Imagen sugerida: captura principal de MALLOR mostrando factura electrónica e inventario, con datos ficticios y diseño limpio.'
    );
    ?>
</section>

<section class="future-projects">
    <h2>Próximos proyectos</h2>
    <p>
        Este espacio queda reservado para nuevas soluciones de Ciare Group. Cuando exista otro producto, agrega
        una ficha con problema, público, estado y enlace.
    </p>
</section>
