<!DOCTYPE html>
<html>
<head>
	<title>home page</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="../../code/public/Menu.css" />
</head>
<body>
	<header>
		<h1>Home Page</h1>
	</header>
	<div>
		<section>
			<nav>
				<ul>
					<li>
						<h2>Usuario</h2>
						<ul>
							<form id="Menu" method="get" action="{{url('/deleteUser')}}">
							<li onclick="Menu.submit()">
								<a href="#">Excluir Conta</a></li>
							</form>
							<li><a href="#">Sair da Conta</a></li>
						</ul>
					</li>
				</ul>
			</nav>
		</section>
	</div>
	<footer>
		<h2>Trabalho de Gerencia de Projetos</h2>
	</footer>
</body>
</html>