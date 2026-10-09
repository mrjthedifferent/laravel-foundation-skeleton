# Working in this project

This project is built on [Laravel Foundation](https://github.com/mrjthedifferent/laravel-foundation). Before writing UI,
modules or dashboard code, read **`.ai/guidelines/foundation/foundation-overview.md`**: it lists the ten rules and links the
rest (`components-reference.md` for every Blade component, `ui-components.md`, `views.md`, `frontend-js.md`, `dashboard.md`,
`theming.md`, and the back-end guides).

Reuse the package's components and classes instead of writing markup or CSS by hand. Never edit `vendor/`,
`public/assets/` or the files under `.ai/guidelines/foundation/` (`php artisan foundation:sync` overwrites them).
