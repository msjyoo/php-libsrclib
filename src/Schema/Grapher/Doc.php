<?php

/**
 * Doc is documentation on a Def.
 */
final class Doc
{
    /**
     * DefKey points to the Def that this documentation pertains to.
     *
     * Note: This is a Go anonymous field, which is essentially a trait in PHP.
     *
     * {@link https://sourcegraph.com/github.com/sourcegraph/srclib@master/.tree/graph/def.pb.go?startline=50&endline=86}
     * {@link http://golangtutorials.blogspot.com.au/2011/06/anonymous-fields-in-structs-like-object.html}
     *
     * Required.
     */
    use DefKey;

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

    /**
     * File is the filename where this Doc exists.
     *
     * Optional.
     *
     * @var string|null $file
     */
    protected $file;

    /**
     * Start is the byte offset of this Doc's first byte in File.
     *
     * Optional.
     *
     * @var int|null $start
     */
    protected $start;

    /**
     * End is the byte offset of this Doc's last byte in File.
     *
     * Optional.
     *
     * @var int|null $end
     */
    protected $end;
}