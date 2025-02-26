# Zerotoprod\DataModelOpenapi30

![](./art/logo.png)

[![Repo](https://img.shields.io/badge/github-gray?logo=github)](https://github.com/zero-to-prod/data-model-openapi30)
[![GitHub Actions Workflow Status](https://img.shields.io/github/actions/workflow/status/zero-to-prod/data-model-openapi30/test.yml?label=test)](https://github.com/zero-to-prod/data-model-openapi30/actions)
[![GitHub Actions Workflow Status](https://img.shields.io/github/actions/workflow/status/zero-to-prod/data-model-openapi30/backwards_compatibility.yml?label=backwards_compatibility)](https://github.com/zero-to-prod/data-model-openapi30/actions)
[![Packagist Downloads](https://img.shields.io/packagist/dt/zero-to-prod/data-model-openapi30?color=blue)](https://packagist.org/packages/zero-to-prod/data-model-openapi30/stats)
[![Packagist Version](https://img.shields.io/packagist/v/zero-to-prod/data-model-openapi30?color=f28d1a)](https://packagist.org/packages/zero-to-prod/data-model-openapi30)
[![License](https://img.shields.io/packagist/l/zero-to-prod/data-model-openapi30?color=red)](https://github.com/zero-to-prod/data-model-openapi30/blob/main/LICENSE.md)
[![wakatime](https://wakatime.com/badge/github/zero-to-prod/data-model-openapi30.svg)](https://wakatime.com/badge/github/zero-to-prod/data-model-openapi30)
[![Hits-of-Code](https://hitsofcode.com/github/zero-to-prod/data-model-openapi30?branch=main)](https://hitsofcode.com/github/zero-to-prod/data-model-openapi30/view?branch=main)

## Contents

- [Introduction](#introduction)
- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [Publishing DataModels](#publishing-datamodels)
- [Local Development](./LOCAL_DEVELOPMENT.md)
- [Contributing](#contributing)

## Introduction

DataModels for OpenAPI 3.0.* [specification](https://spec.openapis.org/oas/v3.0.4.html).

## Requirements

- PHP 8.1 or higher.

## Installation

Install `Zerotoprod\DataModelOpenapi30` via [Composer](https://getcomposer.org/):

```shell
composer require zero-to-prod/data-model-openapi30
```

This will add the package to your project’s dependencies and create an autoloader entry for it.

## Usage

```php
use Zerotoprod\DataModelOpenapi30\OpenApi;

$OpenApi = OpenApi::from(json_decode($json, true));

$OpenApi->components->schemas['pet']->description;
```

## Publishing DataModels

You can directly import these files into your project like this:

```shell
./vendor/bin/data-model-openapi30 app/DataModelOpenapi30
```

## Acceptance Tests

| Test                                                                                                                              | Status             |
|-----------------------------------------------------------------------------------------------------------------------------------|--------------------|
| [4.7.2.2 Info Object Example](https://spec.openapis.org/oas/v3.0.4.html#info-object-example)                                      | :white_check_mark: |
| [4.7.3.2 Contact Object Example](https://spec.openapis.org/oas/v3.0.4.html#contact-object-example)                                | :white_check_mark: |
| [4.7.4.2 License Object Example](https://spec.openapis.org/oas/v3.0.4.html#license-object-example)                                | :white_check_mark: |
| [4.7.5.2 Server Object Example](https://spec.openapis.org/oas/v3.0.4.html#server-object-example)                                  | :white_check_mark: |
| [4.7.7.2 Components Object Example](https://spec.openapis.org/oas/v3.0.4.html#components-object-example)                          | :white_check_mark: |
| [4.7.8.3 Paths Object Example](https://spec.openapis.org/oas/v3.0.4.html#paths-object-example)                                    | :white_check_mark: |
| [4.7.9.2 Path Item Object Example](https://spec.openapis.org/oas/v3.0.4.html#path-item-object-example)                            | :white_check_mark: |
| [4.7.10.2 Operation Object Example](https://spec.openapis.org/oas/v3.0.4.html#operation-object-example)                           | :white_check_mark: |
| [4.7.11.2 External Documentation Object Example](https://spec.openapis.org/oas/v3.0.4.html#external-documentation-object-example) | :white_check_mark: |
| [4.7.12.5 Parameter Object Examples](https://spec.openapis.org/oas/v3.0.4.html#parameter-object-examples)                         | :white_check_mark: |
| [4.7.13.2 Request Body Examples](https://spec.openapis.org/oas/v3.0.4.html#request-body-examples)                                 | :white_check_mark: |
| [4.7.14.2 Media Type Examples](https://spec.openapis.org/oas/v3.0.4.html#media-type-examples-0)                                   | :white_check_mark: |

## Properties

# [4.0 Specification](https://spec.openapis.org/oas/v3.0.4.html#specification)

## [4.7 Schema](https://spec.openapis.org/oas/v3.0.4.html#schema-0)

This section describes the structure of the OpenAPI Description format

### [4.7.1 OpenAPI Object](https://spec.openapis.org/oas/v3.0.4.html#openapi-object)

This is the root object of the OpenAPI Description.

#### [4.7.1.1 Fixed Fields](https://spec.openapis.org/oas/v3.0.4.html#fixed-fields)

| Field Name   | Type                                                             | Status             |
|--------------|------------------------------------------------------------------|--------------------|
| openapi      | [`string`](src/OpenApi.php)                                      | :white_check_mark: |
| info         | [`Info Object`](src/Info.php)                                    | :white_check_mark: |
| servers      | [`[Server Object]`](src/Server.php)                              | :white_check_mark: |
| paths        | [`Paths Object`](src/PathItem.php)                               | :white_check_mark: |
| components   | [`Components Object`](src/Components.php)                        | :white_check_mark: |
| security     | [`Security Requirement Object`](src/OpenApi.php)                 | :white_check_mark: |
| tags         | [[`Tag Object`](src/Tag.php)]                                    | :white_check_mark: |
| externalDocs | [`External Documentation Object`](src/ExternalDocumentation.php) | :white_check_mark: |

### [4.7.2 Info Object](https://spec.openapis.org/oas/v3.0.4.html#info-object)

The object provides metadata about the API.

#### [4.7.2.1 Fixed Fields](https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-0)

| Field Name     | Type                                | Status             |
|----------------|-------------------------------------|--------------------|
| title          | [`string`](src/Info.php)            | :white_check_mark: |
| description    | [`string`](src/Info.php)            | :white_check_mark: |
| termsOfService | [`string`](src/Info.php)            | :white_check_mark: |
| contact        | [`Contact Object`](src/Contact.php) | :white_check_mark: |
| license        | [`License Object`](src/License.php) | :white_check_mark: |
| version        | [`string`](src/Info.php)            | :white_check_mark: |

### [4.7.3 Contact Object](https://spec.openapis.org/oas/v3.0.4.html#contact-object)

Contact information for the exposed API.

#### [4.7.3.1 Fixed Fields](https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-1)

| Field | Type                        | Status             |
|-------|-----------------------------|--------------------|
| name  | [`string`](src/Contact.php) | :white_check_mark: |
| url   | [`string`](src/Contact.php) | :white_check_mark: |
| email | [`email`](src/Contact.php)  | :white_check_mark: |

### [4.7.4 License Object](https://spec.openapis.org/oas/v3.0.4.html#license-object)

License information for the exposed API.

#### [4.7.4.1 Fixed Fields](https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-2)

| Field | Type                        | Status             |
|-------|-----------------------------|--------------------|
| name  | [`string`](src/License.php) | :white_check_mark: |
| url   | [`string`](src/License.php) | :white_check_mark: |

### [4.7.5 Server Object](https://spec.openapis.org/oas/v3.0.4.html#server-object)

An object representing a Server.

#### [4.7.5.1 Fixed Fields](https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-3)

| Field Name  | Type                                                                                | Status             |
|-------------|-------------------------------------------------------------------------------------|--------------------|
| url         | [`string`](src/Server.php)                                                          | :white_check_mark: |
| description | [`string`](src/Server.php)                                                          | :white_check_mark: |
| variables   | Map[[`string`](src/Server.php), [`Server Variable Object`](src/ServerVariable.php)] | :white_check_mark: |

### [4.7.6 Server Object](https://spec.openapis.org/oas/v3.0.4.html#server-variable-object)

An object representing a Server Variable for server URL template substitution.

#### [4.7.6.1 Fixed Fields](https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-4)

| Field Name  | Type                                 | Status             |
|-------------|--------------------------------------|--------------------|
| enum        | [[`string`]](src/ServerVariable.php) | :white_check_mark: |
| default     | [`string`](src/ServerVariable.php)   | :white_check_mark: |
| description | [`string`](src/ServerVariable.php)   | :white_check_mark: |

### [4.7.7 Components Object](https://spec.openapis.org/oas/v3.0.4.html#components-object)

Holds a set of reusable objects for different aspects of the OAS.

### [4.7.7.1 Fixed Fields](https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-5)

| Field Name      | Type                                                                                                                               | Status             |
|-----------------|------------------------------------------------------------------------------------------------------------------------------------|--------------------|
| schemas         | Map[[`string`](src/Components.php), [`Schema Object`](src/Schema.php) \| [`Reference Object`](src/Reference.php)]                  | :white_check_mark: |
| responses       | Map[[`string`](src/Components.php), [`Response Object`](src/Response.php) \| [`Reference Object`](src/Reference.php)]              | :white_check_mark: |
| parameters      | Map[[`string`](src/Components.php), [`Parameter Object`](src/Parameter.php) \| [`Reference Object`](src/Reference.php)]            | :white_check_mark: |
| examples        | Map[[`string`](src/Components.php), [`Example Object`](src/Example.php) \| [`Reference Object`](src/Reference.php)]                | :white_check_mark: |
| requestBodies   | Map[[`string`](src/Components.php), [`Request Body Object`](src/RequestBody.php) \| [`Reference Object`](src/Reference.php)]       | :white_check_mark: |
| headers         | Map[[`string`](src/Components.php), [`Header Object`](src/Header.php) \| [`Reference Object`](src/Reference.php)]                  | :white_check_mark: |
| securitySchemes | Map[[`string`](src/Components.php), [`Security Scheme Object`](src/SecurityScheme.php) \| [`Reference Object`](src/Reference.php)] | :white_check_mark: |
| links           | Map[[`string`](src/Components.php), [`Link Object`](src/Link.php) \| [`Reference Object`](src/Reference.php)]                      | :white_check_mark: |
| callbacks       | Map[[`string`](src/Components.php), [`Callback Object`](src/PathItem.php) \| [`Reference Object`](src/Reference.php)]              | :white_check_mark: |

### [4.7.8 Paths Object](https://spec.openapis.org/oas/v3.0.4.html#paths-object)

Holds the relative paths to the individual endpoints and their operations.

#### [4.7.8.1 Patterned Fields](https://spec.openapis.org/oas/v3.0.4.html#patterned-fields)

| Field Name | Type                                 | Status             |
|------------|--------------------------------------|--------------------|
| /{path}    | [Path Item Object](src/PathItem.php) | :white_check_mark: |

### [4.7.9 Path Item Object](https://spec.openapis.org/oas/v3.0.4.html#path-item-object)

Describes the operations available on a single path.

#### [4.7.9.1 Fixed Fields](https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-6)

| Field Name  | Type                                                                                 | Status             |
|-------------|--------------------------------------------------------------------------------------|--------------------|
| $ref        | [`string`](src/PathItem.php)                                                         | :white_check_mark: |
| summary     | [`string`](src/PathItem.php)                                                         | :white_check_mark: |
| description | [`string`](src/PathItem.php)                                                         | :white_check_mark: |
| get         | [`Operation Object`](src/Operation.php)                                              | :white_check_mark: |
| put         | [`Operation Object`](src/Operation.php)                                              | :white_check_mark: |
| post        | [`Operation Object`](src/Operation.php)                                              | :white_check_mark: |
| delete      | [`Operation Object`](src/Operation.php)                                              | :white_check_mark: |
| options     | [`Operation Object`](src/Operation.php)                                              | :white_check_mark: |
| head        | [`Operation Object`](src/Operation.php)                                              | :white_check_mark: |
| patch       | [`Operation Object`](src/Operation.php)                                              | :white_check_mark: |
| trace       | [`Operation Object`](src/Operation.php)                                              | :white_check_mark: |
| servers     | [`Server Object`](src/Server.php)                                                    | :white_check_mark: |
| parameters  | [[`Parameter Object`](src/Parameter.php) \| [`Reference Object`](src/Reference.php)] | :white_check_mark: |

### [4.7.10 Operation Object](https://spec.openapis.org/oas/v3.0.4.html#operation-object)

Describes a single API operation on a path.

#### [4.7.10.1 Fixed Fields](https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-7)

| Field Name   | Type                                                                                                                 | Status             |
|--------------|----------------------------------------------------------------------------------------------------------------------|--------------------|
| tags         | [[`string`]](src/Operation.php)                                                                                      | :white_check_mark: |
| summary      | [`string`](src/Operation.php)                                                                                        | :white_check_mark: |
| description  | [`string`](src/Operation.php)                                                                                        | :white_check_mark: |
| externalDocs | [`External Documentation Object`](src/ExternalDocumentation.php)                                                     | :white_check_mark: |
| operationId  | [`string`](src/Operation.php)                                                                                        | :white_check_mark: |
| parameters   | [[`Parameter Object`](src/Parameter.php) \| [`Reference Object`](src/Reference.php)]                                 | :white_check_mark: |
| requestBody  | [`Request Body Object`](src/RequestBody.php) \| [`Reference Object`](src/Reference.php)                              | :white_check_mark: |
| responses    | [`Responses Object`](src/Response.php)                                                                               | :white_check_mark: |
| callbacks    | Map[[`string`](src/Operation.php), [`Callback Object`](src/PathItem.php) \| [`Reference Object`](src/Reference.php)] | :white_check_mark: |
| deprecated   | [`boolean`](src/Operation.php)                                                                                       | :white_check_mark: |
| security     | [`Security Requirement Object`]                                                                                      | :white_check_mark: |
| servers      | [[`Server Object`]](src/Server.php)                                                                                  | :white_check_mark: |

### [4.7.11 External Documentation Object](https://spec.openapis.org/oas/v3.0.4.html#external-documentation-object)

Allows referencing an external resource for extended documentation.

#### [4.7.11.1 Fixed Fields](https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-8)

| Field Name  | Type                                      | Status             |
|-------------|-------------------------------------------|--------------------|
| description | [`string`](src/ExternalDocumentation.php) | :white_check_mark: |
| url         | [`string`](src/ExternalDocumentation.php) | :white_check_mark: |

### [4.7.12 Parameter Object](https://spec.openapis.org/oas/v3.0.4.html#parameter-object)

Describes a single operation parameter.

#### [4.7.12.2 Fixed Fields](https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-9)

The rules for serialization of the parameter are specified in one of two ways. Parameter Objects _MUST_ include either a `content` field or a `schema`
field, but not both.

##### [4.7.12.2.1 Common Fixed Fields](https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields)

These fields _MAY_ be used with either `content` or `schema`.

| Field Name      | Type                             | Status             |
|-----------------|----------------------------------|--------------------|
| name            | [`string`](src/Parameter.php)    | :white_check_mark: |
| in              | [`string`](src/Parameter.php)    | :white_check_mark: |
| description     | [`string`](src/Parameter.php)    | :white_check_mark: |
| required        | [`boolean`](src/Parameter.php)   | :white_check_mark: |
| deprecated      | [`boolean`](src/Parameter.php)   | :white_check_mark: |
| allowEmptyValue | [[`boolean`]](src/Parameter.php) | :white_check_mark: |

##### [4.7.12.2.2 Fixed Fields for use with `schema`](https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema)

For simpler scenarios, a `schema` and `style` can describe the structure and syntax of the parameter.

| Field Name    | Type                                                                                                             | Status             |
|---------------|------------------------------------------------------------------------------------------------------------------|--------------------|
| style         | [`string`](src/Parameter.php)                                                                                    | :white_check_mark: |
| explode       | [`boolean`](src/Parameter.php)                                                                                   | :white_check_mark: |
| allowReserved | [`boolean`](src/Parameter.php)                                                                                   | :white_check_mark: |
| schema        | [`Schema Object`](src/Schema.php) \| [`Reference Object`](src/Reference.php)                                     | :white_check_mark: |
| example       | [Any](src/Schema.php)                                                                                            | :white_check_mark: |
| examples      | Map[ [`string`](src/Schema.php), [`Example Object`](src/Example.php) \| [`Reference Object`](src/Reference.php)] | :white_check_mark: |

##### [4.7.12.2.3 Fixed Fields for use with `content`](https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-content)

| Field Name | Type                                                                   | Status             |
|------------|------------------------------------------------------------------------|--------------------|
| content    | Map[[`string`](src/Schema.php), [`Media Type Object`](src/Schema.php)] | :white_check_mark: |

### [4.7.13 Request Body Object](https://spec.openapis.org/oas/v3.0.4.html#request-body-object)

Describes a single request body.

#### [4.7.13.1 Fixed Fields](https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-10)

| Field Name  | Type                                                                           | Status             |
|-------------|--------------------------------------------------------------------------------|--------------------|
| description | [`string`](src/RequestBody.php)                                                | :white_check_mark: |
| content     | Map[[`string`](src/RequestBody.php), [`Media Type Object`](src/MediaType.php)] | :white_check_mark: |
| required    | [`boolean`](src/RequestBody.php)                                               | :white_check_mark: |

### [4.7.14 Media Type Object](https://spec.openapis.org/oas/v3.0.4.html#media-type-object)

Each Media Type Object provides schema and examples for the media type identified by its key.

#### [4.7.14.1 Fixed Fields](https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-11)

| Field Name | Type                                                                                                               | Status             |
|------------|--------------------------------------------------------------------------------------------------------------------|--------------------|
| schema     | [`Schema Object`](src/Schema.php) \| [`Reference Object`](src/Reference.php)                                       | :white_check_mark: |
| example    | [Any](src/MediaType.php)                                                                                           | :white_check_mark: |
| examples   | Map[[`string`](src/MediaType.php), [`Example Object`](src/Example.php) \| [`Reference Object`](src/Reference.php)] | :white_check_mark: |
| encoding   | Map[[`string`](src/MediaType.php), [`Encoding Object`](src/Encoding.php)]                                          | :white_check_mark: |

### [4.7.15 Encoding Object](https://spec.openapis.org/oas/v3.0.4.html#encoding-object)

A single encoding definition applied to a single schema property.

#### [4.7.15.1 Fixed Fields](https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-12)

##### [4.7.15.1.1 Common Fixed Fields](https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-0)

These fields _MAY_ be used either with or without the RFC6570-style serialization fields defined in the next section below.

| Field Name  | Type                                                                                                            | Status             |
|-------------|-----------------------------------------------------------------------------------------------------------------|--------------------|
| contentType | [`string`](src/Encoding.php)                                                                                    | :white_check_mark: |
| headers     | Map[[`string`](src/Encoding.php), [`Header Object`](src/Header.php) \| [`Reference Object`](src/Reference.php)] | :white_check_mark: |

##### [4.7.15.1.2 Fixed Fields for RFC6570-style Serialization](https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-rfc6570-style-serialization)

| Field Name    | Type                          | Status             |
|---------------|-------------------------------|--------------------|
| style         | [`string`](src/Encoding.php)  | :white_check_mark: |
| explode       | [`boolean`](src/Encoding.php) | :white_check_mark: |
| allowReserved | [`boolean`](src/Encoding.php) | :white_check_mark: |

### [4.7.16 Responses Object](https://spec.openapis.org/oas/v3.0.4.html#responses-object)

A container for the expected responses of an operation. The container maps an HTTP response code to the expected response.

#### [4.7.16.1 Fixed Fields](https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-13)

| Field Name | Type                                                                             | Status             |
|------------|----------------------------------------------------------------------------------|--------------------|
| default    | [`Response Object`](src/Response.php) \| [`Reference Object`](src/Reference.php) | :white_check_mark: |

#### [4.7.16.2 Patterned Fields](https://spec.openapis.org/oas/v3.0.4.html#patterned-fields-0)

| Field Name       | Type                                                                             | Status             |
|------------------|----------------------------------------------------------------------------------|--------------------|
| HTTP Status Code | [`Response Object`](src/Response.php) \| [`Reference Object`](src/Reference.php) | :white_check_mark: |

### [4.7.17 Response Object](https://spec.openapis.org/oas/v3.0.4.html#response-object)

Describes a single response from an API operation, including design-time, static links to operations based on the response.

#### [4.7.17.1 Fixed Fields](https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-14)

| Field Name  | Type                                                                                                        | Status             |
|-------------|-------------------------------------------------------------------------------------------------------------|--------------------|
| description | [`string`](src/Response.php)                                                                                | :white_check_mark: |
| headers     | Map[[`string`](src/Response.php), [Header Object](src/Header.php) \| [Reference Object](src/Reference.php)] | :white_check_mark: |
| content     | Map[[`string`](src/Response.php), [Media Type Object](src/Header.php)]                                      | :white_check_mark: |
| links       | Map[[`string`](src/Response.php), [Link Object](src/Link.php) \| [Reference Object](src/Reference.php)]     | :white_check_mark: |

### [4.7.19 Example Object](https://spec.openapis.org/oas/v3.0.4.html#example-object)

An object grouping an internal or external example value with basic `summary` and `description` metadata.

#### [4.7.19.1 Fixed Fields](https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-15)

| Field Name    | Type                        | Status             |
|---------------|-----------------------------|--------------------|
| summary       | [`string`](src/Example.php) | :white_check_mark: |
| description   | [`string`](src/Example.php) | :white_check_mark: |
| value         | [Any](src/Example.php)      | :white_check_mark: |
| externalValue | [`string`](src/Example.php) | :white_check_mark: |

### [4.7.20 Link Object](https://spec.openapis.org/oas/v3.0.4.html#link-object)

The Link Object represents a possible design-time link for a response.

#### [4.7.20.1 Fixed Fields](https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-16)

| Field Name   | Type                                                                               | Status             |
|--------------|------------------------------------------------------------------------------------|--------------------|
| operationRef | [`string`](src/Link.php)                                                           | :white_check_mark: |
| operationId  | [`string`](src/Link.php)                                                           | :white_check_mark: |
| parameters   | Map[[`string`](src/Link.php), [Any](src/Link.php) \| [{expression}](src/Link.php)] | :white_check_mark: |
| requestBody  | [Any](src/Link.php) \| [{expression}](src/Link.php)                                | :white_check_mark: |
| description  | [`string`](src/Link.php)                                                           | :white_check_mark: |
| server       | [`Server Object`](src/Server.php)                                                  | :white_check_mark: |

### [4.7.21 Header Object](https://spec.openapis.org/oas/v3.0.4.html#header-object)

Describes a single header for HTTP responses and for individual parts in multipart representations.

#### [4.7.21.1 Fixed Fields](https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-17)

##### [4.7.21.1.1 Common Fixed Fields](https://spec.openapis.org/oas/v3.0.4.html#common-fixed-fields-1)

These fields _MAY_ be used with either `content` or `schema`.

| Field Name  | Type                        | Status             |
|-------------|-----------------------------|--------------------|
| description | [`string`](src/Header.php)  | :white_check_mark: |
| required    | [`boolean`](src/Header.php) | :white_check_mark: |
| deprecated  | [`boolean`](src/Header.php) | :white_check_mark: |

###### [4.7.21.1.2 Fixed Fields for use with `schema`](https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-schema-0)

For simpler scenarios, a schema and style can describe the structure and syntax of the header.

| Field Name | Type                                                                                                            | Status             |
|------------|-----------------------------------------------------------------------------------------------------------------|--------------------|
| style      | [`string`](src/Header.php)                                                                                      | :white_check_mark: |
| explode    | [`boolean`](src/Header.php)                                                                                     | :white_check_mark: |
| schema     | [`Schema Object`](src/Schema.php) \| [`Reference Object`](src/Reference.php)                                    | :white_check_mark: |
| example    | [Any](src/Header.php)                                                                                           | :white_check_mark: |
| examples   | Map[[`string`](src/Header.php), [`Example Object`](src/Example.php) \| [`Reference Object`](src/Reference.php)] | :white_check_mark: |

##### [4.7.21.1.3 Fixed Fields for use with `content`](https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-for-use-with-content-0)

For more complex scenarios, the content field can define the media type and schema of the header, as well as give examples of its use.

| Field Name | Type                                                                      | Status             |
|------------|---------------------------------------------------------------------------|--------------------|
| content    | Map[[`string`](src/Header.php), [`Media Type Object`](src/MediaType.php)] | :white_check_mark: |

### [4.7.22 Tag Object](https://spec.openapis.org/oas/v3.0.4.html#tag-object)

Adds metadata to a single tag that is used by the Operation Object. It is not mandatory to have a Tag Object per tag defined in the Operation Object
instances.

#### [4.7.22.1 Fixed Fields](https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-18)

| Field       | Type                                                             | Status             |
|-------------|------------------------------------------------------------------|--------------------|
| name        | [`string`](src/Tag.php)                                          | :white_check_mark: |
| description | [`string`](src/Tag.php)                                          | :white_check_mark: |
| description | [`External Documentation Object`](src/ExternalDocumentation.php) | :white_check_mark: |

### [4.7.23 Reference Object](https://spec.openapis.org/oas/v3.0.4.html#reference-object)

A simple object to allow referencing other components in the OpenAPI Description, internally and externally.

#### [4.7.23.1 Fixed Fields](https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-19)

| Field | Type                          | Status             |
|-------|-------------------------------|--------------------|
| $ref  | [`string`](src/Reference.php) | :white_check_mark: |

### [4.7.24 Schema Object](https://spec.openapis.org/oas/v3.0.4.html#schema-object)

The Schema Object allows the definition of input and output data types.

#### [4.7.24.1 JSON Schema Keywords](https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords)

| Field Name           | Type                                                                                                          | Status             |
|----------------------|---------------------------------------------------------------------------------------------------------------|--------------------|
| title                | [`string`](src/Schema.php)                                                                                    | :white_check_mark: |
| multipleOf           | [`number`](src/Schema.php)                                                                                    | :white_check_mark: |
| maximum              | [`number`](src/Schema.php)                                                                                    | :white_check_mark: |
| exclusiveMaximum     | [`boolean`](src/Schema.php)                                                                                   | :white_check_mark: |
| minimum              | [`number`](src/Schema.php)                                                                                    | :white_check_mark: |
| exclusiveMinimum     | [`boolean`](src/Schema.php)                                                                                   | :white_check_mark: |
| maxLength            | [`integer`](src/Schema.php)                                                                                   | :white_check_mark: |
| minLength            | [`integer`](src/Schema.php)                                                                                   | :white_check_mark: |
| pattern              | [`string`](src/Schema.php)                                                                                    | :white_check_mark: |
| maxItems             | [`integer`](src/Schema.php)                                                                                   | :white_check_mark: |
| minItems             | [`integer`](src/Schema.php)                                                                                   | :white_check_mark: |
| uniqueItems          | [`boolean`](src/Schema.php)                                                                                   | :white_check_mark: |
| maxProperties        | [`integer`](src/Schema.php)                                                                                   | :white_check_mark: |
| minProperties        | [`integer`](src/Schema.php)                                                                                   | :white_check_mark: |
| required             | [`array`](src/Schema.php)                                                                                     | :white_check_mark: |
| enum                 | [`array`](src/Schema.php)                                                                                     | :white_check_mark: |
| type                 | [`string`](src/Schema.php)                                                                                    | :white_check_mark: |
| allOf                | [`Reference Object`](src/Reference.php) \| [`Schema Object`](src/Schema.php)                                  | :white_check_mark: |
| oneOf                | [`Reference Object`](src/Reference.php) \| [`Schema Object`](src/Schema.php)                                  | :white_check_mark: |
| anyOf                | [`Reference Object`](src/Reference.php) \| [`Schema Object`](src/Schema.php)                                  | :white_check_mark: |
| not                  | [`Reference Object`](src/Reference.php) \| [`Schema Object`](src/Schema.php)                                  | :white_check_mark: |
| items                | [`Reference Object`](src/Reference.php) \| [`Schema Object`](src/Schema.php)                                  | :white_check_mark: |
| properties           | [`Reference Object`](src/Reference.php) \| [`Schema Object`](src/Schema.php)                                  | :white_check_mark: |
| additionalProperties | [`boolean`](src/Reference.php) \|[`Reference Object`](src/Reference.php) \| [`Schema Object`](src/Schema.php) | :white_check_mark: |
| description          | [`string`](src/Schema.php)                                                                                    | :white_check_mark: |
| format               | [`string`](src/Schema.php)                                                                                    | :white_check_mark: |
| format               | [`Any`](src/Schema.php)                                                                                       | :white_check_mark: |

#### [4.7.24.2 Fixed Fields](https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20)

| Field Name    | Type                                                             | Status             |
|---------------|------------------------------------------------------------------|--------------------|
| nullable      | [`boolean`](src/Schema.php)                                      | :white_check_mark: |
| discriminator | `Discriminator Object`                                           | :white_check_mark: |
| readOnly      | [`boolean`](src/Schema.php)                                      | :white_check_mark: |
| writeOnly     | [`boolean`](src/Schema.php)                                      | :white_check_mark: |
| xml           | [`XML Object`](src/Xml.php)                                      | :white_check_mark: |
| externalDocs  | [`External Documentation Object`](src/ExternalDocumentation.php) | :white_check_mark: |
| example       | [Any](src/Schema.php)                                            | :white_check_mark: |
| deprecated    | [`boolean`](src/Schema.php)                                      | :white_check_mark: |

### [4.7.25 Discriminator Object](https://spec.openapis.org/oas/v3.0.4.html#discriminator-object)

When request bodies or response payloads may be one of a number of different schemas,
a Discriminator Object gives a hint about the expected schema of the document.

#### [4.7.25.1 Fixed Fields](https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-21)

| Field Name   | Type                                             | Status             |
|--------------|--------------------------------------------------|--------------------|
| propertyName | [`string`](src/Discriminator.php)                | :white_check_mark: |
| mapping      | Map[[`string`](src/Discriminator.php), `string`] | :white_check_mark: |

### [4.7.26 XML Object](https://spec.openapis.org/oas/v3.0.4.html#xml-object)

A metadata object that allows for more fine-tuned XML model definitions.

#### [4.7.26.1 Fixed Fields](https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-22)

| Field Name | Type                     | Status             |
|------------|--------------------------|--------------------|
| name       | [`string`](src/Xml.php)  | :white_check_mark: |
| namespace  | [`string`](src/Xml.php)  | :white_check_mark: |
| prefix     | [`string`](src/Xml.php)  | :white_check_mark: |
| attribute  | [`boolean`](src/Xml.php) | :white_check_mark: |
| wrapped    | [`boolean`](src/Xml.php) | :white_check_mark: |

### [4.7.27 Security Scheme Object](https://spec.openapis.org/oas/v3.0.4.html#security-scheme-object-0)

Defines a security scheme that can be used by the operations.

#### [4.7.27.1 Fixed Fields](https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-23)

| Field Name       | Type                               | Status             |
|------------------|------------------------------------|--------------------|
| type             | [`string`](src/SecurityScheme.php) | :white_check_mark: |
| description      | [`string`](src/SecurityScheme.php) | :white_check_mark: |
| name             | [`string`](src/SecurityScheme.php) | :white_check_mark: |
| in               | [`string`](src/SecurityScheme.php) | :white_check_mark: |
| scheme           | [`string`](src/SecurityScheme.php) | :white_check_mark: |
| bearerFormat     | [`string`](src/SecurityScheme.php) | :white_check_mark: |
| flows            | [`string`](src/OAuthFlows.php)     | :white_check_mark: |
| openIdConnectUrl | [`string`](src/SecurityScheme.php) | :white_check_mark: |

### [4.7.28 OAuth Flows Object](https://spec.openapis.org/oas/v3.0.4.html#oauth-flows-object)

Allows configuration of the supported OAuth Flows.

#### [4.7.28.1 Fixed Fields](https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-24)

| Field Name        | Type                                     | Status             |
|-------------------|------------------------------------------|--------------------|
| implicit          | [`OAuth Flow Object`](src/OAuthFlow.php) | :white_check_mark: |
| password          | [`OAuth Flow Object`](src/OAuthFlow.php) | :white_check_mark: |
| clientCredentials | [`OAuth Flow Object`](src/OAuthFlow.php) | :white_check_mark: |
| authorizationCode | [`OAuth Flow Object`](src/OAuthFlow.php) | :white_check_mark: |

### [4.7.29 OAuth Flow Object](https://spec.openapis.org/oas/v3.0.4.html#security-scheme-object-0)

Defines a security scheme that can be used by the operations.

#### [4.7.29.1 Fixed Fields](https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-25)

| Field Name       | Type                                                              | Status             |
|------------------|-------------------------------------------------------------------|--------------------|
| authorizationUrl | [`string`](src/OAuthFlow.php)                                     | :white_check_mark: |
| tokenUrl         | [`string`](src/OAuthFlow.php)                                     | :white_check_mark: |
| refreshUrl       | [`string`](src/OAuthFlow.php)                                     | :white_check_mark: |
| scopes           | Map[[`string`](src/OAuthFlow.php), [`string`](src/OAuthFlow.php)] | :white_check_mark: |

## Contributing

Contributions, issues, and feature requests are welcome!
Feel free to check the [issues](https://github.com/zero-to-prod/data-model-openapi30/issues) page if you want to contribute.

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Commit changes (`git commit -m 'Add some feature'`).
4. Push to the branch (`git push origin feature-branch`).
5. Create a new Pull Request.
