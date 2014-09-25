<?php

/*
 * 	Classe  template
 * 	#RESUMO DA CLASSE#
 * 	
 * 	Sistema:	Catalogo_PimentaHot
 * 	Autor:		Rogério Eduardo Pereira
 * 	Data:		Sep 18, 2014
 */

/*
 * Classe template
 */
class template
{
	/*
	 * Variaveis
	 */

	/*
	 * Método construtor
	 */
	public function __construct()
	{
		
	}
	/*
	 * Método show
	 * Exibe as informações na tela
	 */
	public function show()
	{
	?>
		<!DOCTYPE HTML>
		<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
			<head>
				<title>		Catálogo Pimenta Hot - Gestor 		</title>
			
				<!--Meta Tags-->
				<meta name="description" content=	"">
				<meta name="keywords" content=	"">
				<meta charset='UTF-8' />
				
				<!--FavIcon-->
				<link rel="shortcut icon" type="image/x-icon" href="app.view/img/favicon.ico"/>
				
				<!--Acentos-->
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				
				<!--Fontes-->
				<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
				
				<!--CSS-->
				<link rel="stylesheet" href="app.view/css/template.css">
				<link rel="stylesheet" href="app.view/css/home.css">
				<link rel="stylesheet" href="app.view/css/formulario.css">
				
				<!--JQuery-->
				<script type="text/javascript" src="app.view/js/jquery.js"></script>
				
				<!--JavaScript-->
				<script type="text/javascript" src="app.view/js/formulario.js"></script>
				<script type="text/javascript" src="app.view/js/categoria.js"></script>
				<script type="text/javascript" src="app.view/js/usuario.js"></script>
			</head>
			<body>
				<!--Background-->
				<!--<div class='page'>
				</div>-->
				<!--Header-->
					<header class='header'>
						<!--MENU-->
						<nav class='menu'>
							<ul id='menuLista'>
								<li>
									<a href='?class=categorias'>Categoria</a>
								</li>
								<li>
									<a href='?class=produtos'>Produtos</a>
								</li>
								<li>
									<a href='?class=usuarios'>Usuarios</a>
								</li>
								<li>
									<a href='?class=logoff'>Logoff</a>
								</li>
							</ul>
						</nav>
						
						Bem Vindo: <span id='nomeLogo'><!--<?php echo $_SESSION['nome'];?>-->Teste</span>
					</header>
					
					<section class='content'>
						#CONTENT#
					</section>
					
					<footer class='footer'>
						© Copyright  2014 - <a href='http://www.pimentahot.com.br/' target='_blank'>Pimenta hot</a>
					</footer>
			</body>
		</html>
	<?php
	}
}
?>