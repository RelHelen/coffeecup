<!-- Content Header (Page header) -->
 
<section class="content-header">
    <h1>
        Редактирование товара <?=$product->title;?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="<?=ADMIN;?>/product">Список товаров</a></li>
        <li class="active">Редактирование</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
<form action="<?=ADMIN;?>/product/edit" method="post" data-toggle="validator">
    <div class="row">
        <div class="col-md-6">
        <div class="box">
            <div class="box-body">
            <div class="form-group has-feedback">
                            <label for="title">Наименование товара</label>
                           
                            <input type="text" name="title" class="form-control" id="title" placeholder="Наименование товара" value="<?=($product->title);?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>

                        <div class="form-group">
                            <label for="category_id">Раздел</label>
                            <?php new \app\widgets\menu\Menu([
                                'tpl' => WWW . '/menu/select.php',
                                'container' => 'select',
                                'cache' => 0,
                                'cacheKey' => 'admin_select',
                                'class' => 'form-control',
                                'attrs' => [
                                    'name' => 'id_category',
                                    'id' => 'id_category',
                                ],
                            ]) ?>
                        </div>
                       
                       
                        
                        <div class="form-group">
                            <label for="description">Описание</label>
                            <input type="text" name="description" class="form-control" id="description" placeholder="Описание" value="<?=hsc($product->content);?>">
                        </div>

                        <div class="form-group has-feedback">
                                    <!-- card  --> 
                            <?php if(!empty($modify)):?>
                                <div class="card card-danger">
                                <div class="card-header">
                                      <label for="price">Цена</label> 
                                </div>
                                <?php// debug($modify);                                 
                                ?>
                                <div class="card-body">
                                    <div class="row">
                                        <?php  $i=1; foreach($modify as $mod):?>
                                            <div class="col-md-3">
                                            <label for="price<?=$i?>"><?php echo $mod['title'] ;echo $mod['cyr'];  ?></label>  
                                            <input id="price<?=$i?>" name="price<?=$i?>" type="text" value="<?=$mod['price']?>" class="form-control" placeholder=" ">
                                            </div>
                                            
                                            <?php endforeach; ?>
                                    </div>
                                </div>
                                
                                </div>  <!-- /card  -->
                                <br>
                            <?php endif; ?>
                           <div class="row">
                           <div class="col-md-3">
                           <label for="price">Основная цена</label>
                            <input type="text" name="price" class="form-control" id="price" placeholder="Цена" pattern="^[0-9.]{1,}$" value="<?=$product->price;?>" required data-error="Допускаются цифры и десятичная точка">
                            <div class="help-block with-errors"></div>
                           </div>
                           <div class="col-md-3">
                           <label><?=($product->id_catalog==1)? 'Объем' :  'Вес'?>                      

                           </label>
                            <input type="text" name="size" class="form-control" id="size" placeholder=" " pattern="^[0-9.]{1,}$" value="<?=$product->size;?>" required data-error="Допускаются цифры">
                            <div class="help-block with-errors"></div>
                           </div>
                           </div>
                            
                        </div>


                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="status"<?=$product->status ? ' checked' : null;?>> В наличие
                            </label>
                        </div>

                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="sale"<?=$product->sale ? ' checked' : null;?>> Sale
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="related">Связанные товары</label>
                            <select name="related[]" class="form-control select2" id="related" multiple>
                                <?php if(!empty($related_product)): ?>
                                    <?php foreach($related_product as $item): ?>
                                        <option value="<?=$item['related_id'];?>" selected><?=$item['title'];?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>

            </div>     
        </div>   
        </div>
        <div class="col-md-6">
            <div class="box">
               
                    <div class="box-body">      

                        <div class="form-group has-feedback">
                            <label for="content">Контент</label>
                            <textarea name="content" id="editor1" cols="80" rows="10"><?=$product->content;?></textarea>
                        </div>                       
                        <div class="form-group">
                            <div class="col-md-6">
                                <div class="box box-danger__ box-solid file-upload">
                                    <div class="box-header__">
                                        <p class="box-title">Изображение для продукции</p>
                                    </div>
                                    <div class="box-body_">
                                        <div id="single" class="btn btn-success" data-url="product/add-image" data-name="single">Выбрать файл</div>
                                        <p><small>Рекомендуемые размеры: 125х200</small></p>
                                        <div class="single">
                                            <img src="<?=PATH.'/img/product/'.$product->img;?>" alt="" style="max-height: 150px;">
                                        </div>
                                    </div>
                                    <div class="overlay">
                                        <i class="fa fa-refresh fa-spin"></i>
                                    </div>
                                </div>
                            </div>                      
                        </div>
                        
                    </div>               
               
            </div>
        </div>
        
    </div>
    <div class="box-footer">
                        <input type="hidden" name="id" value="<?=$product->id;?>">
                        <button type="submit" class="btn btn-success">Сохранить</button>
                    </div>
    </form>
</section>
<!-- /.content -->