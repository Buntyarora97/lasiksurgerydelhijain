# LASIK Surgery in Delhi

## Run locally in Replit

- Runtime: PHP 8.2 with PDO MySQL support.
- Workflow: `Start application`
- Command: `php -S 0.0.0.0:5000 -t .`
- Preview: open the Replit web preview at port 5000.

## Project notes

- This is a framework-free Core PHP/MySQL website.
- `includes/config.php` is the central public configuration file. It is intentionally in staging/noindex mode until the launch verification checklist is completed.
- The final centre address is `AG 152, Shalimar Bagh, Delhi 110088`; keep all new location copy aligned with `ADDRESS_LINE`.
- Appointment persistence and the admin dashboard require the MySQL schema in `database/schema.sql` and database credentials supplied through environment variables.
- Supplied media lives in `assets/images/`. Use only approved real photography as real clinical/facility imagery; abstract procedure illustrations should remain clearly educational.