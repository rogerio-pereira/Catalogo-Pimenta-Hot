<?php

/*
 * 	Classe  usuarios
 * 	Exibe todos os funcionarios, com opção para cadastrar (Administrador), alterar, excluir(Administrador)
 * 	
 * 	Sistema:	Catalogo_PimentaHot
 * 	Autor:		Rogério Eduardo Pereira
 * 	Data:		Sep 24, 2014
 */

/*
 * Classe usuarios
 */
class usuarios
{
	/*
	 * Variaveis
	 */
	private $collectionUsuario;
	private $controlador;

	/*
	 * Método construtor
	 */
	public function __construct()
	{
		$this->controlador			= new controladorUsuario();
		$this->collectionUsuario	= $this->controlador->getUsuarios();
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
			class='formularioUsuarios' 
			id='formularioUsuarios'
			name="usuarios" 
			method="post" 
			action="app.control/ajax.php"
		>
			<input type="hidden" id="action" name="action"/>
				<fieldset>
					<legend>Usuarios</legend>
					<table class='tabela-usuarios'>
						<?php
							foreach ($this->collectionUsuario as $usuario)
							{
								echo
									"
										<!--{$usuario->nome}-->
										<tr>
											<td>
												<input type='radio' name='radioUsuario' id='radioUsuario' value='$usuario->codigo'>
											</td>
											<td>
												{$usuario->nome}
											</td>
											<td>
												{$usuario->usuario}
											</td>
											<td>
									";
								if($usuario->administrador == 1)
									echo 'Administrador';
								else
									echo 'Usuario Comum';
								echo 
									"		</td>
											<td>
									";
								//Usuario administrador pode excluir
								if($usuario->administrador == 1)
									echo
										"
											<input type='checkbox' name='usuariosApagar[]' class='chkCategoriasApagar' value='{$usuario->codigo}'>
										";
								echo
									"		</td>
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
							<td colspan='5' style='text-align: center'>
								<input type='button' value='Novo'		onclick='novoUsuario()'>
								<input type='button' value='Alterar'	onclick='alteraUsuario()'>
								
								<?php
									if(count($this->collectionUsuario) > 0)
										echo "<input type='button' value='Apagar' onclick='apagaCategorias()'>";
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