# Changelog

Fixes to the skeleton's own files. A project created from the skeleton keeps the files as
they were that day, so each entry says what to change in a project created before it.
Changes to the foundation itself are in its
[CHANGELOG](https://github.com/mrjthedifferent/laravel-foundation/blob/main/CHANGELOG.md)
and arrive with `composer update`.

## 2026-09-27

- **Empty `resources/views` and `database/migrations` are kept.** Git does not store empty
  folders, so projects were created without them and `php artisan optimize` failed at
  `view:cache`. Foundation 1.5.4 no longer needs the views folder, but a project can still
  create both: `mkdir resources/views database/migrations`.
- CI now runs `php artisan optimize`, so a missing path fails the build.

## 2026-09-26

- **`composer run setup` skipped the frontend.** The script called `@npm install` and
  `@npm run build`; Composer reads `@npm` as another Composer script, which does not exist,
  so neither ran. In `composer.json`, under `scripts.setup`, remove the `@` from both lines:

  ```json
  "npm install --ignore-scripts",
  "npm run build"
  ```
