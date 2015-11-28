<?php

/**
 * Ref represents a reference from source code to a Def.
 */
final class Ref
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
}