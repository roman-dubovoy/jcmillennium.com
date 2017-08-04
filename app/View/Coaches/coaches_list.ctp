<div class="col-xs-12">
    <?=$this->element('admin/side_bar');?>
    <div class="col-xs-offset-1 col-xs-8">
        <table class="col-xs-10 table table-striped table-responsive coaches-list">
            <tr>
                <th>ID</th>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Отчество</th>
                <th>Описание</th>
                <th>Фото</th>
                <th>Операции</th>
            </tr>
            <? foreach ($coachesList as $coach): ?>
            <tr>
                <td><?=$coach['Coach']['id']?></td>
                <td><?=$coach['Coach']['surname']?></td>
                <td><?=$coach['Coach']['name']?></td>
                <td><?=$coach['Coach']['last_name']?></td>
                <td><?=$coach['Coach']['description']?></td>
                <td><?=$coach['Coach']['photo']?></td>
            </tr>
            <? endforeach; ?>
        </table>
    </div>
</div>