<div class="col-xs-12">
    <div class="col-xs-offset-3 col-xs-6 registration">
        <h3>Регистрация</h3>
        <div id="result"></div>
        <?=$this->Form->create('User');?>
            <?=$this->Form->input('User.name', [
                    'label' => false,
                    'class' => 'form-control',
                    'placeholder' => 'Введите имя...'
                ]);
            ?>
            <?=$this->Form->input('User.email', [
                    'label' => false,
                    'class' => 'form-control',
                    'placeholder' => 'Введите e-mail...'
                ]);
            ?>
            <?=$this->Form->input('User.login', [
                    'label' => false,
                    'class' => 'form-control',
                    'placeholder' => 'Введите логин...'
                ]);
            ?>
            <?=$this->Form->input('User.password', [
                    'label' => false,
                    'class' => 'form-control',
                    'placeholder' => 'Введите пароль...'
                ]);
            ?>
            <input id="passwordRepeat" name="passwordRepeat" class="form-control" type="password" placeholder="Повторите пароль..." required>
            <button id="reg-btn"  type="button" class="btn btn-success">Зарегистрироваться</button>
        <?=$this->Form->end();?>
    </div>
</div>