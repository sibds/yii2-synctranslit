jQuery syncTranslit plugin for Yii2
===================================
Widget for transliteration of text in the URL (on JavaScript)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist sibds/yii2-synctranslit "*"
```

or add

```
"sibds/yii2-synctranslit": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?php
 echo $form->field($model, 'name')->textInput(['maxlength' => true]);
 
 echo $form->field($model, 'alias')->widget(\sibds\widgets\translitInput::className(), ['fromField' => 'name']);
?>
```
