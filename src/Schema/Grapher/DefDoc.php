<?php

/**
 * DefDoc is documentation on a Def.
 *
 * @internal
 * @deprecated
 */
final class DefDoc
{
    /**
     * Format is the the MIME-type that the documentation is stored
     * in. Valid formats include 'text/html', 'text/plain',
     * 'text/x-markdown', text/x-rst'.
     *
     * Required.
     *
     * @var string $format
     */
    protected $format;

    /**
     * Data is the actual documentation text.
     *
     * Required.
     *
     * @var string $data
     */
    protected $data;
}