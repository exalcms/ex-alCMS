<?php

namespace App\Forms\Fields;

use Kris\LaravelFormBuilder\Fields\FormField;

class ThumbCheck extends FormField
{

    /**
     * @inheritDoc
     */
    protected function getTemplate()
    {
        return 'fields/img';
    }

    public function render(array $options = [], $showLabel = true, $showField = true, $showError = true)
    {
        $options['all_attrs'] = $this->formHelper->prepareAttributes($options['attr']);
        return parent::render($options, $showLabel, $showField, $showError);
    }
}
