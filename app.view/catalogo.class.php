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
	private $collectionProdutos;
	private $categoria;
	
	private $controladorProdutos;
	private $controladorCategoria;	

	/*
	 * Método construtor
	 */
	public function __construct()
	{
		$this->controladorProdutos	= new controladorProdutos;
		$this->controladorCategoria	= new controladorCategoria;
		
		$this->controladorCategoria = $this->controladorCategoria->getCategorias();
	}
	
	/*
	 * Método show
	 * Exibe as informações na tela
	 */
	public function show()
	{
		$pagina;
		$contadorProduto;
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
									Pimenta Hot
								</span>
								<br>
								<span id='catalogo'>
									Catalogo
								</span>
							</div>
						</article>
						
						<?php
							$pagina = true;
							$id;
							$class;
							
							//Percorre Categoria
							foreach($this->controladorCategoria as $categoria)
							{
								$pagina				= !$pagina;
								
								$this->collectionProdutos	= $this->controladorProdutos->getProdutos($categoria->codigo);
								
								if(count($this->collectionProdutos) > 0)
									echo
										" 
											<article class='pagina'>
												<div title='Categoria_{$categoria->nome}' id='capaCategoria'>
													<span id='titulo'>
														{$categoria->nome}
													</span>
												</div>
											</article>
										";
								
								$contadorProduto = 0;
								$pagina				= !$pagina;
								
								echo "<article class='pagina'>";
									
								foreach($this->collectionProdutos as $produtos)
								{
									if($contadorProduto == 4)
									{
										$contadorProduto	= 0;
										$pagina				= !$pagina;
										
										echo 
											" 
												</article>
												<article class='pagina'>
											";
									}
									
									//Verifica padding
									if($pagina == false)
										$class = 'padEsq';
									else
										$class = 'padDir';
									
									//Verifica posição da imagem
									if	(
											(($pagina == false)	&& ($contadorProduto == 0)) ||
											(($pagina == false) && ($contadorProduto == 2)) ||
											(($pagina == true)	&& ($contadorProduto == 1)) ||
											(($pagina == true)	&& ($contadorProduto == 3))
										)
										$id = 'esquerda';
									else if	(
												(($pagina == false)	&& ($contadorProduto == 1)) ||
												(($pagina == false)	&& ($contadorProduto == 3)) ||
												(($pagina == true)	&& ($contadorProduto == 0)) ||
												(($pagina == true)	&& ($contadorProduto == 2))												
											)
										$id = 'direita';
									
									$produtos->valor = $this->controladorProdutos->converteValor($produtos->valor);
									echo 
										" 
											<div title='Produto_{$produtos->nome}' class='produto, {$class}' id='{$id}'>
												<img src='app.view/img/produtos/{$produtos->codigo}.png' alt='{$produtos->nome}' title='{$produtos->nome}'>
												{$produtos->nome}<br />
												{$produtos->valor}
												<br><br><br><br><br>
												<hr>
											</div>
										";
									
									
									$contadorProduto++;
								}
								
								echo '</article>';
							}
						?>
						
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