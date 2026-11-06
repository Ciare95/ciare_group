<?php

declare(strict_types=1);

function e(mixed $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function normalizeSlug(mixed $slug): string
{
    $cleanSlug = trim((string) $slug, "/ \t\n\r\0\x0B");

    return $cleanSlug === '' ? 'inicio' : $cleanSlug;
}

function appBasePath(): string
{
    $scriptName = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');
    $directory = dirname($scriptName);

    if ($directory === '/' || $directory === '.' || $directory === '\\') {
        return '';
    }

    return rtrim($directory, '/');
}

function urlFor(string $slug = 'inicio'): string
{
    $basePath = appBasePath();

    if ($slug === 'inicio') {
        return $basePath . '/';
    }

    return $basePath . '/' . ltrim($slug, '/');
}

function assetPath(string $path): string
{
    return appBasePath() . '/assets/' . ltrim($path, '/');
}

function canonicalUrl(array $site, string $slug): string
{
    $baseUrl = rtrim((string) $site['base_url'], '/');

    if ($slug === 'inicio') {
        return $baseUrl . '/';
    }

    return $baseUrl . '/' . ltrim($slug, '/');
}

function isActiveRoute(string $currentSlug, string $routeSlug): bool
{
    if ($currentSlug === $routeSlug) {
        return true;
    }

    return $routeSlug === 'blog' && str_starts_with($currentSlug, 'blog/');
}

function renderImagePlaceholder(string $description, string $label = 'Imagen pendiente'): void
{
    ?>
    <figure class="image-slot">
        <span><?= e($label) ?></span>
        <figcaption><?= e($description) ?></figcaption>
    </figure>
    <?php
}

function renderImage(string $src, string $alt, string $caption = ''): void
{
    ?>
    <figure class="image-figure">
        <img src="<?= e($src) ?>" alt="<?= e($alt) ?>" loading="lazy">
        <?php if ($caption !== ''): ?>
            <figcaption><?= e($caption) ?></figcaption>
        <?php endif; ?>
    </figure>
    <?php
}

function renderJsonLd(array $data): void
{
    $json = json_encode(
        $data,
        JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT
    );

    if ($json === false) {
        return;
    }

    echo '<script type="application/ld+json">' . PHP_EOL;
    echo $json . PHP_EOL;
    echo '</script>' . PHP_EOL;
}
