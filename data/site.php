<?php

declare(strict_types=1);

return [
    'name' => 'Ciare Group',
    'product' => 'MALLOR',
    'base_url' => 'https://www.ciaregroup.com',
    'tagline' => 'Software contable y operativo para negocios colombianos.',
    'pending_contact_message' => 'Canal pendiente de configurar. Muy pronto Ciare Group publicará este medio de contacto.',
    'whatsapp' => [
        'number' => '',
        'label' => 'WhatsApp',
    ],
    'social' => [
        [
            'name' => 'Facebook',
            'url' => '#',
            'label' => 'Facebook de Ciare Group',
        ],
        [
            'name' => 'Instagram',
            'url' => '#',
            'label' => 'Instagram de Ciare Group',
        ],
        [
            'name' => 'TikTok',
            'url' => '#',
            'label' => 'TikTok de Ciare Group',
        ],
    ],
    'navigation' => [
        [
            'slug' => 'inicio',
            'label' => 'Inicio',
        ],
        [
            'slug' => 'blog',
            'label' => 'Blog',
        ],
        [
            'slug' => 'proyectos',
            'label' => 'Proyectos',
        ],
        [
            'slug' => 'quienes-somos',
            'label' => 'Quiénes somos',
        ],
        [
            'slug' => 'contacto',
            'label' => 'Contacto',
        ],
    ],
    'routes' => [
        'inicio' => [
            'template' => 'home',
            'title' => 'MALLOR, facturación electrónica e inventario para negocios colombianos',
            'description' => 'Ciare Group presenta MALLOR: software contable fácil de usar para facturación electrónica, inventario y control operativo.',
        ],
        'blog' => [
            'template' => 'blog',
            'title' => 'Blog de facturación electrónica, inventario y gestión',
            'description' => 'Guías prácticas de Ciare Group para entender facturación electrónica, rangos DIAN, inventario y gestión comercial con MALLOR.',
        ],
        'blog/rango-dian-facturacion-electronica' => [
            'template' => 'blog-rango-dian',
            'title' => 'Cómo pedir en la DIAN el rango para facturar electrónicamente',
            'description' => 'Guía práctica para solicitar ante la DIAN la autorización de numeración de facturación electrónica y preparar el rango en tu software.',
        ],
        'proyectos' => [
            'template' => 'projects',
            'title' => 'Proyectos de Ciare Group',
            'description' => 'Conoce los proyectos de Ciare Group. MALLOR es el producto principal para facturación electrónica, inventario y gestión empresarial.',
        ],
        'quienes-somos' => [
            'template' => 'about',
            'title' => 'Quiénes somos en Ciare Group',
            'description' => 'Ciare Group desarrolla soluciones digitales para simplificar la operación de negocios colombianos. MALLOR es su producto estrella.',
        ],
        'contacto' => [
            'template' => 'contact',
            'title' => 'Contacto de Ciare Group',
            'description' => 'Déjanos tus datos para conocer MALLOR. El formulario está listo para conectar cuando Ciare Group configure correo o WhatsApp.',
        ],
        'mallor-contable' => [
            'template' => 'mallor-landing',
            'title' => 'Mallor Contable — Inventario, ventas y facturación electrónica para tu negocio',
            'description' => 'Registra ventas al instante, controla tu inventario y factura electrónicamente. Software rápido para ferreterías, almacenes y tiendas del Sur del Meta y el Guaviare.',
        ],
        '404' => [
            'template' => 'not-found',
            'title' => 'Página no encontrada',
            'description' => 'La página solicitada no existe en el sitio de Ciare Group.',
        ],
    ],
    'posts' => [
        [
            'title' => 'Cómo pedir en la DIAN el rango para comenzar a facturar electrónicamente',
            'slug' => 'blog/rango-dian-facturacion-electronica',
            'date' => '2026-09-05',
            'excerpt' => 'Una explicación clara del trámite de autorización de numeración de facturación en MUISCA y de lo que debes preparar antes de asociar el rango a tu software.',
            'reading_time' => '6 minutos',
        ],
    ],
    'official_sources' => [
        [
            'label' => 'Guía DIAN: solicitud de autorización de numeración de facturación',
            'url' => 'https://micrositios.dian.gov.co/sistema-de-facturacion-electronica/numeracion-autorizacion/',
        ],
        [
            'label' => 'Preguntas frecuentes DIAN sobre numeración de facturación',
            'url' => 'https://micrositios.dian.gov.co/sistema-de-facturacion-electronica/numeracion-de-facturacion-preguntas-frecuentes/',
        ],
        [
            'label' => 'Instructivo DIAN de registro y habilitación en factura electrónica',
            'url' => 'https://micrositios.dian.gov.co/sistema-de-facturacion-electronica/instructivo-de-registro-y-habilitacion-en-factura-electronica-dian/',
        ],
    ],
];
