<?php

namespace lewisjenkins\craftcolorpicker\assetbundles\spectrumfield;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

class SpectrumFieldAsset extends AssetBundle
{
    public function init(): void
    {
        $this->sourcePath = "@lewisjenkins/craftcolorpicker/assetbundles/spectrumfield/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/spectrum.js',
        ];

        $this->css = [
            'css/spectrum.css',
            'css/custom.css',
        ];

        parent::init();
    }
}
