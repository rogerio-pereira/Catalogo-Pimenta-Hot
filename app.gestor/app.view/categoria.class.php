<?php

/*
 * 	Classe  salvarCategoria
 * 	Formulario para cadastro/alteração das categorias
 * 	
 * 	Sistema:	Catalogo_PimentaHot
 * 	Autor:		Rogério Eduardo Pereira
 * 	Data:		Sep 23, 2014
 */

/*
 * Classe salvarCategoria
 */
class categoria
{
	/*
	 * Variaveis
	 */
	private $codigo;
	private $controladorCategoria;
	private $categoria;

	/*
	 * Método construtor
	 */
	public function __construct()
	{
		$this->codigo				= $_GET['cod'];
		$this->controladorCategoria	= new controladorCategoria();
		$this->categoria			= $this->controladorCategoria->getCategoria($this->codigo);
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
			class='formularioCategoria' 
			id='formularioCategoria'
			name="categoria" 
			method="post" 
			action="app.control/ajax.php"
		>
			<input type="hidden" id="action" name="action"/>
			<fieldset>
				<legend>Categoria</legend>
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
								value='<?php echo $this->categoria->codigo; ?>'
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
								placeholder='Nome da Categoria' 
								value='<?php echo $this->categoria->nome; ?>'
							>	
						</td>
					</tr>
					<tr>
						<td colspan='2' class='center'>
							<input type='button' value='Salvar'	onclick='validaCategoria()'>
						</td>
					</tr>
				</table>
			</fieldset>
		</form>
	<?php
	}
}
?>	