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
            JC MILLENNIUM | Admin panel
        </title>
        <?php
        echo $this->Html->css('bootstrap.css');
        echo $this->Html->css('font-awesome.css');
        echo $this->Html->css('jquery.dataTables.css');
        echo $this->Html->css('style.css');
        echo $this->Html->css('admin_style.css');

        echo $this->fetch('meta');
        echo $this->fetch('css');
        ?>
    </head>
    <body>
    <div id="container" class="container">
        <div id="header" class="row">
            <?=$this->element('header_top');?>
        </div>

        <div id="content" class="row">
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->fetch('content'); ?>
        </div>

        <div id="footer" class="row">
            <?=$this->element('admin/footer');?>
        </div>
    </div>
    <?=$this->Html->script('jquery-3.1.1.js');?>
    <?=$this->Html->script('bootstrap.js');?>
    <?=$this->Html->script('jquery.dataTables.js');?>
    <?=$this->Html->script('admin.js');?>

    <?=$this->fetch('scripts');?>

    </body>
</html>