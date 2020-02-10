<?php

namespace lewisjenkins\craftcolorpicker\fields;

use lewisjenkins\craftcolorpicker\assetbundles\spectrumfield\SpectrumFieldAsset;

use Craft;
use craft\base\ElementInterface;
use craft\helpers\ElementHelper;
use craft\base\Field;
use yii\db\Schema;

class Spectrum extends Field
{

    public $params = 'allowEmpty: true,
preferredFormat: "rgb",
showButtons: false,
showInput: true,
showAlpha: true';
    public $defaultColor = '';
    public $initialRows = 8;
    
    public static function displayName(): string
    {
        return Craft::t('craft-color-picker', 'LJ Color Picker');
    }

    public function getContentColumnType(): string
    {
        return Schema::TYPE_TEXT;
    }

    public function getSettingsHtml()
    {
	            //Craft::$app->getView()->registerAssetBundle(SpectrumFieldAsset::class);
        return Craft::$app->getView()->renderTemplate(
            'craft-color-picker/_components/fields/Spectrum_settings',
            [
                'field' => $this,
                'img' => Craft::$app->assetManager->getPublishedUrl('@lewisjenkins/craftcolorpicker/assetbundles/spectrumfield/dist/img', true)
            ]
        );
    }

    public function getInputHtml($value, ElementInterface $element = null): string
    {
        $view = Craft::$app->getView();
        $view->registerAssetBundle(SpectrumFieldAsset::class);

        $id = $view->formatInputId($this->handle);
        $namespacedId = $view->namespaceInputId($id);

		$templateMode = $view->getTemplateMode();
		$view->setTemplateMode($view::TEMPLATE_MODE_SITE);
		
		$variables['element'] = $element;
		$variables['this'] = $this;
		
		$params = $view->renderString($this->params, $variables);
		
		$view->setTemplateMode($templateMode);
		
		$js = "$('#" . $namespacedId . "').spectrum({" . $params . "});";
		
		$view->registerJs($js);
		
        if ($this->isFresh($element)) {
            $value = $this->defaultColor;
        };

        return Craft::$app->getView()->renderTemplate(
            'craft-color-picker/_components/fields/Spectrum_input',
            [
                'name' => $this->handle,
                'value' => $value,
                'field' => $this,
                'id' => $id
            ]
        );
    }
}
