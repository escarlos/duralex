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
    <title>Lawyers</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
     
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.css" /> 
</head>
<body>	
    <div><a href="<?=URL?>controlador/cierrasesion.php">Cerrar sesión</a></div>
    <div><a href="<?=URL?>">Volver Atras</a></div>
    <table class="table table-hover table-stripped table-bordered" style=" height: 169px ">
		<thead class="thead-inverse">
			<th>Rut</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>Contrato</th>
			<th>Especialidad</th>
			<th>Valor Hora</th>
		</thead>
                <?php 
                 $oListado=new Abogado();
                ?>
		<tbody>
			<?php foreach ($oListado->ListarAbogados() as $value): ?>
				<tr>
					<td><?= $value->rut?></td>
					<td><?= $value->pnombre ?></td>
					<td><?= $value->papellido ?></td>     
					<td><?= $value->contrato ?></td>
					<td><?= $value->especialidad ?></td>
					<td><?= $value->valorhora ?></td>     
                                        <?php   if ($oUsu->profileId=='1') {?>
                                         <td><a href="<?=URL?>controlador/deleteLaw.php?rut=<?= $value->rut?>" >ELIMINAR</a></td>
					<td><a href="<?=HOST?>controlador/editLaw.php?id=<?= $value->rut?>" >EDITAR</a></td>
                                     <?php       }?>
                                        
				</tr>
			<?php endforeach; ?>
			<tr>              
				<form action="<?=URL?>controlador/registerLawyers.php" method="POST">
					<td><input placeholder="22552796-2" type="text" class="form-control" name="rut"></td>
					<td><input placeholder="nombre" type="text" class="form-control" name="nombre"></td>
					<td><input placeholder="apellido" type="text" class="form-control" name="apellido"></td>
                                        <td><input placeholder="2017-04-07" type="text" class="form-control" name="contrato" id="contrato"></td>
					<td><input placeholder="especialidad" type="text" class="form-control" name="especialidad"></td>
                                        <td><input placeholder="$3000" type="number" class="form-control" name="valorHora"></td>
										
					<td><input type="submit" class="btn-warning" value="Enviar"></td>
				</form>
			</tr>
		</tbody>
	</table>
    <script>
        $(document).ready(() => {
        	$('#contrato').datepicker({ maxDate: '+0d', dateFormat: 'yy-dd-mm'});         
        });
    </script>
</body>
</html>
