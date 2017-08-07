<div class="col-xs-12">
    <?=$this->element('admin/side_bar');?>
    <div class="col-xs-10">
        <div class="header">
            <h3>Изменить информацию о спортсмене:</h3>
            <button class="btn btn-primary" onclick="location.href = '/admin/athletes';">
                <i class="fa fa-arrow-left"></i>
                На предыдущую страницу
            </button>
        </div>
        <form action="<?='/admin/athletes/editAthlete/' . $athlete['id']?>" method="post" enctype="multipart/form-data" class="form col-xs-offset-1 col-xs-10">
            <?=$this->Session->flash();?>
            <div class="form-group">
                <label for="surname">Фамилия:</label>
                <input type="text" id="surname" name="surname" class="form-control" value="<?=$athlete['surname'];?>" placeholder="Фамилия..." autocomplete="off">
            </div>
            <div class="form-group">
                <label for="name">Имя:</label>
                <input type="text" id="name" name="name" class="form-control" value="<?=$athlete['name'];?>" placeholder="Имя..." autocomplete="off">
            </div>
            <div class="form-group">
                <label for="last_name">Описание:</label>
                <textarea name="description" id="description" cols="30" rows="7" class="form-control non-resizable-textarea" placeholder="Описание..." ><?=$athlete['description']?></textarea>
            </div>
            <div class="form-group">
                <label for="last_name">Фото:</label><br>
                <img src="<?='/img/athletes/' . $athlete['photo'];?>" alt="" width="200">
                <input type="file" name="photo">
            </div>
            <button type="submit" class="btn btn-success">Изменить</button>
        </form>
    </div>
</div>