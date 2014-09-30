<?php

/*
 * 	Classe  categoria
 * 	Exibe Todas as categorias cadastradas
 * 	
 * 	Sistema:	Catalogo_PimentaHot
 * 	Autor:		Rogério Eduardo Pereira
 * 	Data:		Sep 23, 2014
 */

/*
 * Classe categoria
 */
class categorias
{
	/*
	 * Variaveis
	 */
	private $controladorCategoria;
	private $collectionCategorias;

	/*
	 * Método construtor
	 */
	public function __construct()
	{
		$this->controladorCategoria	= new controladorCategoria();
		$this->collectionCategorias = $this->controladorCategoria->getCategorias();
	}
	
	/*
	 * Método show
	 * Exibe as informações na tela
	 */
	public function show()
	{
	?>
		<form 
			method='post' 
			class='formularioCategorias' 
			id='formularioCategorias'
			name="categorias" 
			method="post" 
			action="app.control/ajax.php"
		>
			<input type="hidden" id="action" name="action"/>
			<fieldset>
				<legend>Categorias</legend>
				<table class='tabela-categorias'>
					<tr class='titulo'>
						<td>Alterar</td>
						<td>Nome</td>
						<td>Apagar</td>
					</tr
					<tr>
						<td colspan="3">
							<hr>
						</td>
					</tr>
					<?php
						foreach ($this->collectionCategorias as $categoria)
						{
							echo
								"
									<!--{$categoria->nome}-->
									<tr>
										<td class='center'>
											<input type='radio' name='radioCategoria' id='radioCategoria' value='$categoria->codigo'>
										</td>
										<td>
											{$categoria->nome}
										</td>
										<td class='center'>
											<input type='checkbox' name='categoriasApagar[]' class='chkCategoriasApagar' value='{$categoria->codigo}'>
										</td>
									</tr>
								";
						}
					?>
					<tr>
						<td colspan='3'>
							<hr>
						</td>
					</tr>
					<tr>
						<td colspan='3' style='text-align: center'>
							<input type='button' value='Nova'		onclick='novaCategoria()'>
							
							<?php
								if(count($this->collectionCategorias) > 0)
									echo 
										" 
											<input type='button' value='Alterar'	onclick='alteraCategoria()'>
											<input type='button' value='Apagar'		onclick='apagaCategorias()'>
										";
							?>
						</td>
					</tr>
				</table>
			</fieldset>
		</form>
	<?php
	}
}
?>