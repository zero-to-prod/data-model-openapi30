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

### [4.7.1 OpenAPI Object](https://spec.openapis.org/oas/v3.0.4.html#openapi-object)

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

### [4.7.2 Info Object](https://spec.openapis.org/oas/v3.0.4.html#info-object)

The object provides metadata about the API.

| Field          | Type             | Status             |
|----------------|------------------|--------------------|
| title          | `string`         | :white_check_mark: |
| description    | `string`         | :white_check_mark: |
| termsOfService | `string`         | :white_check_mark: |
| contact        | `Contact Object` | :white_check_mark: |
| license        | `License Object` | :white_check_mark: |
| version        | `string`         | :white_check_mark: |

### [4.7.3 Contact Object](https://spec.openapis.org/oas/v3.0.4.html#contact-object)

Contact information for the exposed API.

| Field | Type     | Status             |
|-------|----------|--------------------|
| name  | `string` | :white_check_mark: |
| url   | `string` | :white_check_mark: |
| email | `email`  | :white_check_mark: |

### [4.7.4 License Object](https://spec.openapis.org/oas/v3.0.4.html#license-object)

License information for the exposed API.

| Field | Type     | Status             |
|-------|----------|--------------------|
| name  | `string` | :white_check_mark: |
| url   | `string` | :white_check_mark: |

### [4.7.5 Server Object](https://spec.openapis.org/oas/v3.0.4.html#server-object)

An object representing a Server.

| Field       | Type                                    | Status             |
|-------------|-----------------------------------------|--------------------|
| url         | `string`                                | :white_check_mark: |
| description | `string`                                | :white_check_mark: |
| variables   | Map[`string`, `Server Variable Object`] | :white_check_mark: |

### [4.7.6 Server Object](https://spec.openapis.org/oas/v3.0.4.html#server-variable-object)

An object representing a Server Variable for server URL template substitution.

| Field       | Type       | Status             |
|-------------|------------|--------------------|
| enum        | [`string`] | :white_check_mark: |
| default     | `string`   | :white_check_mark: |
| description | `string`   | :white_check_mark: |

### [4.7.7 Server Object](https://spec.openapis.org/oas/v3.0.4.html#components-object)

Holds a set of reusable objects for different aspects of the OAS.

### [4.7.9 Path Item Object](https://spec.openapis.org/oas/v3.0.4.html#path-item-object)

Describes the operations available on a single path.

| Field       | Type                                       | Status |
|-------------|--------------------------------------------|--------|
| $ref        | `string`                                   |        |
| summary     | `string`                                   |        |
| description | `string`                                   |        |
| get         | `Operation Object`                         |        |
| put         | `Operation Object`                         |        |
| post        | `Operation Object`                         |        |
| delete      | `Operation Object`                         |        |
| options     | `Operation Object`                         |        |
| head        | `Operation Object`                         |        |
| patch       | `Operation Object`                         |        |
| trace       | `Operation Object`                         |        |
| servers     | `Server Object`                            |        |
| parameters  | [`Parameter Object` \| `Reference Object`] |        |

### [4.7.10 Operation Object](https://spec.openapis.org/oas/v3.0.4.html#operation-object)

Describes a single API operation on a path.

| Field        | Type                                                   | Status             |
|--------------|--------------------------------------------------------|--------------------|
| tags         | [`string`]                                             | :white_check_mark: |
| summary      | `string`                                               | :white_check_mark: |
| description  | `string`                                               | :white_check_mark: |
| externalDocs | `External Documentation Object`                        | :white_check_mark: |
| operationId  | `string`                                               | :white_check_mark: |
| parameters   | [`Parameter Object` \| `Reference Object`]             |                    |
| requestBody  | `Request Body Object` \| `Reference Object`            |                    |
| responses    | `Responses Object`                                     |                    |
| callbacks    | Map[`string`, `Callback Object` \| `Reference Object`] |                    |
| deprecated   | `boolean`                                              |                    |
| security     | [`Security Requirement Object`]                        |                    |
| servers      | `Server Object`                                        |                    |

### [4.7.11 External Documentation Object](https://spec.openapis.org/oas/v3.0.4.html#external-documentation-object)

Allows referencing an external resource for extended documentation.

| Field       | Type     | Status             |
|-------------|----------|--------------------|
| description | `string` | :white_check_mark: |
| url         | `string` | :white_check_mark: |

### [4.7.12 Parameter Object](https://spec.openapis.org/oas/v3.0.4.html#parameter-object)

Describes a single operation parameter.

| Field           | Type                                                   | Status             |
|-----------------|--------------------------------------------------------|--------------------|
| name            | `string`                                               | :white_check_mark: |
| in              | `string`                                               | :white_check_mark: |
| description     | `string`                                               | :white_check_mark: |
| required        | `boolean`                                              | :white_check_mark: |
| deprecated      | `boolean`                                              | :white_check_mark: |
| allowEmptyValue | [`boolean`]                                            | :white_check_mark: |
| style           | `string`                                               | :white_check_mark: |
| explode         | `boolean`                                              | :white_check_mark: |
| allowReserved   | `boolean`                                              | :white_check_mark: |
| schema          | `Schema Object` \| `Reference Object`                  | :white_check_mark: |
| example         | Any                                                    | :white_check_mark: |
| examples        | Map[ `string`, `Example Object` \| `Reference Object`] | :white_check_mark: |
| content         | Map[string, Media Type Object]                         |                    |

### [4.7.14 Media Type Object](https://spec.openapis.org/oas/v3.0.4.html#media-type-object)

Each Media Type Object provides schema and examples for the media type identified by its key.

| Field    | Type                                                   | Status             |
|----------|--------------------------------------------------------|--------------------|
| schema   | `Schema Object` \| `Reference Object`                  | :white_check_mark: |
| example  | Any                                                    | :white_check_mark: |
| examples | Map[ `string`, `Example Object` \| `Reference Object`] | :white_check_mark: |
| encoding | Map[`string`, `Encoding Object`]                       | :white_check_mark: |

### [4.7.15 Encoding Object](https://spec.openapis.org/oas/v3.0.4.html#encoding-object)

A single encoding definition applied to a single schema property..

| Field         | Type                                                 | Status             |
|---------------|------------------------------------------------------|--------------------|
| contentType   | `string`                                             | :white_check_mark: |
| headers       | Map[`string`, `Header Object` \| `Reference Object`] | :white_check_mark: |
| style         | `string`                                             | :white_check_mark: |
| explode       | `boolean`                                            | :white_check_mark: |
| allowReserved | `boolean`                                            | :white_check_mark: |

### [4.7.19 XML Object](https://spec.openapis.org/oas/v3.0.4.html#example-object)

An object grouping an internal or external example value with basic summary and description metadata.

| Field         | Type     | Status             |
|---------------|----------|--------------------|
| summary       | `string` | :white_check_mark: |
| description   | `string` | :white_check_mark: |
| value         | Any      | :white_check_mark: |
| externalValue | `string` | :white_check_mark: |

### [4.7.21 XML Object](https://spec.openapis.org/oas/v3.0.4.html#example-object)

Describes a single header for HTTP responses and for individual parts in multipart representations.

| Field       | Type                                                   | Status             |
|-------------|--------------------------------------------------------|--------------------|
| description | `string`                                               | :white_check_mark: |
| required    | `boolean`                                              | :white_check_mark: |
| deprecated  | `boolean`                                              | :white_check_mark: |
| style       | `string`                                               | :white_check_mark: |
| explode     | `boolean`                                              | :white_check_mark: |
| schema      | `Schema Object` \| `Reference Object`                  | :white_check_mark: |
| example     | Any                                                    | :white_check_mark: |
| examples    | Map[ `string`, `Example Object` \| `Reference Object`] | :white_check_mark: |

### [4.7.23 Reference Object](https://spec.openapis.org/oas/v3.0.4.html#reference-object)

A simple object to allow referencing other components in the OpenAPI Description, internally and externally.

| Field | Type     | Status             |
|-------|----------|--------------------|
| $ref  | `string` | :white_check_mark: |

### [4.7.24 Schema Object](https://spec.openapis.org/oas/v3.0.4.html#schema-object)

The Schema Object allows the definition of input and output data types.

| Field         | Type                            | Status             |
|---------------|---------------------------------|--------------------|
| nullable      | `boolean`                       | :white_check_mark: |
| discriminator | `Discriminator Object`          | :white_check_mark: |
| readOnly      | `boolean`                       | :white_check_mark: |
| writeOnly     | `boolean`                       | :white_check_mark: |
| xml           | `XML Object`                    | :white_check_mark: |
| externalDocs  | `External Documentation Object` | :white_check_mark: |
| example       | Any                             | :white_check_mark: |
| deprecated    | `boolean`                       | :white_check_mark: |

### [4.7.25 Discriminator Object](https://spec.openapis.org/oas/v3.0.4.html#discriminator-object)

When request bodies or response payloads may be one of a number of different schemas,
a Discriminator Object gives a hint about the expected schema of the document.

| Field        | Type                    | Status             |
|--------------|-------------------------|--------------------|
| propertyName | `string`                | :white_check_mark: |
| mapping      | Map[`string`, `string`] | :white_check_mark: |

### [4.7.26 XML Object](https://spec.openapis.org/oas/v3.0.4.html#xml-object)

A metadata object that allows for more fine-tuned XML model definitions.

| Field     | Type      | Status             |
|-----------|-----------|--------------------|
| name      | `string`  | :white_check_mark: |
| namespace | `string`  | :white_check_mark: |
| prefix    | `string`  | :white_check_mark: |
| attribute | `boolean` | :white_check_mark: |
| wrapped   | `boolean` | :white_check_mark: |
