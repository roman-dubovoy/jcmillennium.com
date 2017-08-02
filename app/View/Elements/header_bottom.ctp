<div class="header-bottom col-xs-12">
    <ul class="main-menu nav nav-pills nav-justified col-xs-12">
        <li><?=$this->Html->link('ГЛАВНАЯ', ['controller' => 'news', 'action' => 'index'], ['class' => 'active']);?></li>
        <li><a href="#">КЛУБ</a></li>
        <li><a href="#">НОВОСТИ</a></li>
        <li><a href="#">РЕЗУЛЬТАТЫ</a></li>
        <li><?=$this->Html->link('ТРЕНЕРЫ', ['controller' => 'coaches', 'action' => 'index']);?></li>
        <li><?=$this->Html->link('СПОРТСМЕНЫ', ['controller' => 'athletes', 'action' => 'index']);?></li>
        <li><?=$this->Html->link('КОНТАКТЫ', ['controller' => 'pages', 'action' => 'contacts']);?></li>
    </ul>
</div>