<?php

namespace sekjun9878\Libsrclib\Schema\DepResolver;

/**
 * ResolvedTarget represents a resolved dependency target.
 */
final class ResolvedTarget implements \JsonSerializable
{
    /**
     * ToRepoCloneURL is the clone URL of the repository that is depended on.
     *
     * When graphers emit ResolvedDependencies, they should fill in this field,
     * not ToRepo, so that the dependent repository can be added if it doesn't
     * exist. The ToRepo URI alone does not specify enough information to add
     * the repository (because it doesn't specify the VCS type, scheme, etc.).
     *
     * Required.
     *
     * @var string $toRepoCloneUrl
     */
    protected $toRepoCloneUrl;

    /**
     * ToUnit is the name of the source unit that is depended on.
     *
     * Required.
     *
     * @var string $toUnit
     */
    protected $toUnit;

    /**
     * ToUnitType is the type of the source unit that is depended on.
     *
     * Required.
     *
     * @var string $toUnitType
     */
    protected $toUnitType;

    /**
     * ToVersion is the version of the dependent repository (if known),
     * according to whatever version string specifier is used by FromRepo's
     * dependency management system.
     *
     * Required.
     *
     * @var string $toVersionString
     */
    protected $toVersionString;

    /**
     * ToRevSpec specifies the desired VCS revision of the dependent repository
     * (if known).
     *
     * Required.
     *
     * @var string $toRevSpec
     */
    protected $toRevSpec;

    /**
     * @return string
     */
    public function getToRepoCloneUrl()
    {
        return $this->toRepoCloneUrl;
    }

    /**
     * @param string $toRepoCloneUrl
     *
     * @return ResolvedTarget
     */
    public function setToRepoCloneUrl($toRepoCloneUrl)
    {
        $this->toRepoCloneUrl = $toRepoCloneUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getToUnit()
    {
        return $this->toUnit;
    }

    /**
     * @param string $toUnit
     *
     * @return ResolvedTarget
     */
    public function setToUnit($toUnit)
    {
        $this->toUnit = $toUnit;

        return $this;
    }

    /**
     * @return string
     */
    public function getToUnitType()
    {
        return $this->toUnitType;
    }

    /**
     * @param string $toUnitType
     *
     * @return ResolvedTarget
     */
    public function setToUnitType($toUnitType)
    {
        $this->toUnitType = $toUnitType;

        return $this;
    }

    /**
     * @return string
     */
    public function getToVersionString()
    {
        return $this->toVersionString;
    }

    /**
     * @param string $toVersionString
     *
     * @return ResolvedTarget
     */
    public function setToVersionString($toVersionString)
    {
        $this->toVersionString = $toVersionString;

        return $this;
    }

    /**
     * @return string
     */
    public function getToRevSpec()
    {
        return $this->toRevSpec;
    }

    /**
     * @param string $toRevSpec
     *
     * @return ResolvedTarget
     */
    public function setToRevSpec($toRevSpec)
    {
        $this->toRevSpec = $toRevSpec;

        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'ToRepoCloneURL' => $this->toRepoCloneUrl,
            'ToUnit' => $this->toUnit,
            'ToUnitType' => $this->toUnitType,
            'ToVersionString' => $this->toVersionString,
            'ToRevSpec' => $this->toRevSpec
        ];
    }
}