<?php

/*
 * 	Classe  usuario
 * 	Formulario de cadastro/alteração de usuario
 * 	
 * 	Sistema:	Catalogo_PimentaHot
 * 	Autor:		Rogério Eduardo Pereira
 * 	Data:		Sep 24, 2014
 */

/*
 * Classe usuario
 */
class usuario
{
	/*
	 * Variaveis
	 */
	private $codigo;
	private $controlador;
	private $usuario;

	/*
	 * Método construtor
	 */
	public function __construct()
	{
		$this->codigo		= $_GET['cod'];
		
		$this->controlador	= new controladorUsuario();
		$this->usuario		= $this->controlador->getUsuario($this->codigo);
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
			class='formularioUsuario' 
			id='formularioUsuario'
			name="usuario" 
			method="post" 
			action="app.control/ajax.php"
		>
			<input type="hidden" id="action" name="action"/>
			<fieldset>
				<legend>Usuário</legend>
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
								value='<?php echo $this->usuario->codigo; ?>'
							>
						</td>
					</tr>
					<!--Nome-->
					<tr>
						<td class='obrigatorio'>
							<label for='nome'>Nome</label>
						</td>
						<td>
							<input 
								type='text' 
								id='nome' 
								name='nome' 
								maxlength='100' 
								placeholder='Nome do Usuário' 
								value='<?php echo $this->usuario->nome; ?>'
							>	
						</td>
					</tr>
					<!--Login-->
					<tr>
						<td class='obrigatorio'>
							<label for='usuario'>Usuário</label>
						</td>
						<td>
							<input 
								type='text' 
								id='usuario' 
								name='usuario' 
								maxlength='15' 
								placeholder='Login' 
								value='<?php echo $this->usuario->usuario; ?>'
							>	
						</td>
					</tr>
					<!--Senha-->
					<?php
						if($this->codigo == NULL)
							echo
								"
									<tr>
										<td class='obrigatorio'>
											<label for='senha'>Senha</label>
										</td>
										<td>
											<input
												type='password' 
												id='senha' 
												name='senha' 
												placeholder='Senha' 
											>	
										</td>
									</tr>
									<tr>
										<td class='obrigatorio'>
											<label for='confirmacao'>Confirmação</label>
										</td>
										<td>
											<input s
												type='password' 
												id='confirmacao' 
												name='confirmacao' 
												placeholder='Senha' 
											>	
										</td>
									</tr>
								";					
					?>
					<!--Administrador-->
					<tr>
						<td>
							<label for='administrador'>Administrador?</label>
						</td>
						<td>
							<?php
								if($this->usuario->administrador == true)
									echo "<input type='checkbox' name='adminstrador' id='chkAdministrador' checked>";
								else
									echo "<input type='checkbox' name='adminstrador' id='chkAdministrador'>";
							?>
						</td>
					</tr>
					<tr>
						<td colspan='2' style='text-align: center'>
							<input type='button' value='Salvar'	onclick='validaUsuario()'>
						</td>
					</tr>
				</table>
			</fieldset>
		</form>
	<?php
	}
}
?>