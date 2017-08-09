<div class="header-bottom col-xs-12">
    <ul class="main-menu nav nav-pills nav-justified col-xs-12">
        <li><?=$this->Html->link('ГЛАВНАЯ', ['controller' => 'pages', 'action' => 'home'],
                ['class' => $this->request->url == 'home' || $this->request->url == '' ? 'active' : '']);?></li>
        <li><?=$this->Html->link('КЛУБ', ['controller' => 'pages', 'action' => 'club'],
                ['class' => $this->request->url == 'club' ? 'active' : '']);?></li>
        <li><?=$this->Html->link('НОВОСТИ', ['controller' => 'posts', 'action' => 'index'],
                ['class' => $this->request->url == 'news' ? 'active' : '']);?></li>
        <li><?=$this->Html->link('РЕЗУЛЬТАТЫ', ['controller' => 'posts', 'action' => 'results'],
                ['class' => $this->request->url == 'results' ? 'active' : '']);?></li>
        <li><?=$this->Html->link('ТРЕНЕРЫ', ['controller' => 'coaches', 'action' => 'index'],
                ['class' => $this->request->url == 'coaches' ? 'active' : '']);?></li>
        <li><?=$this->Html->link('СПОРТСМЕНЫ', ['controller' => 'athletes', 'action' => 'index'],
                ['class' => $this->request->url == 'athletes' ? 'active' : '']);?></li>
        <li><?=$this->Html->link('КОНТАКТЫ', ['controller' => 'pages', 'action' => 'contacts'],
                ['class' => $this->request->url == 'contacts' ? 'active' : '']);?></li>
    </ul>
</div>