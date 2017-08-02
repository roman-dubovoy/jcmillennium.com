<div class="col-xs-12">
    <div class="col-xs-offset-3 col-xs-6 registration">
        <h3>Регистрация</h3>
        <?=$this->Form->create('User');?>
        <form id="registrationForm">
            <input id="name" name="name" class="form-control" type="text" placeholder="Введите имя...">
            <div class="form-group has-feedback">
                <input id="email" name="email" class="form-control" type="email" placeholder="Введите e-mail..." required>
                <i class="glyphicon glyphicon-asterisk form-control-feedback"></i>
            </div>
            <div class="form-group has-feedback">
                <input id="login" name="login" class="form-control" type="text" placeholder="Введите логин..." required>
                <i class="glyphicon glyphicon-asterisk form-control-feedback"></i>
            </div>
            <div class="form-group has-feedback">
                <input id="password" name="password" class="form-control" type="password" placeholder="Введите пароль..." required>
                <i class="glyphicon glyphicon-asterisk form-control-feedback"></i>
            </div>
            <div class="form-group has-feedback">
                <input id="passwordRepeat" name="passwordRepeat" class="form-control" type="password" placeholder="Повторите пароль..." required>
                <i class="glyphicon glyphicon-asterisk form-control-feedback"></i>
            </div>
            <button id="reg-btn"  type="button" class="btn btn-success">Зарегистрироваться</button>
        </form>
    </div>
</div>