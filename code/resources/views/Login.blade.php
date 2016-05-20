<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="../../code/public/Login.css" />
</head>
<body>
	<header>
	<h1 class="titulo">My Study Life</h1>
	</header>
	<div class="padraoSection">
	<nav>
		<ul>
			<li>
				<h2><a href="#" class="padrao" id="login">Login</a></h2>
				<section id="loginSec">
					<h2>Login</h2>
					<form method="get" action="{{url('/login')}}">
						<p>email: </p>
						<input type="email" name="email"/>
						@if($loginError == 'email_not_found')
						<span> Email incorreto </span>
						@endif
						<p>Senha: </p>
						<input type="password" name="password"/>
						@if($loginError == 'wrong_password')
							<span> Senha incorreta </span>
						@endif
						<p></p>
						<input type="submit" name="Logar" value="Logar"/>
					</form>
				</section>
			</li>
			<li id="teste">
				<h2><a href="#" class="padrao" id="cadastro">Cadastro</a></h2>
				<section id="cadastroSec">
					<h2>Cadastro</h2>
					<form method="post">
						<p>Nome: <input type="text"/></p>
						<p>Email: <input type="email"/></p>
						<p>Senha: <input type="password"/></p>
						<p>Confirmar Senha: <input type="password"/></p>
						<p></p>
						<input type="button" value="Cadastrar" name="Cadastrar"/>
					</form>
				</section>
			</li>
		</ul>
	</nav>
	</div>
	<div class="foto">
		<img src="../../code/public/disney.jpg" />
	</div>
	<footer>
		<h2>Trabalho de Gerencia de Projetos</h2>
	</footer>
</body>
</html>