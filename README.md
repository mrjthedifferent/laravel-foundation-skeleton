# Laravel Foundation Skeleton

A fresh Laravel 13 application already wired to
[Laravel Foundation](https://github.com/mrjthedifferent/laravel-foundation). Sign-in, users,
roles, settings, notifications, activity logs, backups and the admin UI come from the package
and are not copied here, so they stay up to date with `composer update`.

## Start a project

Use the **Use this template** button on GitHub, or clone it:

```bash
git clone https://github.com/mrjthedifferent/laravel-foundation-skeleton my-project
cd my-project
composer install
composer run setup
php artisan foundation:super-admin
composer run dev
```

`foundation:super-admin` asks for a name, email and password and creates the first Super Admin;
sign in with it at `/login`. The default database is SQLite; set `DB_*` in `.env` for MySQL or
PostgreSQL before `composer run setup`.

## Build your feature

```bash
php artisan foundation:make-module Invoice
composer dump-autoload && php artisan migrate && php artisan db:seed
```

That gives you `Modules/Invoice` with a model, migration, policy, controller, routes, an index
page, a sidebar entry, permissions and a test. Conventions are in `.ai/guidelines/foundation/`,
which AI coding assistants pick up too.

## What belongs here

- `app/Models/User.php` extends the foundation user. Add project relations and rules there.
- `bootstrap/app.php` applies the foundation's middleware and exception handling; add your
  own middleware inside the closure.
- `config/sidebar.php` lists the sidebar parents for this project.
- `modules_statuses.json` switches modules on and off. Otp and ErrorReport are optional:
  `php artisan module:enable Otp`.
- To change a shared view for this project only, create the same path under `resources/views`.

`pint.json`, `.scripts/laravel.sh` and `.ai/guidelines/foundation/` are kept current by
`php artisan foundation:sync`, which runs on `composer update`. To maintain one yourself, list
it under `sync.except` in `config/foundation.php`.

## Updating

```bash
composer update mrjthedifferent/laravel-foundation
php artisan migrate
```

## License

MIT. See the [foundation's notices](https://github.com/mrjthedifferent/laravel-foundation/blob/main/THIRD-PARTY-NOTICES.md)
for the bundled front-end libraries.
