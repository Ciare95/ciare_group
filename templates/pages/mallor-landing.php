<?php declare(strict_types=1); ?>

<!-- ============================================================
     BLOQUE 1 — ABOVE THE FOLD
     ============================================================ -->
<section class="lp-hero" id="inicio">
    <div class="lp-container">
        <div class="lp-hero-grid">

            <div class="lp-hero-copy">
                <p class="eyebrow lp-eyebrow-blue">Software para negocios del Sur del Meta y el Guaviare</p>
                <h1 class="lp-h1">Tu negocio no puede esperar a que cargue el sistema</h1>
                <p class="lp-hero-lead">
                    Mallor Contable registra ventas al instante, mantiene tu inventario actualizado
                    y emite facturas electrónicas. Funciona aunque el internet falle.
                </p>
                <div class="lp-hero-actions">
                    <a href="#demo" class="button button-primary lp-btn-lg">Probar Mallor Contable</a>
                    <a href="#beneficios" class="lp-ghost-link">Ver cómo funciona ↓</a>
                </div>
                <p class="lp-hero-note">Sin compromisos &middot; Sin costo de demostración</p>
            </div>

            <div class="lp-hero-visual" aria-hidden="true">
                <div class="lp-hero-img-card">
                    <img
                        src="<?= e(assetPath('img/administradora.jpg')) ?>"
                        alt="Administradora registrando una venta en Mallor Contable"
                        class="lp-hero-img"
                        loading="eager"
                        width="600"
                        height="420"
                    >
                    <div class="lp-hero-overlay"></div>
                    <div class="lp-hero-badges">
                        <span class="lp-badge">Inventario al instante</span>
                        <span class="lp-badge">Facturas electrónicas</span>
                        <span class="lp-badge">Sin internet, sigue funcionando</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ============================================================
     BLOQUE 2 — QUÉ TE LLEVAS
     ============================================================ -->
<section class="lp-benefits" id="beneficios">
    <div class="lp-container">
        <div class="lp-section-head">
            <p class="eyebrow">Qué te llevas</p>
            <h2>Menos tiempo esperando el sistema, más tiempo atendiendo clientes</h2>
        </div>

        <div class="lp-benefits-grid">

            <article class="lp-benefit-card">
                <div class="lp-benefit-icon" aria-hidden="true">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>
                    </svg>
                </div>
                <h3>Velocidad en caja</h3>
                <p>Registra una venta en segundos. Sin pantallas lentas ni esperas frustrantes con clientes en la fila.</p>
            </article>

            <article class="lp-benefit-card">
                <div class="lp-benefit-icon" aria-hidden="true">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/>
                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"/>
                        <line x1="12" y1="22.08" x2="12" y2="12"/>
                    </svg>
                </div>
                <h3>Inventario siempre claro</h3>
                <p>Busca referencias, consulta existencias y actualiza el stock. Todo desde el mismo sistema, sin cuadernos ni hojas de cálculo.</p>
            </article>

            <article class="lp-benefit-card">
                <div class="lp-benefit-icon" aria-hidden="true">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <polyline points="9 15 12 18 15 15"/>
                        <line x1="12" y1="12" x2="12" y2="18"/>
                    </svg>
                </div>
                <h3>Facturación electrónica sin complicaciones</h3>
                <p>Emite facturas con pocos pasos. Las que queden pendientes por falta de internet se envían solas cuando vuelve la conexión.</p>
            </article>

            <article class="lp-benefit-card">
                <div class="lp-benefit-icon" aria-hidden="true">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>
                <h3>Acompañamiento desde el día uno</h3>
                <p>Alguien te ayuda a instalar y te explica el sistema en tu propio negocio. Sin tutoriales en YouTube ni esperar días para resolver una duda.</p>
            </article>

        </div>

        <div class="lp-section-cta-row">
            <a href="#demo" class="lp-text-cta">Pide tu demostración gratuita &rarr;</a>
        </div>
    </div>
</section>

<!-- ============================================================
     BLOQUE 3 — TESTIMONIOS
     ============================================================ -->
<section class="lp-testimonials">
    <div class="lp-container">
        <div class="lp-section-head">
            <p class="eyebrow">Opiniones</p>
            <h2>Lo que dicen los que ya lo usan</h2>
        </div>

        <div class="lp-testimonials-grid">

            <article class="lp-testimonial-card">
                <div class="lp-testimonial-avatar" aria-hidden="true"><span>L</span></div>
                <div class="lp-testimonial-body">
                    <p class="lp-testimonial-quote">
                        &ldquo;Ahora es mucho más fácil llevar las cuentas. Registro ventas, gastos y préstamos, y todo queda reflejado en el cierre de caja. La facturación electrónica también la manejo desde el mismo sistema.&rdquo;
                    </p>
                    <footer class="lp-testimonial-meta">
                        <strong>Lucía</strong>
                        <span>Empaques del Guaviare &middot; San José del Guaviare</span>
                    </footer>
                </div>
            </article>

            <article class="lp-testimonial-card">
                <div class="lp-testimonial-avatar" aria-hidden="true"><span>L</span></div>
                <div class="lp-testimonial-body">
                    <p class="lp-testimonial-quote">
                        &ldquo;Me encanta la versión para celular. El flujo de ventas es muy rápido; antes me tocaba esperar que todo cargara.&rdquo;
                    </p>
                    <footer class="lp-testimonial-meta">
                        <strong>Leidy</strong>
                        <span>Puerto Rico, Meta</span>
                    </footer>
                </div>
            </article>

        </div>
    </div>
</section>

<!-- ============================================================
     BLOQUE 4 — ¿ES PARA MI NEGOCIO?
     ============================================================ -->
<section class="lp-fit" id="para-mi">
    <div class="lp-container">
        <div class="lp-section-head">
            <p class="eyebrow">¿Es para mi negocio?</p>
            <h2>Mallor encaja si reconoces alguna de estas situaciones</h2>
        </div>

        <div class="lp-fit-grid">

            <div class="lp-fit-col">
                <h3 class="lp-fit-title lp-fit-yes">
                    <span class="lp-fit-icon" aria-hidden="true">✓</span>
                    Sí es para ti si&hellip;
                </h3>
                <ul class="lp-checklist">
                    <li>Tienes una ferretería, tornillería, tienda de repuestos u otro comercio con muchos productos</li>
                    <li>Necesitas registrar ventas rápido cuando hay varios clientes al mismo tiempo</li>
                    <li>Quieres saber cuántas existencias tienes sin contar manualmente</li>
                    <li>Debes cumplir con la facturación electrónica ante la DIAN</li>
                    <li>Buscas algo que tus empleados aprendan sin capacitaciones largas</li>
                    <li>Quieres acompañamiento al momento de hacer el cambio de sistema</li>
                </ul>
            </div>

            <div class="lp-fit-col">
                <h3 class="lp-fit-title lp-fit-also">
                    <span class="lp-fit-icon" aria-hidden="true">○</span>
                    Funciona aunque&hellip;
                </h3>
                <ul class="lp-checklist lp-checklist-also">
                    <li>No hayas usado antes un software de gestión</li>
                    <li>El internet en tu zona sea inestable o se vaya seguido</li>
                    <li>Ya tengas otro programa y no quieras perder tu información</li>
                    <li>Tus empleados no sean expertos en tecnología</li>
                    <li>Solo tengas un computador en el negocio</li>
                    <li>Nunca hayas facturado electrónicamente antes</li>
                </ul>
            </div>

        </div>
    </div>
</section>

<!-- ============================================================
     BLOQUE 5 — INFORMACIÓN PRÁCTICA
     ============================================================ -->
<section class="lp-info" id="informacion">
    <div class="lp-container">
        <div class="lp-section-head">
            <p class="eyebrow">Información práctica</p>
            <h2>Todo lo que necesitas saber antes de probar</h2>
        </div>

        <div class="lp-info-grid">

            <div class="lp-info-card lp-info-card-accent">
                <div class="lp-info-icon" aria-hidden="true">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                        <line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/>
                        <line x1="3" y1="10" x2="21" y2="10"/>
                    </svg>
                </div>
                <h3>Demostración sin costo</h3>
                <p>Sin presión. Te mostramos el sistema con un ejemplo del tipo de negocio que tienes para que veas cómo funciona en la práctica.</p>
            </div>

            <div class="lp-info-card">
                <div class="lp-info-icon" aria-hidden="true">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                        <circle cx="12" cy="10" r="3"/>
                    </svg>
                </div>
                <h3>Ubicación y modalidad</h3>
                <p>Atendemos negocios en el Guaviare y el Meta, de forma presencial o virtual según lo que te quede más cómodo.</p>
            </div>

            <div class="lp-info-card">
                <div class="lp-info-icon" aria-hidden="true">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="3" width="20" height="14" rx="2" ry="2"/>
                        <line x1="8" y1="21" x2="16" y2="21"/>
                        <line x1="12" y1="17" x2="12" y2="21"/>
                    </svg>
                </div>
                <h3>Qué necesitas llevar</h3>
                <p>Un computador con Windows. No necesitas instalar nada antes de la demo; nosotros nos encargamos de eso.</p>
            </div>

            <div class="lp-info-card">
                <div class="lp-info-icon" aria-hidden="true">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <polyline points="12 6 12 12 16 14"/>
                    </svg>
                </div>
                <h3>Horario de atención</h3>
                <p>Respondemos lo más rápido posible. Escríbenos y te contestamos en cuanto podamos.</p>
            </div>

            <div class="lp-info-card lp-info-card-accent">
                <div class="lp-info-icon" aria-hidden="true">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 11 12 14 22 4"/>
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>
                    </svg>
                </div>
                <h3>Sin compromiso de compra</h3>
                <p>La demostración es solo para que conozcas el sistema. No hay ninguna obligación después de verlo.</p>
            </div>

        </div>

        <div class="lp-section-cta-row">
            <a href="#demo" class="button button-primary">Solicitar mi demostración</a>
        </div>
    </div>
</section>

<!-- ============================================================
     BLOQUE 6 — FAQ ACORDEÓN
     ============================================================ -->
<section class="lp-faq" id="preguntas">
    <div class="lp-container">
        <div class="lp-faq-body">
            <div class="lp-section-head">
                <p class="eyebrow">Preguntas frecuentes</p>
                <h2>Resolvemos las dudas más comunes</h2>
            </div>

            <div class="lp-accordion" role="list">

                <div class="lp-faq-item" role="listitem">
                    <button class="lp-faq-q" type="button" aria-expanded="false">
                        ¿Necesito experiencia previa en software contable?
                        <span class="lp-faq-arrow" aria-hidden="true"></span>
                    </button>
                    <div class="lp-faq-a" hidden>
                        <p>No. Mallor Contable está pensado para personas que no son expertas en tecnología. El flujo de una venta es directo y los menús son fáciles de entender. Durante la demostración te mostramos cómo funciona desde cero.</p>
                    </div>
                </div>

                <div class="lp-faq-item" role="listitem">
                    <button class="lp-faq-q" type="button" aria-expanded="false">
                        ¿El sistema funciona si el internet se cae?
                        <span class="lp-faq-arrow" aria-hidden="true"></span>
                    </button>
                    <div class="lp-faq-a" hidden>
                        <p>Sí. Mallor Contable sigue registrando ventas e inventario aunque no haya conexión a internet. Las facturas electrónicas que no se pudieron enviar quedan guardadas y se procesan automáticamente cuando vuelve la señal.</p>
                    </div>
                </div>

                <div class="lp-faq-item" role="listitem">
                    <button class="lp-faq-q" type="button" aria-expanded="false">
                        ¿Qué necesito para la demostración?
                        <span class="lp-faq-arrow" aria-hidden="true"></span>
                    </button>
                    <div class="lp-faq-a" hidden>
                        <p>Solo un computador con Windows. No necesitas instalar nada antes. Nosotros llevamos todo lo necesario para mostrarte el sistema funcionando con un ejemplo parecido a tu negocio.</p>
                    </div>
                </div>

                <div class="lp-faq-item" role="listitem">
                    <button class="lp-faq-q" type="button" aria-expanded="false">
                        ¿Qué pasa después de la demostración?
                        <span class="lp-faq-arrow" aria-hidden="true"></span>
                    </button>
                    <div class="lp-faq-a" hidden>
                        <p>Nada obligatorio. Si el sistema te convence, conversamos sobre la instalación y los costos. Si no, no hay ningún problema. La demo es para que tomes la decisión con información real, no para presionarte a comprar.</p>
                    </div>
                </div>

                <div class="lp-faq-item" role="listitem">
                    <button class="lp-faq-q" type="button" aria-expanded="false">
                        ¿Puedo migrar la información del programa que uso ahora?
                        <span class="lp-faq-arrow" aria-hidden="true"></span>
                    </button>
                    <div class="lp-faq-a" hidden>
                        <p>Depende del formato en que tengas la información actualmente. Es una de las preguntas que puedes resolver en la demostración. No te preocupes por perder datos: te ayudamos a revisar la mejor forma de hacer el cambio.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     BLOQUE 7 — PLANES Y PRECIOS
     ============================================================ -->
<section class="lp-plans" id="planes">
    <div class="lp-container">
        <div class="lp-section-head">
            <p class="eyebrow">Planes y precios</p>
            <h2>Elige el plan que se adapta a tu negocio</h2>
            <p class="lp-plans-note">Todos los planes incluyen acompañamiento en la configuración inicial.</p>
        </div>

        <div class="lp-plans-grid">

            <!-- Plan Básico -->
            <div class="lp-plan-card">
                <div class="lp-plan-top">
                    <p class="lp-plan-name">Plan Básico</p>
                    <div class="lp-plan-price">
                        <span class="lp-price-big">$40.000</span>
                        <span class="lp-price-sub">COP / mes</span>
                    </div>
                    <p class="lp-plan-desc">Gestión de ventas e inventario en la nube, sin facturación electrónica.</p>
                </div>
                <ul class="lp-plan-feats">
                    <li>Ventas e inventario</li>
                    <li>Acceso a informes</li>
                    <li>Gestión de clientes y proveedores</li>
                    <li>Hasta 3 usuarios</li>
                    <li>App mobile (informes y ventas)</li>
                    <li>Solo cloud</li>
                    <li class="lp-feat-no">Sin facturación electrónica</li>
                </ul>
                <a href="#demo" class="lp-plan-btn">Quiero este plan</a>
            </div>

            <!-- Plan Intermedio -->
            <div class="lp-plan-card">
                <div class="lp-plan-top">
                    <p class="lp-plan-name">Plan Intermedio</p>
                    <div class="lp-plan-price">
                        <span class="lp-price-big">$60.000</span>
                        <span class="lp-price-sub">COP / mes</span>
                    </div>
                    <p class="lp-plan-desc">Cloud con facturación electrónica incluida.</p>
                </div>
                <ul class="lp-plan-feats">
                    <li>Ventas e inventario</li>
                    <li>Acceso a informes</li>
                    <li>Gestión de clientes y proveedores</li>
                    <li>Hasta 3 usuarios</li>
                    <li>App mobile (informes y ventas)</li>
                    <li>Solo cloud</li>
                    <li class="lp-feat-star">Facturación electrónica &mdash; 5.000 documentos/año</li>
                </ul>
                <a href="#demo" class="lp-plan-btn">Quiero este plan</a>
            </div>

            <!-- Plan Avanzado — Recomendado -->
            <div class="lp-plan-card lp-plan-featured">
                <div class="lp-plan-badge">¡Recomendado!</div>
                <div class="lp-plan-top">
                    <p class="lp-plan-name">Plan Avanzado</p>
                    <div class="lp-plan-price">
                        <span class="lp-price-big">$60.000</span>
                        <span class="lp-price-sub">COP / mes</span>
                    </div>
                    <p class="lp-price-from">Desde el 2.&ordm; mes tras la instalación</p>
                    <div class="lp-plan-plus">
                        + $1.500.000 instalación local <em>(pago único)</em>
                    </div>
                    <p class="lp-plan-desc">Cloud + local: más velocidad y sigue vendiendo aunque se vaya el internet.</p>
                </div>
                <ul class="lp-plan-feats">
                    <li>Ventas e inventario</li>
                    <li>Acceso a informes</li>
                    <li>Gestión de clientes y proveedores</li>
                    <li>Hasta 3 usuarios</li>
                    <li>App mobile (informes y ventas)</li>
                    <li class="lp-feat-star">Cloud + sincronización en máquina local</li>
                    <li class="lp-feat-star">Sigue vendiendo sin internet</li>
                    <li class="lp-feat-star">Facturas en reposo &rarr; se envían al recuperar señal</li>
                    <li class="lp-feat-star">Mayor velocidad en punto de venta</li>
                    <li class="lp-feat-star">Facturación electrónica &mdash; 5.000 documentos/año</li>
                </ul>
                <p class="lp-plan-fine">Sin plan cloud activo, el sistema local sigue funcionando para ventas sin facturación electrónica.</p>
                <a href="#demo" class="lp-plan-btn lp-plan-btn-featured">Quiero este plan</a>
            </div>

            <!-- Solo Local -->
            <div class="lp-plan-card">
                <div class="lp-plan-top">
                    <p class="lp-plan-name">Solo Local</p>
                    <div class="lp-plan-price">
                        <span class="lp-price-big">$2.000.000</span>
                        <span class="lp-price-sub">pago único</span>
                    </div>
                    <p class="lp-plan-desc">Instalación local permanente, sin mensualidad ni conexión requerida.</p>
                </div>
                <ul class="lp-plan-feats">
                    <li>Ventas e inventario</li>
                    <li>Acceso a informes</li>
                    <li>Gestión de clientes y proveedores</li>
                    <li>Hasta 3 usuarios</li>
                    <li>Solo local</li>
                    <li class="lp-feat-no">Sin app mobile</li>
                    <li class="lp-feat-no">Sin facturación electrónica</li>
                </ul>
                <a href="#demo" class="lp-plan-btn">Quiero este plan</a>
            </div>

        </div>
    </div>
</section>

<!-- ============================================================
     BLOQUE 8 — CTA FINAL + FORMULARIO DE DEMO
     ============================================================ -->
<section class="lp-final" id="demo">
    <div class="lp-container">
        <div class="lp-final-grid">

            <div class="lp-final-copy">
                <p class="eyebrow lp-eyebrow-light">Pide tu demostración</p>
                <h2 class="lp-final-h2">¿Listo para ver Mallor en tu negocio?</h2>
                <p class="lp-final-lead">
                    Déjanos tu nombre y correo. Te contactamos en menos de 24&nbsp;horas para
                    coordinar una demo sin compromiso, adaptada al tipo de negocio que tienes.
                </p>
                <ul class="lp-trust-list">
                    <li>Sin costo</li>
                    <li>Sin compromiso de compra</li>
                    <li>Respuesta en menos de 24 horas</li>
                </ul>
            </div>

            <div class="lp-form-wrap">
                <?php if ($formSent): ?>
                    <div class="lp-form-success">
                        <div class="lp-success-icon" aria-hidden="true">✓</div>
                        <h3>¡Solicitud recibida!</h3>
                        <p>Nos ponemos en contacto contigo en menos de 24&nbsp;horas para coordinar la demostración.</p>
                    </div>
                <?php else: ?>
                    <p class="lp-form-title">Quiero mi demostración gratuita</p>
                    <?php if ($formError): ?>
                        <div class="lp-form-error" role="alert">
                            Revisa que el nombre y el correo electrónico estén escritos correctamente.
                        </div>
                    <?php endif; ?>
                    <form
                        class="lp-demo-form"
                        method="post"
                        action="<?= e(urlFor($currentSlug)) ?>"
                    >
                        <div class="form-row">
                            <label for="demo_nombre">Tu nombre</label>
                            <input
                                type="text"
                                id="demo_nombre"
                                name="demo_nombre"
                                placeholder="Ej: Carlos Ramírez"
                                autocomplete="name"
                                required
                            >
                        </div>
                        <div class="form-row">
                            <label for="demo_telefono">WhatsApp o teléfono</label>
                            <input
                                type="tel"
                                id="demo_telefono"
                                name="demo_telefono"
                                placeholder="Ej: 311 234 5678"
                                autocomplete="tel"
                                required
                            >
                        </div>
                        <div class="form-row">
                            <label for="demo_email">
                                Correo electrónico
                                <span class="lp-field-optional">(opcional)</span>
                            </label>
                            <input
                                type="email"
                                id="demo_email"
                                name="demo_email"
                                placeholder="Ej: carlos@tunegocio.com"
                                autocomplete="email"
                            >
                        </div>
                        <button type="submit" class="button button-primary lp-btn-full">
                            Quiero mi demostración
                        </button>
                        <p class="lp-form-note">Sin spam. Puedes cancelar cuando quieras.</p>
                    </form>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>
