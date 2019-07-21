<?php
/**
 * Craft Color Picker plugin for Craft CMS 3.x
 *
 * ...
 *
 * @link      https://lj.io
 * @copyright Copyright (c) 2019 Lewis Jenkins
 */

namespace lewisjenkins\craftcolorpicker\assetbundles\spectrumfield;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    Lewis Jenkins
 * @package   CraftColorPicker
 * @since     1.0.0
 */
class SpectrumFieldAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = "@lewisjenkins/craftcolorpicker/assetbundles/spectrumfield/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/Spectrum.js',
        ];

        $this->css = [
            'css/Spectrum.css',
        ];

        parent::init();
    }
}
