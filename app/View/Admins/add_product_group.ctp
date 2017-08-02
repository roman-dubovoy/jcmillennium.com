<div class="col-xs-12">
    <?=$this->element('admin/side_bar');?>
    <div class="col-xs-offset-2 col-xs-6">
        <h3 style="text-align: center;">Добавить группу товаров:</h3>
        <p><?=$this->Session->flash();?></p>
        <?=$this->Form->create('ProductGroup');?>
            <div class="form-group">
                <label for="name">Название группы:</label>
                <input type="text" id="name" name="name" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Добавить</button>
        <?=$this->Form->end();?>
    </div>
</div>