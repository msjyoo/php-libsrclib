<?php

/**
 * A ToolRef identifies a tool inside a specific toolchain. It can be used to look up the tool.
 */
final class ToolRef
{
    /**
     * Toolchain is the toolchain path of the toolchain that contains this tool.
     *
     * Required.
     *
     * @var string
     */
    protected $toolchain;

    /**
     * Subcmd is the name of the toolchain subcommand that runs this tool.
     *
     * Required.
     *
     * @var string
     */
    protected $subcmd;
}