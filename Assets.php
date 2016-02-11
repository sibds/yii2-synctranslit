<?php

namespace sibds\widgets\synctranslit;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class Assets extends AssetBundle
{
	public $js = array(
		'js/synctranslit/jquery.synctranslit.min.js'
	);
	public $depends = array(
		'yii\jui\JuiAsset',
	);

	public function init()
	{
		$this->sourcePath = __DIR__."/assets";
		parent::init();
	}
}
