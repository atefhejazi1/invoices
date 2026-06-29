# Invoice Management System

A Laravel-based invoice management system for tracking invoices, payment status, sections, products, and reporting, with role-based access control and full Arabic/English localization.

## Features

- Invoice management: create, edit, delete, archive/restore, and print invoices
- Payment status tracking (paid / unpaid / partially paid) with a status-update workflow and per-status badges
- File attachments per invoice (upload, view, download, delete)
- Sections and products management, with bilingual (Arabic/English) names via `spatie/laravel-translatable`
- Reports: invoice report (filter by type, invoice number, or date range) and customer report
- Dashboard with revenue trend chart, invoice status distribution chart, overdue invoices, and top revenue-generating sections
- Role and permission management (`spatie/laravel-permission`) with English permission keys and route-level middleware
- User management with avatar uploads and active/inactive status
- In-app notifications for new invoices, with unread count and mark-as-read
- Excel export of invoices (`maatwebsite/excel`)
- Full Arabic/English localization (`mcamara/laravel-localization`), including translated UI text, permission labels, and status labels
- Authentication scaffolding via Laravel Breeze (login, registration, password reset, email verification, profile management)

## Tech Stack

- PHP 8.2+, Laravel 11
- MySQL (or any Laravel-supported database)
- Blade templates with a Bootstrap-based admin theme; Tailwind/Vite for the Breeze auth/profile pages
- `spatie/laravel-permission` — roles and permissions
- `spatie/laravel-translatable` — bilingual model attributes (sections, products)
- `mcamara/laravel-localization` — locale routing and switching
- `maatwebsite/excel` — Excel export
- `icehouse-ventures/laravel-chartjs` — dashboard charts

## Requirements

- PHP 8.2 or higher
- Composer
- Node.js and npm
- MySQL (or another database supported by Laravel)

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/atefhejazi1/invoices.git
   cd invoices
   ```

2. Install PHP and JS dependencies:
   ```bash
   composer install
   npm install
   ```

3. Create the environment file and generate the app key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Configure your database connection in `.env`, then run migrations and seeders:
   ```bash
   php artisan migrate --seed
   ```

5. Create the storage symlink (needed for user avatars and invoice attachments):
   ```bash
   php artisan storage:link
   ```

6. Build frontend assets and start the dev server:
   ```bash
   npm run dev
   php artisan serve
   ```

7. Open `http://localhost:8000` in your browser.

## Seeded Accounts

The seeders create:

- An owner account with full permissions, defined in `database/seeders/CreateAdminUserSeeder.php` — check that file for the credentials, and change them before deploying to production.
- A demo account (`admin@demo.com` / `password`) plus sample sections, products, and invoices, defined in `database/seeders/DemoSeeder.php`.

## Localization

The application supports Arabic (default) and English. Locale is handled by `mcamara/laravel-localization` via a URL prefix (e.g. `/en/dashboard`), and all UI strings, permission labels, and status labels are translated through Laravel's `lang/ar` and `lang/en` directories.

## License

This project is open-sourced under the MIT license.

## Contact

- Upwork: https://www.upwork.com/freelancers/~019155515c3b5d1ea4
- LinkedIn: https://www.linkedin.com/in/atefhejazi
