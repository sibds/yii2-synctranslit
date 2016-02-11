<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 11.02.16
 * Time: 14:48
 */

namespace sibds\widgets;


use kartik\icons\Icon;
use sibds\widgets\synctranslit\Assets;
use yii\bootstrap\Html;
use yii\bootstrap\InputWidget;

class translitInput extends InputWidget
{
    public $fromField;
    public $template = '{icon}{input}';
    public $icon = 'link';

    public $translitOptions = [];

    public function run(){

        echo Html::beginTag('div', ['class'=>'input-group']);

        if ($this->hasModel()) {
            $replace['{input}'] = Html::activeTextInput($this->model, $this->attribute, $this->options);
        } else {
            $replace['{input}'] = Html::textInput($this->name, $this->value, $this->options);
        }

        if($this->icon!='')
            $replace['{icon}'] = Icon::show($this->icon, ['class'=>'input-group-addon'], Icon::FA);

        echo strtr($this->template, $replace);

        echo Html::endTag('div');

        Assets::register($this->getView());
    }
}