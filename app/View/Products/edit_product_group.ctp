<div class="col-xs-12">
    <?=$this->element('admin/side_bar');?>
    <div class="col-xs-offset-2 col-xs-6">
        <h3 style="text-align: center;">Изменение группы товаров:</h3>
        <p><?=$this->Session->flash();?></p>
        <?=$this->Form->create('ProductGroup');?>
        <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" class="form-control" value="<?=$productGroup['id']?>" disabled>
            <input type="text" id="id" name="id" value="<?=$productGroup['id']?>" hidden>
        </div>
        <div class="form-group">
            <label for="name">Название:</label>
            <input type="text" id="name" name="name" class="form-control" value="<?=$productGroup['name']?>" required>
        </div>
        <button id="edit-product-group-btn" class="btn btn-success" type="submit">Сохранить изменения</button>
        <?=$this->Form->end();?>
    </div>
</div>