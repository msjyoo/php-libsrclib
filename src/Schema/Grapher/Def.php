<?php

namespace sekjun9878\Libsrclib\Schema\Grapher;

/**
 * Def is a definition in code.
 */
final class Def implements \JsonSerializable
{
    /**
     * DefKey is the natural unique key for a def.
     *
     * It is stable (subsequent runs of a grapher will emit the same defs with the same DefKeys).
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
     * Name of the definition.
     *
     * This need not be unique.
     *
     * Required.
     *
     * @var string $name
     */
    protected $name;

    /**
     * Kind is the kind of thing this definition is.
     *
     * This is language-specific.
     * Possible values include "type", "func", "var", etc.
     *
     * Optional.
     *
     * @var string|null $kind
     */
    protected $kind;

    /**
     * File.
     *
     * Required.
     *
     * @var string $file
     */
    protected $file;

    /**
     * DefStart.
     *
     * Required.
     *
     * @var int $defStart
     */
    protected $defStart;

    /**
     * DefEnd.
     *
     * Required.
     *
     * @var int $defEnd
     */
    protected $defEnd;

    /**
     * Exported is whether this def is part of a source unit's public API.
     *
     * For example, in Java a "public" field is Exported.
     *
     * Optional.
     *
     * @var bool|null $exported
     */
    protected $exported;

    /**
     * Local is whether this def is local to a function or some other inner scope.
     *
     * Local defs do *not* have module, package, or file scope.
     * For example, in Java a function's args are Local, but fields with "private" scope are not Local.
     *
     * Optional.
     *
     * @var bool|null $local
     */
    protected $local;

    /**
     * Test is whether this def is defined in test code (as opposed to main
     * code).
     *
     * For example, definitions in Go *_test.go files have Test = true.
     *
     * Optional.
     *
     * @var bool|null $test
     */
    protected $test;

    /**
     * Data contains additional language- and toolchain-specific information
     * about the def.
     *
     * Data is used to construct function signatures,
     * import/require statements, language-specific type descriptions, etc.
     *
     * Note: This data type is stored raw by srclib. The type used by srclib's Go source is linked below.
     *
     * {@link https://sourcegraph.com/github.com/sqs/pbtypes@master/.tree/rawmessage.go}
     *
     * Optional.
     *
     * @var mixed|array|null $data This data will be stored raw (as-is), and therefore can be anything.
     */
    protected $data;

    /**
     * Docs are docstrings for this Def.
     *
     * This field is not set in the Defs produced by graphers; they should
     * emit docs in the separate Docs field on the graph.Output struct.
     *
     * Optional.
     *
     * @internal
     * @deprecated
     *
     * @var DefDoc[]|null $docs
     */
    protected $docs;

    /**
     * TreePath is a structurally significant path descriptor for a def.
     *
     * For many languages, it may be identical or similar to DefKey.Path.
     * However, it has the following constraints, which allow it to define a
     * def tree.
     *
     * A tree-path is a chain of '/'-delimited components.
     *
     * A component is either a def name or a ghost component.
     *  - A def name satisfies the regex [^/-][^/]*
     *  - A ghost component satisfies the regex -[^/]*
     *
     * Any prefix of a tree-path that terminates in a def name must be a valid
     * tree-path for some def.
     *
     * The following regex captures the children of a tree-path X: X(/-[^/]*)*(/[^/-][^/]*)
     *
     * Optional.
     * 
     * @var string|null $treePath
     */
    protected $treePath;

    /**
     * @param string $path
     * @param string $name
     * @param string $file
     * @param int $defStart
     * @param int $defEnd
     */
    public function __construct($path, $name, $file, $defStart, $defEnd)
    {
        $this->defKeyConstruct($path);

        $this->name = $name;
        $this->file = $file;
        $this->defStart = $defStart;
        $this->defEnd = $defEnd;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Def
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @param null|string $kind
     *
     * @return Def
     */
    public function setKind($kind)
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param string $file
     *
     * @return Def
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * @return int
     */
    public function getDefStart()
    {
        return $this->defStart;
    }

    /**
     * @param int $defStart
     *
     * @return Def
     */
    public function setDefStart($defStart)
    {
        $this->defStart = $defStart;

        return $this;
    }

    /**
     * @return int
     */
    public function getDefEnd()
    {
        return $this->defEnd;
    }

    /**
     * @param int $defEnd
     *
     * @return Def
     */
    public function setDefEnd($defEnd)
    {
        $this->defEnd = $defEnd;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getExported()
    {
        return $this->exported;
    }

    /**
     * @param bool|null $exported
     *
     * @return Def
     */
    public function setExported($exported)
    {
        $this->exported = $exported;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getLocal()
    {
        return $this->local;
    }

    /**
     * @param bool|null $local
     *
     * @return Def
     */
    public function setLocal($local)
    {
        $this->local = $local;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getTest()
    {
        return $this->test;
    }

    /**
     * @param bool|null $test
     *
     * @return Def
     */
    public function setTest($test)
    {
        $this->test = $test;

        return $this;
    }

    /**
     * @return array|mixed|null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array|mixed|null $data
     *
     * @return Def
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return DefDoc[]|null
     */
    public function getDocs()
    {
        return $this->docs;
    }

    /**
     * @param DefDoc[]|null $docs
     *
     * @return Def
     */
    public function setDocs($docs)
    {
        $this->docs = $docs;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getTreePath()
    {
        return $this->treePath;
    }

    /**
     * @param null|string $treePath
     *
     * @return Def
     */
    public function setTreePath($treePath)
    {
        $this->treePath = $treePath;

        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->defKeyJsonSerialize() + [
            'Name' => $this->name,
            'File' => $this->file,
            'DefStart' => $this->defStart,
            'DefEnd' => $this->defEnd
        ] + array_filter([
            'Kind' => $this->kind,
            'Exported' => $this->exported,
            'Local' => $this->local,
            'Test' => $this->test,
            'Data' => $this->data,
            'Docs' => $this->docs,
            'TreePath' => $this->treePath
        ]);
    }
}