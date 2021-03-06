## [8.1.0] - 2017-11-16
### Added
- Added SortType as enum to config. Added sorting in buildForm-Function to be backwards compatible @andre.varelmann

## [8.0.0] - 2017-11-03
### Added
- Add TermNormalizerCollection and tag `best_it_commercetools_filter.term_normalizer` @chowanski
- Add FacetFilterType configuration for category normalizer @chowanski
- Add SkipTermException possibility for TermNormalizer if you want to skip the term @chowanski
- Add `base_category_query` for defining a base category via config @chowanski

### Removed
- Remove CategoryListener and EnumAttributeListener - normalizer now injected directly via the term normalizer tag @chowanski
- Remove event dispatcher from FacetCollectionFactory (use TermNormalizer tag and interface instead) @chowanski
- Remove configuration for `normalizer_id` @chowanski

### Changed
- TermNormalizerInterface has a new additional argument: SearchContext @chowanski

## [7.1.0] - 2017-10-26
### Added
- Add SetType handling for EnumAttributeNormalizer @chowanski
- Add search keyword for products request events @chowanski

## [7.0.0] - 2017-10-06
### Added
- New argument for filter manager / suggest manager for defining search language @chowanski

### Removed
- Language from commercetools client will be ignored @chowanski

### Bugfix
- Fix wrong facet results which caused filter combinations with zero products @chowanski
- Fix wrong facet sorting (high to low) @chowanski
- Fix wrong ltext facet definition @chowanski

## [6.1.0] - 2017-10-05
### Added
- Add new event to collect and manipulate facet terms (see FilterEvent.php) @chowanski
- New interface for term manipulation: _TermNormalizerInterface_ @chowanski
- Detailed configuration (service id, cache id, cache time, state) for enum term normalization @chowanski
- Detailed configuration (service id, cache id, cache time, state) for category term normalization @chowanski

### Changed
- Sorting query can be null for "no-sorting" / "relevance sorting" @chowanski

### Deprecated
- Global cache time from config (can now defined for each service separate) @chowanski

## [6.0.0] - 2017-09-25
### Added
- Added fuzzy config for search and suggest / with optional fuzzy level @chowanski
- All Result classes now also contain the origin commercetools response @chowanski
- Add config class for suggest

### Changed
- FilterManagerInterface now return a SearchResult instead of old Result class (Breaking Change!) @chowanski
- Suggest and Keywords return a result class (KeywordsResult / SuggestResult) instead of array (Breaking Change!) @chowanski
- Hard localization in search for 'de' removed / now all languages of the commercetools client will be used for full-text keywords (Breaking Change!) @chowanski
- Models refactored and have subdirectories (Breaking Change!) @chowanski

## [5.1.0] - 2017-09-18
### Added
- Add config flag to mark matching variants.

## [5.0.1] - 2017-08-24
### Bugfix
- Added bugfix for undefined index.

## [5.0.0] - 2017-08-17
### Added
- Added caching for enum attributes.

## [4.1.0] - 2017-07-19
### Added
- Adding config option to add term count to label. @bestit-tkellner

## [4.0.0] - 2017-07-14
### Added
- Adding improved functions for sorting, pagination and views. @bestit-tkellner

## [3.2.1] - 2017-07-13
### Added
- Adding functionality for form labels for (l)enums @bestit-tkellner

## [3.2.0] - 2017-05-22
### Added
- Add FilterUrlGeneratorInterface @chowanski
- Add DefaultFilterUrlGenerator @chowanski
- Add Changelog.md @chowanski
- Add ResetType @chowanski

### Deprecated
- Property 'route' of Context object will be removed @chowanski

## [3.1.0] - 2017-05-15
### Added
- Initial stable release @chowanski