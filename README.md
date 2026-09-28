# Ferdi Akbar Nasution — Portfolio

Personal portfolio website for **Ferdi Akbar Nasution** (Network Engineering & Cybersecurity | Backend & Database Developer), built with:

- **Backend**: Laravel 13 (PHP 8.4)
- **Database**: PostgreSQL 17
- **Frontend**: Blade + Tailwind CSS 4 (via Vite)
- **Deployment**: Docker (multi-stage build) + Docker Compose

All portfolio content (skills, experience, projects, certifications) lives in PostgreSQL, seeded from `database/seeders/PortfolioSeeder.php`. Profile/contact details live in `config/portfolio.php`.

## Run with Docker (recommended)

```bash
docker compose up -d --build
```

Then open <http://localhost:8000>.

The app container waits for PostgreSQL, runs migrations, and seeds the portfolio content automatically on startup. The seeder is idempotent, so restarts are safe.

## Local development

Requires PHP 8.3+, Composer, Node 20+, and a running PostgreSQL with the credentials from `.env`.

```bash
composer install
npm install
php artisan migrate --seed
composer run dev   # serves app + vite dev server
```

## Editing content

| Content | Where |
|---|---|
| Name, contact, summary, services, education | `config/portfolio.php` |
| Skills, experience, projects, certifications | `database/seeders/PortfolioSeeder.php` |
| Page layout & styling | `resources/views/home.blade.php` |

After changing the seeder, re-run `php artisan db:seed` (or restart the Docker container).

## Deploy from GitHub

### GitHub Pages (free public portfolio)

The repository includes a static version in `docs/index.html` specifically for GitHub Pages. It is deployed by `.github/workflows/deploy-pages.yml`, which also copies the profile image and public certificate PDFs to the published site.

1. Create a public GitHub repository named `FerdieF.github.io` for the short URL `https://ferdief.github.io`.
2. Push the `main` branch to that repository.
3. In **Settings → Pages**, select **GitHub Actions** as the publishing source.
4. The workflow publishes the site after every push to `main`.

The Laravel application remains in this repository for local development and as a fuller source version. GitHub Pages serves only the static `docs/` portfolio, so it needs no PHP runtime or PostgreSQL database.

### PHP-capable hosting

If you later need live Laravel features or a database-backed site, deploy the Laravel app to a PHP-capable platform instead.

### Laravel Cloud

1. Push this repository to GitHub.
2. Create an application in Laravel Cloud and connect the repository's `main` branch.
3. Add a PostgreSQL database resource.
4. Set the production environment variables in Laravel Cloud, including `APP_KEY`, `APP_URL`, and `APP_ENV=production`.
5. Deploy. The included Dockerfile builds the frontend assets and serves the Laravel `public` directory.

### Railway

1. Create a new Railway project and choose **Deploy from GitHub repo**.
2. Add a PostgreSQL service and configure the Laravel service with production environment variables.
3. Set `APP_KEY`, `APP_ENV=production`, `APP_DEBUG=false`, `APP_URL`, and the `DB_*` values supplied by Railway.
4. Generate a public domain for the Laravel service, then deploy.

Never commit `.env`. The four public certificate PDFs in `public/certificates/` are intentionally tracked so they remain viewable on the deployed website.
