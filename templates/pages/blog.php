<?php

declare(strict_types=1);
?>
<section class="page-hero compact-hero">
    <p class="eyebrow">Blog de Ciare Group</p>
    <h1>Guías para facturar, organizar inventario y tomar mejores decisiones.</h1>
    <p>
        Contenido práctico para negocios que están implementando facturación electrónica o quieren entender
        mejor su operación antes de adoptar MALLOR.
    </p>
</section>

<section class="post-list">
    <?php foreach ($site['posts'] as $post): ?>
        <article class="post-card">
            <div>
                <p class="post-meta">
                    <?= e(date('d/m/Y', strtotime($post['date']))) ?> · <?= e($post['reading_time']) ?>
                </p>
                <h2><a href="<?= e(urlFor($post['slug'])) ?>"><?= e($post['title']) ?></a></h2>
                <p><?= e($post['excerpt']) ?></p>
            </div>
            <a class="button button-secondary" href="<?= e(urlFor($post['slug'])) ?>">Leer artículo</a>
        </article>
    <?php endforeach; ?>
</section>
