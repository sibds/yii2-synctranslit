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

        if(!isset($this->options['class']))
            $this->options['class'] = 'form-control';

        $iconId = 'icon-'.$this->options['id'];

        if(!isset($this->options['aria-describedby']))
            $this->options['aria-describedby'] = $iconId;

        if ($this->hasModel()) {
            $replace['{input}'] = Html::activeTextInput($this->model, $this->attribute, $this->options);
        } else {
            $replace['{input}'] = Html::textInput($this->name, $this->value, $this->options);
        }

        if($this->icon!='')
            $replace['{icon}'] = Html::tag('span',
                Icon::show($this->icon, [], Icon::FA),
                ['class'=>'input-group-text', 'id'=>$iconId]);

        echo strtr($this->template, $replace);

        echo Html::endTag('div');

        $view = $this->getView();


        Assets::register($view);

        $idMaster = $this->hasModel() ? Html::getInputId($this->model, $this->fromField) : $this->fromField;
        $idSlave = $this->options['id'];
        $view->registerJs("
        $('#$idMaster').syncTranslit({
            destination: '$idSlave',
            type: 'url',
            caseStyle: 'lower',
            urlSeparator: '-'
        });");
    }
}
