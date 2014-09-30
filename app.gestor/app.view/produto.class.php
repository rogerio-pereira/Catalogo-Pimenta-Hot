<?php

/*
 * 	Classe  produto
 * 	#RESUMO DA CLASSE#
 * 	
 * 	Sistema:	Catalogo_PimentaHot
 * 	Autor:		Rogério Eduardo Pereira
 * 	Data:		Sep 25, 2014
 */

/*
 * Classe produto
 */
class produto
{
	/*
	 * Variaveis
	 */
	private $codigo;
	
	private $controladorProduto;
	private $controladorCategoria;
	
	private $collectionCategoria;
	
	private $produto;

	/*
	 * Método construtor
	 */
	public function __construct()
	{
		$this->codigo				= $_GET['cod'];
		
		$this->controladorProduto	= new controladorProdutos;
		$this->controladorCategoria	= new controladorCategoria;
		
		$this->collectionCategoria	= $this->controladorCategoria->getCategorias();
		
		$this->produto				= $this->controladorProduto->getProduto($this->codigo);
	}
	
	/*
	 * Método show
	 * Exibe as informações na tela
	 */
	public function show()
	{
	?>
		<form 
			enctype="multipart/form-data"
			method='post' 
			class='formularioProduto' 
			id='formularioProduto'
			name="produto" 
			method="post" 
			action="app.control/ajax.php"
		>
			<input type="hidden" id="action" name="action"/>
			<fieldset>
				<legend>Produto</legend>
				<table>
					<!--Codigo-->
					<tr>
						<td>
							<label for='codigo'>Código:</label>
						</td>
						<td>
							<input 
								type='number' 
								name='codigo' 
								id='codigo' 
								min='1' 
								max='18446744073709551615' 
								readonly
								placeholder="NOVO"
								value='<?php echo $this->produto->codigo; ?>'
							>
						</td>
					</tr>
					<!--Nome-->
					<tr>
						<td class='obrigatorio'>
							<label for='nome'>Nome</label>
						</td>
						<td class='obrigatorio'>
							<input 
								type='text' 
								id='nome' 
								name='nome' 
								maxlength='50' 
								placeholder='Nome do Produto' 
								value='<?php echo $this->produto->nome; ?>'
							>	
						</td>
					</tr>
					<!--Categoria-->
					<tr>
						<td class='obrigatorio'>
							<label for='categoria'>Categoria</label>
						</td>
						<td>
							<select
								id='categoria'
								name='categoria'
							>
								<option value='' disabled selected>Selecione uma Categoria</option>
								<option value="" ></option>
								<?php
									foreach($this->collectionCategoria as $categoria)
									{
										if($this->produto->categoria == $categoria->codigo)
											echo "<option value='{$categoria->codigo}' selected>{$categoria->nome}</option>";
										else
											echo "<option value='{$categoria->codigo}'>{$categoria->nome}</option>";
									}
								?>
							</select>	
						</td>
					</tr>
					<!--Valor-->
					<tr>
						<td class='obrigatorio'>
							<label for='valor'>Valor</label>
						</td>
						<td>
							<input 
								type='text' 
								id='valor' 
								name='valor' 
								placeholder='Valor do Produto' 
								value='<?php echo $this->controladorProduto->converteValor($this->produto->valor); ?>'
							>	
						</td>
					</tr>
					<!--Link-->
					<tr>
						<td>
							<label for='link'>Link</label>
						</td>
						<td>
							<input 
								type='text' 
								id='link' 
								name='link' 
								placeholder='Link do Produto' 
								size='50'
								value='<?php echo $this->produto->link; ?>'
							>	
						</td>
					</tr>
					<!--Ativo-->
					<tr>
						<td>
							<label for='ativo'>Ativo</label>
						</td>
						<td>
							<?php
								if($this->codigo == NULL)
									echo 
										" 
											<input 
												type='checkbox' 
												name='ativo' 
												id='ativo'
												checked
											>
										";
								else
								{
									if($this->produto->ativo == true)
										echo 
										" 
											<input 
												type='checkbox' 
												name='ativo' 
												id='ativo'
												checked	
											>
										";
									else
										echo 
										" 
											<input 
												type='checkbox' 
												name='ativo' 
												id='ativo'
											>
										";
								}
							?>
						</td>
					</tr>
					<tr>
						<td class='obrigatorio'>
							<label for='imagem'>Imagem</label>
						</td>
						<td>
							<div class="fileUpload btn btn-primary">
								<input type='button'	id='uploadButton'	value='Procurar'				onclick=''>
								<input type="file"		id="uploadBtn"		name='uploadBtn'			   class="upload" accept='.png'/>
								<input type='text'		id="uploadFile"		placeholder="Imagem do produto" disabled="disabled" />
							</div>
						</td>
					</tr>
					<tr>
						<td colspan='2' class='center'>
							<input type='button' value='Salvar'	onclick='validaProduto()'>
							<!--<input type='button' value='Salvar'	onclick="doPost('formularioProduto','salvarProduto')">-->
						</td>
					</tr>
				</table>
			</fieldset>
		</form>
<div class='back'></div>
		<script>
			createMaskValor();
			functionUpload();
		</script>
	<?php
	}
}
?>