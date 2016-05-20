<!DOCTYPE html>
<html>
<head>
	<title>home page</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="../../public/Menu.css" />
</head>
<body>
	<header>
		<h1 class="titulo">Home Page</h1>
		<ul id="lista">
			<form id="Menu" method="get" action="{{url('/deleteUser')}}">
			<li class="Menu" onclick="Menu.submit()">
				<a href="#">Excluir</a></li>
			</form>
			<li>
			<a class="Menu" href="#">Sair</a></li>
		</ul>
	</header>
	<div>
	</div>
	<footer>
		<h2>Trabalho de Gerencia de Projetos</h2>
	</footer>
</body>
</html>