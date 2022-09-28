<!doctype html>
<html lang="en">
  <head>
    <title> Login </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
                    

                <div class="container">
                  <form  method="post" action="app/ingresar.php" autocomplete="on">
                  <h3>Ingresar</h3> 
                    <div class="form-group row">
                      <label for="username" class="col-md-2 col-form-label">Tu usuario</label>
                      <div class="col-sm-1-12">
                      <input id="usuario" class="form-control" name="usuario" required="required" type="text"/>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="username" class="col-md-2 col-form-label">Contraseña</label>
                      <div class="col-sm-1-12">
                      <input id="contraseña" class="form-control" name="contraseña" required="required" type="password"/> 
                      </div>
                    </div>
                    <div class="offset-md-2">
                      <p class="change_link">
									Aun no eres miembro ?
									<a href="registrar.php" class="btn btn-primary">Regístrate</a>
								</p>
                    <div class="form-group row">
                      <div class="offset-md-20">
                      <input type="submit" class="btn btn-primary" name="submit" value="Ingresar" /> 
                      </div>
                    </div>
                  </form>
                </div>
                </div>
            </div>
                
            </div>
            
        </div>
    </div>
  </body>
</html>