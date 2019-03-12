<div class="container" style="padding-top:100px;">
  <div class="row">
     <div class="col-sm-4 offset-sm-4">
		 <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Авторизация</h3>
              </div>

             <form class="form-horizontal"  method="post" action="/admin/login">
                  <input type="hidden" value="<?=Yii::$app->request->getCsrfToken()?>" />
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-12 control-label">Логин</label>

                    <div class="col-sm-12">
                      <input name="username" type="text" class="form-control" id="inputEmail3" placeholder="логин">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-12 control-label">Пароль</label>

                    <div class="col-sm-12">
                      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="пароль">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="form-check">
                        <input type="checkbox" name="rememberMe" class="form-check-input" id="exampleCheck2">
                        <label class="form-check-label" for="exampleCheck2">Запомнить</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info float-right">Войти</button>
                  
                </div>
                <!-- /.card-footer -->
              </form>
            </div>   
    </div>
    </div>
</div>

