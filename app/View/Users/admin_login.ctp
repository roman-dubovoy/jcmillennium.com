<div class="login-logo">
    <?=$this->Html->image("millenium_logo.png",
        [
            'alt' => "Millennium JC logo",
            'width' => "100",
            'class' => 'col-xs-2 img-responsive'
        ]
    );?>
</div>
<div class="col-xs-12 auth-container">
    <div class="col-md-offset-4 col-md-4 auth">
        <p>Войти как администратор</p>
        <p id="login-result"><?=$this->Session->flash();?></p>
        <?=$this->Form->create('Admin');?>
            <?=$this->Form->input(false,
                [
                    'id' => 'AdminLogin',
                    'type' => 'text',
                    'name' => 'data[Admin][login]',
                    'class' => 'form-control',
                    'placeholder' => "Login...",
                    'required' => true,
                    'label' => false
                ]);
            ?>
            <?=$this->Form->input(false,
                [
                    'id' => 'AdminPassword',
                    'type' => 'password',
                    'name' => 'data[Admin][password]',
                    'class' => 'form-control',
                    'placeholder' => "Пароль...",
                    'required' => true
                ]);
            ?>
            <button id="loginButton" type="submit" class="btn btn-success login-btn">
                <span class="glyphicon glyphicon-log-in"></span>
                Войти
            </button>
        <?=$this->Form->end();?>
    </div>
</div>