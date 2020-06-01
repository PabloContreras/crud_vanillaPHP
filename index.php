<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <title>Pablo Einar Contreras Gutiérrez</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,300;1,100&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/862a5ed651.js" crossorigin="anonymous"></script>
        <style type="text/css">
            input {
                border: 1px solid white !important;
            }
            body {
                font-family: 'Raleway', sans-serif !important;
            }
        </style>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="#">Navbar</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
		 	</button>

		  	<div class="collapse navbar-collapse" id="navbarColor02">
			    <ul class="navbar-nav">
			    	<li class="nav-item active">
			        	<a class="nav-link" href="#">Inicio</a>
			      	</li>
			      	<li class="nav-item dropdown ml-auto">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"> 
							<?php echo $_SESSION['name']; ?>
						</a>
					    <div class="dropdown-menu">
					    	<a class="dropdown-item" href="logout.php">cerrar sesión</a>
					    </div>
					</li>
			    </ul>
		  	</div>
		</nav>
		<div class="col-lg-10 ml-auto mr-auto mt-5">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<table class="table table-hover">
						<thead class="table-primary">
							<tr>
								<th scope="col">Id</th>
								<th scope="col">Título</th>
								<th scope="col">Contenido</th>
								<th scope="col"></th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$conexion = mysqli_connect("localhost","root","","crud");
                    			$registros = mysqli_query($conexion,"SELECT * FROM blog"); 
								
								while ( $fila = mysqli_fetch_array($registros) ){
									echo '<tr>';
									echo '<td>'.$fila ["id"].'</td>';
							      	echo '<td>'.$fila["title"].'</td>';
							      	echo '<td>'.$fila ["content"].'</td>';
							      	echo '<td><button class="btn btn-info" style="background-color:transparent; border: none;" data-toggle="modal" data-target="#exampleModal'.$fila ["id"].'"><i class="fas fa-edit" style="color:white;"></i></a></td>';

							      	echo '<td><a href="delete.php?id='.$fila ["id"].'"><i class="fas fa-trash-alt" style="color:white;"></i></button></td>';
									echo '</tr>';		
									echo  '<div class="modal fade" id="exampleModal'.$fila ["id"].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
										    <div class="modal-content">
										      	<div class="modal-header">
										        	<h5 class="modal-title" id="exampleModalLabel">Editar</h5>
										        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										          		<span aria-hidden="true">&times;</span>
										        	</button>
										      	</div>
										        <form method="POST" action="update.php?id='.$fila ["id"].'">
											      	<div class="modal-body">
										        		<div class="col-lg-12"> 
										        			<div class="row">
										        				<div class="col-lg-6">
										        					<div class="form-group">
																		<label class="col-form-label" for="inputTitle">Título</label>
																		<input type="text" class="form-control" placeholder="Ingresa el título" id="inputTitle" name="title" required="" value="'.$fila ["title"].'">
																	</div>
										        				</div>
										        			</div>
										        			<div class="row">
										        				<div class="col-lg-12">
											        				<div class="form-group">
																    	<label for="inputContent">Contenido</label>
																    	<textarea class="form-control" id="inputContent" rows="3" name="content" required="">'.ucfirst($fila ["content"]).'</textarea>
																    </div>
										        				</div>
										        			</div>
										        		</div>
											      	</div>
											      	<div class="modal-footer">
											        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
											        	<button type="submit" class="btn btn-primary">Guardar</button>
											   		</div>
										        </form>
										    </div>
									  	</div>
									</div>';					
								}
							 ?>
						</tbody>
					</table> 
				</div>
				<div class="col-lg-2">
					<button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Agregar</button>
				</div>
			</div>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
			    <div class="modal-content">
			      	<div class="modal-header">
			        	<h5 class="modal-title" id="exampleModalLabel">Agregar</h5>
			        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          		<span aria-hidden="true">&times;</span>
			        	</button>
			      	</div>
			        <form method="POST" action="store.php">
				      	<div class="modal-body">
				        		<div class="col-lg-12"> 
				        			<div class="row">
				        				<div class="col-lg-6">
				        					<div class="form-group">
												<label class="col-form-label" for="inputTitle">Título</label>
												<input type="text" class="form-control" placeholder="Ingresa el título" id="inputTitle" name="title" required="">
											</div>
				        				</div>
				        			</div>
				        			<div class="row">
				        				<div class="col-lg-12">
					        				<div class="form-group">
										    	<label for="inputContent">Contenido</label>
										    	<textarea class="form-control" id="inputContent" rows="3" name="content" required=""></textarea>
										    </div>
				        				</div>
				        			</div>
				        		</div>
				      	</div>
				      	<div class="modal-footer">
				        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				        	<button type="submit" class="btn btn-primary">Guardar</button>
				   		</div>
			        </form>
			    </div>
		  	</div>
		</div>
	</body>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript">
    	$('#myModal').on('shown.bs.modal', function () {
  			$('#myInput').trigger('focus')
		})
    </script>
</html>