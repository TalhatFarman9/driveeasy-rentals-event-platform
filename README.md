# DriveEasy Rentals Event Platform

Live site: https://driveeasy-rentals-event-platform.onrender.com/

A small Laravel app where DriveEasy Rentals shows upcoming events and visitors can register online. Built as an internship project (Ezitech).

## Features
- Responsive landing page with hero section and event teaser
- Events table with 5 seeded sample events
- Event listing at `/events` with search (title or location) and pagination (3 events per page)
- Registration form at `/register` (name, email, event) with server-side validation, saved in the `registrations` table, with a success message

## Tech
Laravel 13, PHP 8.5, Blade, SQLite for local work, PostgreSQL on Render, Docker, Render.

## Routes
| Method | URL | What it does |
|---|---|---|
| GET | `/` | Landing page |
| GET | `/events` | Event list with search and pagination |
| GET | `/register` | Registration form (`?event=1` pre-selects an event) |
| POST | `/register` | Validates and saves a registration |

## Run it locally
You need PHP 8.3 or newer (developed on 8.5) with the fileinfo, pdo_sqlite and sqlite3 extensions enabled, plus Composer and Git.

1. `git clone https://github.com/TalhatFarman9/driveeasy-rentals-event-platform.git`
2. `cd driveeasy-rentals-event-platform`
3. `composer install`
4. Copy `.env.example` to `.env` (on Windows: `copy .env.example .env`)
5. `php artisan key:generate`
6. `php artisan migrate --seed` (say yes if it asks to create the SQLite database file)
7. `php artisan serve` and open http://127.0.0.1:8000

Useful commands:
- `php artisan migrate:fresh --seed` resets the database and adds the 5 sample events again
- `php artisan route:list` shows all routes
- In `php artisan tinker`: `\App\Models\Registration::all();` lists registrations

## Validation rules
- name: required, text, max 255 characters
- email: required, valid format (must contain @ and a domain with a dot), max 255 characters
- event: required, must be an existing event
- Validation runs on the server in `RegistrationController@store`, and errors are shown on the form

## Deploy on Render
The `Dockerfile` builds on `php:8.5-apache`, installs the Composer packages and the PostgreSQL driver. `docker/start.sh` sets the port Render gives us, caches config and views, runs `php artisan migrate --force` and then `php artisan db:seed --force`. The seeder uses `firstOrCreate`, so restarting never creates duplicate events.

1. Push the code to GitHub.
2. On Render create a **Postgres** database (Free plan). Copy its **Internal Database URL**.
3. On your computer run `php artisan key:generate --show` and copy the key.
4. On Render create a **Web Service** from the GitHub repo: language **Docker**, same region as the database, **Free** instance.
5. Add these environment variables:

| Key | Value |
|---|---|
| `APP_KEY` | the key from step 3 |
| `APP_ENV` | `production` |
| `APP_DEBUG` | `false` |
| `DB_CONNECTION` | `pgsql` |
| `DB_URL` | the Internal Database URL from step 2 |
| `SESSION_DRIVER` | `file` |
| `CACHE_STORE` | `file` |

6. Create the service, wait until it is **Live**, then open the URL.

Pushing to `main` redeploys the app if auto deploy is turned on in Render.

## Things to know
- A free Render web service sleeps after a period without visits, so the first page load can be slow.
- The free Render Postgres database is deleted after 30 days. If that happens, create a new database, update `DB_URL` and redeploy. The start script creates the tables and sample events again.
- `.env` and `APP_KEY` must never be committed to GitHub.

## Author
Talhat Farman