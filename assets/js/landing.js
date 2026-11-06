(function () {
    'use strict';

    // ---- FAQ accordion ----
    var items = document.querySelectorAll('.lp-faq-item');

    items.forEach(function (item) {
        var btn   = item.querySelector('.lp-faq-q');
        var panel = item.querySelector('.lp-faq-a');
        if (!btn || !panel) return;

        btn.addEventListener('click', function () {
            var open = btn.getAttribute('aria-expanded') === 'true';

            items.forEach(function (other) {
                var ob = other.querySelector('.lp-faq-q');
                var op = other.querySelector('.lp-faq-a');
                if (ob && op) {
                    ob.setAttribute('aria-expanded', 'false');
                    op.hidden = true;
                }
            });

            btn.setAttribute('aria-expanded', open ? 'false' : 'true');
            panel.hidden = open;
        });
    });

    // ---- Mobile sticky CTA ----
    var bar  = document.getElementById('js-sticky');
    var demo = document.getElementById('demo');
    if (!bar) return;

    function isMobile() { return window.innerWidth < 768; }

    function tick() {
        if (!isMobile()) {
            bar.classList.remove('is-visible');
            bar.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('lp-has-sticky');
            return;
        }
        var y        = window.scrollY || window.pageYOffset;
        var demoTop  = demo ? demo.getBoundingClientRect().top + y - 120 : Infinity;
        var show     = y > 380 && y < demoTop;

        bar.classList.toggle('is-visible', show);
        bar.setAttribute('aria-hidden', show ? 'false' : 'true');
        document.body.classList.toggle('lp-has-sticky', show);
    }

    window.addEventListener('scroll', tick, { passive: true });
    window.addEventListener('resize', tick);
    tick();

    // ---- Scroll to demo on ?enviado=1 ----
    if (window.location.search.indexOf('enviado=1') !== -1 && demo) {
        setTimeout(function () {
            demo.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }, 120);
    }
})();
