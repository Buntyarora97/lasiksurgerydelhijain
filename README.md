# LASIK Surgery in Delhi — lasiksurgeryindelhi.com

Production-ready Core PHP 8 + MySQL website for Jain Eye Hospital & Laser Centre's
focused LASIK / refractive patient-education platform. Shared-hosting friendly
(cPanel / Hostinger / MilesWeb) — no frameworks, no build step.

## 1. Requirements
- PHP 8.1+ (PDO MySQL extension enabled)
- MySQL 8 / MariaDB
- Apache with mod_rewrite, mod_headers, mod_deflate

## 2. Install (5 minutes)
1. Upload all files to `public_html` (or a subfolder while staging).
2. Create a MySQL database + user in cPanel; grant ALL on that DB only.
3. Import `database/schema.sql` via phpMyAdmin.
4. Edit `includes/config.php`: DB credentials, SITE_URL, and keep `SITE_ENV` = `staging`.
5. Change the default admin password:
   - Generate: `php -r "echo password_hash('YourStrongPass', PASSWORD_DEFAULT);"`
   - Update the `admins` table row.
6. Visit `/` — site works. Admin at `/admin/`.

## 3. Email
`actions/appointment-submit.php` uses PHP `mail()` as a fallback. For reliable
delivery on shared hosting, bundle PHPMailer and switch to authenticated SMTP
(details in that file's comments).

## 4. Media checklist (before go-live)
Use only images that match the subject and label illustrative diagnostic or procedure imagery clearly. The imported project does not include the separate `new-images` folder or verified hospital-interior/exterior photos. Add approved clinic photos before presenting any image as a photograph of the centre. Keep image alt text specific and accurate.

## 5. Pre-launch verification gate (MANDATORY)
Site ships in noindex/staging mode (robots.txt disallows all; meta noindex).
Only after verifying — approved contact details, doctor credentials,
address/map pin, offered procedures, prices, timings, privacy wording — set:
- `SITE_ENV` = `production' in config.php
- remove `Disallow: /` from robots.txt
- enable HTTPS + canonical host rules in .htaccess

## 6. Security notes
- Never commit real DB/SMTP passwords; keep config outside version control.
- Admin: change default password, consider restricting /admin by IP in .htaccess.
- Backups: export DB weekly (cPanel cron + mysqldump or phpMyAdmin).

## 7. Project layout
See the file tree in the master spec; key paths:
- Public pages: site root (*.php)
- Shared chrome: `includes/` (header, footer, functions, config, db)
- Form handler: `actions/appointment-submit.php`
- Admin: `admin/` (login, dashboard, appointments)
- Design system: `assets/css/style.css` (The Clarity Aperture)
- Interactions: `assets/js/main.js` (aperture canvas, mega menu, checklist)
- DB: `database/schema.sql`
