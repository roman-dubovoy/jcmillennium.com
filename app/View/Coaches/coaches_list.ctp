<div class="col-xs-12">
    <?=$this->element('admin/side_bar');?>
    <div class="col-xs-10">
        <div class="header">
            <h3>Тренеры клуба:</h3>
            <button class="btn btn-primary" onclick="location.href = '/admin/coaches/addCoach';">
                <span class="fa fa-plus"></span>
                Добавить тренера
            </button>
        </div>
        <table class="col-xs-10 table table-striped table-responsive table-bordered coaches-list">
            <tr class="row-text-center">
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
                <td class="text-center"><?=$coach['Coach']['id']?></td>
                <td class="text-center"><?=$coach['Coach']['surname']?></td>
                <td class="text-center"><?=$coach['Coach']['name']?></td>
                <td class="text-center"><?=$coach['Coach']['last_name']?></td>
                <td><?=$coach['Coach']['description']?></td>
                <td class="text-center">
                    <img src="<?='/img/coaches/' . $coach['Coach']['photo']?>" alt="" width="200">
                </td>
                <td class="text-center">
                    <a title="Редактировать"class="action" href="<?='/admin/coaches/editCoach/' . $coach['Coach']['id']?>">
                        <i class="fa fa-pencil-square-o fa-2x"></i>
                    </a>
                    <a title="Удалить" class="action" href="<?='/admin/coaches/deleteCoach/' . $coach['Coach']['id']?>">
                        <i class="fa fa-remove fa-2x"></i>
                    </a>
                </td>
            </tr>
            <? endforeach; ?>
        </table>
    </div>
</div>