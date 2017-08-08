<div class="header-bottom col-xs-12">
    <ul class="main-menu nav nav-pills nav-justified col-xs-12">
        <li><?=$this->Html->link('ГЛАВНАЯ', ['controller' => 'posts', 'action' => 'index'],
                ['class' => $this->request->url == 'home' || $this->request->url == '' ? 'active' : '']);?></li>
        <li><a href="#">КЛУБ</a></li>
        <li><a href="#">НОВОСТИ</a></li>
        <li><a href="#">РЕЗУЛЬТАТЫ</a></li>
        <li><?=$this->Html->link('ТРЕНЕРЫ', ['controller' => 'coaches', 'action' => 'index'],
                ['class' => $this->request->url == 'coaches' ? 'active' : '']);?></li>
        <li><?=$this->Html->link('СПОРТСМЕНЫ', ['controller' => 'athletes', 'action' => 'index'],
                ['class' => $this->request->url == 'athletes' ? 'active' : '']);?></li>
        <li><?=$this->Html->link('КОНТАКТЫ', ['controller' => 'pages', 'action' => 'contacts'],
                ['class' => $this->request->url == 'contacts' ? 'active' : '']);?></li>
    </ul>
</div>