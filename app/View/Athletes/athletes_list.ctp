<?php
    echo $this->Html->script('jquery-3.1.1.js');
    $this->Paginator->options([
        'url' => ['controller' => 'athletes', 'action' => 'athletesList'],
        'update' => '#content'
    ]);
?>
<div class="col-xs-12">
    <?=$this->element('admin/side_bar');?>
    <div class="col-xs-10">
        <div class="header">
            <h3>Спортсмены клуба:</h3>
            <button class="btn btn-primary" onclick="location.href = '/admin/athletes/addAthlete';">
                <span class="fa fa-plus"></span>
                Добавить спортсмена
            </button>
        </div>
        <div class="col-xs-12 athletes">
            <table class="col-xs-12 table table-striped table-responsive table-bordered athletes-list">
                <tr class="row-text-center">
                    <th>ID</th>
                    <th>Фамилия</th>
                    <th>Имя</th>
                    <th>Описание</th>
                    <th>Фото</th>
                    <th>Операции</th>
                </tr>
                <? foreach ($athletesList as $athlete): ?>
                    <tr>
                        <td class="text-center"><?=$athlete['Athlete']['id']?></td>
                        <td class="text-center"><?=$athlete['Athlete']['surname']?></td>
                        <td class="text-center"d><?=$athlete['Athlete']['name']?></td>
                        <td><?=$athlete['Athlete']['description']?></td>
                        <td class="text-center">
                            <img src="<?='/img/athletes/' . $athlete['Athlete']['photo']?>" alt="" width="100">
                        </td>
                        <td class="text-center">
                            <a title="Редактировать" class="action" href="<?='/admin/athletes/editAthlete/' . $athlete['Athlete']['id']?>">
                                <i class="fa fa-pencil-square-o fa-2x"></i>
                            </a>
                            <a title="Удалить" class="action" href="<?='/admin/athletes/deleteAthlete/' . $athlete['Athlete']['id']?>">
                                <i class="fa fa-remove fa-2x"></i>
                            </a>
                        </td>
                    </tr>
                <? endforeach; ?>
            </table>
        </div>
        <div class="col-xs-12 pagination-wrapper">
            <? $this->Paginator->options(['url' => ['controller' => 'athletes', 'action' => 'athletesList']]); ?>
            <?=$this->Paginator->first('Первая', ['tag' => 'button', 'class' => 'paginate-btn'], null, ['class' => 'disabled']);?>
            <?=$this->Paginator->prev('Назад', ['tag' => 'button', 'class' => 'paginate-btn'], null, ['class' => 'non-accessible']);?>
            <?=$this->Paginator->numbers(['tag' => 'button', 'class' => 'paginate-btn', 'separator' => '']);?>
            <?=$this->Paginator->next('Вперёд', ['tag' => 'button', 'class' => 'paginate-btn'], null, ['class' => 'non-accessible']);?>
            <?=$this->Paginator->last('Последняя', ['tag' => 'button', 'class' => 'paginate-btn'], null, ['class' => 'disabled']);?>
        </div>
    </div>
</div>
<?=$this->Js->writeBuffer();?>
<script>
    if (history && history.pushState) {
        $('.pagination-wrapper a').on('click', function () {
            $.getScript(this.href);
            history.pushState(null, document.title, this.href);
            return false;
        });
        $(window).bind("popstate", function () {
            $.getScript(location.href);
        });
    }
    window.scrollTo(0,0);
</script>
