/* Pragathi Power Solutions theme — interactions */
(function () {
  "use strict";

  document.addEventListener("DOMContentLoaded", function () {
    initHeader();
    initMobileMenu();
    initFaq();
    initCalculator();
    initContactForm();
    initCountdown();
    initReveal();
    initAnnounce();
  });

  /* New-branch announcement modal — shown on each home-page load (the modal
     is only rendered on the front page). */
  function initAnnounce() {
    var modal = document.querySelector("[data-announce]");
    if (!modal) return;

    var close = function () {
      modal.classList.remove("open");
      window.setTimeout(function () { modal.hidden = true; }, 300);
      document.removeEventListener("keydown", onKey);
    };
    var onKey = function (e) {
      if (e.key === "Escape" || e.keyCode === 27) close();
    };

    var open = function () {
      modal.hidden = false;
      // next frame so the CSS transition runs
      window.requestAnimationFrame(function () {
        window.requestAnimationFrame(function () { modal.classList.add("open"); });
      });
      document.addEventListener("keydown", onKey);
    };

    modal.querySelectorAll("[data-announce-close]").forEach(function (btn) {
      btn.addEventListener("click", close);
    });

    window.setTimeout(open, 1200);
  }

  /* Scroll-reveal: fade/slide elements in as they enter the viewport */
  function initReveal() {
    var html = document.documentElement;
    var selector = [
      ".section-header", ".service-card", ".benefit-card", ".subsidy-card",
      ".subsidy-table-wrap", ".subsidy-special", ".timeline-card", ".compare",
      ".supply-card", ".feature-list", ".impact-card", ".testi", ".proj-card", ".kp-card",
      ".tile", ".sys-card", ".contact-card", ".founder", ".map-wrap", ".cta",
      ".partner-visual", ".savings-calc", ".faq-item"
    ].join(",");
    var els = Array.prototype.slice.call(document.querySelectorAll(selector));
    if (!els.length) return;

    // No IntersectionObserver -> reveal everything (remove the hiding hook).
    if (!("IntersectionObserver" in window)) {
      html.classList.remove("js");
      return;
    }

    // Stagger siblings that share a parent for a polished cascade.
    var counts = {};
    els.forEach(function (el) {
      var key = el.parentNode ? (el.parentNode.className || "p") : "p";
      counts[key] = (counts[key] || 0);
      var i = counts[key]++;
      if (i > 0) {
        el.style.transitionDelay = Math.min(i, 6) * 0.07 + "s";
      }
    });

    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add("is-revealed");
          io.unobserve(entry.target);
        }
      });
    }, { rootMargin: "0px 0px -8% 0px", threshold: 0.08 });

    els.forEach(function (el) { io.observe(el); });
  }

  /* Countdown timer to the scheme target date */
  function initCountdown() {
    var roots = document.querySelectorAll("[data-countdown]");
    if (!roots.length) return;

    var pad = function (n) { return n < 10 ? "0" + n : "" + n; };

    roots.forEach(function (root) {
      var deadline = new Date(root.getAttribute("data-deadline")).getTime();
      if (isNaN(deadline)) return;

      var elDays = root.querySelector("[data-cd-days]");
      var elHours = root.querySelector("[data-cd-hours]");
      var elMins = root.querySelector("[data-cd-mins]");
      var elSecs = root.querySelector("[data-cd-secs]");

      var tick = function () {
        var diff = deadline - Date.now();
        if (diff < 0) diff = 0;
        var totalSecs = Math.floor(diff / 1000);
        var days = Math.floor(totalSecs / 86400);
        var hours = Math.floor((totalSecs % 86400) / 3600);
        var mins = Math.floor((totalSecs % 3600) / 60);
        var secs = totalSecs % 60;
        if (elDays) elDays.textContent = days;
        if (elHours) elHours.textContent = pad(hours);
        if (elMins) elMins.textContent = pad(mins);
        if (elSecs) elSecs.textContent = pad(secs);
        if (diff === 0 && root._cdTimer) {
          clearInterval(root._cdTimer);
        }
      };

      tick();
      root._cdTimer = setInterval(tick, 1000);
    });
  }

  /* Sticky header: add shadow once scrolled */
  function initHeader() {
    var header = document.querySelector("[data-header]");
    if (!header) return;
    var onScroll = function () {
      header.classList.toggle("scrolled", window.scrollY > 8);
    };
    onScroll();
    window.addEventListener("scroll", onScroll, { passive: true });
  }

  /* Mobile menu toggle */
  function initMobileMenu() {
    var toggle = document.querySelector("[data-nav-toggle]");
    var menu = document.querySelector("[data-mobile-menu]");
    if (!toggle || !menu) return;
    var menuIcon = toggle.querySelector("[data-icon-menu]");
    var closeIcon = toggle.querySelector("[data-icon-close]");

    toggle.addEventListener("click", function () {
      var open = menu.classList.toggle("open");
      toggle.setAttribute("aria-expanded", open ? "true" : "false");
      if (menuIcon) menuIcon.hidden = open;
      if (closeIcon) closeIcon.hidden = !open;
    });

    menu.addEventListener("click", function (e) {
      if (e.target.closest("a")) {
        menu.classList.remove("open");
        toggle.setAttribute("aria-expanded", "false");
        if (menuIcon) menuIcon.hidden = false;
        if (closeIcon) closeIcon.hidden = true;
      }
    });
  }

  /* FAQ accordion — one open at a time */
  function initFaq() {
    document.querySelectorAll("[data-faq]").forEach(function (faq) {
      var items = Array.prototype.slice.call(faq.querySelectorAll(".faq-item"));
      items.forEach(function (item) {
        var btn = item.querySelector(".faq-q");
        if (!btn) return;
        btn.addEventListener("click", function () {
          var isOpen = item.classList.contains("is-open");
          items.forEach(function (other) {
            other.classList.remove("is-open");
            var ob = other.querySelector(".faq-q");
            if (ob) ob.setAttribute("aria-expanded", "false");
          });
          if (!isOpen) {
            item.classList.add("is-open");
            btn.setAttribute("aria-expanded", "true");
          }
        });
      });
    });
  }

  /* Savings calculator */
  var UNIT_RATE = 8.5;
  var UNITS_PER_KW_PER_DAY = 4;
  var SQ_FT_PER_KW = 80;

  // Official Tata Power Solar system price list — total cost, PM Surya Ghar
  // subsidy and net cost after subsidy for each system size (in rupees).
  var SYSTEMS = [
    { kw: 1,  total: 85000,   subsidy: 30000, net: 55000 },
    { kw: 2,  total: 185000,  subsidy: 60000, net: 125000 },
    { kw: 3,  total: 234000,  subsidy: 78000, net: 156000 },
    { kw: 4,  total: 296000,  subsidy: 78000, net: 218000 },
    { kw: 5,  total: 368000,  subsidy: 78000, net: 290000 },
    { kw: 6,  total: 410000,  subsidy: 78000, net: 332000 },
    { kw: 8,  total: 530000,  subsidy: 78000, net: 452000 },
    { kw: 10, total: 630000,  subsidy: 78000, net: 552000 },
    { kw: 12, total: 700000,  subsidy: 78000, net: 622000 },
    { kw: 15, total: 900000,  subsidy: 0,     net: 900000 },
    { kw: 18, total: 936000,  subsidy: 0,     net: 936000 },
    { kw: 20, total: 1020000, subsidy: 0,     net: 1020000 },
    { kw: 25, total: 1250000, subsidy: 0,     net: 1250000 }
  ];

  // Map a monthly bill to the closest available system size in the price list.
  function pickSystem(bill) {
    if (bill <= 0) return SYSTEMS[0];
    var desiredKw = bill / UNIT_RATE / (UNITS_PER_KW_PER_DAY * 30);
    var best = SYSTEMS[0];
    var bestDiff = Infinity;
    for (var i = 0; i < SYSTEMS.length; i++) {
      var diff = Math.abs(SYSTEMS[i].kw - desiredKw);
      if (diff < bestDiff) { bestDiff = diff; best = SYSTEMS[i]; }
    }
    return best;
  }
  function formatRupees(v) {
    try {
      return new Intl.NumberFormat("en-IN", {
        style: "currency",
        currency: "INR",
        maximumFractionDigits: 0
      }).format(v);
    } catch (e) {
      return "₹" + Math.round(v).toLocaleString("en-IN");
    }
  }

  function initCalculator() {
    document.querySelectorAll("[data-calc]").forEach(function (root) {
      var range = root.querySelector("[data-calc-range]");
      if (!range) return;

      var el = function (sel) { return root.querySelector(sel); };
      var update = function () {
        var bill = Number(range.value);
        var sys = pickSystem(bill);
        var kw = sys.kw;
        var subsidy = sys.subsidy;
        var netCost = sys.net;
        var monthlyUnits = kw * UNITS_PER_KW_PER_DAY * 30;
        var monthlySaving = Math.min(bill, monthlyUnits * UNIT_RATE);
        var annualSaving = monthlySaving * 12;
        var payback = annualSaving > 0 ? netCost / annualSaving : 0;
        var space = kw * SQ_FT_PER_KW;

        setText(el("[data-calc-bill]"), formatRupees(bill));
        setText(el("[data-calc-kw]"), kw);
        setText(el("[data-calc-kw2]"), kw);
        setText(el("[data-calc-space]"), space);
        setText(el("[data-calc-annual]"), formatRupees(annualSaving));
        setText(el("[data-calc-monthly]"), formatRupees(monthlySaving));
        setText(el("[data-calc-subsidy]"), formatRupees(subsidy));
        setText(el("[data-calc-net]"), formatRupees(netCost));
        setText(el("[data-calc-payback]"), payback.toFixed(1) + " yrs");
      };

      range.addEventListener("input", update);
      update();
    });
  }

  function setText(node, value) {
    if (node) node.textContent = value;
  }

  /* Contact form -> WhatsApp */
  function initContactForm() {
    document.querySelectorAll("[data-contact-form]").forEach(function (form) {
      var body = form.querySelector("[data-form-body]");
      var success = form.querySelector("[data-form-success]");
      var resetBtn = form.querySelector("[data-form-reset]");

      form.addEventListener("submit", function (e) {
        e.preventDefault();
        if (!form.checkValidity()) {
          form.reportValidity();
          return;
        }
        var f = function (name) {
          var node = form.querySelector('[name="' + name + '"]');
          return node ? node.value.trim() : "";
        };
        var lines = ["*New Solar Quote Request*", "Name: " + f("name"), "Phone: " + f("phone")];
        if (f("email")) lines.push("Email: " + f("email"));
        lines.push("Service: " + f("service"));
        if (f("bill")) lines.push("Monthly Bill: ₹" + f("bill"));
        lines.push("City: " + f("city"));
        if (f("message")) lines.push("Message: " + f("message"));

        var base = (window.PPS && window.PPS.whatsappRaw) || "https://wa.me/919701426440";
        var url = base + "?text=" + encodeURIComponent(lines.join("\n"));

        if (body) body.hidden = true;
        if (success) success.hidden = false;
        window.open(url, "_blank", "noopener,noreferrer");
      });

      if (resetBtn) {
        resetBtn.addEventListener("click", function () {
          form.reset();
          if (success) success.hidden = true;
          if (body) body.hidden = false;
        });
      }
    });
  }
})();
