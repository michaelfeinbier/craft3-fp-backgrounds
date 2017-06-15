<?php

namespace craft\fpbackgrounds\focalpoint;

use craft\elements\Asset;

/**
 * Format the FocalPoint from an asset to a CSS Percentage.
 *
 * @author Michael Feinbier <mfe@feinbier.net>
 **/
class FocalPointFormatter
{

    /**
     * Return the X offset of the focal point as percentage string
     *
     * @param Asset $asset
     * @param bool  $asString
     *
     * @return string
     */
    public function getXPercentage(Asset $asset, bool $asString = true)
    {
        return $this->getPercentage($asset, 'x');
    }

    /**
     * Return the Y offset of the focal point as percentage string
     *
     * @param Asset $asset
     * @param bool  $asString
     *
     * @return string
     */
    public function getYPercentage(Asset $asset, bool $asString = true)
    {
        return $this->getPercentage($asset, 'y');
    }

    /**
     * @param Asset  $asset
     * @param string $dimension
     *
     * @return string
     */
    private function getPercentage(Asset $asset, string $dimension): string
    {
        $focalPoint = $asset->getFocalPoint();
        if (!$focalPoint) {
            return '';
        }

        $focalPosition = floatval($focalPoint[$dimension]);
        return sprintf('%.2f%%', $focalPosition * 100);
    }
}
