<!DOCTYPE html>
<html>
	<head>
	<title>Cadastro - My Study Life</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href={{url('/css/RegisterUser.css')}} />
	<link rel="stylesheet" type="text/css" href={{url('../resources/views/bootstrap-3.3.6/dist/css/bootstrap.css')}} />
	</head>
	<body>
		<header>
	<h1 class="titulo">My Study Life</h1>
	<ul id="lista">
		<li><a class="Menu" href={{url('/')}}>Login</a></li>
		<li><a class="Menu" href={{url('/registerUser')}}>Cadastro</a></li>
	</ul>
	</header>				
	<section class="padraoSection" id="cadastroSec">
					<h2 class="titulo">Cadastro</h2>
					<form method="get" action="{{url('/newUser')}}">
						<div class="form-group">
							<label for="exampleInputEmail1">Nome Completo</label>
							<input placeholder="Insira seu Nome completo aqui" class="form-control"  type="text" name="nome"/>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Email</label>
							<input placeholder="Insira seu email aqui" class="form-control"  type="email" name="email"/>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Senha</label>
							<input placeholder="Insira a senha aqui" class="form-control" type="password" name="password"/>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Repetir a senha</label>
							<input placeholder="Por favor, repita a senha" class="form-control"  type="password" name="confirmPassword"/>
						</div>
						<p></p>
						<button type="submit" class="btn btn-default">Cadastrar</button>
						<p></p>
						@if($newUserError =='user_already_exists')
							<span> Cadastro já existente! </span>
						@endif
						@if($newUserError =='password_differently')
							<span> As senhas não conferem! </span>
						@endif
					</form>
				</section>
	<footer>
		<h2>Trabalho de Gerencia de Projetos</h2>
	</footer>
	</body>
</html>