<?php

/*
 * 	Classe  produtos
 * 	Exibe todos os produtos cadastrados, com opção para cadastrar/alterar/remover
 * 	
 * 	Sistema:	Catalogo_PimentaHot
 * 	Autor:		Rogério Eduardo Pereira
 * 	Data:		Sep 24, 2014
 */

/*
 * Classe produtos
 */
class produtos
{
	/*
	 * Variaveis
	 */
	private $collectionProdutos;
	private $controlador;

	/*
	 * Método construtor
	 */
	public function __construct()
	{
		$this->controlador			= new controladorProdutos;
		$this->collectionProdutos	= $this->controlador->getProdutos();
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
			class='formularioProdutos' 
			id='formularioProdutos'
			name="produtos" 
			method="post" 
			action="app.control/ajax.php"
		>
			<input type="hidden" id="action" name="action"/>
			<fieldset>
				<legend>produtos</legend>
				<table class='tabela-produtos'>
					<tr class='titulo'>
						<td>Alterar</td>
						<td>Nome</td>
						<td>Categoria</td>
						<td>Ativo</td>
						<td>Apagar</td>
					</tr
					<tr>
						<td colspan="5">
							<hr>
						</td>
					</tr>
					<?php
						foreach($this->collectionProdutos as $produto)
						{
							echo
								"
									<tr>
										<td class='center'>
											<input type='radio' name='radioProduto' id='radioproduto' value='{$produto->codigo}'>
										</td>
										<td>
											{$produto->nome}
										</td>
										<td>
											{produto->categoria->nome}
										</td>
										<td>
								";
											if($produto->ativo == true)
												echo '&check;';
							echo
								"
										</td>
										<td>
											<input type='checkbox' name='produtosApagar[]' class='chkProdutosApagar' value='{$produto->codigo}'>
										</td>
									</tr>
								";
						}
					?>
					<tr>
						<td colspan='5'>
							<hr>
						</td>
					</tr>
					<tr>
						<td colspan='5' class='center'>
							<input type='button' value='Nova'		onclick='novoProduto()'>
							<input type='button' value='Alterar'	onclick='alteraProduto()'>

							<?php
								if(count($this->collectionProdutos) > 0)
									echo "<input type='button' value='Apagar' onclick='apagaProdutos()'>";
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