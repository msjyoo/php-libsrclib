<?php

namespace sekjun9878\Libsrclib\Schema\Grapher;

/**
 * Ref represents a reference from source code to a Def.
 */
final class Ref implements \JsonSerializable
{
    /**
     * DefRepo is the repository URI of the Def that this Ref refers to.
     *
     * Optional.
     *
     * @var string|null $defRepo
     */
    protected $defRepo;

    /**
     * DefUnitType is the source unit type of the Def that this Ref refers to.
     *
     * Optional.
     *
     * @var string|null $defUnitType
     */
    protected $defUnitType;

    /**
     * DefUnit is the name of the source unit that this ref exists in.
     *
     * Optional.
     *
     * @var string|null $defUnit
     */
    protected $defUnit;

    /**
     * Path is the path of the Def that this ref refers to.
     *
     * Required.
     *
     * @var string $defPath
     */
    protected $defPath;

    /**
     * Repo is the VCS repository in which this ref exists.
     *
     * Optional.
     *
     * @var string|null $repo
     */
    protected $repo;

    /**
     * CommitID is the ID of the VCS commit that this ref exists in.
     *
     * The CommitID is always a full commit ID (40 hexadecimal
     * characters for git and hg), never a branch or tag name.
     *
     * Optional.
     *
     * @var string|null $commitId
     */
    protected $commitId;

    /**
     * UnitType is the type name of the source unit that this ref exists in.
     *
     * Optional.
     *
     * @var string|null $unitType
     */
    protected $unitType;

    /**
     * Unit is the name of the source unit that this ref exists in.
     *
     * Optional.
     *
     * @var string|null $unit
     */
    protected $unit;

    /**
     * Def is true if this Ref spans the name of the Def it points to.
     *
     * Optional.
     *
     * @var bool|null $def
     */
    protected $def;

    /**
     * File is the filename in which this Ref exists.
     *
     * Optional.
     *
     * @var string|null $file
     */
    protected $file;

    /**
     * Start is the byte offset of this ref's first byte in File.
     *
     * Required.
     *
     * @var int $start
     */
    protected $start;

    /**
     * End is the byte offset of this ref's last byte in File.
     *
     * Required.
     *
     * @var int $end
     */
    protected $end;

    /**
     * @param string $defPath
     * @param int $start
     * @param int $end
     */
    public function __construct($defPath, $start, $end)
    {
        $this->defPath = $defPath;
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * @return string|null
     */
    public function getDefRepo()
    {
        return $this->defRepo;
    }

    /**
     * @param string|null $defRepo
     *
     * @return Ref
     */
    public function setDefRepo($defRepo)
    {
        $this->defRepo = $defRepo;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDefUnitType()
    {
        return $this->defUnitType;
    }

    /**
     * @param string|null $defUnitType
     *
     * @return Ref
     */
    public function setDefUnitType($defUnitType)
    {
        $this->defUnitType = $defUnitType;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDefUnit()
    {
        return $this->defUnit;
    }

    /**
     * @param string|null $defUnit
     *
     * @return Ref
     */
    public function setDefUnit($defUnit)
    {
        $this->defUnit = $defUnit;

        return $this;
    }

    /**
     * @return string
     */
    public function getDefPath()
    {
        return $this->defPath;
    }

    /**
     * @param string $defPath
     *
     * @return Ref
     */
    public function setDefPath($defPath)
    {
        $this->defPath = $defPath;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRepo()
    {
        return $this->repo;
    }

    /**
     * @param string|null $repo
     *
     * @return Ref
     */
    public function setRepo($repo)
    {
        $this->repo = $repo;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCommitId()
    {
        return $this->commitId;
    }

    /**
     * @param string|null $commitId
     *
     * @return Ref
     */
    public function setCommitId($commitId)
    {
        $this->commitId = $commitId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUnitType()
    {
        return $this->unitType;
    }

    /**
     * @param string|null $unitType
     *
     * @return Ref
     */
    public function setUnitType($unitType)
    {
        $this->unitType = $unitType;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * @param string|null $unit
     *
     * @return Ref
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getDef()
    {
        return $this->def;
    }

    /**
     * @param bool|null $def
     *
     * @return Ref
     */
    public function setDef($def)
    {
        $this->def = $def;

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
     * @return Ref
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * @return int
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param int $start
     *
     * @return Ref
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * @return int
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param int $end
     *
     * @return Ref
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
        return [
            'DefPath' => $this->defPath,
            'Start' => $this->start,
            'End' => $this->end
        ] + array_filter([
            'DefRepo' => $this->defRepo,
            'DefUnitType' => $this->defUnitType,
            'DefUnit' => $this->defUnit,
            'Repo' => $this->repo,
            'CommitID' => $this->commitId,
            'UnitType' => $this->unitType,
            'Unit' => $this->unit,
            'Def' => $this->def
        ]);
    }
}