<?php

namespace sekjun9878\Libsrclib\Schema\DepResolver;

/**
 * Resolution is the result of dependency resolution: either a successfully
 * resolved target or an error.
 */
final class Resolution implements \JsonSerializable
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

    /**
     * @param mixed $raw Any type that can be encoded by json_encode.
     */
    public function __construct($raw)
    {
        $this->raw = $raw;
    }

    /**
     * @return mixed
     */
    public function getRaw()
    {
        return $this->raw;
    }

    /**
     * @param mixed $raw Any type that can be encoded by json_encode.
     *
     * @return Resolution
     */
    public function setRaw($raw)
    {
        $this->raw = $raw;

        return $this;
    }

    /**
     * @return ResolvedTarget|null
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * @param ResolvedTarget|null $target
     *
     * @return Resolution
     */
    public function setTarget($target)
    {
       $this->target = $target;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param string|null $error
     *
     * @return Resolution
     */
    public function setError($error)
    {
        $this->error = $error;

        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        if(isset($this->target) === isset($this->error))
        {
            throw new \InvalidArgumentException;
        }

        return ['Raw' => $this->raw] + array_filter([
            'Target' => $this->target,
            'Error' => $this->error
        ]);
    }
}