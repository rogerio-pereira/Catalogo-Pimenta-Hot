<?php

/*
 * 	Classe  catalogo
 * 	Exibe o catalogo
 * 	
 * 	Sistema:	Catalogo_PimentaHot
 * 	Autor:		Rogério Eduardo Pereira
 * 	Data:		Sep 4, 2014
 */

/*
 * Classe catalogo
 */
class catalogo
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
				<title>		Catalogo - Pimenta Hot Sex Shop		</title>
			
				<!--Meta Tags-->
				<meta name="description" content=	"">
				<meta name="keywords" content=	"">
				<meta charset='UTF-8' />
				
				<!--FavIcon-->
				<link rel="shortcut icon" type="image/x-icon" href="app.view/img/template/favicon.ico"/>
				
				<!--Acentos-->
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				
				<!--Fontes-->
				
				<!--CSS-->
				<link rel="stylesheet" href="app.view/css/catalogo.css">
				<link rel="stylesheet" href="app.view/css/booklet.css">	
					
				<!--JQuery-->
				<script src="app.view/js/jquery.js"></script>
				<script src="app.view/js/jquery-ui.js"></script>
				<script src="app.view/js/jquery-easing.js"></script>
				<script src="app.view/js/jquery-booklet.js"></script>
				
				<!--JavaScript-->
			</head>
			<body>
				<section>
					<div id="mybook">
						<article class='capa'>
							<div title="Capa" id='capa'>
								<span id='logo'>
									Pimneta Hot
								</span>
								<br>
								<span id='catalogo'>
									Catalogo
								</span>
							</div>
						</article>
						<div title="second page">
							<h3>Page 2</h3>
						</div>
						<div title="third page">
							<h3>Page 3</h3>
						</div>
						<div title="fourth page">
							<h3>Page 4</h3>
						</div>
						<div title="fifth page">
							<h3>Page 5</h3>
						</div>
						<div title="sixth page">
							<h3>Page 6</h3>
						</div>
						<div title="seventh page">
							<h3>Page 7</h3>
						</div>
						<article class='contracapa'>
						</article>
					</div>
				</section>
				
				<script>
					$(function () {		
						$("#mybook").booklet
						({
							width:				1000,
							height:				600,
							speed:				1000,
							autoCenter:			true,
							pageNumbers:		false,
							arrows:				false,
							pageSelector:		false,
							chapterSelector:	true,
							closed:				true,
						});
					});
				</script>
			</body>
		</html>
	<?php
	}
}
?>