<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 11.02.16
 * Time: 14:48
 */

namespace sibds\widgets;


use kartik\icons\Icon;
use yii\bootstrap\InputWidget;

class translitInput extends InputWidget
{
    public $fromField;
    public $template = '{icon}{input}';
    public $icon = '';

    public $translitOptions = [];

    public function run(){
        if ($this->hasModel()) {
            $replace['{input}'] = Html::activeTextInput($this->model, $this->attribute, $this->options);
        } else {
            $replace['{input}'] = Html::textInput($this->name, $this->value, $this->options);
        }

        if($this->icon!='')
            $replace['{icon}'] = Icon::show('');

        echo strtr($this->template, $replace);

        synctranslit\Assets::register($this->getView());
    }
}