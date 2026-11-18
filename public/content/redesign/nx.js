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

  // Doc Validation steps: hover / click / focus picks a step and switches the document to that step's view;
  // the motion layer (below) runs the view's check (scan, ticks, stamp)
  const docSteps = { set: null, go: null };
  (function docValidationSteps() {
    const sec = $("[data-nx-verify]"); if (!sec) return;
    const steps = $$("[data-nx-step]", sec), views = $$("[data-nx-view]", sec);
    docSteps.set = (j) => {
      steps.forEach((s, k) => { s.classList.toggle("is-active", k === j); const b = $(".nx-step__btn", s); if (b) b.setAttribute("aria-pressed", String(k === j)); });
      views.forEach((v, k) => v.classList.toggle("is-active", k === j));
    };
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

  // Our Locations: dotted world map (the same SVG file the old section used as its background), redrawn in NEN colours:
  // grey dots and the dashboard's countries (Countries list) in red. The active tab's Contact Us offices are pinned with
  // tags (each tag takes the first free side, so they never cover each other) and linked to Cairo by routes. A pin and
  // its office cards highlight each other; the tabs (Regional Offices / Authorized Offices / Representatives) swap them.
  const MAP = (function map() {
    const box = $("[data-nx-map]"); if (!box) return null;
    const sec = box.closest("section") || root;
    const svgs = $$("svg", box), dotsG = $("[data-nx-map-dots]", box), arcsG = $("[data-nx-map-arcs]", box), pinsOl = $("[data-nx-map-pins]", box);
    // Linear fit of that map's projection, from landmarks (London, Dakar, Cape Agulhas, Horn of Africa, tip of India). SVG units.
    const P = { c0: 36, lon0: -17.5, dLon: 3.44, r0: 9, lat0: 51.5, dLat: 2.9, step: 9.25, y0: 3.5 };
    const proj = (lat, lon) => [(P.c0 + (lon - P.lon0) / P.dLon) * P.step, P.y0 + (P.r0 + (P.lat0 - lat) / P.dLat) * P.step];
    const inv = (x, y) => [P.lat0 - ((y - P.y0) / P.step - P.r0) * P.dLat, P.lon0 + (x / P.step - P.c0) * P.dLon];
    // Rough country areas [lat, lon, half-height°, half-width°] + ISO code, matched by name to the dashboard's country titles.
    const GEO = [
      [/egypt|مصر/, [26.8, 30, 4.6, 5], "EG"], [/^(usa|us|united states|america)|أمريكا/, [39, -98, 9, 25], "US"], [/^(sa|ksa)$|saudi|السعودية/, [24, 45, 6, 8], "SA"],
      [/emirates|^uae$|الإمارات/, [24, 54.3, 1.4, 2], "AE"], [/oman|عمان/, [21, 57, 3.5, 3], "OM"], [/uzbek|أوزبك/, [41.5, 64, 3, 7], "UZ"], [/kyrgyz|قيرغيز/, [41.3, 74.5, 1.8, 4.5], "KG"],
      [/turk|تركيا/, [39, 35, 2.8, 9], "TR"], [/german|ألمانيا/, [51, 10.3, 3.2, 3.5], "DE"], [/united kin|^uk$|britain|england|بريطانيا|المملكة المتحدة/, [54, -2.5, 4.5, 3.5], "GB"],
      [/jordan|الأردن/, [31.2, 36.5, 1.8, 1.8], "JO"], [/syria|سوريا/, [35, 38.5, 2, 3], "SY"], [/russia|روسيا/, [61, 95, 12, 60], "RU"], [/spain|إسبانيا/, [40.2, -3.6, 3.2, 4.8], "ES"],
      [/qatar|قطر/, [25.3, 51.2, 0.8, 0.8], "QA"], [/bahrain|البحرين/, [26, 50.5, 0.6, 0.6], "BH"], [/kuwait|الكويت/, [29.3, 47.6, 1, 1], "KW"], [/georgia|جورجيا/, [42.2, 43.5, 1, 2.3], "GE"],
      [/azerbaijan|أذربيجان/, [40.3, 47.7, 1.2, 2], "AZ"], [/tajik|طاجيك/, [38.8, 71, 1.8, 3], "TJ"], [/kazakh|كازاخ/, [48, 67, 6, 18], "KZ"], [/iraq|العراق/, [33, 43.7, 3.5, 4], "IQ"],
      [/leban|لبنان/, [33.9, 35.9, 0.5, 0.5], "LB"], [/palestin|فلسطين/, [31.9, 35.2, 0.5, 0.4], "PS"], [/yemen|اليمن/, [15.5, 47.5, 3, 6], "YE"], [/sudan|السودان/, [15.5, 30, 6, 7], "SD"],
      [/libya|ليبيا/, [27, 17, 5, 8], "LY"], [/tunisia|تونس/, [34, 9.5, 3, 1.5], "TN"], [/algeria|الجزائر/, [28, 2.6, 8, 9], "DZ"], [/morocco|المغرب/, [31.8, -7, 3.5, 4], "MA"],
      [/pakistan|باكستان/, [30, 69.5, 5, 6], "PK"], [/india|الهند/, [22, 79, 8, 9], "IN"], [/france|فرنسا/, [46.6, 2.4, 3.5, 4], "FR"], [/ital|إيطاليا/, [42.8, 12.5, 4, 3], "IT"],
      [/china|الصين/, [35, 103, 10, 22], "CN"], [/canada|كندا/, [56, -100, 12, 35], "CA"], [/kenya|كينيا/, [0.5, 38, 4, 3], "KE"], [/nigeria|نيجيريا/, [9.5, 8, 4, 5], "NG"],
    ];
    const geoOf = (name) => { const s = String(name || "").toLowerCase().replace(/^republic of |^the |^sultanate of /, "").trim(); const hit = s && GEO.find(([re]) => re.test(s)); return hit ? { area: hit[1], iso: hit[2] } : null; };
    // Cities found in the offices' addresses: [match, lat, lon, ISO, English, Arabic, capital?]. A city only counts when it is in
    // the office's own country (one dashboard office has another country's address). Capitals place offices with no address.
    const CITY = [
      [/london|covent garden/, 51.51, -0.13, "GB", "London", "لندن", 1], [/frankfurt|bockenheimer/, 50.11, 8.68, "DE", "Frankfurt", "فرانكفورت"], [/berlin/, 52.52, 13.4, "DE", "Berlin", "برلين", 1],
      [/dover|delaware/, 39.16, -75.52, "US", "Dover", "دوفر"], [/istanbul|büyükçekmece/, 41.01, 28.98, "TR", "Istanbul", "إسطنبول"], [/ankara/, 39.93, 32.86, "TR", "Ankara", "أنقرة", 1],
      [/cairo/, 30.04, 31.24, "EG", "Cairo", "القاهرة", 1], [/giza|6 ?october/, 29.97, 30.94, "EG", "Giza", "الجيزة"], [/dubai|oud metha/, 25.2, 55.27, "AE", "Dubai", "دبي"],
      [/abu dhabi/, 24.45, 54.38, "AE", "Abu Dhabi", "أبوظبي", 1], [/ajman/, 25.41, 55.45, "AE", "Ajman", "عجمان"], [/sharjah/, 25.35, 55.4, "AE", "Sharjah", "الشارقة"],
      [/muscat/, 23.59, 58.41, "OM", "Muscat", "مسقط", 1], [/tashkent/, 41.3, 69.24, "UZ", "Tashkent", "طشقند", 1], [/nukus|karakalpak/, 42.46, 59.6, "UZ", "Nukus", "نوكوس"],
      [/margilan|fergana/, 40.47, 71.72, "UZ", "Margilan", "مرغلان"], [/bishkek/, 42.87, 74.6, "KG", "Bishkek", "بيشكيك", 1], [/amman/, 31.95, 35.93, "JO", "Amman", "عمّان", 1],
      [/damascus/, 33.51, 36.29, "SY", "Damascus", "دمشق", 1], [/moscow/, 55.76, 37.62, "RU", "Moscow", "موسكو", 1], [/riyadh/, 24.71, 46.68, "SA", "Riyadh", "الرياض", 1],
      [/jeddah/, 21.49, 39.19, "SA", "Jeddah", "جدة"], [/doha/, 25.29, 51.53, "QA", "Doha", "الدوحة", 1], [/manama/, 26.23, 50.59, "BH", "Manama", "المنامة", 1],
      [/kuwait/, 29.38, 47.99, "KW", "Kuwait City", "مدينة الكويت", 1], [/baku/, 40.41, 49.87, "AZ", "Baku", "باكو", 1], [/tbilisi/, 41.72, 44.79, "GE", "Tbilisi", "تبليسي", 1],
      [/dushanbe/, 38.56, 68.79, "TJ", "Dushanbe", "دوشنبه", 1], [/madrid/, 40.42, -3.7, "ES", "Madrid", "مدريد", 1],
    ];
    const names = data("nx-map-data") || [];
    const NET = names.map((n) => { const g = geoOf(n); return g && g.area; }).filter(Boolean);
    const VIEWS = { full: [0, 0, 858, 432], mobile: [316, 38, 300, 200] };
    const cairo = proj(30.04, 31.24);   // the dots ripple in from here
    const f = (n) => n.toFixed(1);
    const esc = (s) => String(s).replace(/[&<>"']/g, (c) => ({ "&": "&amp;", "<": "&lt;", ">": "&gt;", '"': "&quot;", "'": "&#39;" }[c]));
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
      dotsG.innerHTML = dots.map(([x, y], i) => `<circle cx="${f(x)}" cy="${f(y)}" r="3.3"${net.has(i) ? ' class="is-net"' : ""} style="--d:${((Math.hypot(x - cairo[0], y - cairo[1]) / 858) * 1.9).toFixed(2)}s"/>`).join("");
      box.classList.add("is-loaded");
    }).catch(() => box.classList.add("is-nomap"));

    // ---- offices: where each one goes. The address's city first (the dashboard's lat/lng are mostly empty or off),
    // then the dashboard's lat/lng when they fall inside the country, then the capital, then the country's middle.
    const isAr = /^ar/i.test(document.documentElement.lang || "");
    const cards = $$("[data-nx-office]", sec), tabs = $$("[data-nx-loc-tab]", sec);
    const inside = (la, lo, [cla, clo, ry, rx]) => ((lo - clo) / (rx * 1.3)) ** 2 + ((la - cla) / (ry * 1.3)) ** 2 <= 1;
    cards.forEach((c) => {
      const g = geoOf(c.dataset.country); if (!g) return;
      const addr = (c.dataset.address || "").toLowerCase(), lat = parseFloat(c.dataset.lat), lng = parseFloat(c.dataset.lng);
      const city = addr && CITY.find((k) => k[3] === g.iso && k[0].test(addr));
      const cap = CITY.find((k) => k[3] === g.iso && k[6]);
      const ll = city ? [city[1], city[2]] : (!isNaN(lat) && !isNaN(lng) && inside(lat, lng, g.area)) ? [lat, lng] : cap ? [cap[1], cap[2]] : [g.area[0], g.area[1]];
      c._loc = { ll, iso: g.iso, city: city || null };
      c.dataset.key = c.dataset.type + ":" + g.iso + ":" + (city ? city[4] : "-");
    });
    let view = VIEWS.full, groups = [], active = 0;
    const arc = (a, b, d, cls) => {
      const dist = Math.hypot(b[0] - a[0], b[1] - a[1]), cx = (a[0] + b[0]) / 2, cy = (a[1] + b[1]) / 2 - Math.max(8, dist * 0.38);
      const path = `M${f(a[0])} ${f(a[1])} Q${f(cx)} ${f(cy)} ${f(b[0])} ${f(b[1])}`, st = `style="--d:${d.toFixed(2)}s"`;
      return `<path class="nx-map__arc${cls}" d="${path}" pathLength="1" ${st}/><path class="nx-map__comet${cls}" d="${path}" pathLength="1" ${st}/>`;
    };
    // tags: each takes the first side (of 8) that covers no other tag or pin and stays inside the map
    const DIRS = ["e", "w", "ne", "nw", "se", "sw", "n", "s"];
    const side = (d, x, y, w, h) => ({ e: [x + 18, y - h / 2], w: [x - 18 - w, y - h / 2], n: [x - w * 0.3, y - 18 - h], s: [x - w * 0.3, y + 18],
      ne: [x + 8, y - 16 - h], nw: [x - 8 - w, y - 16 - h], se: [x + 8, y + 16], sw: [x - 8 - w, y + 16] }[d]);
    const overlap = (a, b) => Math.max(0, Math.min(a[0] + a[2], b[0] + b[2]) - Math.max(a[0], b[0])) * Math.max(0, Math.min(a[1] + a[3], b[1] + b[3]) - Math.max(a[1], b[1]));
    const place = () => {
      const W = box.clientWidth, H = box.clientHeight, pins = $$(".nx-mpin", pinsOl); if (!W || !H) return;
      const pts = pins.map((p, i) => {
        const [sx, sy] = groups[i].pt, x = ((sx - view[0]) / view[2]) * W, y = ((sy - view[1]) / view[3]) * H;
        p.style.left = (x / W) * 100 + "%"; p.style.top = (y / H) * 100 + "%"; p.hidden = x < 0 || x > W || y < 0 || y > H;
        return [x, y];
      });
      const dots = pts.filter((_, i) => !pins[i].hidden).map(([x, y]) => [x - 12, y - 12, 24, 24]), taken = [];
      pins.map((_, i) => i).filter((i) => !pins[i].hidden).sort((a, b) => pts[a][0] - pts[b][0]).forEach((i) => {
        const lab = $(".nx-mpin__label", pins[i]), w = lab.offsetWidth, h = lab.offsetHeight, [x, y] = pts[i]; if (!w) return;   // tags are hidden on phones
        let best = null;
        for (const d of DIRS) {
          const [lx, ly] = side(d, x, y, w, h), r = [lx, ly, w, h];
          const cost = taken.reduce((s, t) => s + overlap(r, t), 0) + dots.reduce((s, t) => s + overlap(r, t), 0) * 2
            + (Math.max(0, -lx) + Math.max(0, lx + w - W) + Math.max(0, -ly) + Math.max(0, ly + h - H)) * h * 3;
          if (!best || cost < best.cost) best = { d, r, cost };
          if (!cost) break;
        }
        DIRS.forEach((d) => pins[i].classList.toggle("nx-mpin--" + d, d === best.d));
        taken.push(best.r);
      });
    };
    const hot = (key, on) => {
      $$(".nx-mpin", pinsOl).forEach((p) => p.classList.toggle("is-hot", on && p.dataset.key === key));
      cards.forEach((c) => c.classList.toggle("is-hot", on && c.dataset.key === key));
    };
    const build = (swap) => {
      const byKey = new Map();
      cards.filter((c) => +c.dataset.type === active && c._loc).forEach((c) => { const g = byKey.get(c.dataset.key) || { key: c.dataset.key, loc: c._loc, cards: [] }; g.cards.push(c); byKey.set(g.key, g); });
      groups = [...byKey.values()]; groups.forEach((g) => { g.pt = proj(g.loc.ll[0], g.loc.ll[1]); });
      const is = swap ? " is-new" : "";
      pinsOl.innerHTML = groups.map((g, i) => {
        const c0 = g.cards[0], n = g.cards.length, country = (($("h3", c0) || {}).textContent || "").trim();
        const city = g.loc.city ? g.loc.city[isAr ? 5 : 4] : "";
        const sub = city ? country + (n > 1 ? " · " + n : "") : (n === 1 && c0.dataset.who) ? c0.dataset.who : (c0.dataset.one || "") + (n > 1 ? " ×" + n : "");
        return `<li class="nx-mpin${is}" data-key="${esc(g.key)}" style="--pd:${(swap ? i * 0.06 : 1.1 + i * 0.12).toFixed(2)}s"><i class="nx-mpin__dot"></i><span class="nx-mpin__label"><b>${esc(city || country)}</b><span class="nx-mono">${esc(sub)}</span></span></li>`;
      }).join("");
      // routes from the Egypt pin (or the pin nearest Cairo) to the others
      const near = (g) => Math.hypot(g.pt[0] - cairo[0], g.pt[1] - cairo[1]);
      const hub = groups.find((g) => g.loc.iso === "EG") || groups.slice().sort((a, b) => near(a) - near(b))[0];
      arcsG.innerHTML = hub ? groups.filter((g) => g !== hub && Math.hypot(g.pt[0] - hub.pt[0], g.pt[1] - hub.pt[1]) > 2)
        .map((g, i) => arc(hub.pt, g.pt, swap ? 0.1 + i * 0.07 : 0.9 + i * 0.15, is)).join("") : "";
      $$(".nx-mpin", pinsOl).forEach((p) => { p.addEventListener("pointerenter", () => hot(p.dataset.key, true)); p.addEventListener("pointerleave", () => hot(p.dataset.key, false)); });
      place();
      if (swap) requestAnimationFrame(() => requestAnimationFrame(() => $$(".is-new", box).forEach((el) => el.classList.remove("is-new"))));
    };
    const show = (type, swap) => {
      active = type;
      tabs.forEach((t) => { const on = +t.dataset.nxLocTab === type; t.classList.toggle("is-active", on); t.setAttribute("aria-selected", String(on)); });
      const shown = cards.filter((c) => { c.hidden = +c.dataset.type !== type; return !c.hidden; });
      build(swap);
      if (swap && hasGSAP && !reduce) gsap.fromTo(shown, { autoAlpha: 0, y: 18 }, { autoAlpha: 1, y: 0, duration: 0.55, stagger: 0.05, ease: "power3.out", overwrite: "auto" });
    };
    cards.forEach((c) => { c.addEventListener("pointerenter", () => hot(c.dataset.key, true)); c.addEventListener("pointerleave", () => hot(c.dataset.key, false)); });
    tabs.forEach((t) => t.addEventListener("click", () => { if (+t.dataset.nxLocTab !== active) show(+t.dataset.nxLocTab, true); }));
    const mq = window.matchMedia("(max-width: 767px)");
    const fit = () => { view = mq.matches ? VIEWS.mobile : VIEWS.full; box.style.aspectRatio = view[2] + " / " + view[3]; svgs.forEach((s) => s.setAttribute("viewBox", view.join(" "))); place(); };
    fit(); mq.addEventListener("change", fit);
    const first = tabs.find((t) => t.classList.contains("is-active")) || tabs[0];
    if (first || cards.length) show(first ? +first.dataset.nxLocTab : +cards[0].dataset.type, false);
    let rz = 0; window.addEventListener("resize", () => { clearTimeout(rz); rz = setTimeout(place, 150); });
    if (document.fonts && document.fonts.ready) document.fonts.ready.then(place);
    if (!hasGSAP || reduce) box.classList.add("is-in");
    // pause the looping routes and pin pulses while the map is off screen
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

  // Doc Validation: the document on the right has one view per step (the step's title + its details as rows).
  // Picking a step shows its view and runs that step's check; in view, the steps play through once on their own.
  (function docValidation() {
    const sec = $("[data-nx-verify]"); if (!sec) return;
    const doc = $("[data-nx-doc]", sec), steps = $$("[data-nx-step]", sec), views = $$("[data-nx-view]", doc), scan = $("[data-nx-scan]", doc);
    const prog = $("[data-nx-verify-progress]", sec), match = $("[data-nx-match]", doc), hash = $("[data-nx-hash]", doc), stamp = $("[data-nx-stamp]", doc), m = { v: 0 };
    const n = views.length, HASH = ["7f3a9c4e…e21b", "b81d07fa…94c3", "2c6e5d1b…07af", "e49a3f60…5bd2", "91c4b7e2…3fa8"];
    // resting state: no rows ticked, no stamp, match 0%
    views.forEach((v) => { gsap.set($$("[data-nx-row]", v), { autoAlpha: 0, y: 8 }); gsap.set($$(".nx-tick", v), { scale: 0, autoAlpha: 0 }); });
    gsap.set(stamp, { autoAlpha: 0 }); gsap.set(match, { textContent: "0%" }); gsap.set(hash, { textContent: "────────────" }); gsap.set(prog, { scaleX: 0 });
    // the document comes in and uploads once
    const intro = gsap.timeline({ paused: true })
      .fromTo(doc, { y: 70, rotateX: 14, autoAlpha: 0 }, { y: 0, rotateX: 0, autoAlpha: 1, duration: 1, ease: "power3.out" })
      .fromTo($("[data-nx-upload]", doc), { scaleX: 0 }, { scaleX: 1, duration: 1.1, ease: "none" }, "<0.25").to($("[data-nx-upload-row]", doc), { autoAlpha: 0.25, duration: 0.3 });
    // one step's check, run each time its view is shown: scan, rows ticked one by one, 0→100%, hash, Verified
    let tl = null;
    const check = (j) => {
      const v = views[j], rows = $$("[data-nx-row]", v), ticks = rows.map((r) => $(".nx-tick", r)), span = Math.max(0.9, rows.length * 0.3 + 0.3);
      if (tl) tl.kill();
      tl = gsap.timeline({ onUpdate() { gsap.set(prog, { scaleX: (j + this.progress()) / n }); } })
        .to(stamp, { autoAlpha: 0, scale: 0.9, duration: 0.2 }, 0).to(doc, { "--verified": 0, duration: 0.3 }, 0)
        .set(hash, { textContent: "────────────" }, 0)
        .set(scan, { autoAlpha: 1, y: 0 }, 0.3).to(scan, { y: () => doc.offsetHeight + 90, duration: 1.3, ease: "none" }, 0.3).to(scan, { autoAlpha: 0, duration: 0.2 }, 1.6)
        .fromTo(rows, { autoAlpha: 0, y: 8 }, { autoAlpha: 1, y: 0, duration: 0.35, stagger: 0.3, ease: "power2.out" }, 0.55)
        .fromTo(ticks, { scale: 0, autoAlpha: 0 }, { scale: 1, autoAlpha: 1, duration: 0.25, stagger: 0.3, ease: "back.out(2)" }, 0.75)
        .fromTo(m, { v: 0 }, { v: 100, duration: span, ease: "none", onUpdate: () => (match.textContent = Math.round(m.v) + "%") }, 0.55)
        .addLabel("done", Math.max(1.7, 0.55 + span))
        .to(hash, { duration: 0.8, scrambleText: { text: HASH[j % HASH.length], chars: "0123456789abcdef", speed: 0.8 } }, "done")
        .fromTo(stamp, { scale: 1.8, autoAlpha: 0 }, { scale: 1, autoAlpha: 1, duration: 0.55, ease: "expo.in", immediateRender: false }, "done+=0.1")
        .to(doc, { "--verified": 1, duration: 0.6, ease: "power2.out" }, "done+=0.55");
      return tl;
    };
    let auto = null, picked = false, active = -1;
    const go = (j, byUser) => {
      if (byUser) { picked = true; if (auto) auto.kill(); }
      if (j === active) return tl;   // already showing that step's view
      active = j; if (docSteps.set) docSteps.set(j);   // swaps the step and the view (CSS fade)
      return check(j);
    };
    docSteps.go = go;
    if (!n) { onView(doc, () => intro.play().then(() => gsap.fromTo(stamp, { scale: 1.8, autoAlpha: 0 }, { scale: 1, autoAlpha: 1, duration: 0.55, ease: "expo.in" }))); return; }
    // in view: the document comes in, then the steps play through once on their own until the visitor picks one
    const autoplay = (j) => { if (picked) return; go(j).eventCallback("onComplete", () => { if (!picked && j < n - 1) auto = gsap.delayedCall(1.8, () => autoplay(j + 1)); }); };
    onView(doc, () => { intro.play(); if (!picked) auto = gsap.delayedCall(1.2, () => autoplay(0)); });
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
