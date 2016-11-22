<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use components\widgets\Alert;
use yii\helpers\Url;

/**
 *
 * @var \yii\web\View $this
 * @var string $content
 */
AppAsset::register($this);
?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<meta charset="<?= Yii::$app->charset ?>" />
<title>管理中心</title>
	<?php $this->head() ?>
<style>
	.styles {height:40px;}
</style>
</head>
<body style="margin: 0px; padding-top: 51px;" scroll="no">
	<?php $this->beginBody() ?>
	<?php
		NavBar::begin([
			'brandLabel' => 'CMS',
			'brandUrl' => Yii::$app->homeUrl,
			'options' => [
				'class' => 'navbar-inverse navbar-fixed-top',
			],
		]);
		$menuItems = [
	        ['label' => 'Home', 'url' => ['admin/home']],
	    ];
	    if (Yii::$app->user->isGuest) {
	        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
	    } else {
	        $menuItems[] = '<li>'
	            . Html::beginForm(['/site/logout'], 'post')
	            . Html::submitButton(
	                'Logout (' . Yii::$app->user->identity->username . ')',
	                ['class' => 'btn btn-link']
	            )
	            . Html::endForm()
	            . '</li>';
	    }

		echo Nav::widget([
				'options' => ['class' => 'navbar-nav navbar-right'],
				'items' => $menuItems,
				]);

		NavBar::end();
	?>

	
	<table id="containerTable" class="table border" style="height: 95%; padding: 0px; margin: 0px;">
		<tr>
			<td class="leftMenu" style="vertical-align: top; pading: 0px; margin: 0px;width:160px;background: whiteSmoke;vertical-align: top;">
    			<?php echo $content ?>
	    	</td>
			<td class="mainContent" style="vertical-align: top; padding: 0px; margin: 0px;">
				<iframe  id="mainFrame" name="mainFrame" width="100%" frameborder="0" scrolling="yes" 
					src="<?php echo Url::to(['admin/welcome'])?>" onLoad="iFrameHeight()"></iframe>
<script type="text/javascript" language="javascript">
function iFrameHeight() 
{
	var contentHeight = document.body.scrollHeight-70;
	
//	console.log(contentHeight);
	
	var ifm= document.getElementById("mainFrame");
	ifm.height = contentHeight;
}
$(function(){
	$('.navbar-brand').css("marginLeft", "-80px");


	//平台、设备和操作系统  
    var system ={  
        win : false,  
        mac : false,  
        xll : false  
    };  
    //检测平台  
    var p = navigator.platform;    
      
    /**var sUserAgent = navigator.userAgent.toLowerCase(); 
    alert(sUserAgent);*/  
      
    system.win = p.indexOf("Win") == 0;  
    system.mac = p.indexOf("Mac") == 0;  
    system.x11 = (p == "X11") || (p.indexOf("Linux") == 0);  
    //跳转语句  
    if(system.win||system.mac||system.xll){//转向后台登陆页面  
         
    }else{  
        //修改手机样式
        $('nav').height(40);
        $('#w0-collapse').height(40); 
        $('#w0 .container .navbar-brand').remove();
        $('#w1 li').css({ "height":"40px;", "width":"8%", "overflow":"hidden" });
        $('#w1 li a').css({ "height":"10px;", "overflow":"hidden" });
    } 
});
</script> 
			</td>
		</tr>
	</table>
	
	<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
