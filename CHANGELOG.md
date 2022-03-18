# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Changed
* Use [Args](https://github.com/johnbillion/args) to populate post type, taxonomy, and meta arguments.

## [0.2.1] - 2022-03-11

### Fixed
* Remove random output in `Taxonomy` class.

## [0.2.0] - 2022-03-11

### Changed
* Bump required PHP version to 7.4.
* Allow the `show_in_rest` argument in `TermMeta` and `PostMeta` to return an array for complex meta values.

### Fixed
* Add missing types for class constants.
* Fix incorrect namespace for interfaces.

## [0.1.0] - 2021-05-20

### Added
* Initial version.

[Unreleased]: https://github.com/wearerequired/common-php/compare/0.2.1...HEAD
[0.2.1]: https://github.com/wearerequired/common-php/compare/0.2.0...0.2.1
[0.2.0]: https://github.com/wearerequired/common-php/compare/0.1.0...0.2.0
[0.1.0]: https://github.com/wearerequired/common-php/compare/e3f7c76dd7579fec490b4fd0553629fc2159e4f2...0.1.0
