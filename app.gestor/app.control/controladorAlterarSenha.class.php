<?php

/*
 * 	Classe  controladorAlterarSenha
 * 	#RESUMO DA CLASSE#
 * 	
 * 	Sistema:	Catalogo_PimentaHot
 * 	Autor:		Rogério Eduardo Pereira
 * 	Data:		Sep 25, 2014
 */

/*
 * Classe controladorAlterarSenha
 */
class controladorAlterarSenha
{
	/*
	 * Variaveis
	 */
	private $controladorUsuario;
	private $usuario;
	private $senhaAtual;
	private $senhaNova;
	
	/*
	 * Getter e Setter
	 */
	public function getSenhaAtual()
	{
		return $this->senhaAtual;
	}
	public function getSenhaNova()
	{
		return $this->senhaNova;
	}
	public function setSenhaAtual($senhaAtual)
	{
		$this->senhaAtual = $senhaAtual;
	}
	public function setSenhaNova($senhaNova)
	{
		$this->senhaNova = $senhaNova;
	}

	/*
	 * Método construtor
	 */
	public function __construct()
	{
		$this->controladorUsuario	= new controladorUsuario();
		
		$this->usuario				= $_SESSION['usuario'];
		
		$this->senhaAtual			= NULL;
		$this->senhaNova			= NULL;	
	}
	
	/*
	 * Método compara
	 * Compara a senha nova com a senha atual
	 */
	public function compara()
	{
		$chave = 'P!/\/\3nt4H072014*;';
		
		$senhaComp = md5($this->getSenhaAtual().$chave);
		
		if(md5($senhaComp) == $this->usuario->senha)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function altera()
	{
		$this->controladorUsuario->setUsuarioSenha($this->getSenhaNova());
		
		if($this->controladorUsuario->alteraSenha() == true)
			return true;
		else
			return false;
	}
}
?>