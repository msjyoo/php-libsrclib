<?php

/**
 * Resolution is the result of dependency resolution: either a successfully
 * resolved target or an error.
 */
final class Resolution
{
    /**
     * Raw is the original raw dep that this was resolution was attempted on.
     *
     * The Raw field is language specific.
     *
     * Required.
     *
     * @var mixed $raw
     */
    protected $raw;

    /**
     * Target is the resolved dependency, if resolution succeeds.
     *
     * Optional.
     *
     * @var ResolvedTarget|null $target
     */
    protected $target;

    /**
     * Error is the resolution error, if any.
     *
     * Optional.
     *
     * @var string|null $error
     */
    protected $error;
}