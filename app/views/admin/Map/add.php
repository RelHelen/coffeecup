<!-- Content Header (Page header) -->

<section class="content-header">
    <h1>
    Новая точка  
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="<?=ADMIN;?>/map">Список адресов</a></li>
        <li class="active">Добавление точки</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
<form action="<?=ADMIN;?>/map/add" method="post" data-toggle="validator">
    <div class="row">
        <div class="col-md-6">
        <div class="box">
            <div class="box-body">
            
            <div class="form-group has-feedback">
                <label for="name">Наименование</label>
                           
                <input type="text" name="name" class="form-control" id="name" placeholder="Наименование" value="" required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
            </div>

            <!-- <div class="form-group">
                <label for="descriptions">Описание</label>
                <input type="text" name="descriptions" class="form-control" id="descriptions" placeholder="Описание" value="" required>
                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>            
            </div>                        -->
                        
            <div class="form-group">
                <label for="tel">Телефон</label>
                 <input type="text" name="tel" class="form-control" id="tel" placeholder="Телефон" value="">
            </div>


                        <div class="form-group has-feedback">
                                   
                           
                           
                            <div class="row">
                           <div class="col-md-3">
                           <label for="cx">Координата X</label>
                            <input type="text" name="cx" class="form-control" id="cx" placeholder="cx" pattern="^[0-9\.]+$"  value=""  data-error="Допускаются цифры и десятичная точка">
                            <div class="help-block with-errors"></div>
                           </div>
                           <div class="col-md-3">
                           <label for="cx">Координата Y</label>
                            <input type="text" name="cy" class="form-control" id="cy" placeholder="cy" pattern="^[0-9\.]+$"  value=""  data-error="Допускаются цифры и десятичная точка">
                            <div class="help-block with-errors"></div>
                     
                           </div>
                           </div>
                            
                        </div>
                        <div class="form-group">
                            <section id="mapYa" class="map" style="width: 500px; height: 500px;">
                         
                                
                            </section>
                            
                        </div>


                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="status"> Работает
                            </label>
                        </div>                        


            </div>     
        </div>   
        </div>
        <div class="col-md-6">
            <div class="box">
               
            <div class="box-body">      

                <div class="form-group has-feedback">
                            <label for="descriptions">Описание</label>
                            <textarea name="descriptions" id="editor1" cols="80" rows="10"></textarea>
                </div>                       
                <div class="form-group">
                    <div class="col-md-6">
                        <div class="box box-danger__ box-solid file-upload">
                            <div class="box-header__">
                                        <p class="box-title">Изображение </p>
                            </div>
                            <div class="box-body_">
                                <div id="single" class="btn btn-primary" data-url="map/add-image" data-name="single">Выбрать файл</div>
                                <p><small>Рекомендуемые размеры: 300х300</small></p>
                                <div class="single  ">
                                <img src="<?=PATH?>/img/images/" alt="" style="max-height: 150px;">
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
     <input type="hidden" name="id" value=" ">
     <button type="submit" class="btn btn-primary">Добавить</button>
    </div>
    </form>
</section>
<!-- /.content -->
