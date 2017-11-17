@extends('template.main')

<!DOCTYPE html>
<html lang="en">
    <head> 
		<meta name="viewport" content="width=device-width, initial-scale=1">


		<!-- Website CSS style -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		<link rel="stylesheet" href="style.css">
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

		<title>Cooperativa</title>
	</head>
	<body>
    <div class="col-md-10 col-md-offset-1">
        
        </div>
        
        <div class="col-md-10 col-md-offset-1">
          <div class="well well bs-component">
           <form class="form-horizontal" (ngSubmit)="createUser(createUserForm.value)" #createUserForm="ngForm">
              <fieldset>
                <legend>Anadir Nuevo Usuario</legend>
                <div class="form-group">
                  <label for="ci" class="col-lg-2 control-label">Ci</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" id="ci" name="ci" placeholder="Ingrese Cedula" ngModel>
                  </div>
                </div>
                <div class="form-group">
                    <label for="Nombre" class="col-lg-2 control-label">Nombre</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese Nombre" ngModel>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Apellido" class="col-lg-2 control-label">Apellido</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese Apellido" ngModel>
                    </div>
                </div>


                <div class="form-group">
                  <label for="telefono" class="col-lg-2 control-label">TÃ­tulo</label>
                  <div class="col-lg-10">
                    <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Ingrese Titulo" ngModel>
                  </div>
                </div>
                <div class="form-group">
                  <label for="direccion" class="col-lg-2 control-label">Direccion</label>
                  <div class="col-lg-10">
                      <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese Direccion" ngModel>
                  </div>
                </div>

                <div class="form-group">
                    <label for="correo" class="col-lg-2 control-label">Correo</label>
                    <div class="col-lg-10">
                      <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingrese Correo" ngModel>
                    </div>
                  </div>


                  <div class="form-group">
                      <label for="usuario" class="col-lg-2 control-label">Usuario</label>
                      <div class="col-lg-10">
                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingrese Usuario" ngModel>
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-lg-2 control-label">Password</label>
                        <div class="col-lg-10">
                          <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese Password" ngModel>
                        </div>
                      </div>
        
                <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    <button class="btn btn-default">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Crear</button>
                  </div>
                </div>
              </fieldset>
            </form>
          </div>
        </div>

		 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	</body>
</html>