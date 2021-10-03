<?php

declare(strict_types=1);

namespace OpenTelemetry\API\Trace;

use OpenTelemetry\Context\Context;

/**
 * @see https://github.com/open-telemetry/opentelemetry-specification/blob/v1.6.1/specification/context/api-propagators.md#textmap-propagator
 */
interface TextMapPropagatorInterface
{
    /**
     * Returns list of fields that will be used by this propagator.
     *
     * @see https://github.com/open-telemetry/opentelemetry-specification/blob/v1.6.1/specification/context/api-propagators.md#fields
     *
     * @return list<string>
     */
    public static function fields() : array;

    /**
     * Injects specific values from the provided {@see Context} into the provided carrier
     * via an {@see PropagationSetterInterface}.
     *
     * @see https://github.com/open-telemetry/opentelemetry-specification/blob/v1.6.1/specification/context/api-propagators.md#textmap-inject
     *
     * @param mixed $carrier
     */
    public static function inject(&$carrier, PropagationSetterInterface $setter = null, Context $context = null): void;

    /**
     * Extracts specific values from the provided carrier into the provided {@see Context}
     * via an {@see PropagationGetterInterface}.
     *
     * @see https://github.com/open-telemetry/opentelemetry-specification/blob/v1.6.1/specification/context/api-propagators.md#textmap-extract
     */
    public static function extract($carrier, PropagationGetterInterface $getter = null, Context $context = null): Context;
}
