/* =========================================================
   NEN homepage redesign: motion + interactions for the .nx sections.
   All content comes from the dashboard (rendered by Blade); the JSON blocks
   (#nx-edu-data, #nx-tech-data, #nx-find-data, #nx-map-data) are written by
   resources/views/user/home/redesign/*.blade.php.
   GSAP 3.13 (ScrollTrigger, ScrambleText) + Lenis 1.3.27, loaded before this file.
   ========================================================= */
(function () {
  "use strict";
  const $ = (s, r = document) => r.querySelector(s);
  const $$ = (s, r = document) => Array.from(r.querySelectorAll(s));
  const pad = (n) => String(n).padStart(2, "0");
  const root = document.getElementById("nx-root");
  if (!root) return;
  const reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  const fine = window.matchMedia("(hover: hover) and (pointer: fine)").matches;
  const hasGSAP = !!(window.gsap && window.ScrollTrigger);
  const data = (id) => { try { return JSON.parse(document.getElementById(id).textContent); } catch (e) { return null; } };

  // Hide any image that fails instead of showing a broken icon.
  $$("img", document).forEach((im) => { if (im.closest(".nx")) im.addEventListener("error", () => im.classList.add("is-broken"), { once: true }); });

  /* ---------------- interactions (work with or without GSAP) ---------------- */
  // Education tabs (auto-advance)
  (function education() {
    const box = $("[data-nx-edu]"); const items = data("nx-edu-data"); if (!box || !items || !items.length) return;
    const tabs = $$("[data-nx-edu-tab]", box), imgs = $$(".nx-edu__img", box);
    const title = $("[data-nx-edu-title]", box), text = $("[data-nx-edu-text]", box), link = $("[data-nx-edu-link]", box);
    let idx = 0, timer;
    const show = (i, user) => {
      if (i === idx && !user) return; idx = i;
      tabs.forEach((t, j) => { t.classList.toggle("is-active", j === i); t.setAttribute("aria-selected", String(j === i)); });
      imgs.forEach((m, j) => m.classList.toggle("is-active", j === i));
      title.textContent = items[i].title;
      text.textContent = items[i].text || ""; text.hidden = !items[i].text;
      if (link) link.href = items[i].url;
      $("[data-nx-edu-num]", box).textContent = `${pad(i + 1)} / ${pad(items.length)}`;
      if (hasGSAP && !reduce) {
        if (imgs[i]) gsap.fromTo(imgs[i], { clipPath: "inset(0 100% 0 0)" }, { clipPath: "inset(0 0% 0 0)", duration: 0.9, ease: "power4.inOut" });
        gsap.fromTo($(".nx-edu__scan", box), { xPercent: -100, autoAlpha: 1 }, { xPercent: 340, duration: 0.9, ease: "power4.inOut", onComplete: () => gsap.set($(".nx-edu__scan", box), { autoAlpha: 0 }) });
        gsap.fromTo([title, text], { y: 18, autoAlpha: 0 }, { y: 0, autoAlpha: 1, duration: 0.7, stagger: 0.06, ease: "power3.out" });
      }
      if (user) restart();
    };
    const restart = () => { clearInterval(timer); if (!reduce && items.length > 1) timer = setInterval(() => { if (!box.classList.contains("is-paused")) show((idx + 1) % items.length); }, 6500); };
    tabs.forEach((t, i) => t.addEventListener("click", () => show(i, true)));
    box.addEventListener("pointerenter", () => box.classList.add("is-paused"));
    box.addEventListener("pointerleave", () => box.classList.remove("is-paused"));
    restart();
  })();

  // Solutions toggle + expanding panels
  (function solutions() {
    const sec = $("#solutions-section"); if (!sec) return;
    const seg = $("[data-nx-seg]", sec), plats = $$("[data-nx-plat]", sec);
    $$(".nx-plat__panel", sec).forEach((p) => {
      const open = () => $$(".nx-plat__panel", p.parentElement).forEach((x) => x.classList.toggle("is-open", x === p));
      p.addEventListener("pointerenter", open); p.addEventListener("focus", open); p.addEventListener("click", open);
    });
    if (!seg) return;
    $$("[data-nx-sol-tab]", seg).forEach((b) => b.addEventListener("click", () => {
      const i = Number(b.dataset.nxSolTab);
      $$("[data-nx-sol-tab]", seg).forEach((x) => x.setAttribute("aria-selected", String(x === b)));
      seg.style.setProperty("--seg", i);
      plats.forEach((p, j) => p.classList.toggle("is-active", j === i));
      if (hasGSAP && !reduce) gsap.from(plats[i].children, { y: 40, autoAlpha: 0, duration: 0.7, stagger: 0.07, ease: "power3.out" });
    }));
  })();

  // Join Us: opening panels (hover, focus or tap opens one)
  (function join() {
    const box = $("[data-nx-join]"); if (!box) return;
    const panels = $$("[data-nx-jpanel]", box);
    panels.forEach((p) => { const open = () => panels.forEach((x) => x.classList.toggle("is-open", x === p)); p.addEventListener("pointerenter", open); p.addEventListener("focus", open); p.addEventListener("click", open); });
  })();

  // Hover intent: an item activates once the pointer has rested on it briefly, or right away on click / focus.
  // Only real pointer movement counts, so the layout shift caused by opening an item never opens the next one.
  const intent = (els, fn, delay = 140) => {
    let pending = -1, timer = 0;
    els.forEach((el, i) => {
      el.addEventListener("pointermove", (e) => {
        if (e.pointerType === "touch" || pending === i) return;
        pending = i; clearTimeout(timer); timer = setTimeout(() => { pending = -1; fn(i); }, delay);
      });
      el.addEventListener("pointerleave", () => { if (pending === i) { clearTimeout(timer); pending = -1; } });
      el.addEventListener("click", () => { clearTimeout(timer); pending = -1; fn(i); });
      el.addEventListener("focusin", () => fn(i));
    });
  };

  // Our Projects: the chosen project opens in the list and its image wipes into the frame
  (function projects() {
    const box = $("[data-nx-projects]"); if (!box) return;
    const items = $$("[data-nx-proj]", box), frames = $$("[data-nx-frame]", box), idx = $("[data-nx-proj-idx]", box);
    let cur = 0;
    const show = (i) => {
      if (i === cur) return;
      const down = i > cur, from = frames[cur], to = frames[i]; cur = i;
      items.forEach((x, j) => { x.classList.toggle("is-active", j === i); const b = $(".nx-proj__btn", x); if (b) b.setAttribute("aria-expanded", String(j === i)); });
      if (idx) idx.textContent = pad(i + 1);
      if (!to) return;
      frames.forEach((f) => { f.classList.remove("is-leaving"); f.classList.toggle("is-active", f === to); });
      if (window.gsap && !reduce) {
        if (from) from.classList.add("is-leaving");   // stays under the new image until the wipe is done
        gsap.killTweensOf([to, to.firstElementChild]);
        gsap.fromTo(to, { clipPath: down ? "inset(100% 0% 0% 0%)" : "inset(0% 0% 100% 0%)" }, { clipPath: "inset(0% 0% 0% 0%)", duration: 0.85, ease: "power3.inOut", onComplete: () => from && from.classList.remove("is-leaving") });
        gsap.fromTo(to.firstElementChild, { scale: 1.15 }, { scale: 1, duration: 1.1, ease: "power3.out" });
      }
    };
    intent(items, show);
  })();

  // Doc Validation steps: hover / click / focus picks a step; the motion layer (below) plays the certificate to it
  const docSteps = { set: null, go: null };
  (function docValidationSteps() {
    const sec = $("[data-nx-verify]"); if (!sec) return;
    const steps = $$("[data-nx-step]", sec);
    docSteps.set = (j) => steps.forEach((s, k) => { s.classList.toggle("is-active", k === j); const b = $(".nx-step__btn", s); if (b) b.setAttribute("aria-pressed", String(k === j)); });
    intent(steps, (j) => { if (docSteps.go) docSteps.go(j, true); else docSteps.set(j); });
  })();

  // Features: cursor spotlight across the photo cards (fine pointers only)
  if (fine) $$("[data-nx-spotlight]", root).forEach((grid) => {
    const cards = $$(".nx-card", grid); let raf = 0, ex = 0, ey = 0;
    grid.addEventListener("pointermove", (e) => {
      ex = e.clientX; ey = e.clientY; if (raf) return;
      raf = requestAnimationFrame(() => { raf = 0; cards.forEach((c) => { const r = c.getBoundingClientRect(); c.style.setProperty("--mx", ex - r.left + "px"); c.style.setProperty("--my", ey - r.top + "px"); }); });
    });
  });

  // On Platform video: the YouTube video from the dashboard starts in place when the play button is pressed
  $$("[data-nx-video]", root).forEach((fig) => {
    const btn = $("[data-nx-play]", fig), src = fig.dataset.embed; if (!btn || !src) return;
    btn.addEventListener("click", () => {
      const f = document.createElement("iframe");
      f.src = src + (src.includes("?") ? "&" : "?") + "autoplay=1&rel=0";
      f.title = fig.dataset.title || "Video"; f.allow = "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share";
      f.allowFullscreen = true; f.className = "nx-video__frame";
      fig.classList.add("is-playing"); fig.appendChild(f);
    });
  });

  // Our Locations: dotted world map (the same SVG file the old section used as its background),
  // redrawn in NEN colours: grey dots, the dashboard's countries (Countries list) in red.
  const MAP = (function map() {
    const box = $("[data-nx-map]"); if (!box) return null;
    const svgs = $$("svg", box), dotsG = $("[data-nx-map-dots]", box);
    // Linear fit of that map's projection, from landmarks (London, Dakar, Cape Agulhas, Horn of Africa, tip of India). SVG units.
    const P = { c0: 36, lon0: -17.5, dLon: 3.44, r0: 9, lat0: 51.5, dLat: 2.9, step: 9.25, y0: 3.5 };
    const proj = (lat, lon) => [(P.c0 + (lon - P.lon0) / P.dLon) * P.step, P.y0 + (P.r0 + (P.lat0 - lat) / P.dLat) * P.step];
    const inv = (x, y) => [P.lat0 - ((y - P.y0) / P.step - P.r0) * P.dLat, P.lon0 + (x / P.step - P.c0) * P.dLon];
    // Rough country areas [lat, lon, half-height°, half-width°], matched by name to the dashboard's country titles.
    const GEO = [
      [/egypt|مصر/, [26.8, 30, 4.6, 5]], [/^(usa|us|united states|america)|أمريكا/, [39, -98, 9, 25]], [/^(sa|ksa)$|saudi|السعودية/, [24, 45, 6, 8]],
      [/emirates|^uae$|الإمارات/, [24, 54.3, 1.4, 2]], [/oman|عمان/, [21, 57, 3.5, 3]], [/uzbek|أوزبك/, [41.5, 64, 3, 7]], [/kyrgyz|قيرغيز/, [41.3, 74.5, 1.8, 4.5]],
      [/turk|تركيا/, [39, 35, 2.8, 9]], [/german|ألمانيا/, [51, 10.3, 3.2, 3.5]], [/united kin|^uk$|britain|england|بريطانيا|المملكة المتحدة/, [54, -2.5, 4.5, 3.5]],
      [/jordan|الأردن/, [31.2, 36.5, 1.8, 1.8]], [/syria|سوريا/, [35, 38.5, 2, 3]], [/russia|روسيا/, [61, 95, 12, 60]], [/spain|إسبانيا/, [40.2, -3.6, 3.2, 4.8]],
      [/qatar|قطر/, [25.3, 51.2, 0.8, 0.8]], [/bahrain|البحرين/, [26, 50.5, 0.6, 0.6]], [/kuwait|الكويت/, [29.3, 47.6, 1, 1]], [/georgia|جورجيا/, [42.2, 43.5, 1, 2.3]],
      [/azerbaijan|أذربيجان/, [40.3, 47.7, 1.2, 2]], [/tajik|طاجيك/, [38.8, 71, 1.8, 3]], [/kazakh|كازاخ/, [48, 67, 6, 18]], [/iraq|العراق/, [33, 43.7, 3.5, 4]],
      [/leban|لبنان/, [33.9, 35.9, 0.5, 0.5]], [/palestin|فلسطين/, [31.9, 35.2, 0.5, 0.4]], [/yemen|اليمن/, [15.5, 47.5, 3, 6]], [/sudan|السودان/, [15.5, 30, 6, 7]],
      [/libya|ليبيا/, [27, 17, 5, 8]], [/tunisia|تونس/, [34, 9.5, 3, 1.5]], [/algeria|الجزائر/, [28, 2.6, 8, 9]], [/morocco|المغرب/, [31.8, -7, 3.5, 4]],
      [/pakistan|باكستان/, [30, 69.5, 5, 6]], [/india|الهند/, [22, 79, 8, 9]], [/france|فرنسا/, [46.6, 2.4, 3.5, 4]], [/ital|إيطاليا/, [42.8, 12.5, 4, 3]],
      [/china|الصين/, [35, 103, 10, 22]], [/canada|كندا/, [56, -100, 12, 35]], [/kenya|كينيا/, [0.5, 38, 4, 3]], [/nigeria|نيجيريا/, [9.5, 8, 4, 5]],
    ];
    const names = data("nx-map-data") || [];
    const NET = names.map((n) => { const s = String(n).toLowerCase().replace(/^republic of |^the |^sultanate of /, "").trim(); const hit = GEO.find(([re]) => re.test(s)); return hit && hit[1]; }).filter(Boolean);
    const VIEWS = { full: [0, 0, 858, 432], mobile: [316, 38, 300, 200] };
    const hub = proj(30.04, 31.24);   // Cairo: the dots ripple in from here
    const f = (n) => n.toFixed(1);
    const ready = fetch(box.dataset.src).then((r) => (r.ok ? r.text() : Promise.reject(r.status))).then((txt) => {
      // every land dot in that file is a circle path "M{right edge x} {cy}C…" filled #183364 (its own blue pins are skipped)
      const dots = Array.from(txt.matchAll(/<path d="M([\d.]+) ([\d.]+)C[^"]*" fill="#183364"/g), (m) => [+m[1] - 3.465, +m[2]]);
      if (!dots.length) throw new Error("no dots");
      const net = new Set();
      NET.forEach(([la, lo, ry, rx]) => {
        let best = -1, bd = Infinity, hit = false;
        dots.forEach(([x, y], i) => { const [a, b] = inv(x, y), dd = ((b - lo) / rx) ** 2 + ((a - la) / ry) ** 2; if (dd <= 1) { net.add(i); hit = true; } if (dd < bd) { bd = dd; best = i; } });
        if (!hit) net.add(best);   // small countries: at least the nearest dot
      });
      dotsG.innerHTML = dots.map(([x, y], i) => `<circle cx="${f(x)}" cy="${f(y)}" r="3.3"${net.has(i) ? ' class="is-net"' : ""} style="--d:${((Math.hypot(x - hub[0], y - hub[1]) / 858) * 1.9).toFixed(2)}s"/>`).join("");
      box.classList.add("is-loaded");
    }).catch(() => box.classList.add("is-nomap"));
    const mq = window.matchMedia("(max-width: 767px)");
    const fit = () => { const v = mq.matches ? VIEWS.mobile : VIEWS.full; box.style.aspectRatio = v[2] + " / " + v[3]; svgs.forEach((s) => s.setAttribute("viewBox", v.join(" "))); };
    fit(); mq.addEventListener("change", fit);
    if (!hasGSAP || reduce) box.classList.add("is-in");
    // pause the looping animations while the map is off screen
    new IntersectionObserver(([en]) => box.classList.toggle("is-off", !en.isIntersecting)).observe(box);
    return { box, ready };
  })();

  // Technology: list + orbit stay in sync
  (function technology() {
    const sec = $("#technology-section"); const items = data("nx-tech-data"); if (!sec || !items || !items.length) return;
    const btns = $$("[data-nx-tech]", sec), nodes = $$("[data-nx-node]", sec);
    const t = $("[data-nx-tech-title]", sec), p = $("[data-nx-tech-text]", sec), link = $("[data-nx-tech-link]", sec);
    const set = (i) => {
      btns.forEach((b, j) => b.classList.toggle("is-active", j === i));
      nodes.forEach((n, j) => n.classList.toggle("is-active", j === i));
      t.textContent = items[i].title; p.textContent = items[i].text || ""; p.hidden = !items[i].text;
      if (link) link.href = items[i].url;
      if (hasGSAP && !reduce) gsap.fromTo([t, p], { autoAlpha: 0, y: 8 }, { autoAlpha: 1, y: 0, duration: 0.45, stagger: 0.05, ease: "power3.out" });
    };
    btns.forEach((b, i) => { b.addEventListener("click", () => set(i)); b.addEventListener("pointerenter", () => set(i)); });
    nodes.forEach((n, i) => { n.addEventListener("click", () => set(i)); n.addEventListener("pointerenter", () => set(i)); });
  })();

  // Find Us: pick a country -> every service card shows how many of that service are there (counted from the
  // dashboard's active Find Us entries); pick a service -> link to that service's list page
  (function find() {
    const sec = $("#stats-section"), D = data("nx-find-data"); if (!sec || !D || !D.names) return;
    const res = $("[data-nx-find-result]", sec), sel = $("[data-nx-find-country]", sec), types = $$("[data-nx-find-type]", sec);
    const title = $("[data-nx-find-title]", res), msg = $("[data-nx-find-msg]", res), go = $("[data-nx-find-go]", res);
    const L = D.labels || {};
    const counts = () => (sel && sel.value ? D.counts[sel.value] || D.names.map(() => 0) : D.totals);
    const where = () => (sel && sel.value ? (L.in || "in") + " " + sel.value : L.network || "across the NEN network");
    let type = null, t0;
    const result = () => {
      clearTimeout(t0);
      if (type === null) { res.classList.remove("is-searching", "is-done"); title.textContent = (sel && sel.value) || L.all || "Across the NEN network"; msg.textContent = L.pick || "Pick a service to view the list."; if (go) go.hidden = true; return; }
      const n = counts()[type];
      res.classList.add("is-searching"); res.classList.remove("is-done"); title.textContent = ""; msg.textContent = L.searching || "Searching the NEN network…"; if (go) go.hidden = true;
      t0 = setTimeout(() => {
        res.classList.remove("is-searching"); res.classList.add("is-done");
        title.textContent = `${n} ${D.names[type]} ${where()}`; msg.textContent = "";
        if (go) { go.href = D.urls[type]; go.hidden = false; }
      }, reduce ? 0 : 900);
    };
    if (sel) sel.addEventListener("change", () => {
      const next = counts();
      types.forEach((b, i) => {
        const el = $("[data-nx-find-n]", b), from = parseInt(el.textContent, 10) || 0, to = next[i];
        el.dataset.nxCount = to; if (el.__nxTween) el.__nxTween.kill();
        if (hasGSAP && !reduce && from !== to) { const o = { v: from }; el.__nxTween = gsap.to(o, { v: to, duration: 0.8, ease: "power2.out", onUpdate: () => (el.textContent = Math.round(o.v)) }); } else el.textContent = to;
      });
      result();
    });
    types.forEach((b, i) => b.addEventListener("click", () => { type = i; types.forEach((x) => x.setAttribute("aria-checked", String(x === b))); result(); }));
  })();

  // Hero slider. Autoplay: when the active tab's progress bar (a CSS animation) finishes, the next slide shows,
  // so hovering (paused bar) and reduced motion (no animation) stop it for free.
  (function heroSlider() {
    const hero = $("[data-nx-hero]"); if (!hero) return;
    const slides = $$("[data-nx-slide]", hero), tabs = $$("[data-nx-hero-tab]", hero), count = $("[data-nx-hero-count]", hero);
    if (slides.length < 2) return;
    // the slow zoom on each photo is a CSS animation (nx-zoom) on the same clock as the tab bar
    const anim = hasGSAP && !reduce; let idx = 0;
    const show = (i, dir) => {
      i = (i + slides.length) % slides.length; if (i === idx) return;
      const prev = slides[idx]; idx = i;
      slides.forEach((s, j) => { s.classList.toggle("is-active", j === i); s.classList.toggle("is-prev", s === prev); s.setAttribute("aria-hidden", String(j !== i)); });
      tabs.forEach((t, j) => { t.classList.toggle("is-active", j === i); t.setAttribute("aria-selected", String(j === i)); });
      if (count) count.textContent = pad(i + 1);
      // restart the incoming photo's zoom (it may still hold the end of an earlier run if the user clicked back mid-wipe)
      const im = $(".nx-slide__img", slides[i]); if (im) { im.style.animation = "none"; void im.offsetWidth; im.style.animation = ""; }
      if (anim) gsap.fromTo(slides[i], { clipPath: dir > 0 ? "inset(0% 0% 0% 100%)" : "inset(0% 100% 0% 0%)" }, { clipPath: "inset(0% 0% 0% 0%)", duration: 1.1, ease: "power4.inOut", overwrite: true });
    };
    tabs.forEach((t, i) => {
      t.addEventListener("click", () => show(i, i > idx ? 1 : -1));
      $(".nx-hero__bar", t).addEventListener("animationend", () => { if (t.classList.contains("is-active")) show(idx + 1, 1); });
    });
    const next = $("[data-nx-hero-next]", hero), prev = $("[data-nx-hero-prev]", hero);
    if (next) next.addEventListener("click", () => show(idx + 1, 1));
    if (prev) prev.addEventListener("click", () => show(idx - 1, -1));
    hero.addEventListener("pointerenter", (e) => { if (e.pointerType === "mouse") hero.classList.add("is-paused"); });
    hero.addEventListener("pointerleave", () => hero.classList.remove("is-paused"));
    let x0 = null;   // swipe on touch screens
    hero.addEventListener("pointerdown", (e) => { if (e.pointerType !== "mouse") x0 = e.clientX; });
    hero.addEventListener("pointerup", (e) => { if (x0 === null) return; const dx = e.clientX - x0; x0 = null; if (Math.abs(dx) > 50) show(idx + (dx < 0 ? 1 : -1), dx < 0 ? 1 : -1); });
  })();

  if (!hasGSAP || reduce) return;   // static, fully readable page without motion

  /* ---------------- motion ---------------- */
  gsap.registerPlugin(ScrollTrigger);
  if (window.ScrambleTextPlugin) gsap.registerPlugin(ScrambleTextPlugin);
  document.documentElement.classList.add("nx-motion");

  // Smooth scroll (Lenis) driven by the GSAP ticker so pins stay in sync
  let lenis = null;
  if (window.Lenis) {
    lenis = new Lenis({ lerp: 0.085, smoothWheel: true, wheelMultiplier: 0.95 });
    lenis.on("scroll", ScrollTrigger.update);
    gsap.ticker.add((t) => lenis.raf(t * 1000));
    gsap.ticker.lagSmoothing(0);
  }

  // Entrance reveals via IntersectionObserver (independent of pin maths)
  const io = new IntersectionObserver((entries) => entries.forEach((en) => {
    if (!en.isIntersecting) return; io.unobserve(en.target); (en.target.__nxPlay || []).forEach((fn) => fn());
  }), { rootMargin: "0px 0px -10% 0px" });
  // an element can trigger several reveals (e.g. a group that also holds a count-up), so keep a list
  const onView = (el, fn) => { if (!el) return; (el.__nxPlay ||= []).push(fn); io.observe(el); };
  const NEUTRAL = { autoAlpha: 1, x: 0, y: 0, yPercent: 0, rotateX: 0, scale: 1 };
  const reveal = (trigger, targets, from, opts = {}) => {
    const els = Array.isArray(targets) ? targets : $$(targets, root);
    if (!els.length || !trigger) return;
    const to = {}; Object.keys(from).forEach((k) => { if (k in NEUTRAL) to[k] = NEUTRAL[k]; });
    gsap.set(els, from);
    onView(trigger, () => gsap.to(els, { duration: 0.95, ease: "power4.out", ...to, ...opts }));
  };
  const split = (el, mask = true) => {
    const text = el.textContent.trim(); el.textContent = "";
    const sr = document.createElement("span"); sr.className = "visually-hidden"; sr.textContent = text; el.appendChild(sr);
    // the words sit in one run that takes the text's own direction, so an English title on the Arabic page
    // keeps its word order (word boxes would otherwise be laid out right-to-left)
    const run = document.createElement("span"); run.dir = "auto"; el.appendChild(run);
    return text.split(/\s+/).map((w, i, arr) => {
      const outer = document.createElement("span"); outer.setAttribute("aria-hidden", "true");
      if (mask) { outer.className = "nx-w"; const inner = document.createElement("span"); inner.textContent = w; outer.appendChild(inner); run.appendChild(outer); }
      else { outer.className = "nx-lw"; outer.textContent = w; run.appendChild(outer); }
      if (i < arr.length - 1) run.appendChild(document.createTextNode(" "));
      return mask ? outer.firstChild : outer;
    });
  };

  // Big titles: masked word rise
  $$("[data-nx-split]", root).forEach((el) => { const words = split(el); gsap.set(el, { visibility: "visible" }); reveal(el, words, { yPercent: 120 }, { duration: 1.1, stagger: 0.06 }); });
  $$("[data-nx-reveal]", root).forEach((el) => reveal(el, [el], { y: 28, autoAlpha: 0 }));
  $$("[data-nx-group]", root).forEach((g) => reveal(g, $$("[data-nx-item]", g), { y: 44, autoAlpha: 0 }, { duration: 1, stagger: 0.08 }));
  reveal($(".nx-edu__tabs"), ".nx-edu__tab", { x: -30, autoAlpha: 0 }, { duration: 0.7, stagger: 0.05 });
  reveal($(".nx-tech__list"), ".nx-tech__list li", { x: -30, autoAlpha: 0 }, { duration: 0.7, stagger: 0.06 });
  reveal($("[data-nx-orbit]"), ".nx-orbit__node button > span, .nx-orbit__core", { scale: 0.4, autoAlpha: 0 }, { duration: 1, stagger: 0.07, ease: "power3.out" });
  reveal($(".nx-find__types"), ".nx-find__types li", { y: 26, autoAlpha: 0 }, { duration: 0.7, stagger: 0.05 });
  reveal($(".nx-quick__grid"), $$(".nx-quick__grid li"), { y: 40, autoAlpha: 0 }, { duration: 0.9, stagger: 0.08, delay: 0.3 });
  $$("#solutions-section .nx-plat.is-active, [data-nx-join]", root).forEach((box) => reveal(box, Array.from(box.children), { y: 50, autoAlpha: 0 }, { duration: 0.9, stagger: 0.07 }));

  // Count-ups
  // the target is read when the count starts and the tween is kept on the element, so other code (Find Us
  // country change) can change data-nx-count and cancel a count that is still running
  $$("[data-nx-count]", root).forEach((el) => {
    const suffix = el.dataset.nxSuffix || "", st = { v: 0 };
    el.textContent = "0" + suffix;
    onView(el, () => { el.__nxTween = gsap.to(st, { v: parseFloat(el.dataset.nxCount), duration: 2.2, ease: "power3.out", onUpdate: () => (el.textContent = Math.round(st.v).toLocaleString("en-US") + suffix) }); });
  });

  // Scroll-lit paragraph (scrubbed)
  $$("[data-nx-scrub]", root).forEach((el) => {
    const words = split(el, false);
    gsap.fromTo(words, { opacity: 0.2 }, { opacity: 1, ease: "none", stagger: 0.08, scrollTrigger: { trigger: el, start: "top 85%", end: "bottom 55%", scrub: 1 } });
  });

  // NEN Group: each sticky card shrinks and dims as the next one slides over it
  $$("[data-nx-stack-card]", root).forEach((card, i, cards) => {
    const next = cards[i + 1]; if (!next) return;
    gsap.timeline({ scrollTrigger: { trigger: next, start: "top bottom", end: () => "top " + (parseFloat(getComputedStyle(next).top) || 60) + "px", scrub: 1, invalidateOnRefresh: true } })
      .to(card, { scale: 0.92, ease: "none" }, 0).to($(".nx-stack-card__shade", card), { opacity: 0.45, ease: "none" }, 0);
  });
  $$("[data-nx-stack-card]", root).forEach((card) => reveal(card, $$(".nx-stack-card__logo, .nx-stack-card__name, .nx-stack-card__desc", card), { y: 36, autoAlpha: 0 }, { duration: 1, stagger: 0.08 }));

  // On Platform: clip reveal + parallax image
  const video = $("[data-nx-clip]", root);
  if (video) {
    gsap.set(video, { clipPath: "inset(12% 12% 12% 12% round 28px)" });
    onView(video, () => gsap.to(video, { clipPath: "inset(0% 0% 0% 0% round 28px)", duration: 1.4, ease: "power4.out" }));
    const im = $("[data-nx-parallax]", video);
    if (im) gsap.fromTo(im, { yPercent: -6 }, { yPercent: 6, ease: "none", scrollTrigger: { trigger: video, start: "top bottom", end: "bottom top", scrub: true } });
  }

  const mm = gsap.matchMedia();

  // Doc Validation: the certificate check is one paused timeline in 4 stages (upload, scan, decode, stamp).
  // The dashboard's steps are spread across the stages; picking a step plays the check forward (or rewinds it)
  // to the end of that step's stages. When the certificate comes into view the steps play through once on
  // their own, until the visitor picks one. The page is never pinned.
  (function docValidation() {
    const sec = $("[data-nx-verify]"); if (!sec) return;
    const doc = $("[data-nx-doc]", sec), steps = $$("[data-nx-step]", sec), fields = $$("[data-nx-field]", doc), vals = $$("[data-nx-scramble]", doc), ticks = $$(".nx-tick", doc);
    const prog = $("[data-nx-verify-progress]", sec), match = $("[data-nx-match]", doc), hash = $("[data-nx-hash]", doc), m = { v: 0 };
    const tl = gsap.timeline({ paused: true, defaults: { ease: "none" } });
    tl.set(vals, { opacity: 0.35, textContent: (i, el) => "•".repeat(Math.max(6, el.textContent.length)) }).set(ticks, { scale: 0, autoAlpha: 0 }).set(match, { textContent: "0%" }).set(hash, { textContent: "────────────" });
    tl.addLabel("s0").fromTo(doc, { y: 70, rotateX: 14, autoAlpha: 0 }, { y: 0, rotateX: 0, autoAlpha: 1, duration: 1, ease: "power3.out" })
      .fromTo("[data-nx-upload]", { scaleX: 0 }, { scaleX: 1, duration: 1.1 }, "<0.25").to("[data-nx-upload-row]", { autoAlpha: 0.25, duration: 0.3 })
      .addLabel("s1").set("[data-nx-scan]", { autoAlpha: 1, y: 0 }).to("[data-nx-scan]", { y: () => doc.offsetHeight + 90, duration: 1.8 })
      .to(fields, { "--hl": 1, duration: 0.25, stagger: 0.3 }, "s1+=0.35").to("[data-nx-scan]", { autoAlpha: 0, duration: 0.2 })
      .addLabel("s2").to(fields, { "--hl": 0, duration: 0.3, stagger: 0.05 }, "s2").to(m, { v: 100, duration: 1.6, onUpdate: () => (match.textContent = Math.round(m.v) + "%") }, "s2");
    vals.forEach((el, i) => { tl.to(el, { opacity: 1, duration: 0.1 }, `s2+=${i * 0.32}`).to(el, { duration: 0.6, scrambleText: { text: el.dataset.nxScramble, chars: "0123456789ABCDEF#/", speed: 0.6 } }, `s2+=${i * 0.32}`).to(ticks[i], { scale: 1, autoAlpha: 1, duration: 0.3, ease: "power3.out" }, `s2+=${i * 0.32 + 0.45}`); });
    tl.addLabel("s3", "+=0.15").to(hash, { duration: 0.8, scrambleText: { text: "7f3a9c4e…e21b", chars: "0123456789abcdef", speed: 0.8 } }, "s3")
      .fromTo("[data-nx-stamp]", { scale: 1.8, autoAlpha: 0 }, { scale: 1, autoAlpha: 1, duration: 0.55, ease: "expo.in" }, "s3+=0.1").to(doc, { "--verified": 1, duration: 0.6, ease: "power2.out" }, "s3+=0.55").to({}, { duration: 0.6 });
    const ends = ["s1", "s2", "s3"].map((l) => tl.labels[l]).concat(tl.duration());   // end time of stage 0..3
    const n = steps.length, endOf = (j) => ends[Math.min(3, Math.ceil(((j + 1) * 4) / Math.max(1, n)) - 1)];
    gsap.set(prog, { scaleX: 0 });
    tl.eventCallback("onUpdate", () => gsap.set(prog, { scaleX: tl.time() / ends[3] }));

    let tween = null, auto = null, picked = false, active = -1;
    const go = (j, byUser) => {
      if (byUser) { picked = true; if (auto) auto.kill(); }
      if (j === active && tween && tween.isActive()) return tween;
      active = j; if (docSteps.set) docSteps.set(j);
      if (tween) tween.kill();
      const to = endOf(j), back = to < tl.time();   // going back rewinds the same animation, twice as fast
      tween = tl.tweenTo(to, { duration: Math.max(0.4, Math.abs(to - tl.time()) / (back ? 2.6 : 1.3)), ease: "power1.inOut" });
      return tween;
    };
    docSteps.go = go;
    if (!n) { onView(doc, () => tl.play()); return; }
    const autoplay = (j) => { if (picked) return; go(j).eventCallback("onComplete", () => { if (!picked && j < n - 1) auto = gsap.delayedCall(1.6, () => autoplay(j + 1)); }); };
    onView(doc, () => { if (!picked) autoplay(0); });
  })();

  // Locations map: dots ripple in from Cairo once the map is on screen (the view itself stays fixed)
  if (MAP) {
    onView(MAP.box, () => MAP.ready.then(() => requestAnimationFrame(() => requestAnimationFrame(() => {
      MAP.box.classList.add("is-in");
      setTimeout(() => MAP.box.classList.add("is-settled"), 2800);   // drop the entrance delays so hover feedback is instant
    }))));
  }

  // Technology orbit spin (pauses on hover / off-screen)
  (function orbit() {
    const orb = $("[data-nx-orbit]"), nodes = $("[data-nx-orbit-nodes]"); if (!orb || !nodes) return;
    mm.add("(min-width: 992px)", () => {
      const spin = gsap.to(nodes, { rotation: 360, duration: 70, repeat: -1, ease: "none", onUpdate: () => nodes.style.setProperty("--spin", gsap.getProperty(nodes, "rotation")) });
      ScrollTrigger.create({ trigger: orb, start: "top bottom", end: "bottom top", onToggle: (s) => (s.isActive ? spin.play() : spin.pause()) });
      orb.addEventListener("pointerenter", () => gsap.to(spin, { timeScale: 0, duration: 0.6 }));
      orb.addEventListener("pointerleave", () => gsap.to(spin, { timeScale: 1, duration: 0.8 }));
    });
  })();

  // Tilt + glare, magnetic buttons (fine pointers only)
  if (fine) {
    $$("[data-nx-tilt]", root).forEach((el) => {
      const rx = gsap.quickTo(el, "rotationX", { duration: 0.5, ease: "power3.out" }), ry = gsap.quickTo(el, "rotationY", { duration: 0.5, ease: "power3.out" });
      el.addEventListener("pointermove", (e) => { const r = el.getBoundingClientRect(), x = (e.clientX - r.left) / r.width - 0.5, y = (e.clientY - r.top) / r.height - 0.5; rx(-y * 8); ry(x * 10); el.style.setProperty("--gx", (x + 0.5) * 100 + "%"); el.style.setProperty("--gy", (y + 0.5) * 100 + "%"); });
      el.addEventListener("pointerleave", () => { rx(0); ry(0); });
    });
    $$("[data-nx-magnetic]", root).forEach((el) => {
      const xTo = gsap.quickTo(el, "x", { duration: 0.45, ease: "power3.out" }), yTo = gsap.quickTo(el, "y", { duration: 0.45, ease: "power3.out" });
      el.addEventListener("pointermove", (e) => { const r = el.getBoundingClientRect(); xTo((e.clientX - r.left - r.width / 2) * 0.22); yTo((e.clientY - r.top - r.height / 2) * 0.3); });
      el.addEventListener("pointerleave", () => { xTo(0); yTo(0); });
    });
  }

  ScrollTrigger.sort();
  const refresh = () => { ScrollTrigger.sort(); ScrollTrigger.refresh(); };
  window.addEventListener("load", refresh);
  if (document.fonts && document.fonts.ready) document.fonts.ready.then(refresh);

  // Screenshot hook (used by the capture tools): ?nxshot=<selector>&at=<viewport heights>
  try {
    const q = new URLSearchParams(location.search), shot = q.get("nxshot");
    if (shot) setTimeout(() => { const el = document.querySelector(shot); if (el) { const y = el.getBoundingClientRect().top + scrollY + (parseFloat(q.get("at")) || 0) * innerHeight; if (lenis) lenis.scrollTo(y, { immediate: true, force: true }); else window.scrollTo(0, y); ScrollTrigger.update(); } }, 2600);
  } catch (e) { /* ignore */ }
})();
