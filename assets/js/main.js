document.addEventListener('DOMContentLoaded', () => {
    const header = document.querySelector('[data-header]');
    const nav = document.querySelector('[data-nav]');
    const navToggle = document.querySelector('[data-nav-toggle]');
    const scrollTopBtn = document.querySelector('[data-scroll-top]');
    const animatedElements = document.querySelectorAll('[data-animate]');
    const marketingTrackingKeys = [
        'gclid',
        'utm_source',
        'utm_medium',
        'utm_campaign',
        'utm_term',
        'utm_content'
    ];

    const storage = (() => {
        const candidates = [window.localStorage, window.sessionStorage];
        for (const candidate of candidates) {
            try {
                const testKey = '__tradeease_storage_test__';
                candidate.setItem(testKey, testKey);
                candidate.removeItem(testKey);
                return candidate;
            } catch (error) {
                // Continue to next candidate.
            }
        }
        return null;
    })();

    const setStoredValue = (key, value) => {
        if (!storage || value == null || value === '') {
            return;
        }
        storage.setItem(key, value);
    };

    const getStoredValue = (key) => {
        if (!storage) {
            return null;
        }
        return storage.getItem(key);
    };

    const urlParams = new URLSearchParams(window.location.search);

    marketingTrackingKeys.forEach((key) => {
        const value = urlParams.get(key);
        if (value) {
            setStoredValue(`tradeease_${key}`, value);
        }
    });

    const affiseStorageKey = 'tradeease_affise_tracking';
    let affiseTracking = {};
    if (storage) {
        try {
            const stored = storage.getItem(affiseStorageKey);
            affiseTracking = stored ? JSON.parse(stored) : {};
        } catch (error) {
            affiseTracking = {};
        }
    }

    const affiseParams = {
        clickid: 'clickid',
        pid: 'pid',
        offer_id: 'offer_id',
        ref_id: 'ref_id',
        sub1: 'sub1',
        sub2: 'sub2',
        sub3: 'sub3',
        sub4: 'sub4',
        sub5: 'sub5',
        sub6: 'sub6',
        sub7: 'sub7',
        sub8: 'sub8',
        device_ua: 'device_ua',
        impression_id: 'impression_id'
    };

    Object.keys(affiseParams).forEach((param) => {
        const value = urlParams.get(param);
        if (value) {
            affiseTracking[param] = value;
        }
    });

    const geoParam = urlParams.get('geo');
    if (geoParam) {
        affiseTracking.geo = geoParam;
    }

    if (storage) {
        try {
            storage.setItem(affiseStorageKey, JSON.stringify(affiseTracking));
        } catch (error) {
            // Ignore storage write failures.
        }
    }

    const setCookie = (name, value) => {
        if (!value) {
            return;
        }
        const secure = window.location.protocol === 'https:' ? ';secure' : '';
        document.cookie = `${name}=${encodeURIComponent(value)};path=/;max-age=2592000;samesite=lax${secure}`;
    };

    setCookie('affise_clickid', affiseTracking.clickid);
    setCookie('affise_pid', affiseTracking.pid);
    setCookie('affise_offer_id', affiseTracking.offer_id);

    const getCookie = (name) => {
        const escaped = name.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
        const match = document.cookie.match(new RegExp(`(?:^|; )${escaped}=([^;]*)`));
        return match ? decodeURIComponent(match[1]) : null;
    };

    if (!affiseTracking.clickid) {
        const cookieValue = getCookie('affise_clickid');
        if (cookieValue) {
            affiseTracking.clickid = cookieValue;
        }
    }
    if (!affiseTracking.pid) {
        const cookieValue = getCookie('affise_pid');
        if (cookieValue) {
            affiseTracking.pid = cookieValue;
        }
    }
    if (!affiseTracking.offer_id) {
        const cookieValue = getCookie('affise_offer_id');
        if (cookieValue) {
            affiseTracking.offer_id = cookieValue;
        }
    }

    if (storage) {
        try {
            storage.setItem(affiseStorageKey, JSON.stringify(affiseTracking));
        } catch (error) {
            // Ignore storage write failures.
        }
    }

    marketingTrackingKeys.forEach((key) => {
        const storedValue = getStoredValue(`tradeease_${key}`);
        if (!storedValue) {
            return;
        }
        document.querySelectorAll(`input[name="${key}"]`).forEach((input) => {
            if (input instanceof HTMLInputElement) {
                input.value = storedValue;
            }
        });
    });

    const applyAffiseTrackingToInputs = () => {
        const fieldMap = {
            clickid: 'affise_clickid',
            pid: 'pid',
            offer_id: 'offer_id',
            ref_id: 'ref_id',
            sub1: 'sub1',
            sub2: 'sub2',
            sub3: 'sub3',
            sub4: 'sub4',
            sub5: 'sub5',
            sub6: 'sub6',
            sub7: 'sub7',
            sub8: 'sub8',
            device_ua: 'device_ua',
            impression_id: 'impression_id',
            geo: 'affise_geo'
        };

        Object.entries(fieldMap).forEach(([trackingKey, inputName]) => {
            const value = affiseTracking[trackingKey];
            if (!value) {
                return;
            }
            document.querySelectorAll(`input[name="${inputName}"]`).forEach((input) => {
                if (input instanceof HTMLInputElement) {
                    input.value = value;
                }
            });
        });
    };

    applyAffiseTrackingToInputs();

    window.affiseTracking = Object.freeze({ ...affiseTracking });
    document.dispatchEvent(new CustomEvent('affiseTrackingReady', { detail: window.affiseTracking }));

    window.tradeeaseTriggerTrackingFill = () => {
        applyAffiseTrackingToInputs();
        marketingTrackingKeys.forEach((key) => {
            const storedValue = getStoredValue(`tradeease_${key}`);
            if (!storedValue) {
                return;
            }
            document.querySelectorAll(`input[name="${key}"]`).forEach((input) => {
                if (input instanceof HTMLInputElement) {
                    input.value = storedValue;
                }
            });
        });
    };

    const closeNav = () => {
        if (!nav) {
            return;
        }
        nav.classList.remove('is-open');
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
