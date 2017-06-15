<?php

namespace craft\fpbackgrounds\twigextensions;

use craft\elements\Asset;
use craft\fpbackgrounds\focalpoint\FocalPointFormatter;

/**
 * @author Michael Feinbier <mfe@feinbier.net>
 **/
class FocalPointTwigExtensions extends \Twig_Extension
{

    /** @var  FocalPointFormatter */
    protected $focalPointFormatter;

    /**
     * FocalPointTwigExtensions constructor.
     *
     * @param FocalPointFormatter $focalPointFormatter
     */
    public function __construct(FocalPointFormatter $focalPointFormatter)
    {
        $this->focalPointFormatter = $focalPointFormatter;
    }

    /**
     * Add additional twig filters
     * @return array
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('focalXPosition', [$this->focalPointFormatter, 'getXPercentage']),
            new \Twig_SimpleFilter('focalYPosition', [$this->focalPointFormatter, 'getyPercentage']),
        ];
    }

    /**
     * Add additional twig functions
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('renderBackgroundPosition', [$this, 'renderBackgroundPosition'])
        ];
    }


    public function renderBackgroundPosition($input)
    {
        // only render for Assets
        if (!$input instanceof Asset) {
            return '';
        }

        return implode(' ',[
            'background-position-x: ' . $this->focalPointFormatter->getXPercentage($input) . ';',
            'background-position-y: ' . $this->focalPointFormatter->getYPercentage($input) . ';'
        ]);
    }

}
