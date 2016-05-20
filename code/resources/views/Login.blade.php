<!DOCTYPE html>
<html>
<head>
	<title>My Study Life</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="../../public/Login.css" />
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.6/dist/css/bootstrap.css" />
</head>
<body>
	<header>
	<h1 class="titulo">My Study Life</h1>
	<ul id="lista">
		<li><a class="Menu" href="Login.blade.php">Login</a></li>
		<li><a class="Menu" href="Cadastro.blade.php">Cadastro</a></li>
	</ul>
	</header>
	<div class="padraoSection">
<<<<<<< HEAD
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
=======
			<nav>
				<ul>
					<li>
						<section id="loginSec">
							<h2>Login</h2>
							<form method="get" action="{{url('http://localhost/MyStudyLife/PGP-2016/code/public')}}">
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
								@if(!$login)
									<span> Email incorreto </span>
								@endif
							</form>
						</section>
					</li>
				</ul>
			</nav>
>>>>>>> 12bc33b30e5982f1ab616ab7440046f430773f7c
	</div>
	<footer>
		<h2>Trabalho de Gerencia de Projetos</h2>
	</footer>
</body>
</html>