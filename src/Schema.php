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
     * The value of both of these keywords _MUST_ be a string.
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
     * The value of both of these keywords _MUST_ be a string.
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
    #[Describe([
        'cast' => [self::class, 'when'],
        'eval' => '$value > 0',
        'false' => [self::class, 'throwException'],
        'exception' => InvalidMultipleException::class,
        'message' => '$multipleOf must be a positive integer'
    ])]
    public null|float|int $multipleOf;

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
     * The value of this keyword _MUST_ be an integer. This integer _MUST_ be
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
     * The value of this keyword _MUST_ be an integer. This integer _MUST_ be
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
    #[Describe([
        'cast' => [self::class, 'when'],
        'eval' => '$value >= 0',
        'false' => [self::class, 'throwException'],
        'exception' => InvalidMaxLengthException::class,
        'message' => '$maxLength must be a positive integer'
    ])]
    public null|int $maxLength;

    /**
     * A string instance is valid against this keyword if its length is
     * greater than, or equal to, the value of this keyword.
     *
     * The length of a string instance is defined as the number of its
     * characters as defined by RFC 7159 [RFC7159].
     *
     * The value of this keyword _MUST_ be an integer.  This integer _MUST_ be
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
     * The value of this keyword _MUST_ be an integer.  This integer _MUST_ be
     * greater than, or equal to, 0.
     *
     * "minLength", if absent, may be considered as being present with
     * integer value 0.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.7
     */
    #[Describe([
        'cast' => [self::class, 'when'],
        'eval' => '$value >= 0',
        'false' => [self::class, 'throwException'],
        'exception' => InvalidMinLengthException::class,
        'message' => '$minLength must be a positive integer'
    ])]
    public null|int $minLength;

    /**
     * The value of this keyword _MUST_ be a string.  This string SHOULD be a
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
     * The value of this keyword _MUST_ be an integer.  This integer _MUST_ be
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
     * The value of this keyword _MUST_ be an integer.  This integer _MUST_ be
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
     * The value of this keyword _MUST_ be an integer.  This integer _MUST_ be
     * greater than, or equal to, 0.
     *
     * An array instance is valid against "maxItems" if its size is less
     * than, or equal to, the value of this keyword.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.10
     */
    public const maxItems = 'maxItems';

    /**
     * The value of this keyword _MUST_ be an integer.  This integer _MUST_ be
     * greater than, or equal to, 0.
     *
     * An array instance is valid against "maxItems" if its size is less
     * than, or equal to, the value of this keyword.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.10
     */
    #[Describe([
        'cast' => [self::class, 'when'],
        'eval' => '$value >= 0',
        'false' => [self::class, 'throwException'],
        'exception' => InvalidMaxItemsException::class,
        'message' => '$maxItems must be greater than, or equal to, 0.'
    ])]
    public null|int $maxItems;

    /**
     * The value of this keyword _MUST_ be an integer.  This integer _MUST_ be
     * greater than, or equal to, 0.
     *
     * An array instance is valid against "minItems" if its size is greater
     * than, or equal to, the value of this keyword.
     *
     * If this keyword is not present, it may be considered present with a
     * value of 0.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.11
     */
    public const minItems = 'minItems';

    /**
     * The value of this keyword _MUST_ be an integer.  This integer _MUST_ be
     * greater than, or equal to, 0.
     *
     * An array instance is valid against "minItems" if its size is greater
     * than, or equal to, the value of this keyword.
     *
     * If this keyword is not present, it may be considered present with a
     * value of 0.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.11
     */
    #[Describe([
        'cast' => [self::class, 'when'],
        'eval' => '$value >= 0',
        'false' => [self::class, 'throwException'],
        'exception' => InvalidMinItemsException::class,
        'message' => '$minItems must be greater than, or equal to, 0.'
    ])]
    public null|int $minItems;

    /**
     * The value of this keyword _MUST_ be a boolean.
     *
     * If this keyword has boolean value false, the instance validates
     * successfully.  If it has boolean value true, the instance validates
     * successfully if all of its elements are unique.
     *
     * If not present, this keyword may be considered present with boolean
     * value false.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.12
     */
    public const uniqueItems = 'uniqueItems';

    /**
     * The value of this keyword _MUST_ be an integer.  This integer _MUST_ be
     * greater than, or equal to, 0.
     *
     * An object instance is valid against "maxProperties" if its number of
     * properties is less than, or equal to, the value of this keyword.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.13
     */
    #[Describe(['default' => false])]
    public bool $uniqueItems;

    /**
     * The value of this keyword _MUST_ be an integer.  This integer _MUST_ be
     * greater than, or equal to, 0.
     *
     * An object instance is valid against "maxProperties" if its number of
     * properties is less than, or equal to, the value of this keyword.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.13
     */
    public const maxProperties = 'maxProperties';

    /**
     * The value of this keyword MUST be an integer.  This integer MUST be
     * greater than, or equal to, 0.
     *
     * An object instance is valid against "maxProperties" if its number of
     * properties is less than, or equal to, the value of this keyword.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.13
     */
    #[Describe([
        'cast' => [self::class, 'when'],
        'eval' => '$value >= 0',
        'false' => [self::class, 'throwException'],
        'exception' => InvalidMaxPropertiesException::class,
        'message' => '$maxProperties must be greater than, or equal to, 0.'
    ])]
    public null|int $maxProperties;

    /**
     * The value of this keyword _MUST_ be an integer.  This integer _MUST_ be
     * greater than, or equal to, 0.
     *
     * An object instance is valid against "minProperties" if its number of
     * properties is greater than, or equal to, the value of this keyword.
     *
     * If this keyword is not present, it may be considered present with a
     * value of 0.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.14
     */
    public const minProperties = 'minProperties';

    /**
     * The value of this keyword _MUST_ be an integer.  This integer _MUST_ be
     * greater than, or equal to, 0.
     *
     * An object instance is valid against "minProperties" if its number of
     * properties is greater than, or equal to, the value of this keyword.
     *
     * If this keyword is not present, it may be considered present with a
     * value of 0.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.14
     */
    #[Describe([
        'cast' => [self::class, 'when'],
        'eval' => '$value >= 0',
        'false' => [self::class, 'throwException'],
        'exception' => InvalidMinPropertiesException::class,
        'message' => '$minProperties must be greater than, or equal to, 0.'
    ])]
    public null|int $minProperties;

    /**
     * The value of this keyword _MUST_ be an array.  This array _MUST_ have at
     * least one element.  Elements of this array MUST be strings, and _MUST_
     * be unique.
     *
     * An object instance is valid against this keyword if its property set
     * contains all elements in this keyword's array value.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.15
     */
    public const required = 'required';

    /**
     * The value of this keyword _MUST_ be an array.  This array _MUST_ have at
     * least one element.  Elements of this array MUST be strings, and _MUST_
     * be unique.
     *
     * An object instance is valid against this keyword if its property set
     * contains all elements in this keyword's array value.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.15
     */
    #[Describe([
        'cast' => [self::class, 'when'],
        'eval' => 'count($value) && count(array_filter($value, "is_string")) === count($value)',
        'false' => [self::class, 'throwException'],
        'exception' => InvalidRequiredException::class,
        'message' => '$required must have at least 1 element, all as strings.'
    ])]
    public null|array $required;

    /**
     * The value of this keyword _MUST_ be an array.  This array _SHOULD_ have
     * at least one element.  Elements in the array _SHOULD_ be unique.
     *
     * Elements in the array _MAY_ be of any type, including null.
     *
     * An instance validates successfully against this keyword if its value
     * is equal to one of the elements in this keyword's array value.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.20
     */
    public const enum = 'enum';

    /**
     * The value of this keyword _MUST_ be an array.  This array _SHOULD_ have
     * at least one element.  Elements in the array _SHOULD_ be unique.
     *
     * Elements in the array _MAY_ be of any type, including null.
     *
     * An instance validates successfully against this keyword if its value
     * is equal to one of the elements in this keyword's array value.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     * @see  https://datatracker.ietf.org/doc/html/draft-wright-json-schema-validation-00#section-5.20
     */
    #[Describe([
        'cast' => [self::class, 'when'],
        'eval' => 'count($value)',
        'false' => [self::class, 'throwException'],
        'exception' => InvalidEnumException::class,
        'message' => '$enum must have at least 1 element'
    ])]
    public null|array $enum;

    /**
     * Value _MUST_ be a string. Multiple types via an array are not supported
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     */
    public const type = 'type';

    /**
     * Value _MUST_ be a string. Multiple types via an array are not supported
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     */
    #[Describe(['missing_as_null'])]
    public ?string $type;

    /**
     * Inline or referenced schema _MUST_ be of a Schema Object and not a standard JSON Schema.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     */
    public const allOf = 'allOf';

    /**
     * Inline or referenced schema _MUST_ be of a Schema Object and not a standard JSON Schema.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     */
    #[Describe(['cast' => [self::class, 'allOf']])]
    public null|self|Reference $allOf;

    /**
     * Inline or referenced schema _MUST_ be of a Schema Object and not a standard JSON Schema.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     */
    public static function allOf($value, array $context): Schema|Reference|null
    {
        if (!isset($context[self::allOf])) {
            return null;
        }

        return isset($value[Reference::ref])
            ? Reference::from($value)
            : self::from($value);
    }

    /**
     * Inline or referenced schema _MUST_ be of a Schema Object and not a standard JSON Schema.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     */
    public const oneOf = 'oneOf';

    /**
     * Inline or referenced schema _MUST_ be of a Schema Object and not a standard JSON Schema.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     */
    #[Describe(['cast' => [self::class, 'oneOf']])]
    public null|self|Reference $oneOf;

    /**
     * Inline or referenced schema _MUST_ be of a Schema Object and not a standard JSON Schema.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     */
    public static function oneOf($value, array $context): Schema|Reference|null
    {
        if (!isset($context[self::oneOf])) {
            return null;
        }

        return isset($value[Reference::ref])
            ? Reference::from($value)
            : self::from($value);
    }

    /**
     * Inline or referenced schema _MUST_ be of a Schema Object and not a standard JSON Schema.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     */
    public const anyOf = 'anyOf';

    /**
     * Inline or referenced schema _MUST_ be of a Schema Object and not a standard JSON Schema.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     */
    #[Describe(['cast' => [self::class, 'anyOf']])]
    public null|self|Reference $anyOf;

    /**
     * Inline or referenced schema _MUST_ be of a Schema Object and not a standard JSON Schema.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     */
    public static function anyOf($value, array $context): Schema|Reference|null
    {
        if (!isset($context[self::anyOf])) {
            return null;
        }

        return isset($value[Reference::ref])
            ? Reference::from($value)
            : self::from($value);
    }

    /**
     * Inline or referenced schema _MUST_ be of a Schema Object and not a standard JSON Schema.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     */
    public const not = 'not';

    /**
     * Inline or referenced schema _MUST_ be of a Schema Object and not a standard JSON Schema.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     */
    #[Describe(['cast' => [self::class, 'not']])]
    public null|self|Reference $not;

    /**
     * Inline or referenced schema _MUST_ be of a Schema Object and not a standard JSON Schema.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     */
    public static function not($value, array $context): Schema|Reference|null
    {
        if (!isset($context[self::not])) {
            return null;
        }

        return isset($value[Reference::ref])
            ? Reference::from($value)
            : self::from($value);
    }

    /**
     * Value _MUST_ be an object and not an array. Inline or referenced
     * schema _MUST_ be of a Schema Object and not a standard JSON Schema.
     * `items` _MUST_ be present if type is "array".
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     */
    public const items = 'items';

    /**
     * Value _MUST_ be an object and not an array. Inline or referenced
     * schema _MUST_ be of a Schema Object and not a standard JSON Schema.
     * `items` _MUST_ be present if type is "array".
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     */
    #[Describe(['cast' => [self::class, 'items']])]
    public null|self|Reference $items;

    /**
     * Value _MUST_ be an object and not an array. Inline or referenced
     * schema _MUST_ be of a Schema Object and not a standard JSON Schema.
     * `items` _MUST_ be present if type is "array".
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     */
    public static function items($value, array $context): Schema|Reference|null
    {
        if (!isset($context[self::items])) {
            return null;
        }

        return isset($value[Reference::ref])
            ? Reference::from($value)
            : self::from($value);
    }

    /**
     * Property definitions _MUST_ be a Schema Object and not a standard
     * JSON Schema (inline or referenced).
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     */
    public const properties = 'properties';

    /**
     * Property definitions _MUST_ be a Schema Object and not a standard
     * JSON Schema (inline or referenced).
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     */
    #[Describe(['cast' => [self::class, 'properties']])]
    public null|self|Reference $properties;

    /**
     * Property definitions _MUST_ be a Schema Object and not a standard
     * JSON Schema (inline or referenced).
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     */
    public static function properties($value, array $context): Schema|Reference|null
    {
        if (!isset($context[self::properties])) {
            return null;
        }

        return isset($value[Reference::ref])
            ? Reference::from($value)
            : self::from($value);
    }

    /**
     * Value can be boolean or object. Inline or referenced schema _MUST_ be of a
     * Schema Object and not a standard JSON Schema. Consistent with JSON
     * Schema, `additionalProperties` defaults to `true`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     */
    public const additionalProperties = 'additionalProperties';

    /**
     * Value can be boolean or object. Inline or referenced schema _MUST_ be of a
     * Schema Object and not a standard JSON Schema. Consistent with JSON
     * Schema, `additionalProperties` defaults to `true`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     */
    #[Describe(['cast' => [self::class, 'additionalProperties']])]
    public bool|self|Reference $additionalProperties;

    /**
     * Value can be boolean or object. Inline or referenced schema _MUST_ be of a
     * Schema Object and not a standard JSON Schema. Consistent with JSON
     * Schema, `additionalProperties` defaults to `true`.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     */
    public static function additionalProperties($value, array $context): Schema|Reference|bool
    {
        if (!isset($context[self::additionalProperties])) {
            return false;
        }

        if(is_bool($value)) {
            return $value;
        }

        return isset($value[Reference::ref])
            ? Reference::from($value)
            : self::from($value);
    }

    /**
     * [CommonMark] syntax MAY be used for rich text representation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     */
    public const description = 'description';

    /**
     * [CommonMark] syntax MAY be used for rich text representation.
     *
     * @link https://spec.openapis.org/oas/v3.0.4.html#json-schema-keywords
     */
    #[Describe(['missing_as_null'])]
    public ?string $description;

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
     * of a response but _SHOULD_NOT_ be sent as part of the request.
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
     * of a response but _SHOULD_NOT_ be sent as part of the request.
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
     * of a response but _SHOULD_NOT_ be sent as part of the request.
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
     * request but _SHOULD_NOT_ be sent as part of the response. If the
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
     * request but _SHOULD_NOT_ be sent as part of the response. If the
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
     * request but _SHOULD_NOT_ be sent as part of the response. If the
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
