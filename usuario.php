<?php
include 'librerias.php';
session_start();
if(!isset($_SESSION["USR"])){
                
header('Location: '.URL);
exit;
 }
 $oUsu=$_SESSION["USR"];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Usuarios</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>

</head>
<body>	
    <div><a href="<?=URL?>controlador/cierrasesion.php">Cerrar sesión</a></div>
    <div><a href="<?=URL?>">Volver Atras</a></div>
    <table class="table table-hover table-stripped table-bordered" style=" height: 169px ">
		<thead class="thead-inverse">
			<th>Username</th>
			<th>Password</th>
			<th>Perfil</th>
		</thead>
                <?php 
                 $oListado=new User();
                ?>
		<tbody>
			<?php foreach ($oListado->ListarUsuarios() as $value): ?>
				<tr>
					<td><?= $value->username?></td>
					<td><?= '**********' ?></td>
					<td><?= $value->profileId ?></td>                                             
                                         <td><a href="<?=URL?>controlador/delete.php?id=<?= $value->id?>" >ELIMINAR</a></td>
					<td><a href="<?=HOST?>controlador/editUser.php?id=<?= $value->id?>" >EDITAR</a></td>
                                        
				</tr>
			<?php endforeach; ?>
			<tr>
                            <?php 
                                  $oPerfiles=new Perfil();
                              ?>
				<form action="<?=URL?>controlador/registerUser.php" method="POST">
					<td><input placeholder="username" type="text" class="form-control" name="nombreUser"></td>
					<td><input placeholder="password" type="text" class="form-control" name="pass"></td>
					<td>
						<select name="idCamion">
							<?php foreach ($oPerfiles->ListarPerfiles() as $value): ?>
								<option  value="<?php echo $value->id; ?>"><?= $value->nombre ?></option>
							<?php endforeach ?>	
						</select>
					</td>					
					<td><input type="submit" class="btn-warning" value="Enviar"></td>
				</form>
			</tr>
		</tbody>
	</table>
</body>
</html>
