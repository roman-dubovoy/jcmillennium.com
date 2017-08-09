<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php //echo $this->fetch('title'); ?>
		JC MILLENNIUM
	</title>
	<?php
		echo $this->Html->css('bootstrap.css');
		echo $this->Html->css('font-awesome.css');
		echo $this->Html->css('style.css');

		echo $this->fetch('meta');
		echo $this->fetch('css');
	?>
</head>
<body>
	<!--<div id="fb-root"></div>
	<script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.10&appId=303988003399001";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>-->
	<div id="container" class="container">
		<div id="header" class="row">
			<?=$this->element('header');?>
		</div>

		<div id="content" class="row">
			<?=$this->Session->flash(); ?>
			<div class="col-xs-12">
				<? if ($this->request->url == '' || $this->request->url == 'home')
					echo $this->element('photo_slider');
				?>
				<?=$this->element("side_bar");?>
				<?=$this->fetch('content'); ?>
			</div>
		</div>

		<div id="footer" class="row">
			<?=$this->element('footer');?>
		</div>
	</div>
	<?=$this->Html->script('jquery-3.1.1.js');?>
	<?=$this->Html->script('bootstrap.js');?>
	
	<?=$this->fetch('scripts');?>

	<?/*=$this->Html->script('header.js');*/?>
	<?/*=$this->Html->script('jquery.validate.js');*/?>
	<?/*=$this->Html->script('validation.js');*/?>
	<?/*=$this->Html->script('userRegistration.js');*/?>
</body>
</html>
