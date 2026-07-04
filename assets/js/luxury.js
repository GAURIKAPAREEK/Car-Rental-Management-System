/**
 * AURELIA MOTORS — Unified motion system (frontend only)
 */
(function ($) {
  'use strict';

  var prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  function syncHeaderHeight() {
    var wrap = document.getElementById('dpcHeader') || document.querySelector('.am-header');
    if (!wrap) return;
    var height = Math.ceil(wrap.getBoundingClientRect().height) + 4;
    document.documentElement.style.setProperty('--am-header-h', height + 'px');
    if (!document.body.classList.contains('page-home')) {
      document.body.style.paddingTop = height + 'px';
    }
  }

  function initLoader() {
    var loader = document.getElementById('amLoader');
    if (!loader) return;
    document.body.classList.add('is-loading');
    var minTime = prefersReducedMotion ? 0 : 700;
    var start = performance.now();
    function hide() {
      var elapsed = performance.now() - start;
      var delay = Math.max(0, minTime - elapsed);
      setTimeout(function () {
        loader.classList.add('is-hidden');
        document.body.classList.remove('is-loading');
        syncHeaderHeight();
      }, delay);
    }
    if (document.readyState === 'complete') hide();
    else window.addEventListener('load', hide);
  }

  function initScrollProgress() {
    var bar = document.getElementById('scrollProgress');
    if (!bar) return;
    var ticking = false;
    function update() {
      var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
      var docHeight = document.documentElement.scrollHeight - window.innerHeight;
      bar.style.width = (docHeight > 0 ? (scrollTop / docHeight) * 100 : 0) + '%';
      ticking = false;
    }
    window.addEventListener('scroll', function () {
      if (!ticking) { requestAnimationFrame(update); ticking = true; }
    }, { passive: true });
    update();
  }

  function initHeader() {
    var wrap = document.getElementById('dpcHeader') || document.querySelector('.am-header');
    if (!wrap) return;
    function onScroll() {
      wrap.classList.toggle('is-scrolled', window.pageYOffset > 20);
    }
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
    syncHeaderHeight();
    window.addEventListener('resize', syncHeaderHeight);
    if (document.fonts && document.fonts.ready) {
      document.fonts.ready.then(syncHeaderHeight);
    }
    window.addEventListener('load', syncHeaderHeight);
    if ('ResizeObserver' in window) {
      var ro = new ResizeObserver(syncHeaderHeight);
      ro.observe(wrap);
    }
  }

  function initMobileNav() {
    var nav = document.getElementById('navigation');
    var toggle = document.getElementById('menu_slide');
    var backdrop = document.getElementById('dpcDrawerBackdrop');
    var closeBtn = document.getElementById('amDrawerClose');
    var navHome = document.querySelector('.am-navbar__inner');
    if (!nav || !toggle) return;

    var navAnchor = document.createComment('am-nav-anchor');
    if (navHome && nav.parentElement) {
      nav.parentElement.insertBefore(navAnchor, nav);
    }

    function isMobile() {
      return window.innerWidth < 992;
    }

    function mountNav() {
      if (isMobile()) {
        if (nav.parentElement !== document.body) {
          document.body.appendChild(nav);
        }
      } else if (navAnchor.parentElement) {
        navAnchor.parentElement.insertBefore(nav, navAnchor.nextSibling);
        closeNav();
      }
    }

    function setOpen(open) {
      if (!isMobile()) return;
      document.body.classList.toggle('nav-open', open);
      nav.classList.toggle('is-open', open);
      if (backdrop) backdrop.classList.toggle('is-visible', open);
      toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
      toggle.classList.toggle('is-active', open);
      document.body.style.overflow = open ? 'hidden' : '';
      if (open) {
        nav.classList.add('in');
        toggle.classList.remove('collapsed');
      } else {
        nav.classList.remove('in', 'collapsing');
        toggle.classList.add('collapsed');
      }
    }

    function closeNav() {
      setOpen(false);
    }

    function openNav() {
      setOpen(true);
    }

    mountNav();

    toggle.addEventListener('click', function (e) {
      if (!isMobile()) return;
      e.preventDefault();
      e.stopPropagation();
      if (document.body.classList.contains('nav-open')) closeNav();
      else openNav();
    });

    if (closeBtn) {
      closeBtn.addEventListener('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        closeNav();
      });
    }

    $(nav).find('a').on('click', function () {
      if (isMobile()) closeNav();
    });

    if (backdrop) {
      backdrop.addEventListener('click', closeNav);
    }

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && document.body.classList.contains('nav-open')) closeNav();
    });

    window.addEventListener('resize', function () {
      mountNav();
      if (!isMobile() && document.body.classList.contains('nav-open')) closeNav();
      syncHeaderHeight();
    });
  }

  function initReveal() {
    var selector = '.am-reveal, .lux-reveal, .dpc-reveal';
    if (prefersReducedMotion) { $(selector).addClass('is-visible'); return; }
    var els = document.querySelectorAll(selector);
    if (!els.length || !('IntersectionObserver' in window)) {
      els.forEach(function (el) { el.classList.add('is-visible'); });
      return;
    }
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          io.unobserve(entry.target);
        }
      });
    }, { threshold: 0.1, rootMargin: '0px 0px -32px 0px' });
    els.forEach(function (el) { io.observe(el); });
  }

  function initMagnetic() {
    if (prefersReducedMotion || window.innerWidth < 768) return;
    document.querySelectorAll('.lux-magnetic, .am-magnetic').forEach(function (btn) {
      btn.addEventListener('mousemove', function (e) {
        var rect = btn.getBoundingClientRect();
        var x = (e.clientX - rect.left - rect.width / 2) * 0.1;
        var y = (e.clientY - rect.top - rect.height / 2) * 0.1;
        btn.style.transform = 'translate(' + x + 'px, ' + y + 'px)';
      });
      btn.addEventListener('mouseleave', function () { btn.style.transform = ''; });
    });
  }

  function initPasswordToggle() {
    document.querySelectorAll('.lux-password-field, .am-password-field').forEach(function (wrap) {
      var input = wrap.querySelector('input[type="password"], input[type="text"]');
      var btn = wrap.querySelector('.lux-password-toggle, .am-password-toggle');
      if (!input || !btn) return;
      btn.addEventListener('click', function () {
        var isPass = input.type === 'password';
        input.type = isPass ? 'text' : 'password';
        var icon = btn.querySelector('i');
        if (icon) icon.className = isPass ? 'fa fa-eye-slash' : 'fa fa-eye';
      });
    });
  }

  function initFloatingLabels() {
    document.querySelectorAll('.lux-field .form-control, .am-field .form-control').forEach(function (input) {
      function check() { input.parentElement.classList.toggle('is-filled', !!input.value); }
      input.addEventListener('input', check);
      input.addEventListener('blur', check);
      check();
    });
  }

  function initLazyLoad() {
    document.querySelectorAll('img:not([loading])').forEach(function (img) {
      img.setAttribute('loading', 'lazy');
    });
  }

  function initParallax() {
    if (prefersReducedMotion) return;
    var heroBg = document.querySelector('.am-hero__bg, .lux-hero__bg');
    if (!heroBg) return;
    var ticking = false;
    window.addEventListener('scroll', function () {
      if (!ticking) {
        requestAnimationFrame(function () {
          var scroll = window.pageYOffset;
          if (scroll < window.innerHeight) {
            heroBg.style.transform = 'translate3d(0, ' + (scroll * 0.05) + 'px, 0) scale(1.03)';
          }
          ticking = false;
        });
        ticking = true;
      }
    }, { passive: true });
  }

  function initLogo() {
    document.querySelectorAll('.am-logo__img, .dhruv-logo__img').forEach(function (img) {
      function loaded() {
        img.classList.add('is-loaded');
        syncHeaderHeight();
      }
      img.addEventListener('load', loaded);
      if (img.complete) loaded();
    });
  }

  function initCountUp() {
    if (prefersReducedMotion) return;
    var cells = document.querySelectorAll('.fun-facts-m h2');
    if (!cells.length || !('IntersectionObserver' in window)) return;
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        var el = entry.target;
        var match = el.textContent.trim().match(/(\d+)\+/);
        if (!match) return;
        var target = parseInt(match[1], 10);
        var start = performance.now();
        function step(now) {
          var progress = Math.min((now - start) / 1200, 1);
          var eased = 1 - Math.pow(1 - progress, 3);
          el.textContent = Math.floor(target * eased) + '+';
          if (progress < 1) requestAnimationFrame(step);
        }
        requestAnimationFrame(step);
        io.unobserve(el);
      });
    }, { threshold: 0.5 });
    cells.forEach(function (c) { io.observe(c); });
  }

  $(function () {
    initLoader();
    initScrollProgress();
    initHeader();
    initMobileNav();
    initReveal();
    initMagnetic();
    initPasswordToggle();
    initFloatingLabels();
    initLazyLoad();
    initParallax();
    initCountUp();
    initLogo();
  });

})(jQuery);
