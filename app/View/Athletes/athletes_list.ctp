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
                    <tr class="row-text-center">
                        <td><?=$athlete['Athlete']['id']?></td>
                        <td><?=$athlete['Athlete']['surname']?></td>
                        <td><?=$athlete['Athlete']['name']?></td>
                        <td><?=$athlete['Athlete']['description']?></td>
                        <td>
                            <img src="<?='/img/athletes/' . $athlete['Athlete']['photo']?>" alt="" width="100">
                        </td>
                        <td>
                            <a class="action" href="<?='/admin/athletes/editAthlete/' . $athlete['Athlete']['id']?>">
                                <i class="fa fa-pencil-square-o fa-2x"></i>
                            </a>
                            <a class="action" href="<?='/admin/athletes/deleteAthlete/' . $athlete['Athlete']['id']?>">
                                <i class="fa fa-remove fa-2x"></i>
                            </a>
                        </td>
                    </tr>
                <? endforeach; ?>
            </table>
        </div>
    </div>
</div>