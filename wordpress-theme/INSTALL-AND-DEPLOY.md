# Pragathi Power Solutions — WordPress Theme

A custom, self-contained WordPress theme that reproduces the full PPS solar
website (6 pages) using the brand colours sampled from your logo.

**Theme folder:** `pragathi-power-solutions/`
**Installable file:** `pragathi-power-solutions.zip`

---

## What's inside

```
pragathi-power-solutions/
├── style.css            ← theme header + all design (logo/solar palette)
├── functions.php        ← setup, asset loading, Customizer, auto page+menu setup
├── header.php           ← sticky navbar with the full PPS logo
├── footer.php           ← footer + floating WhatsApp button
├── front-page.php       ← Home (hero, services, benefits, calculator, process,
│                            TATA-partner, testimonials, FAQ, CTA)
├── page-about.php       ← About
├── page-services.php    ← Services
├── page-projects.php    ← Projects
├── page-gallery.php     ← Gallery
├── page-contact.php     ← Contact (info cards, form→WhatsApp, map, FAQ)
├── page.php / index.php / 404.php
├── inc/
│   ├── data.php             ← all site content (services, FAQs, projects…)
│   ├── icons.php            ← inline SVG icon set
│   └── template-helpers.php ← reusable section/card/calculator renderers
├── assets/
│   ├── js/main.js       ← nav, FAQ accordion, savings calculator, form
│   └── img/             ← logo (full + mark), icon, OG image
├── screenshot.png       ← shown in the WP theme picker
└── readme.txt
```

---

## Install (the 60-second path)

1. WordPress admin → **Appearance → Themes → Add New → Upload Theme**.
2. Upload **`pragathi-power-solutions.zip`** → **Install Now** → **Activate**.
3. Done. On activation the theme automatically:
   - creates the **Home, About, Services, Projects, Gallery, Contact** pages,
   - sets **Home** as the front page,
   - builds a **Primary** menu and attaches it to the header.

Open the site — the whole thing is live.

> Permalinks: if any inner page shows "Not Found", go to
> **Settings → Permalinks → Save Changes** once to flush the rewrite rules.

---

## Edit your details (no code)

**Appearance → Customize → "Pragathi: Company Details"** lets you change:
phone, WhatsApp link, email, address, and the Facebook / Instagram / YouTube /
LinkedIn URLs. To swap the logo, use **Customize → Site Identity → Logo**
(falls back to the bundled PPS logo if none is set).

---

## Deploy to live hosting

**Shared hosting / cPanel (most common for WordPress):**
- Already have WordPress installed → just upload the ZIP via the admin (steps above).
- Or upload the unzipped `pragathi-power-solutions/` folder to
  `wp-content/themes/` via the cPanel File Manager or FTP, then activate it in
  **Appearance → Themes**.

**Managed WordPress (Hostinger, SiteGround, WP Engine, Kinsta, etc.):**
- Use their dashboard's "Upload Theme" option with the same ZIP.

**No WordPress yet?** Install WordPress first (one-click on most hosts), then
follow the install steps above.

---

## Preview locally with Docker (no hosting needed)

A `docker-compose.yml` is included that runs WordPress + MariaDB with this theme
mounted live and auto-activated.

```bash
cd "wordpress-theme"
docker compose up -d        # first run pulls images (~2 min)
```

Then open **http://localhost:8080/** — the full site is live.
Admin: **http://localhost:8080/wp-admin** (user `admin`, password `admin`).

The theme folder is bind-mounted, so any edit you make to the PHP/CSS/JS shows
up on the next page refresh. To stop / reset:

```bash
docker compose down          # stop (keeps data)
docker compose down -v       # stop and wipe the database/site
```

---

## Notes

- The contact form and the floating button open **WhatsApp** with the enquiry
  pre-filled — no email server or plugin needed. (Want enquiries by email or
  stored in WP instead? That can be added with Contact Form 7 / WPForms.)
- The map uses a free OpenStreetMap embed; replace the `iframe` `src` in
  `page-contact.php` with a Google Maps embed if you prefer.
- Pure PHP + vanilla CSS/JS. No build step, no Node, no page builder.
