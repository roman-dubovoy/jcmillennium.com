<?php
echo $this->Html->script('jquery-3.1.1.js');
$this->Paginator->options([
    'url' => ['controller' => 'posts', 'action' => 'postsList'],
    'update' => '#content'
]);
?>
    <div class="col-xs-12">
        <?=$this->element('admin/side_bar');?>
        <div class="col-xs-10">
            <div class="header">
                <h3>Новости клуба:</h3>
                <button class="btn btn-primary" onclick="location.href = '/admin/athletes/addAthlete';">
                    <span class="fa fa-plus"></span>
                    Добавить новость
                </button>
            </div>
            <? if (count($postsList) > 0): ?>
            <div class="col-xs-12 athletes">
                <table class="col-xs-12 table table-striped table-responsive table-bordered athletes-list">
                    <tr class="row-text-center">
                        <th>ID</th>
                        <th>Заголовок</th>
                        <th>Текст</th>
                        <th>Фото</th>
                        <th>Операции</th>
                    </tr>
                    <? foreach ($postsList as $post): ?>
                        <tr>
                            <td class="text-center"><?=$post['Post']['id']?></td>
                            <td class="text-center"><?=$post['Post']['title']?></td>
                            <td class="text-center"d><?=$post['Post']['description']?></td>
                            <td></td>
                            <!--<td class="text-center">
                                <img src="<?/*='/img/athletes/' . $athlete['Athlete']['photo']*/?>" alt="" width="100">
                            </td>-->
                            <td class="text-center">
                                <a title="Редактировать" class="action" href="<?='/admin/posts/editPost/' . $post['Post']['id']?>">
                                    <i class="fa fa-pencil-square-o fa-2x"></i>
                                </a>
                                <a title="Удалить" class="action" href="<?='/admin/posts/deletePost/' . $post['Post']['id']?>">
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
            <? endif; ?>
        </div>
    </div>
<?=$this->Js->writeBuffer();?>