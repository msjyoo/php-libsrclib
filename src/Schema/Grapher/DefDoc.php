<?php

namespace sekjun9878\Libsrclib\Schema\Grapher;

/**
 * DefDoc is documentation on a Def.
 *
 * @internal
 * @deprecated
 */
final class DefDoc implements \JsonSerializable
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

    /**
     * @param string $format
     * @param string $data
     */
    public function __construct($format, $data)
    {
        $this->format = $format;
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param string $format
     *
     * @return DefDoc
     */
    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param string $data
     *
     * @return DefDoc
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'Format' => $this->format,
            'Data' => $this->data
        ];
    }
}