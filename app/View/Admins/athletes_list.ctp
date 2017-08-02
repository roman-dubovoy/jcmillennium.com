<? if($this->Session->read('isAdmin')): ?>
    <div class="col-xs-12">
        <?=$this->element('admin/side_bar');?>
        <div class=" col-xs-offset-1 col-xs-8 athletes">
            <table class="col-xs-10 table table-striped table-responsive table-bordered athletes-list">
                <tr>
                    <th>ID</th>
                    <th>Фамилия</th>
                    <th>Имя</th>
                    <th>Описание</th>
                    <th>Фото</th>
                    <th>Операции</th>
                </tr>
                <? foreach ($athletesList as $athlete): ?>
                    <tr>
                        <td><?=$athlete['Athlete']['id']?></td>
                        <td><?=$athlete['Athlete']['surname']?></td>
                        <td><?=$athlete['Athlete']['name']?></td>
                        <td><?=$athlete['Athlete']['description']?></td>
                        <td><?=$athlete['Athlete']['photo']?></td>
                        <td><?=$this->Html->link("Редактировать", "/athletes/edit/{$athlete['Athlete']['id']}") . " | " .
                            $this->Html->link("Удалить", "/athletes/delete/{$athlete['Athlete']['id']}");?></td>
                    </tr>
                <? endforeach; ?>
            </table>
        </div>
    </div>
<? endif; ?>