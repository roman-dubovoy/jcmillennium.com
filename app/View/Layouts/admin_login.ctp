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
        echo $this->Html->css('admin_style.css');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>
</head>
<body>
<div id="admin-auth" class="container">
    <div id="content" class="row">
        <?=$this->Session->flash(); ?>
        <?=$this->fetch('content'); ?>
    </div>
</div>

<?=$this->Html->script('jquery-3.1.1.js');?>
<?=$this->Html->script('bootstrap.js');?>
<?=$this->Html->script('admin.js');?>
</body>
</html>
