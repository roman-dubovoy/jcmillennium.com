<div class="col-xs-12">
    <?=$this->element('admin/side_bar');?>
    <div class="col-xs-offset-2 col-xs-6">
        <h3 style="text-align: center;">Изменение записи пользователя:</h3>
        <p><?=$this->Session->flash();?></p>
        <?=$this->Form->create('User');?>
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" class="form-control" value="<?=$user['id']?>" disabled>
                <input type="text" id="id" name="id" value="<?=$user['id']?>" hidden>
            </div>
            <div class="form-group">
                <label for="name">Имя:</label>
                <input type="text" id="name" name="name" class="form-control" value="<?=$user['name']?>" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" class="form-control" value="<?=$user['email']?>" required>
            </div>
            <div class="form-group">
                <label for="login">Login:</label>
                <input type="text" id="login" name="login" class="form-control" value="<?=$user['login']?>" required>
            </div>
            <button id="edit-user-btn" class="btn btn-success">Сохранить изменения</button>
        <?=$this->Form->end();?>
    </div>
</div>