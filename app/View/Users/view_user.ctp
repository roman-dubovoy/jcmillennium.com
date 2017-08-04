<div class="col-xs-12">
    <?=$this->element('admin/side_bar');?>
    <div class="col-xs-10">
        <h3>Инфомация о пользователе:</h3>
        <hr>
        <h4>ID: <?=$user['id'];?></h4>
        <h4>Имя: <?=$user['name'];?></h4>
        <h4>Login: <?=$user['login'];?></h4>
        <h4>E-mail: <?=$user['email'];?></h4>
    </div>
</div>