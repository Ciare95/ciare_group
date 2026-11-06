# Sitio Ciare Group

Sitio PHP estatico para publicitar MALLOR. No usa base de datos ni dependencias externas.

## Estructura

- `index.php`: enrutador principal.
- `data/site.php`: datos del sitio, rutas, enlaces sociales, WhatsApp, metadatos y fuentes.
- `templates/pages`: paginas del sitio.
- `templates/partials`: header y footer.
- `assets/css/styles.css`: identidad visual y responsive.
- `assets/js/main.js`: menu movil, formulario simulado y enlaces pendientes.
- `robots.txt` y `sitemap.xml`: archivos SEO iniciales.

## Pendiente antes de publicar

- Cambiar `https://www.ciaregroup.com` por el dominio real en `data/site.php`, `robots.txt` y `sitemap.xml`.
- Reemplazar los enlaces `#` de Facebook, Instagram y TikTok.
- Configurar el numero de WhatsApp en `data/site.php`.
- Conectar el formulario de contacto a un correo o proveedor externo.
- Reemplazar los placeholders por imagenes reales optimizadas.

## Ejecutar en local

Desde esta carpeta:

```bash
php -S 127.0.0.1:8095
```

Si quieres probar URLs limpias como `/blog`, usa:

```bash
php -S 127.0.0.1:8095 index.php
```

Luego abre `http://127.0.0.1:8095`.
