<!DOCTYPE html>
<html>
<head>
	<title>My Study Life</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href={{url('/css/Login.css')}} />
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
<div class="padraoSection">
	<nav>
		<ul>
			<li>
				<section id="loginSec">
					<h2>Login</h2>
					<form method="get" action="{{url('/loginUser')}}">
						<div class="form-group">
							<label for="exampleInputEmail1">Email</label>
							<input placeholder="Insira seu email aqui" class="form-control" type="email" name="email"/>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Senha</label>
							<input placeholder="Insira sua Senha aqui" class="form-control" type="password" name="password"/>
						</div>
						<p></p>
						<button type="submit" class="btn btn-default">Logar</button>
						<p></p>
						@if($loginError=='email_not_found')
							<span> E-mail incorreto! </span>
						@endif
						@if($loginError=='wrong_password')
							<span> Senha incorreta! </span>
						@endif
						@if($loginError=='user_not_logged')
							<span> Por Favor, faça o login primeiro! </span>
						@endif
					</form>
				</section>
			</li>
		</ul>
	</nav>
</div>
<footer>
	<h2>Trabalho de Gerencia de Projetos</h2>
</footer>
</body>
</html>