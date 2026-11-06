<?php

declare(strict_types=1);

require __DIR__ . '/src/helpers.php';

if (PHP_SAPI === 'cli-server') {
    $requestPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
    $requestedFile = __DIR__ . (string) $requestPath;

    if ($requestPath !== '/' && is_file($requestedFile)) {
        return false;
    }
}

$site = require __DIR__ . '/data/site.php';
$routes = $site['routes'];
$requestedPage = $_GET['page'] ?? parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$currentSlug = normalizeSlug($requestedPage);

if (!array_key_exists($currentSlug, $routes)) {
    http_response_code(404);
    $currentSlug = '404';
}

$page         = $routes[$currentSlug];
$pageTemplate = __DIR__ . '/templates/pages/' . $page['template'] . '.php';

// Landing page: handle demo form submission before any output
$formSent  = false;
$formError = false;

if ($currentSlug === 'mallor-contable') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre   = trim((string) ($_POST['demo_nombre']   ?? ''));
        $telefono = trim((string) ($_POST['demo_telefono'] ?? ''));
        $email    = trim((string) ($_POST['demo_email']    ?? ''));

        $emailValido = $email === '' || filter_var($email, FILTER_VALIDATE_EMAIL);

        if ($nombre !== '' && $telefono !== '' && $emailValido) {
            $lead        = ['fecha' => date('Y-m-d H:i:s'), 'nombre' => $nombre, 'telefono' => $telefono, 'email' => $email];
            $formspreeId = (string) ($_ENV['FORMSPREE_FORM_ID'] ?? getenv('FORMSPREE_FORM_ID') ?: '');

            if ($formspreeId !== '') {
                $ch = curl_init('https://formspree.io/f/' . $formspreeId);
                curl_setopt_array($ch, [
                    CURLOPT_POST           => true,
                    CURLOPT_POSTFIELDS     => json_encode($lead),
                    CURLOPT_HTTPHEADER     => ['Content-Type: application/json', 'Accept: application/json'],
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_TIMEOUT        => 10,
                ]);
                curl_exec($ch);
                curl_close($ch);
            } else {
                // Fallback local: guarda en data/leads.json (solo para desarrollo)
                $leadsFile = __DIR__ . '/data/leads.json';
                $existing  = [];
                if (file_exists($leadsFile)) {
                    $decoded  = json_decode((string) file_get_contents($leadsFile), true);
                    $existing = is_array($decoded) ? $decoded : [];
                }
                $existing[] = $lead;
                file_put_contents($leadsFile, json_encode($existing, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }

            header('Location: ' . urlFor('mallor-contable') . '?enviado=1');
            exit;
        }

        $formError = true;
    }

    if (isset($_GET['enviado']) && $_GET['enviado'] === '1') {
        $formSent = true;
    }
}

$layoutFile = ($currentSlug === 'mallor-contable')
    ? __DIR__ . '/templates/layout-landing.php'
    : __DIR__ . '/templates/layout.php';

require $layoutFile;
