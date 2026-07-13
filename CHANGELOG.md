# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

## [Unreleased](https://github.com/orisai/cron-expression-explainer/compare/1.1.1...v1.x)

### Added

- `de`, `es`, `fr`, `it`, `nl`, `pl`, `pt`, `ru`, `tr` and `uk` locales
- `ja`, `ko` and `zh` locales
- Translation files control sentence part order (`parts-order`) and terminal punctuation (`sentence-end`)

### Changed

- `en` locale - more natural phrasing (e.g. `on the last day of the month` instead of `on a last day-of-month`)
- Plural unit labels for lists of values in most locales (e.g. `at minutes 1 and 2` instead of `at minute 1 and 2`)
- `ja` and `zh` locales - contextual connectors (e.g. 「12月の月曜日に」, 「12月每天22:00」)
- Day-of-month values and lists use ordinals with a trailing unit label where natural — also `tr` minute lists and `uk` hours (e.g. `on the 1st and 2nd day of the month` instead of `on days 1 and 2`)

### Fixed

- Explanation starts with an uppercase letter also in locales written in non-latin scripts (e.g. cyrillic)
- `cs` locale - hour prefix vocalization for hours 20 and 21 (e.g. `Ve 20:00` instead of `V 20:00`)
- `it` locale - article elision for days 8 and 11 in dates (e.g. `l’8 febbraio` instead of `il 8 febbraio`)

## [1.1.1](https://github.com/orisai/cron-expression-explainer/compare/1.1.0...1.1.1) - 2024-06-20

### Changed

- Allow PHP 8.3
- Allow PHP 8.4

## [1.1.0](https://github.com/orisai/cron-expression-explainer/compare/1.0.0...1.1.0) - 2024-04-23

### Added

- `sk` locale

### Fixed

- `cs` locale - prefix in hour:minute format (e.g. `Ve 2:00` instead of `V 02:00`)

## [1.0.0](https://github.com/orisai/cron-expression-explainer/releases/tag/1.0.0) - 2024-04-22

Initial release
