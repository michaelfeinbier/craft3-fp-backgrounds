<?php

namespace craft\fpbackgrounds;

use Craft;
use craft\fpbackgrounds\focalpoint\FocalPointFormatter;
use craft\fpbackgrounds\twigextensions\FocalPointTwigExtensions;


/**
 * @author Michael Feinbier <mfe@feinbier.net>
 **/
class Plugin extends \craft\base\Plugin
{

    public function init()
    {
        parent::init();
        // Load custom filters
        $formatter = new FocalPointFormatter();
        Craft::$app->view->registerTwigExtension(new FocalPointTwigExtensions($formatter));
    }
}
