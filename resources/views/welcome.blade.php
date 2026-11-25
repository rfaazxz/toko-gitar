<title>Fret Factory</title>
<meta name="claude:viewport-fit-sides" content="cover">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=DM+Sans:wght@300;400;500;600&family=DM+Mono:wght@400;500&display=swap">

<style>
/* ============================================
   FRET FACTORY — Design Tokens
   ============================================ */
:root {
  --ink:        #0e0c09;
  --ink-soft:   #1c1812;
  --paper:      #f5f0e8;
  --paper-dim:  #ede7d8;
  --amber:      #c8862a;
  --amber-warm: #e09a30;
  --amber-pale: #f7ecd5;
  --cream:      #faf6ee;
  --muted:      #8c7e68;
  --muted-light:#b8a992;
  --divider:    rgba(200,134,42,0.18);
  --card-bg:    #191510;
  --card-border: rgba(200,134,42,0.15);

  --font-display: 'Playfair Display', Georgia, serif;
  --font-body:    'DM Sans', system-ui, sans-serif;
  --font-mono:    'DM Mono', 'Courier New', monospace;

  color-scheme: light;
}

@media (prefers-color-scheme: dark) {
  :root:not([data-theme="light"]) {
    --ink:        #f5f0e8;
    --ink-soft:   #1c1812;
    --paper:      #0e0c09;
    --paper-dim:  #141009;
    --amber:      #d4943a;
    --amber-warm: #e8a840;
    --amber-pale: #2a2010;
    --cream:      #0e0c09;
    --muted:      #8c7e68;
    --muted-light:#6b5e4c;
    --divider:    rgba(200,134,42,0.12);
    --card-bg:    #141009;
    --card-border: rgba(200,134,42,0.18);
    color-scheme: dark;
  }
}
:root[data-theme="dark"] {
  --ink:        #f5f0e8;
  --ink-soft:   #1c1812;
  --paper:      #0e0c09;
  --paper-dim:  #141009;
  --amber:      #d4943a;
  --amber-warm: #e8a840;
  --amber-pale: #2a2010;
  --cream:      #0e0c09;
  --muted:      #8c7e68;
  --muted-light:#6b5e4c;
  --divider:    rgba(200,134,42,0.12);
  --card-bg:    #141009;
  --card-border: rgba(200,134,42,0.18);
  color-scheme: dark;
}

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

html { font-size: 16px; scroll-behavior: smooth; }

body {
  font-family: var(--font-body);
  background: var(--paper);
  color: var(--ink);
  min-height: 100%;
  -webkit-font-smoothing: antialiased;
  padding-left: max(16px, env(safe-area-inset-left, 0px));
  padding-right: max(16px, env(safe-area-inset-right, 0px));
  padding-block: 0;
}

/* ============================================
   NAVBAR
   ============================================ */
.navbar {
  position: sticky;
  top: env(safe-area-inset-top, 0px);
  z-index: 100;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 clamp(1.5rem, 5vw, 4rem);
  height: 72px;
  background: rgba(14,12,9,0.92);
  backdrop-filter: blur(16px);
  -webkit-backdrop-filter: blur(16px);
  border-bottom: 1px solid rgba(200,134,42,0.1);
  margin-left: calc(-1 * max(16px, env(safe-area-inset-left, 0px)));
  margin-right: calc(-1 * max(16px, env(safe-area-inset-right, 0px)));
  padding-left: max(1.5rem, calc(1.5rem + env(safe-area-inset-left, 0px)));
  padding-right: max(1.5rem, calc(1.5rem + env(safe-area-inset-right, 0px)));
}

body::before {
  content: "";
  position: fixed;
  inset: 0 0 auto;
  height: env(safe-area-inset-top, 0px);
  background: #0e0c09;
  z-index: 101;
}

.logo {
  display: flex;
  align-items: baseline;
  gap: 0.5rem;
  text-decoration: none;
}

.logo-mark {
  font-family: var(--font-display);
  font-weight: 900;
  font-size: 1.5rem;
  color: #f5f0e8;
  letter-spacing: -0.02em;
  line-height: 1;
}

.logo-mark em {
  font-style: italic;
  color: var(--amber);
}

.logo-tagline {
  font-family: var(--font-mono);
  font-size: 0.6rem;
  color: rgba(200,134,42,0.7);
  letter-spacing: 0.18em;
  text-transform: uppercase;
  font-weight: 500;
  align-self: center;
  margin-top: 2px;
}

.nav-links {
  display: flex;
  align-items: center;
  gap: 2rem;
  list-style: none;
}

@media (max-width: 640px) {
  .nav-links { display: none; }
}

.nav-links a {
  font-size: 0.8rem;
  font-weight: 500;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  color: rgba(245,240,232,0.55);
  text-decoration: none;
  transition: color 0.2s;
}

.nav-links a:hover,
.nav-links a.active {
  color: #f5f0e8;
}

.nav-actions {
  display: flex;
  align-items: center;
  gap: 0.75rem;
}

.btn-ghost {
  font-size: 0.75rem;
  font-weight: 600;
  letter-spacing: 0.06em;
  color: rgba(245,240,232,0.65);
  text-decoration: none;
  padding: 0.5rem 1rem;
  border-radius: 2px;
  border: 1px solid transparent;
  transition: all 0.2s;
  background: none;
  cursor: pointer;
}

.btn-ghost:hover {
  color: #f5f0e8;
  border-color: rgba(200,134,42,0.3);
}

.btn-primary {
  font-size: 0.75rem;
  font-weight: 700;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  color: #0e0c09;
  background: var(--amber);
  text-decoration: none;
  padding: 0.55rem 1.25rem;
  border-radius: 2px;
  transition: background 0.2s;
  border: none;
  cursor: pointer;
  display: inline-flex;
  align-items: center;
  gap: 0.35rem;
}

.btn-primary:hover {
  background: var(--amber-warm);
}

/* ============================================
   HERO
   ============================================ */
.hero {
  position: relative;
  min-height: 92vh;
  display: flex;
  align-items: flex-end;
  overflow: hidden;
  margin-left: calc(-1 * max(16px, env(safe-area-inset-left, 0px)));
  margin-right: calc(-1 * max(16px, env(safe-area-inset-right, 0px)));
  padding-left: max(16px, env(safe-area-inset-left, 0px));
  padding-right: max(16px, env(safe-area-inset-right, 0px));
}

.hero-bg {
  position: absolute;
  inset: 0;
  background:
    linear-gradient(to bottom, rgba(14,12,9,0.3) 0%, rgba(14,12,9,0.0) 30%, rgba(14,12,9,0.65) 70%, #0e0c09 100%),
    repeating-linear-gradient(
      88deg,
      transparent,
      transparent 2px,
      rgba(200,134,42,0.025) 2px,
      rgba(200,134,42,0.025) 4px
    ),
    repeating-linear-gradient(
      92deg,
      transparent,
      transparent 8px,
      rgba(0,0,0,0.04) 8px,
      rgba(0,0,0,0.04) 10px
    ),
    linear-gradient(175deg, #3d2b12 0%, #1e1409 30%, #0e0c09 60%, #0a0806 100%);
  background-size: 100% 100%, 100% 100%, 100% 100%, 100% 100%;
}

.hero-ornament {
  position: absolute;
  right: 8%;
  top: 50%;
  transform: translateY(-50%);
  width: min(420px, 45vw);
  opacity: 0.08;
}

.hero-content {
  position: relative;
  z-index: 2;
  max-width: 1200px;
  width: 100%;
  margin: 0 auto;
  padding: clamp(3rem, 10vw, 6rem) clamp(1.5rem, 5vw, 4rem);
  padding-bottom: clamp(4rem, 8vw, 6rem);
}

.hero-eyebrow {
  font-family: var(--font-mono);
  font-size: 0.65rem;
  font-weight: 500;
  letter-spacing: 0.22em;
  text-transform: uppercase;
  color: var(--amber);
  display: flex;
  align-items: center;
  gap: 0.75rem;
  margin-bottom: 1.5rem;
}

.hero-eyebrow::before {
  content: "";
  display: block;
  width: 2rem;
  height: 1px;
  background: var(--amber);
  opacity: 0.6;
}

.hero-headline {
  font-family: var(--font-display);
  font-weight: 900;
  font-size: clamp(3rem, 8vw, 7.5rem);
  line-height: 0.9;
  letter-spacing: -0.03em;
  color: #f5f0e8;
  text-wrap: balance;
  margin-bottom: 1.5rem;
  max-width: 14ch;
}

.hero-headline em {
  font-style: italic;
  color: var(--amber);
}

.hero-sub {
  font-size: clamp(0.95rem, 2vw, 1.1rem);
  font-weight: 300;
  color: rgba(245,240,232,0.6);
  line-height: 1.65;
  max-width: 46ch;
  margin-bottom: 2.5rem;
}

.hero-cta-row {
  display: flex;
  align-items: center;
  gap: 1.5rem;
  flex-wrap: wrap;
}

.btn-hero {
  display: inline-flex;
  align-items: center;
  gap: 0.6rem;
  font-size: 0.8rem;
  font-weight: 700;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  text-decoration: none;
  color: #0e0c09;
  background: var(--amber);
  padding: 0.9rem 2rem;
  border-radius: 2px;
  transition: background 0.2s, transform 0.2s;
}

.btn-hero:hover {
  background: var(--amber-warm);
  transform: translateY(-1px);
}

.btn-hero-ghost {
  display: inline-flex;
  align-items: center;
  gap: 0.5rem;
  font-size: 0.8rem;
  font-weight: 500;
  letter-spacing: 0.08em;
  color: rgba(245,240,232,0.65);
  text-decoration: none;
  transition: color 0.2s;
}

.btn-hero-ghost:hover { color: #f5f0e8; }

.hero-stats {
  display: flex;
  gap: 2.5rem;
  margin-top: 3rem;
  padding-top: 2rem;
  border-top: 1px solid rgba(200,134,42,0.15);
}

.stat-num {
  font-family: var(--font-display);
  font-weight: 700;
  font-size: 1.75rem;
  color: #f5f0e8;
  line-height: 1;
}

.stat-label {
  font-size: 0.65rem;
  font-weight: 500;
  letter-spacing: 0.14em;
  text-transform: uppercase;
  color: rgba(245,240,232,0.4);
  margin-top: 0.3rem;
}

/* ============================================
   SEARCH BAR
   ============================================ */
.search-section {
  background: #0e0c09;
  padding: 2.5rem clamp(1.5rem, 5vw, 4rem);
  margin-left: calc(-1 * max(16px, env(safe-area-inset-left, 0px)));
  margin-right: calc(-1 * max(16px, env(safe-area-inset-right, 0px)));
  padding-left: max(1.5rem, calc(1.5rem + env(safe-area-inset-left, 0px)));
  padding-right: max(1.5rem, calc(1.5rem + env(safe-area-inset-right, 0px)));
}

.search-inner {
  max-width: 1200px;
  margin: 0 auto;
  display: flex;
  align-items: center;
  gap: 1.5rem;
  flex-wrap: wrap;
}

.search-wrap {
  flex: 1;
  min-width: 240px;
  position: relative;
  display: flex;
  align-items: center;
}

.search-icon {
  position: absolute;
  left: 1.1rem;
  color: var(--amber);
  opacity: 0.7;
  font-size: 0.9rem;
  pointer-events: none;
}

.search-input {
  width: 100%;
  background: rgba(245,240,232,0.04);
  border: 1px solid rgba(200,134,42,0.2);
  border-radius: 2px;
  padding: 0.85rem 1rem 0.85rem 2.8rem;
  font-family: var(--font-body);
  font-size: 0.875rem;
  color: #f5f0e8;
  outline: none;
  transition: border-color 0.2s, background 0.2s;
}

.search-input::placeholder { color: rgba(245,240,232,0.25); }

.search-input:focus {
  border-color: rgba(200,134,42,0.5);
  background: rgba(245,240,232,0.06);
}

.filter-chips {
  display: flex;
  gap: 0.5rem;
  flex-wrap: wrap;
}

.chip {
  font-family: var(--font-mono);
  font-size: 0.65rem;
  font-weight: 500;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  color: rgba(245,240,232,0.45);
  border: 1px solid rgba(245,240,232,0.1);
  border-radius: 2px;
  padding: 0.4rem 0.9rem;
  background: none;
  cursor: pointer;
  transition: all 0.18s;
}

.chip:hover,
.chip.active {
  color: var(--amber);
  border-color: rgba(200,134,42,0.4);
  background: rgba(200,134,42,0.06);
}

/* ============================================
   CATALOG
   ============================================ */
.catalog-section {
  background: #0e0c09;
  padding: 0 clamp(1.5rem, 5vw, 4rem) 6rem;
  margin-left: calc(-1 * max(16px, env(safe-area-inset-left, 0px)));
  margin-right: calc(-1 * max(16px, env(safe-area-inset-right, 0px)));
  padding-left: max(1.5rem, calc(1.5rem + env(safe-area-inset-left, 0px)));
  padding-right: max(1.5rem, calc(1.5rem + env(safe-area-inset-right, 0px)));
}

.catalog-header {
  max-width: 1200px;
  margin: 0 auto 2.5rem;
  display: flex;
  align-items: flex-end;
  justify-content: space-between;
  gap: 1rem;
  padding-bottom: 1.5rem;
  border-bottom: 1px solid rgba(200,134,42,0.1);
  flex-wrap: wrap;
}

.catalog-eyebrow {
  font-family: var(--font-mono);
  font-size: 0.6rem;
  letter-spacing: 0.2em;
  text-transform: uppercase;
  color: var(--amber);
  opacity: 0.8;
  margin-bottom: 0.4rem;
}

.catalog-title {
  font-family: var(--font-display);
  font-size: clamp(1.5rem, 4vw, 2.2rem);
  font-weight: 700;
  color: #f5f0e8;
  letter-spacing: -0.02em;
}

.catalog-count {
  font-family: var(--font-mono);
  font-size: 0.72rem;
  color: rgba(200,134,42,0.7);
  letter-spacing: 0.08em;
}

/* Admin Banner */
.admin-banner {
  max-width: 1200px;
  margin: 0 auto 2rem;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 1rem;
  background: rgba(200,134,42,0.06);
  border: 1px solid rgba(200,134,42,0.2);
  border-radius: 2px;
  padding: 1rem 1.5rem;
  flex-wrap: wrap;
}

.admin-banner-info {
  display: flex;
  align-items: center;
  gap: 0.75rem;
}

.admin-crown { font-size: 1rem; line-height: 1; }
.admin-label { font-size: 0.75rem; font-weight: 600; color: var(--amber); }
.admin-sub { font-size: 0.65rem; color: rgba(200,134,42,0.55); margin-top: 0.1rem; }

/* Product Grid */
.product-grid {
  max-width: 1200px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
  gap: 1.5px;
  background: rgba(200,134,42,0.08);
  border: 1px solid rgba(200,134,42,0.08);
}

/* Product Card */
.product-card {
  background: #0e0c09;
  display: flex;
  flex-direction: column;
  transition: background 0.2s;
  position: relative;
  overflow: hidden;
  cursor: pointer;
}

.product-card:hover {
  background: #131009;
  z-index: 1;
  box-shadow: 0 0 0 1px rgba(200,134,42,0.3);
}

.product-card:focus-visible {
  outline: 2px solid var(--amber);
  outline-offset: -2px;
}

.card-img-wrap {
  position: relative;
  aspect-ratio: 4/3;
  background: #141009;
  overflow: hidden;
}

.card-img-wrap img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.5s cubic-bezier(0.25,0,0,1);
  display: block;
}

.product-card:hover .card-img-wrap img {
  transform: scale(1.04);
}

.card-no-img {
  width: 100%;
  height: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 0.5rem;
}

.card-no-img-icon { font-size: 2.5rem; opacity: 0.15; }

.card-no-img-label {
  font-family: var(--font-mono);
  font-size: 0.55rem;
  letter-spacing: 0.2em;
  text-transform: uppercase;
  color: rgba(200,134,42,0.3);
}

.card-badge {
  position: absolute;
  top: 1rem;
  left: 1rem;
  font-family: var(--font-mono);
  font-size: 0.55rem;
  font-weight: 500;
  letter-spacing: 0.14em;
  text-transform: uppercase;
  color: #0e0c09;
  background: var(--amber);
  padding: 0.3rem 0.6rem;
  border-radius: 1px;
}

.card-body {
  padding: 1.25rem 1.5rem 1rem;
  flex: 1;
  display: flex;
  flex-direction: column;
  gap: 0.3rem;
}

.card-kategori {
  font-family: var(--font-mono);
  font-size: 0.58rem;
  letter-spacing: 0.16em;
  text-transform: uppercase;
  color: var(--amber);
  opacity: 0.75;
}

.card-name {
  font-family: var(--font-display);
  font-size: 1rem;
  font-weight: 700;
  color: #f5f0e8;
  line-height: 1.25;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
  margin-top: 0.1rem;
}

.card-price-row {
  display: flex;
  align-items: baseline;
  gap: 0.3rem;
  margin-top: auto;
  padding-top: 0.75rem;
}

.card-price-currency {
  font-family: var(--font-mono);
  font-size: 0.65rem;
  color: rgba(200,134,42,0.7);
  font-weight: 500;
}

.card-price {
  font-family: var(--font-display);
  font-size: 1.3rem;
  font-weight: 700;
  color: #f5f0e8;
  font-variant-numeric: tabular-nums;
  letter-spacing: -0.02em;
}

.card-footer {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0.75rem 1.5rem;
  border-top: 1px solid rgba(200,134,42,0.07);
}

.card-stock { font-size: 0.7rem; color: rgba(245,240,232,0.35); }
.card-stock strong { color: rgba(245,240,232,0.6); font-weight: 600; }

.stock-dot {
  display: inline-block;
  width: 5px;
  height: 5px;
  border-radius: 50%;
  background: #4ade80;
  margin-right: 0.4rem;
  box-shadow: 0 0 6px rgba(74,222,128,0.5);
}

.card-status {
  font-family: var(--font-mono);
  font-size: 0.6rem;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  color: #4ade80;
}

/* Empty state */
.empty-state {
  grid-column: 1/-1;
  padding: 6rem 2rem;
  text-align: center;
  border: 1px dashed rgba(200,134,42,0.15);
}

.empty-icon { font-size: 2.5rem; opacity: 0.2; display: block; margin-bottom: 1rem; }
.empty-title {
  font-family: var(--font-display);
  font-size: 1.3rem;
  font-weight: 700;
  color: rgba(245,240,232,0.5);
  margin-bottom: 0.5rem;
}
.empty-sub { font-size: 0.8rem; color: rgba(245,240,232,0.25); }

/* ============================================
   POP-UP MODAL DETAIL & SPEK PRODUK
   ============================================ */
.spec-modal-backdrop {
  position: fixed;
  inset: 0;
  z-index: 200;
  background: rgba(6, 5, 3, 0.82);
  backdrop-filter: blur(8px);
  -webkit-backdrop-filter: blur(8px);
  display: none;
  align-items: center;
  justify-content: center;
  padding: 1.25rem;
  overflow-y: auto;
}

.spec-modal-backdrop.is-open {
  display: flex;
  animation: modalFadeIn 0.2s ease-out;
}

@keyframes modalFadeIn {
  from { opacity: 0; }
  to   { opacity: 1; }
}

.spec-modal {
  position: relative;
  width: 100%;
  max-width: 820px;
  background: #141009;
  border: 1px solid rgba(200,134,42,0.28);
  border-radius: 2px;
  box-shadow: 0 24px 64px rgba(0, 0, 0, 0.75);
  overflow: hidden;
  display: grid;
  grid-template-columns: 1fr 1.15fr;
  max-height: 90vh;
}

@media (max-width: 720px) {
  .spec-modal {
    grid-template-columns: 1fr;
    max-height: 92vh;
    overflow-y: auto;
  }
}

.spec-modal-media {
  position: relative;
  background: #0e0c09;
  min-height: 260px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-right: 1px solid rgba(200,134,42,0.12);
}

@media (max-width: 720px) {
  .spec-modal-media {
    border-right: none;
    border-bottom: 1px solid rgba(200,134,42,0.12);
    min-height: 220px;
    max-height: 260px;
  }
}

.spec-modal-media img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}

.spec-modal-no-img {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 0.5rem;
  padding: 2rem;
}

.spec-modal-no-img span:first-child { font-size: 3rem; opacity: 0.2; }
.spec-modal-no-img span:last-child {
  font-family: var(--font-mono);
  font-size: 0.6rem;
  letter-spacing: 0.2em;
  text-transform: uppercase;
  color: rgba(200,134,42,0.35);
}

.spec-modal-close {
  position: absolute;
  top: 0.9rem;
  right: 0.9rem;
  z-index: 5;
  width: 34px;
  height: 34px;
  border-radius: 2px;
  border: 1px solid rgba(245,240,232,0.16);
  background: rgba(14,12,9,0.85);
  color: #f5f0e8;
  font-size: 1.15rem;
  line-height: 1;
  cursor: pointer;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  transition: all 0.18s;
}

.spec-modal-close:hover {
  border-color: var(--amber);
  color: var(--amber);
  background: #1c1812;
}

.spec-modal-body {
  padding: 1.75rem 2rem;
  overflow-y: auto;
  display: flex;
  flex-direction: column;
  gap: 1.15rem;
}

@media (max-width: 720px) {
  .spec-modal-body {
    overflow-y: visible;
    padding: 1.35rem 1.25rem 1.6rem;
  }
}

.spec-modal-kat {
  font-family: var(--font-mono);
  font-size: 0.62rem;
  letter-spacing: 0.18em;
  text-transform: uppercase;
  color: var(--amber);
}

.spec-modal-title {
  font-family: var(--font-display);
  font-size: clamp(1.35rem, 2.5vw, 1.8rem);
  font-weight: 700;
  color: #f5f0e8;
  line-height: 1.2;
  margin-top: 0.25rem;
}

.spec-modal-price-row {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 1rem;
  padding-bottom: 1rem;
  border-bottom: 1px solid rgba(200,134,42,0.14);
  flex-wrap: wrap;
}

.spec-modal-price {
  font-family: var(--font-display);
  font-size: 1.55rem;
  font-weight: 700;
  color: var(--amber-warm);
  font-variant-numeric: tabular-nums;
}

.spec-modal-stock-pill {
  font-family: var(--font-mono);
  font-size: 0.65rem;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  color: #4ade80;
  background: rgba(74, 222, 128, 0.08);
  border: 1px solid rgba(74, 222, 128, 0.25);
  padding: 0.3rem 0.65rem;
  border-radius: 2px;
}

.spec-modal-stock-pill.is-empty {
  color: #f87171;
  background: rgba(248, 113, 113, 0.08);
  border-color: rgba(248, 113, 113, 0.25);
}

.spec-section-label {
  font-family: var(--font-mono);
  font-size: 0.6rem;
  letter-spacing: 0.18em;
  text-transform: uppercase;
  color: rgba(245,240,232,0.45);
  margin-bottom: 0.45rem;
}

.spec-desc {
  font-size: 0.9rem;
  line-height: 1.7;
  color: rgba(245,240,232,0.82);
  white-space: pre-line;
}

.spec-meta-grid {
  display: grid;
  grid-template-columns: repeat(2, minmax(0, 1fr));
  gap: 0.65rem;
  margin-top: 0.25rem;
}

.spec-meta-item {
  background: rgba(245,240,232,0.03);
  border: 1px solid rgba(200,134,42,0.12);
  padding: 0.65rem 0.8rem;
  border-radius: 2px;
}

.spec-meta-key {
  font-family: var(--font-mono);
  font-size: 0.56rem;
  letter-spacing: 0.14em;
  text-transform: uppercase;
  color: rgba(245,240,232,0.4);
  display: block;
}

.spec-meta-val {
  font-size: 0.82rem;
  font-weight: 500;
  color: #f5f0e8;
  margin-top: 0.15rem;
  display: block;
}

.spec-modal-footer {
  margin-top: auto;
  padding-top: 0.85rem;
  border-top: 1px solid rgba(200,134,42,0.12);
  display: flex;
  align-items: center;
  justify-content: flex-end;
  gap: 0.75rem;
  flex-wrap: wrap;
}

/* ============================================
   FOOTER
   ============================================ */
.footer {
  background: #080604;
  padding: 3rem clamp(1.5rem, 5vw, 4rem);
  margin-left: calc(-1 * max(16px, env(safe-area-inset-left, 0px)));
  margin-right: calc(-1 * max(16px, env(safe-area-inset-right, 0px)));
  padding-left: max(1.5rem, calc(1.5rem + env(safe-area-inset-left, 0px)));
  padding-right: max(1.5rem, calc(1.5rem + env(safe-area-inset-right, 0px)));
  border-top: 1px solid rgba(200,134,42,0.08);
}

.footer-inner {
  max-width: 1200px;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 1.5rem;
  flex-wrap: wrap;
}

.footer-brand {
  font-family: var(--font-display);
  font-size: 1.1rem;
  font-weight: 900;
  color: rgba(245,240,232,0.6);
  letter-spacing: -0.02em;
}

.footer-brand em { font-style: italic; color: var(--amber); opacity: 0.7; }

.footer-copy { font-size: 0.72rem; color: rgba(245,240,232,0.2); }

.footer-links {
  display: flex;
  gap: 1.5rem;
  list-style: none;
}

.footer-links a {
  font-size: 0.72rem;
  letter-spacing: 0.06em;
  text-transform: uppercase;
  color: rgba(245,240,232,0.25);
  text-decoration: none;
  transition: color 0.2s;
}

.footer-links a:hover { color: rgba(245,240,232,0.6); }

@media (prefers-reduced-motion: no-preference) {
  .hero-content { animation: fadeUp 0.8s cubic-bezier(0.25,0,0,1) both; }
  @keyframes fadeUp {
    from { opacity: 0; transform: translateY(24px); }
    to   { opacity: 1; transform: translateY(0); }
  }
}
</style>

<!-- ============================================
     NAVBAR
     ============================================ -->
<nav class="navbar">
  <a href="{{ url('/') }}" class="logo">
    <span class="logo-mark">Fret<em>Factory</em></span>
    <span class="logo-tagline">Est. 2024</span>
  </a>

  <ul class="nav-links">
    <li><a href="{{ url('/') }}" class="active">Beranda</a></li>
    <li><a href="#katalog">Katalog</a></li>
    @auth
      <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
      <li><a href="{{ route('produk.index') }}">Kelola Produk</a></li>
    @endauth
  </ul>

  <div class="nav-actions">
    @auth
      <form method="POST" action="{{ route('logout') }}" style="display:inline">
        @csrf
        <button type="submit" class="btn-ghost">Logout</button>
      </form>
    @endauth
    @guest
      <a href="{{ route('login') }}" class="btn-ghost">Masuk</a>
      @if (Route::has('register'))
        <a href="{{ route('register') }}" class="btn-primary">Daftar</a>
      @endif
    @endguest
  </div>
</nav>

<!-- ============================================
     HERO
     ============================================ -->
<header class="hero">
  <div class="hero-bg">
    <svg class="hero-ornament" viewBox="0 0 300 500" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
      <ellipse cx="150" cy="360" rx="100" ry="85" fill="currentColor"/>
      <ellipse cx="150" cy="250" rx="70" ry="60" fill="currentColor"/>
      <rect x="110" y="295" width="80" height="40" rx="4" fill="currentColor"/>
      <rect x="135" y="90" width="30" height="175" rx="6" fill="currentColor"/>
      <rect x="122" y="40" width="56" height="60" rx="8" fill="currentColor"/>
      <circle cx="118" cy="55" r="8" fill="currentColor"/>
      <circle cx="118" cy="75" r="8" fill="currentColor"/>
      <circle cx="118" cy="95" r="8" fill="currentColor"/>
      <circle cx="182" cy="55" r="8" fill="currentColor"/>
      <circle cx="182" cy="75" r="8" fill="currentColor"/>
      <circle cx="182" cy="95" r="8" fill="currentColor"/>
      <circle cx="150" cy="345" r="28" fill="#0e0c09" opacity="0.5"/>
      <circle cx="150" cy="345" r="28" stroke="currentColor" stroke-width="2" fill="none"/>
      <line x1="140" y1="90" x2="140" y2="310" stroke="currentColor" stroke-width="1" opacity="0.5"/>
      <line x1="145" y1="90" x2="145" y2="310" stroke="currentColor" stroke-width="1" opacity="0.5"/>
      <line x1="150" y1="90" x2="150" y2="310" stroke="currentColor" stroke-width="1" opacity="0.5"/>
      <line x1="155" y1="90" x2="155" y2="310" stroke="currentColor" stroke-width="1" opacity="0.5"/>
      <line x1="160" y1="90" x2="160" y2="310" stroke="currentColor" stroke-width="1" opacity="0.5"/>
      <line x1="165" y1="90" x2="165" y2="310" stroke="currentColor" stroke-width="1" opacity="0.5"/>
    </svg>
  </div>

  <div class="hero-content">
    <p class="hero-eyebrow">Koleksi Instrumen Premium</p>

    <h1 class="hero-headline">
      Suara yang<br><em>Berbicara</em>
    </h1>

    <p class="hero-sub">
      Gitar akustik, elektrik, dan bass pilihan tangan. Setiap instrumen kami pilih karena satu hal: kualitas yang terasa saat jari pertama kali menyentuh senar.
    </p>

    <div class="hero-cta-row">
      <a href="#katalog" class="btn-hero">
        Jelajahi Katalog
        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" aria-hidden="true">
          <path d="M2 6h8M6 2l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </a>
      @auth
        <a href="{{ route('produk.index') }}" class="btn-hero-ghost">Kelola Produk →</a>
      @endauth
    </div>

    <div class="hero-stats">
      <div class="stat-item">
        <div class="stat-num">{{ count($produks) }}</div>
        <div class="stat-label">Produk Aktif</div>
      </div>
      <div class="stat-item">
        <div class="stat-num">100%</div>
        <div class="stat-label">Original & Bergaransi</div>
      </div>
      <div class="stat-item">
        <div class="stat-num">🇮🇩</div>
        <div class="stat-label">Pengiriman Nasional</div>
      </div>
    </div>
  </div>
</header>

<!-- ============================================
     SEARCH + FILTER
     ============================================ -->
<section class="search-section">
  <div class="search-inner">
    <div class="search-wrap">
      <span class="search-icon" aria-hidden="true">
        <svg width="15" height="15" viewBox="0 0 15 15" fill="none">
          <circle cx="6.5" cy="6.5" r="4.5" stroke="currentColor" stroke-width="1.4"/>
          <path d="m10 10 3 3" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/>
        </svg>
      </span>
      <input
        type="search"
        id="searchInput"
        class="search-input"
        placeholder="Cari Gibson, Fender, Taylor, aksesoris…"
        onkeyup="filterProducts()"
        autocomplete="off"
      >
    </div>
    <div class="filter-chips" id="filterChips">
      <button class="chip active" onclick="filterByCategory('semua', this)">Semua</button>
      <button class="chip" onclick="filterByCategory('elektrik', this)">Elektrik</button>
      <button class="chip" onclick="filterByCategory('akustik', this)">Akustik</button>
      <button class="chip" onclick="filterByCategory('bass', this)">Bass</button>
      <button class="chip" onclick="filterByCategory('aksesoris', this)">Aksesoris</button>
    </div>
  </div>
</section>

<!-- ============================================
     CATALOG
     ============================================ -->
<main id="katalog" class="catalog-section">

  @auth
    <div class="admin-banner">
      <div class="admin-banner-info">
        <span class="admin-crown">👑</span>
        <div>
          <div class="admin-label">Admin: {{ Auth::user()->name }}</div>
          <div class="admin-sub">Akses penuh untuk manajemen stok dan produk</div>
        </div>
      </div>
      <a href="{{ route('produk.index') }}" class="btn-primary">Kelola Produk →</a>
    </div>
  @endauth

  <div class="catalog-header">
    <div class="catalog-title-group">
      <div class="catalog-eyebrow">Katalog Pilihan</div>
      <h2 class="catalog-title">Instrumen & Perlengkapan</h2>
    </div>
    <span class="catalog-count">{{ count($produks) }} produk tersedia</span>
  </div>

  <div class="product-grid" id="productGrid">
    @forelse($produks as $produk)
      @php
        $fileFoto = $produk->gambar ?? $produk->foto ?? $produk->image ?? $produk->photo ?? null;
        $fotoUrl  = '';
        if (!empty($fileFoto)) {
          $fotoUrl = filter_var($fileFoto, FILTER_VALIDATE_URL) ? $fileFoto : asset('storage/' . $fileFoto);
        }
        $namaProduk = $produk->nama ?? $produk->nama_produk ?? 'Instrumen';
        $kategori   = $produk->kategori ?? 'Guitar & Audio';
        $stok       = (int) ($produk->stok ?? 0);
        $hargaFmt   = 'Rp ' . number_format($produk->harga ?? 0, 0, ',', '.');
        $deskripsi  = trim((string) ($produk->deskripsi ?? ''));
      @endphp

      <article
        class="product-card product-item"
        tabindex="0"
        role="button"
        aria-label="Lihat detail dan spesifikasi {{ $namaProduk }}"
        data-id="{{ $produk->id }}"
        data-name="{{ strtolower($namaProduk) }}"
        data-title="{{ $namaProduk }}"
        data-kategori="{{ strtolower($kategori) }}"
        data-kategori-label="{{ $kategori }}"
        data-harga="{{ $hargaFmt }}"
        data-stok="{{ $stok }}"
        data-foto="{{ $fotoUrl }}"
        data-deskripsi="{{ $deskripsi }}"
        onclick="openSpecModal(this)"
        onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();openSpecModal(this);}"
      >
        <div class="card-img-wrap">
          @if($fotoUrl)
            <img src="{{ $fotoUrl }}" alt="{{ $namaProduk }}" loading="lazy">
          @else
            <div class="card-no-img">
              <span class="card-no-img-icon">🎸</span>
              <span class="card-no-img-label">Fret Factory</span>
            </div>
          @endif
          <span class="card-badge">{{ $kategori }}</span>
        </div>

        <div class="card-body">
          <span class="card-kategori">{{ $kategori }}</span>
          <h3 class="card-name">{{ $namaProduk }}</h3>
          <div class="card-price-row">
            <span class="card-price-currency">Rp</span>
            <span class="card-price">{{ number_format($produk->harga ?? 0, 0, ',', '.') }}</span>
          </div>
        </div>

        <div class="card-footer">
          <span class="card-stock">
            Stok: <strong>{{ $stok }} pcs</strong>
          </span>
          <span class="card-status">
            <span class="stock-dot"></span>Ready
          </span>
        </div>
      </article>

    @empty
      <div class="empty-state">
        <span class="empty-icon">🎸</span>
        <h3 class="empty-title">Belum Ada Produk</h3>
        <p class="empty-sub">Login sebagai admin untuk menambahkan instrumen ke katalog.</p>
      </div>
    @endforelse
  </div>

</main>

<!-- ============================================
     POP-UP MODAL DETAIL & SPEK PRODUK
     ============================================ -->
<div id="specModal" class="spec-modal-backdrop" role="dialog" aria-modal="true" aria-labelledby="specModalTitle" onclick="handleBackdropClick(event)">
  <div class="spec-modal">
    <button type="button" class="spec-modal-close" aria-label="Tutup detail produk" onclick="closeSpecModal()">×</button>

    <div class="spec-modal-media" id="specModalMedia">
      <img id="specModalImg" src="" alt="" style="display:none;">
      <div id="specModalNoImg" class="spec-modal-no-img">
        <span>🎸</span>
        <span>Fret Factory</span>
      </div>
    </div>

    <div class="spec-modal-body">
      <div>
        <div class="spec-modal-kat" id="specModalKat">KATEGORI</div>
        <h2 class="spec-modal-title" id="specModalTitle">Nama Instrumen</h2>
      </div>

      <div class="spec-modal-price-row">
        <div class="spec-modal-price" id="specModalPrice">Rp 0</div>
        <span class="spec-modal-stock-pill" id="specModalStock">Stok: 0 pcs</span>
      </div>

      <div>
        <div class="spec-section-label">Deskripsi & Spesifikasi</div>
        <p class="spec-desc" id="specModalDesc"></p>
      </div>

      <div class="spec-meta-grid">
        <div class="spec-meta-item">
          <span class="spec-meta-key">Kategori</span>
          <span class="spec-meta-val" id="specMetaKat">-</span>
        </div>
        <div class="spec-meta-item">
          <span class="spec-meta-key">Status Unit</span>
          <span class="spec-meta-val" id="specMetaStatus">-</span>
        </div>
        <div class="spec-meta-item">
          <span class="spec-meta-key">Jaminan</span>
          <span class="spec-meta-val">100% Original & Bergaransi</span>
        </div>
        <div class="spec-meta-item">
          <span class="spec-meta-key">Kode Produk</span>
          <span class="spec-meta-val" id="specMetaId">-</span>
        </div>
      </div>

      <div class="spec-modal-footer">
        <button type="button" class="btn-ghost" onclick="closeSpecModal()">Tutup</button>
        <a id="specModalBuyBtn" href="#" class="btn-primary">Beli Sekarang →</a>
      </div>
    </div>
  </div>
</div>

<!-- ============================================
     FOOTER
     ============================================ -->
<footer class="footer">
  <div class="footer-inner">
    <span class="footer-brand">Fret<em>Factory</em></span>
    <p class="footer-copy">© {{ date('Y') }} Fret Factory. Dibangun dengan Laravel & cinta untuk musik.</p>
    <ul class="footer-links">
      <li><a href="{{ url('/') }}">Beranda</a></li>
      <li><a href="#katalog">Katalog</a></li>
    </ul>
  </div>
</footer>

<script>
  let activeCategory = 'semua';

  function filterProducts() {
    const q = document.getElementById('searchInput').value.toLowerCase().trim();
    document.querySelectorAll('.product-item').forEach(el => {
      const name = el.dataset.name || '';
      const kat  = el.dataset.kategori || '';
      const matchSearch = !q || name.includes(q);
      const matchCat = activeCategory === 'semua' || kat.includes(activeCategory);
      el.style.display = (matchSearch && matchCat) ? 'flex' : 'none';
    });
  }

  function filterByCategory(cat, btn) {
    activeCategory = cat;
    document.querySelectorAll('#filterChips .chip').forEach(c => c.classList.remove('active'));
    btn.classList.add('active');
    filterProducts();
  }

  function openSpecModal(card) {
    const modal     = document.getElementById('specModal');
    const title     = card.dataset.title || 'Instrumen';
    const katLabel  = card.dataset.kategoriLabel || 'Guitar & Audio';
    const harga     = card.dataset.harga || 'Rp 0';
    const stok      = parseInt(card.dataset.stok || '0', 10);
    const foto      = card.dataset.foto || '';
    const deskripsi = (card.dataset.deskripsi || '').trim();
    const id        = card.dataset.id || '-';

    document.getElementById('specModalKat').textContent   = katLabel;
    document.getElementById('specModalTitle').textContent = title;
    document.getElementById('specModalPrice').textContent = harga;

    const stockPill  = document.getElementById('specModalStock');
    const metaStatus = document.getElementById('specMetaStatus');
    const buyBtn     = document.getElementById('specModalBuyBtn');

    if (stok > 0) {
      stockPill.textContent = `Ready · ${stok} pcs`;
      stockPill.classList.remove('is-empty');
      metaStatus.textContent = `Tersedia (${stok} unit)`;
      buyBtn.href = `/checkout/${id}`;
      buyBtn.textContent = 'Beli Sekarang →';
      buyBtn.style.pointerEvents = '';
      buyBtn.style.opacity = '';
    } else {
      stockPill.textContent = 'Stok Habis';
      stockPill.classList.add('is-empty');
      metaStatus.textContent = 'Sedang Kosong';
      buyBtn.href = '#';
      buyBtn.textContent = 'Stok Habis';
      buyBtn.style.pointerEvents = 'none';
      buyBtn.style.opacity = '0.5';
    }

    document.getElementById('specModalDesc').textContent = deskripsi
      ? deskripsi
      : 'Detail spesifikasi lengkap instrumen belum ditambahkan. Silakan hubungi admin untuk informasi body wood, pickup, neck profile, dan kelengkapan unit.';

    document.getElementById('specMetaKat').textContent = katLabel;
    document.getElementById('specMetaId').textContent  = `#${id}`;

    const imgEl   = document.getElementById('specModalImg');
    const noImgEl = document.getElementById('specModalNoImg');
    if (foto) {
      imgEl.src = foto;
      imgEl.alt = title;
      imgEl.style.display = 'block';
      noImgEl.style.display = 'none';
    } else {
      imgEl.removeAttribute('src');
      imgEl.style.display = 'none';
      noImgEl.style.display = 'flex';
    }

    modal.classList.add('is-open');
    document.body.style.overflow = 'hidden';
  }

  function closeSpecModal() {
    const modal = document.getElementById('specModal');
    modal.classList.remove('is-open');
    document.body.style.overflow = '';
  }

  function handleBackdropClick(event) {
    if (event.target.id === 'specModal') {
      closeSpecModal();
    }
  }

  document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape') {
      closeSpecModal();
    }
  });
</script>