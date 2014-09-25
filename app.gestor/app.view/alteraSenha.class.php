<?php

/*
 * 	Classe  alteraSenha
 * 	#RESUMO DA CLASSE#
 * 	
 * 	Sistema:	Catalogo_PimentaHot
 * 	Autor:		Rogério Eduardo Pereira
 * 	Data:		Sep 25, 2014
 */

/*
 * Classe alteraSenha
 */
class alteraSenha
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
		<form 
			method='post' 
			class='alterarSenha' 
			id='alterarSenha'
			name="alterarSenha" 
			method="post" 
			action="app.control/ajax.php"
		>
			<input type="hidden" id="action" name="action"/>
			<fieldset>
				<legend>Troca de Senha</legend>
				<table>
					<tr>
						<td>
							<label for='senhaAtual'>Senha Atual</label>
						</td>
						<td>
							<input 
								type='password' 
								id='senhaAtual' 
								name='senhaAtual' 
								placeholder='Senha Atual' 
							>
						</td>
					</tr>
					<tr>
						<td>
							<label for='senhaNova'>Senha Nova</label>
						</td>
						<td>
							<input 
								type='password' 
								id='senhaNova' 
								name='senhaNova' 
								placeholder='Senha Nova' 
							>
						</td>
					</tr>
					<tr>
						<td>
							<label for='confirmacao'>Confirmação de Senha</label>
						</td>
						<td>
							<input 
								type='password' 
								id='confirmacao' 
								name='confirmacao' 
								placeholder='Senha Atual' 
							>
						</td>
					</tr>
					<tr>
						<td colspan='2' style="text-align: center;">
							<input type='button' value='Alterar' onclick='validaAlterarSenha()'>
						</td>
					</tr>
				</table>
			</fieldset>
		</form>
	<?php
	}
}
?>