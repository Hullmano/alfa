<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 	<link rel="stylesheet" href="/resource/bs_css/bootstrap.min.css">
 	<!--<link rel="stylesheet" type="text/css" href="/resource/bank_check.css">-->
 	<!--<link rel="stylesheet" type="text/css" href="resource/normalize.css">-->
</head>
<body onload="Today()">
	<div class="container">

		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="/client">Clientes</a>
			<a class="navbar-brand" href="/bank_check">Cheques</a>			
			<a class="navbar-brand" href="/calculation">Cálculos</a>
			<a class="navbar-brand ml-auto" href="/logout">Logout</a>
		</nav>
		
		<div class="d-flex">	   
		    <!-- Sidebar -->
		    <div class="bg-light border-right" id="sidebar-wrapper">
		      <div class="list-group list-group-flush">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Relatórios</a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="#"></a>
		          <a class="dropdown-item" href="#"></a>
		          <a class="dropdown-item" href="#"></a>
		        </div>
		      </div>
		    </div>
	  	</div>
	    <!-- /#sidebar-wrapper -->

		<div class="p-5 text-center">
			<h2 class="h2">Master</h2>
		</div>    

		<div class="col-md table-responsive-sm table-striped text-lowercase">
			<table border="1px" cellpadding="5px" cellspacing="0">
				<thead>
					<tr>
						<th>Id</th>
						<th>Login</th>
						<th>Password</th>
						<th>Register</th>
						<th>Actived</th>
					</tr>	
				</thead>
				<tbody>
					<?php $counter1=-1;  if( isset($Data) && ( is_array($Data) || $Data instanceof Traversable ) && sizeof($Data) ) foreach( $Data as $key1 => $value1 ){ $counter1++; ?>
					<tr>
						<td><?php echo htmlspecialchars( $value1["userId"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
						<td><?php echo htmlspecialchars( $value1["userLogin"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
						<td><?php echo htmlspecialchars( $value1["userPassword"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
						<td><?php echo htmlspecialchars( $value1["userRegister"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
						<td><?php echo htmlspecialchars( $value1["userActived"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div><br><br>

 		<form action="" method="post">
 			<div class="row"><!--row-->
		 		<div class="col-md-1"><!--col id-->
				 	<label for="id"><STRONG>Id</STRONG></label>
				 	<input type="text" class="form-control form-control-sm text-lowercase" name="id" id="id">
		 		</div><!--end col id-->
		 		<div class="col-md-3"><!--col login-->
				 	<label for="login">Login</label>
				 	<input type="text" class="form-control form-control-sm text-lowercase" name="login" id="login" maxlength="30">
		 		</div><!--end col login-->
		 		<div class="col-md-3"><!--col senha-->
				 	<label for="password">Senha</label>
				 	<input type="text" class="form-control form-control-sm text-lowercase" name="password" id="password" maxlength="30">
		 		</div><!--end col senha-->
		 		<div class="col-md-2"><!--col ativo-->
				 	<label for="actived">Ativo</label>
				 	<input type="text" class="form-control form-control-sm text-lowercase" name="actived" id="actived" maxlength="1"><br>
		 		</div><!--end col ativo-->		 
	 		</div><!--end row-->
	 		<button type="submit" class="btn btn-success">Salvar</button>
	 		<a class="btn btn-primary" href="/master">Cancelar</a>
		</form><br><br>			


		<nav class="navbar fixed-bottom navbar-dark bg-dark">
		  <a class="navbar-brand" href="#"></a>
		</nav>
	</div>
</body>

<!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS --> 
    <script src="/resource/bs_js/jquery-3.3.1.slim.min.js"></script>
    <script src="/resource/bs_js/popper.min.js"></script>
    <script src="/resource/bs_js/bootstrap.min.js"></script> 
	<script src="/resource/bank_check.js"></script>
</html>