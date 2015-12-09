<?php

namespace sekjun9878\Libsrclib\Schema\Grapher;

final class Output implements \JsonSerializable
{
    /** @var Def[] $defs A collection of Def. Optional. */
    protected $defs = [];

    /** @var Ref[] $refs A collection of Ref. Optional. */
    protected $refs = [];

    /** @var Doc[] $docs A collection of Doc. Optional. */
    protected $docs = [];

    /** @var Ann[] $anns A collection of Ann. Optional. */
    protected $anns = [];

    // TODO:

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return array_filter([
            'Defs' => $this->defs,
            'Refs' => $this->refs,
            'Docs' => $this->docs,
            'Anns' => $this->anns
        ]);
    }
}