<?php

namespace sekjun9878\Libsrclib\Schema\Grapher;

/**
 * Doc is documentation on a Def.
 */
final class Doc implements \JsonSerializable
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
    use DefKey {
        DefKey::__construct as protected defKeyConstruct;
        DefKey::jsonSerialize as protected defKeyJsonSerialize;
    }

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

    /**
     * @param string $path
     * @param string $format
     * @param string $data
     */
    public function __construct($path, $format, $data)
    {
        $this->defKeyConstruct($path);
        
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
     * @return Doc
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
     * @return Doc
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param string|null $file
     *
     * @return Doc
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param int|null $start
     *
     * @return Doc
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param int|null $end
     *
     * @return Doc
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->defKeyJsonSerialize() + [
            'Format' => $this->format,
            'Data' => $this->data
        ] + array_filter([
            'File' => $this->file,
            'Start' => $this->start,
            'End' => $this->end
        ]);
    }
}