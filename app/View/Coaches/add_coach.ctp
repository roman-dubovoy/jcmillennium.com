<div class="col-xs-12">
    <?=$this->element('admin/side_bar');?>
    <div class="col-xs-10">
        <div class="header">
            <h3>Добавить нового тренера:</h3>
            <button class="btn btn-primary" onclick="location.href = '/admin/coaches';">
                <i class="fa fa-arrow-left"></i>
                На предыдущую страницу
            </button>
        </div>
        <form action="/admin/coaches/addCoach" method="post" enctype="multipart/form-data" class="form col-xs-offset-1 col-xs-10">
            <?=$this->Session->flash();?>
            <div class="form-group">
                <label for="surname">Фамилия:</label>
                <input type="text" id="surname" name="surname" class="form-control" placeholder="Фамилия..." autocomplete="off">
            </div>
            <div class="form-group">
                <label for="name">Имя:</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Имя..." autocomplete="off">
            </div>
            <div class="form-group">
                <label for="last_name">Отчество:</label>
                <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Отчество..." autocomplete="off">
            </div>
            <div class="form-group">
                <label for="last_name">Описание:</label>
                <textarea name="description" id="description" cols="30" rows="7" class="form-control non-resizable-textarea" placeholder="Описание..." ></textarea>
            </div>
            <div class="form-group">
                <label for="last_name">Фото:</label>
                <p class="important-hint">Во избежание искажения изображения, загружайте фото с равными длинной и шириной. Например, 300х300.</p>
                <input type="file" name="photo">
            </div>
            <button type="submit" class="btn btn-success">Добавить</button>
        </form>
    </div>
</div>