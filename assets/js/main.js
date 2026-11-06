(function () {
    const menuButton = document.querySelector('[data-menu-button]');
    const siteNav = document.querySelector('[data-site-nav]');

    if (menuButton && siteNav) {
        menuButton.addEventListener('click', function () {
            const isOpen = siteNav.classList.toggle('is-open');
            menuButton.setAttribute('aria-expanded', String(isOpen));
        });
    }

    document.querySelectorAll('[data-pending-link="true"], [data-whatsapp-button]').forEach(function (link) {
        link.addEventListener('click', function (event) {
            const message = link.getAttribute('data-message');

            if (!message) {
                return;
            }

            event.preventDefault();
            window.alert(message);
        });
    });

    const contactForm = document.querySelector('[data-contact-form]');

    if (contactForm) {
        contactForm.addEventListener('submit', function (event) {
            const feedback = contactForm.querySelector('[data-form-feedback]');

            event.preventDefault();

            if (feedback) {
                feedback.hidden = false;
                feedback.focus();
            }
        });
    }
}());
