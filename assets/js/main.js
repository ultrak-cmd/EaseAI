document.addEventListener('DOMContentLoaded', () => {
    const header = document.querySelector('[data-header]');
    const nav = document.querySelector('[data-nav]');
    const navMenu = nav ? nav.querySelector('.nav-menu') : null;
    const navToggle = document.querySelector('[data-nav-toggle]');
    const scrollTopBtn = document.querySelector('[data-scroll-top]');
    const animatedElements = document.querySelectorAll('[data-animate]');
    const trackingKeys = ['gclid', 'utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content'];

    const storage = (() => {
        try {
            const testKey = '__tradeease_storage_test__';
            window.sessionStorage.setItem(testKey, testKey);
            window.sessionStorage.removeItem(testKey);
            return window.sessionStorage;
        } catch (error) {
            return null;
        }
    })();

    const urlParams = new URLSearchParams(window.location.search);
    trackingKeys.forEach((key) => {
        const value = urlParams.get(key);
        if (!value || !storage) {
            return;
        }
        storage.setItem(`tradeease_${key}`, value);
    });

    trackingKeys.forEach((key) => {
        const storedValue = storage ? storage.getItem(`tradeease_${key}`) : null;
        if (!storedValue) {
            return;
        }
        document.querySelectorAll(`input[name="${key}"]`).forEach((input) => {
            if (input instanceof HTMLInputElement) {
                input.value = storedValue;
            }
        });
    });

    const closeNav = () => {
        if (!nav) {
            return;
        }
        nav.classList.remove('is-open');
        if (navMenu) {
            navMenu.classList.remove('open');
        }
        if (navToggle) {
            navToggle.classList.remove('active');
        }
        document.body.classList.remove('nav-open');
    };

    const openNav = () => {
        if (!nav) {
            return;
        }
        nav.classList.add('is-open');
        if (navMenu) {
            navMenu.classList.add('open');
        }
        if (navToggle) {
            navToggle.classList.add('active');
        }
        document.body.classList.add('nav-open');
    };

    if (navToggle && nav) {
        navToggle.addEventListener('click', () => {
            if (nav.classList.contains('is-open')) {
                closeNav();
            } else {
                openNav();
            }
        });

        nav.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', () => {
                closeNav();
            });
        });
    }

    const onScroll = () => {
        const scrollY = window.scrollY;
        if (header) {
            header.classList.toggle('is-scrolled', scrollY > 100);
        }
        if (scrollTopBtn) {
            if (scrollY > 600) {
                scrollTopBtn.classList.add('is-visible');
            } else {
                scrollTopBtn.classList.remove('is-visible');
            }
        }
    };

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();

    if (scrollTopBtn) {
        scrollTopBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    const animateObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.2 });

    animatedElements.forEach((el) => animateObserver.observe(el));

    document.querySelectorAll('a[href^="#"]').forEach((link) => {
        link.addEventListener('click', (event) => {
            const targetId = link.getAttribute('href')?.substring(1);
            if (!targetId) {
                return;
            }
            const target = document.getElementById(targetId);
            if (!target) {
                return;
            }
            const isSamePage = link.pathname === window.location.pathname;
            if (!isSamePage) {
                return;
            }
            event.preventDefault();
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    });

    document.querySelectorAll('input, select, textarea').forEach((field) => {
        field.addEventListener('blur', () => {
            if (field.required && !field.value) {
                field.classList.add('is-invalid');
            } else {
                field.classList.remove('is-invalid');
            }
        });
    });

    const phoneField = document.getElementById('phone');
    if (phoneField) {
        phoneField.addEventListener('input', (event) => {
            let digits = event.target.value.replace(/\D/g, '');
            if (digits.length > 0) {
                if (digits.length <= 3) {
                    // keep as is
                } else if (digits.length <= 6) {
                    digits = `${digits.slice(0, 3)}-${digits.slice(3)}`;
                } else {
                    digits = `${digits.slice(0, 3)}-${digits.slice(3, 6)}-${digits.slice(6, 10)}`;
                }
            }
            event.target.value = digits;
        });
    }
});
