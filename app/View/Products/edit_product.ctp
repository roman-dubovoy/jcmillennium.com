<div class="col-xs-12">
    <?=$this->element('admin/side_bar');?>
    <div class="col-xs-offset-2 col-xs-6">
        <h3 style="text-align: center;">Изменить товар:</h3>
        <p><?=$this->Session->flash();?></p>
        <?=$this->Form->create('Product', ['type' => 'file']);?>
        <div class="form-group">
            <label for="name">ID:</label>
            <input type="text" class="form-control" value="<?=$product['id']?>" disabled>
            <input type="hidden" id="id" name="id" value="<?=$product['id']?>">
        </div>
        <div class="form-group">
            <label for="name">Название:</label>
            <input type="text" id="name" name="name" class="form-control" value="<?=$product['name']?>" required>
        </div>
        <div class="form-group">
            <label for="name">Описание:</label><br>
            <textarea name="description" id="description" cols="30" rows="4" class="form-control" style="resize: none"><?=$product['description']?></textarea>
        </div>
        <div class="form-group">
            <label for="name">Стоимость:</label>
            <input type="text" id="cost" name="cost" class="form-control" value="<?=$product['cost']?>" required>
        </div>
        <div>
            <label for="photo">Фото (имя фото не должно содержать кирилические символы):</label><br>
            <img src="<?=$product['image']?>" width="100" class="product-image">
            <input type="file" id="photo" name="photo">
        </div>
        <div class="form-group">
            <label for="group">Группа товара:</label>
            <select name="group" id="group" class="form-control">
                <? foreach ($productGroups as $productGroup): ?>
                    <option value="<?=$productGroup['ProductGroup']['id']?>"
                        <? if ($productGroup['ProductGroup']['id'] == $product['product_group_id']) echo "selected";?>>
                        <?=$productGroup['ProductGroup']['name']?></option>
                <? endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-success" style="width: 100%">Сохранить изменения</button>
        <?=$this->Form->end();?>
    </div>
</div>