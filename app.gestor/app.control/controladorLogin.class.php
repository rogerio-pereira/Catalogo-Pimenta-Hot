<?php

/*
 * 	Classe  controladorLogin
 * 	#RESUMO DA CLASSE#
 * 	
 * 	Sistema:	Catalogo_PimentaHot
 * 	Autor:		Rogério Eduardo Pereira
 * 	Data:		Sep 25, 2014
 */

/*
 * Classe controladorLogin
 */
class controladorLogin
{
	/*
	 * Variaveis
	 */
	private $controladorUsuario;
	private $usuarioBD;
	
	private $usuario;
	private $senha;
	
	/*
	 * Getter e Setter
	 */
	public function getUsuario()
	{
		return $this->usuario;
	}
	public function getSenha()
	{
		return $this->senha;
	}
	public function setUsuario($usuario)
	{
		$this->usuario = $usuario;
	}
	public function setSenha($senha)
	{
		$chave = 'P!/\/\3nt4H072014*;';
		
		$this->senha = md5($senha.$chave);
	}
	
	/*
	 * Método construtor
	 */
	public function __construct()
	{
		$this->controladorUsuario	= new controladorUsuario;
		$this->usuarioBD			= NULL;
		$this->usuario				= NULL;
		$this->senha				= NULL;
	}
	
	/*
	 * Método login
	 * Realiza o login
	 */
	public function login()
	{
		$this->usuarioBD  = $this->controladorUsuario->getUsuarioByUser2($this->getUsuario());
		
		if($this->compara())
		{
			$_SESSION['usuario'] = $this->usuarioBD;
			
			return true;
		}
		else
			return false;
	}
	
	/*
	 * Método compara
	 * Compara usuario e senha
	 */
	private function compara()
	{	
		var_dump($this->usuario);
		var_dump($this->senha);
		var_dump($this->usuarioBD);
		if  (
				($this->usuario == $this->usuarioBD->usuario) &&
				($this->senha   == $this->usuarioBD->senha)
			)
		{
			return true;
		}
		else
			return false;
	}
}
?>