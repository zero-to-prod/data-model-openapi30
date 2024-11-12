# `Zerotoprod\DataModelGenerator`

[![Repo](https://img.shields.io/badge/github-gray?logo=github)](https://github.com/zero-to-prod/data-model-openapi30)
[![GitHub Actions Workflow Status](https://img.shields.io/github/actions/workflow/status/zero-to-prod/data-model-openapi30/test.yml?label=tests)](https://github.com/zero-to-prod/data-model-openapi30/actions)
[![Packagist Downloads](https://img.shields.io/packagist/dt/zero-to-prod/data-model-openapi30?color=blue)](https://packagist.org/packages/zero-to-prod/data-model-openapi30/stats)
[![Packagist Version](https://img.shields.io/packagist/v/zero-to-prod/data-model-openapi30?color=f28d1a)](https://packagist.org/packages/zero-to-prod/data-model-openapi30)
[![License](https://img.shields.io/packagist/l/zero-to-prod/data-model-openapi30?color=red)](https://github.com/zero-to-prod/data-model-openapi30/blob/main/LICENSE.md)

DataModels for OpenAPI 3.0.*

## Testing

```shell
./vendor/bin/phpunit
```
## Validation
### [4.7.1](https://spec.openapis.org/oas/v3.0.4.html#openapi-object)
This is the root object of the OpenAPI Description.

| Field        | Type                            | Status             |
|--------------|---------------------------------|--------------------|
| openapi      | `string`                        | :white_check_mark: |
| info         | `Info Object`                   | :white_check_mark: |
| servers      | `[Server Object]`               | :white_check_mark: |
| paths        | `Paths Object`                  |                    |
| components   | `Components Object`             |                    |
| security     | `Security Requirement Object`   |                    |
| tags         | `Tag Object`                    |                    |
| externalDocs | `External Documentation Object` |                    |

### [4.7.2](https://spec.openapis.org/oas/v3.0.4.html#info-object)
The object provides metadata about the API. 
The metadata MAY be used by the clients if needed, and MAY be presented in editing or 
documentation generation tools for convenience.

| Field          | Type             | Status             |
|----------------|------------------|--------------------|
| title          | `string`         | :white_check_mark: |
| description    | `string`         | :white_check_mark: |
| termsOfService | `string`         | :white_check_mark: |
| contact        | `Contact Object` |                    |
| license        | `License Object` |                    |
| version        | `string`         | :white_check_mark: |

### [4.7.3](https://spec.openapis.org/oas/v3.0.4.html#contact-object)
The object provides metadata about the API.
The metadata MAY be used by the clients if needed, and MAY be presented in editing or
documentation generation tools for convenience.

| Field | Type     | Status             |
|-------|----------|--------------------|
| name  | `string` | :white_check_mark: |
| url   | `string` |                    |
| email | `email`  |                    |
