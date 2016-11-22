<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

?>
<div class="tbox">
	<div class="hd">
		<h3><?= Html::a('Home') ?></h3>
	</div>
	<div class="bd">
		<ul>
			<li><?= Html::a('List', ['/home/list'],['target'=>'mainFrame']) ?></li>
		</ul>
	</div>
</div>
