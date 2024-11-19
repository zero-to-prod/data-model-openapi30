<?php

namespace Zerotoprod\DataModelOpenapi30;

use Throwable;
use Zerotoprod\DataModel\Describe;
use Zerotoprod\DataModelOpenapi30\Helpers\DataModel;

/**
 * The Schema Object allows the definition of input and output data types.
 * These types can be objects, but also primitives and arrays. This object
 * is an extended subset of the JSON Schema Specification Draft Wright-00.
 *
 * For more information about the keywords, see JSON Schema Core and JSON
 * Schema Validation. Unless stated otherwise, the keyword definitions
 * follow those of JSON Schema and do not add any additional semantics.
 *
 * @link https://spec.openapis.org/oas/v3.0.4.html#schema-object
 * @see  https://spec.openapis.org/oas/v3.0.4.html#bib-json-schema-05
 * @see  https://spec.openapis.org/oas/v3.0.4.html#bib-json-schema-validation-05
 */
class Schema
{
    use DataModel;

    /**
     * The value of both of these keywords MUST be a string.
     *
     * Both of these keywords can be used to decorate a user interface with
     * information about the data produced by this user interface.  A title
     * will preferrably be short, whereas a description will provide
     * explanation about the purpose of the instance described by this
     * schema.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-6.1
     */
    public const title = 'title';

    /**
     * The value of both of these keywords MUST be a string.
     *
     * Both of these keywords can be used to decorate a user interface with
     * information about the data produced by this user interface.  A title
     * will preferably be short, whereas a description will provide
     * explanation about the purpose of the instance described by this
     * schema.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-6.1
     */
    #[Describe(['missing_as_null'])]
    public ?string $title;

    /**
     * The value of "multipleOf" _MUST_ be a number, strictly greater than 0.
     *
     * A numeric instance is only valid if division by this keyword's value
     * results in an integer.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.1
     */
    public const multipleOf = 'multipleOf';

    /**
     * The value of "multipleOf" _MUST_ be a number, strictly greater than 0.
     *
     * A numeric instance is only valid if division by this keyword's value
     * results in an integer.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.1
     */
    #[Describe(['cast' => [self::class, 'multipleOf']])]
    public null|float|int $multipleOf;

    public static function multipleOf(mixed $value, array $context): mixed
    {
        if (!isset($context[self::multipleOf])) {
            return null;
        }

        if (!is_numeric($value) || $value <= 0) {
            throw new InvalidMultipleException('$multipleOf must be a positive integer');
        }

        return $value;
    }

    /**
     * The value of "maximum" _MUST_ be a number, representing an upper limit
     * for a numeric instance.
     *
     * If the instance is a number, then this keyword validates if
     * "exclusiveMaximum" is true and instance is less than the provided
     * value, or else if the instance is less than or exactly equal to the
     * provided value.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.2
     */
    public const maximum = 'maximum';

    /**
     * The value of "maximum" _MUST_ be a number, representing an upper limit
     * for a numeric instance.
     *
     * If the instance is a number, then this keyword validates if
     * "exclusiveMaximum" is true and instance is less than the provided
     * value, or else if the instance is less than or exactly equal to the
     * provided value.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.2
     */
    #[Describe(['missing_as_null'])]
    public null|int|float $maximum;

    /**
     * The value of "exclusiveMaximum" _MUST_ be a boolean, representing
     * whether the limit in "maximum" is exclusive or not.  An undefined
     * value is the same as false.
     *
     * If "exclusiveMaximum" is true, then a numeric instance SHOULD NOT be
     * equal to the value specified in "maximum".  If "exclusiveMaximum" is
     * false (or not specified), then a numeric instance MAY be equal to the
     * value of "maximum".
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.3
     */
    public const exclusiveMaximum = 'exclusiveMaximum';

    /**
     * The value of "exclusiveMaximum" _MUST_ be a boolean, representing
     * whether the limit in "maximum" is exclusive or not.  An undefined
     * value is the same as false.
     *
     * If "exclusiveMaximum" is true, then a numeric instance SHOULD NOT be
     * equal to the value specified in "maximum".  If "exclusiveMaximum" is
     * false (or not specified), then a numeric instance MAY be equal to the
     * value of "maximum".
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.3
     */
    #[Describe(['default' => false])]
    public bool $exclusiveMaximum;

    /**
     * The value of "minimum" _MUST_ be a number, representing a lower limit
     * for a numeric instance.
     *
     * If the instance is a number, then this keyword validates if
     * "exclusiveMinimum" is true and instance is greater than the provided
     * value, or else if the instance is greater than or exactly equal to
     * the provided value.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.4
     */
    public const minimum = 'minimum';

    /**
     * The value of "minimum" _MUST_ be a number, representing a lower limit
     * for a numeric instance.
     *
     * If the instance is a number, then this keyword validates if
     * "exclusiveMinimum" is true and instance is greater than the provided
     * value, or else if the instance is greater than or exactly equal to
     * the provided value.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.4
     */
    #[Describe(['missing_as_null'])]
    public null|int|float $minimum;

    /**
     * The value of "exclusiveMinimum" _MUST_ be a boolean, representing
     * whether the limit in "minimum" is exclusive or not.  An undefined
     * value is the same as false.
     *
     * If "exclusiveMinimum" is true, then a numeric instance SHOULD NOT be
     * equal to the value specified in "minimum".  If "exclusiveMinimum" is
     * false (or not specified), then a numeric instance MAY be equal to the
     * value of "minimum".
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.5
     */
    public const exclusiveMinimum = 'exclusiveMinimum';

    /**
     * The value of "exclusiveMinimum" _MUST_ be a boolean, representing
     * whether the limit in "minimum" is exclusive or not.  An undefined
     * value is the same as false.
     *
     * If "exclusiveMinimum" is true, then a numeric instance SHOULD NOT be
     * equal to the value specified in "minimum".  If "exclusiveMinimum" is
     * false (or not specified), then a numeric instance MAY be equal to the
     * value of "minimum".
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.5
     */
    #[Describe(['default' => false])]
    public bool $exclusiveMinimum;

    /**
     * The value of this keyword _MUST_ be a non-negative integer.
     *
     * The value of this keyword _MUST_ be an integer. This integer MUST be
     * greater than, or equal to, 0.
     *
     * A string instance is valid against this keyword if its length is less
     * than, or equal to, the value of this keyword.
     *
     * The length of a string instance is defined as the number of its
     * characters as defined by RFC 7159 [RFC7159].
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.6
     */
    public const maxLength = 'maxLength';

    /**
     * The value of this keyword _MUST_ be a non-negative integer.
     *
     * The value of this keyword _MUST_ be an integer. This integer MUST be
     * greater than, or equal to, 0.
     *
     * A string instance is valid against this keyword if its length is less
     * than, or equal to, the value of this keyword.
     *
     * The length of a string instance is defined as the number of its
     * characters as defined by RFC 7159 [RFC7159].
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.6
     */
    #[Describe(['cast' => [self::class, 'maxLength']])]
    public null|int $maxLength;

    /**
     * The value of this keyword _MUST_ be a non-negative integer.
     *
     * The value of this keyword _MUST_ be an integer. This integer MUST be
     * greater than, or equal to, 0.
     *
     * A string instance is valid against this keyword if its length is less
     * than, or equal to, the value of this keyword.
     *
     * The length of a string instance is defined as the number of its
     * characters as defined by RFC 7159 [RFC7159].
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.6
     */
    public static function maxLength($value, array $context): ?int
    {
        if (!isset($context[self::maxLength])) {
            return null;
        }

        if (!($value >= 0)) {
            throw new InvalidMaxLengthException('$maxLength must be a positive integer');
        }

        return $value;
    }

    /**
     * A string instance is valid against this keyword if its length is
     * greater than, or equal to, the value of this keyword.
     *
     * The length of a string instance is defined as the number of its
     * characters as defined by RFC 7159 [RFC7159].
     *
     * The value of this keyword _MUST_ be an integer.  This integer MUST be
     * greater than, or equal to, 0.
     *
     * "minLength", if absent, may be considered as being present with
     * integer value 0.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.7
     */
    public const minLength = 'minLength';

    /**
     * A string instance is valid against this keyword if its length is
     * greater than, or equal to, the value of this keyword.
     *
     * The length of a string instance is defined as the number of its
     * characters as defined by RFC 7159 [RFC7159].
     *
     * The value of this keyword _MUST_ be an integer.  This integer MUST be
     * greater than, or equal to, 0.
     *
     * "minLength", if absent, may be considered as being present with
     * integer value 0.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.7
     */
    #[Describe(['cast' => [self::class, 'minLength']])]
    public null|int $minLength;

    /**
     * A string instance is valid against this keyword if its length is
     * greater than, or equal to, the value of this keyword.
     *
     * The length of a string instance is defined as the number of its
     * characters as defined by RFC 7159 [RFC7159].
     *
     * The value of this keyword _MUST_ be an integer.  This integer MUST be
     * greater than, or equal to, 0.
     *
     * "minLength", if absent, may be considered as being present with
     * integer value 0.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.7
     */
    public static function minLength($value, array $context): ?int
    {
        if (!isset($context[self::minLength])) {
            return null;
        }

        if (!($value >= 0)) {
            throw new InvalidMaxLengthException('$minLength must be a positive integer');
        }

        return $value;
    }

    /**
     * The value of this keyword MUST be a string.  This string SHOULD be a
     * valid regular expression, according to the ECMA 262 regular
     * expression dialect.
     *
     * A string instance is considered valid if the regular expression
     * matches the instance successfully.  Recall: regular expressions are
     * not implicitly anchored.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.8
     */
    public const pattern = 'pattern';

    /**
     * A string instance is valid against this keyword if its length is
     * greater than, or equal to, the value of this keyword.
     *
     * The length of a string instance is defined as the number of its
     * characters as defined by RFC 7159 [RFC7159].
     *
     * The value of this keyword _MUST_ be an integer.  This integer MUST be
     * greater than, or equal to, 0.
     *
     * "pattern", if absent, may be considered as being present with
     * integer value 0.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.7
     */
    #[Describe(['cast' => [self::class, 'pattern']])]
    public null|string $pattern;

    /**
     * A string instance is valid against this keyword if its length is
     * greater than, or equal to, the value of this keyword.
     *
     * The length of a string instance is defined as the number of its
     * characters as defined by RFC 7159 [RFC7159].
     *
     * The value of this keyword _MUST_ be an integer.  This integer MUST be
     * greater than, or equal to, 0.
     *
     * "pattern", if absent, may be considered as being present with
     * integer value 0.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.7
     */
    public static function pattern($value, array $context): ?string
    {
        if (!isset($context[self::pattern])) {
            return null;
        }

        try {
            if (@preg_match($value, '') === false) {
                throw new InvalidPatternException('$pattern must be a valid regular expression');
            }
        } catch (Throwable $e) {
            throw new InvalidPatternException('$pattern must be a valid regular expression', 0, $e);
        }

        return $value;
    }

    /**
     * This keyword only takes effect if `type` is explicitly defined within the
     * same Schema Object. A `true` value indicates that both `null` values and
     * values of the type specified by `type` are allowed. Other Schema Object
     * constraints retain their defined behavior, and therefore may disallow
     * the use of `null` as a value. A `false` value leaves the specified or
     * default `type` unmodified. The default value is `false`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20
     */
    public const nullable = 'nullable';

    /**
     * This keyword only takes effect if `type` is explicitly defined within the
     * same Schema Object. A `true` value indicates that both `null` values and
     * values of the type specified by `type` are allowed. Other Schema Object
     * constraints retain their defined behavior, and therefore may disallow
     * the use of `null` as a value. A `false` value leaves the specified or
     * default `type` unmodified. The default value is `false`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20
     */
    #[Describe(['default' => false])]
    public bool $nullable;

    /**
     * Adds support for polymorphism. The discriminator is used to determine
     * which of a set of schemas a payload is expected to satisfy. See
     * Composition and Inheritance for more details.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20
     */
    public const discriminator = 'discriminator';

    /**
     * Adds support for polymorphism. The discriminator is used to determine
     * which of a set of schemas a payload is expected to satisfy. See
     * Composition and Inheritance for more details.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20
     */
    #[Describe(['missing_as_null'])]
    public ?Discriminator $discriminator;

    /**
     * Relevant only for Schema Object `properties` definitions. Declares the
     * property as “read only”. This means that it _MAY_ be sent as part
     * of a response but **_SHOULD_ NOT** be sent as part of the request.
     * If the property is marked as `readOnly` being `true` and is in
     * the `required` list, the `required` will take effect on the
     * response only. A property _MUST NOT_ be marked as both
     * `readOnly` and `writeOnly` being `true`. Default value
     * is `false`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20
     */
    public const readOnly = 'readOnly';

    /**
     * Relevant only for Schema Object `properties` definitions. Declares the
     * property as “read only”. This means that it _MAY_ be sent as part
     * of a response but **_SHOULD_ NOT** be sent as part of the request.
     * If the property is marked as `readOnly` being `true` and is in
     * the `required` list, the `required` will take effect on the
     * response only. A property _MUST NOT_ be marked as both
     * `readOnly` and `writeOnly` being `true`. Default value
     * is `false`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20
     */
    #[Describe(['cast' => [self::class, 'readOnly']])]
    public bool $readOnly;

    /**
     * Relevant only for Schema Object `properties` definitions. Declares the
     * property as “read only”. This means that it _MAY_ be sent as part
     * of a response but **_SHOULD_ NOT** be sent as part of the request.
     * If the property is marked as `readOnly` being `true` and is in
     * the `required` list, the `required` will take effect on the
     * response only. A property _MUST NOT_ be marked as both
     * `readOnly` and `writeOnly` being `true`. Default value
     * is `false`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20
     */
    public static function readOnly($value, array $context): bool
    {
        if (isset($context[self::readOnly], $context[self::writeOnly]) && $context[self::readOnly] && $context[self::writeOnly]) {
            throw new InvalidReadAndWriteOnlyException('$readOnly and $writeOnly cannot be true at the same time');
        }

        return isset($context[self::readOnly])
            ? $value
            : false;
    }

    /**
     * Relevant only for Schema Object `properties` definitions. Declares the
     * property as “write only”. Therefore, it _MAY_ be sent as part of a
     * request but **_SHOULD_ NOT** be sent as part of the response. If the
     * property is marked as `writeOnly` being `true` and is in the
     * `required` list, the `required` will take effect on the
     * request only. A property _MUST NOT_ be marked as both
     * `readOnly` and `writeOnly` being `true`. Default value
     * is `false`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20
     */
    public const writeOnly = 'writeOnly';

    /**
     * Relevant only for Schema Object `properties` definitions. Declares the
     * property as “write only”. Therefore, it _MAY_ be sent as part of a
     * request but **_SHOULD_ NOT** be sent as part of the response. If the
     * property is marked as `writeOnly` being `true` and is in the
     * `required` list, the `required` will take effect on the
     * request only. A property _MUST NOT_ be marked as both
     * `readOnly` and `writeOnly` being `true`. Default value
     * is `false`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20
     */
    #[Describe(['cast' => [self::class, 'writeOnly']])]
    public bool $writeOnly;

    /**
     * Relevant only for Schema Object `properties` definitions. Declares the
     * property as “write only”. Therefore, it _MAY_ be sent as part of a
     * request but **_SHOULD_ NOT** be sent as part of the response. If the
     * property is marked as `writeOnly` being `true` and is in the
     * `required` list, the `required` will take effect on the
     * request only. A property _MUST NOT_ be marked as both
     * `readOnly` and `writeOnly` being `true`. Default value
     * is `false`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20
     */
    public static function writeOnly($value, array $context): bool
    {
        if (isset($context[self::readOnly], $context[self::writeOnly]) && $context[self::readOnly] && $context[self::writeOnly]) {
            throw new InvalidReadAndWriteOnlyException('$readOnly and $writeOnly cannot be true at the same time');
        }

        return isset($context[self::writeOnly])
            ? $value
            : false;
    }

    /**
     * This _MAY_ be used only on property schemas. It has no effect on
     * root schemas. Adds additional metadata to describe the XML
     * representation of this property.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20
     */
    public const xml = 'xml';

    /**
     * This _MAY_ be used only on property schemas. It has no effect on
     * root schemas. Adds additional metadata to describe the XML
     * representation of this property.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20
     */
    #[Describe(['missing_as_null'])]
    public ?Xml $xml;

    /**
     * Additional external documentation for this schema.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20
     */
    public const externalDocs = 'externalDocs';

    /**
     * Additional external documentation for this schema.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20
     */
    #[Describe(['missing_as_null'])]
    public ?ExternalDocumentation $externalDocs;

    /**
     * Specifies that a schema is deprecated and _SHOULD_ be transitioned
     * out of usage. Default value is `false`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20
     */
    public const deprecated = 'deprecated';

    /**
     * Specifies that a schema is deprecated and _SHOULD_ be transitioned
     * out of usage. Default value is `false`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20
     */
    #[Describe(['default' => false])]
    public bool $deprecated;

    /**
     * A free-form field to include an example of an instance for this schema.
     * To represent examples that cannot be naturally represented in JSON or
     * YAML, a string value can be used to contain the example with escaping
     * where necessary.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20
     */
    public const example = 'example';

    /**
     * A free-form field to include an example of an instance for this schema.
     * To represent examples that cannot be naturally represented in JSON or
     * YAML, a string value can be used to contain the example with escaping
     * where necessary.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#fixed-fields-20
     */
    #[Describe(['missing_as_null'])]
    public mixed $example;
}
