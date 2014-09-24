<?php

/*
 * 	Classe  controladorUsuario
 * 	Controla tudo relativo aos usuários
 * 	
 * 	Sistema:	Catalogo_PimentaHot
 * 	Autor:		Rogério Eduardo Pereira
 * 	Data:		Sep 24, 2014
 */

/*
 * Classe controladorUsuario
 */
class controladorUsuario
{
	/*
	 * Variaveis
	 */
	private $collectionUsuario;
	private $usuario;

	private $usuarioCodigo;
	private $usuarioNome;
	private $usuarioLogin;
	private $usuarioSenha;
	private $usuarioAdmin;
	
	/*
	 * Getter e Setter
	 */
	public function getUsuarioCodigo()
	{
		return $this->usuarioCodigo;
	}
	public function getUsuarioNome()
	{
		return $this->usuarioNome;
	}
	public function getUsuarioLogin()
	{
		return $this->usuarioLogin;
	}
	public function getUsuarioSenha()
	{
		return $this->usuarioSenha;
	}
	public function getUsuarioAdmin()
	{
		return $this->usuarioAdmin;
	}
	public function setUsuarioCodigo($usuarioCodigo)
	{
		$this->usuarioCodigo = $usuarioCodigo;
	}
	public function setUsuarioNome($usuarioNome)
	{
		$this->usuarioNome = $usuarioNome;
	}
	public function setUsuarioLogin($usuarioLogin)
	{
		$this->usuarioLogin = $usuarioLogin;
	}
	public function setUsuarioSenha($usuarioSenha)
	{
		$chave = 'P!/\/\3nt4H072014*;';
		
		$this->usuarioSenha = md5($usuarioSenha.$chave);
	}
	public function setUsuarioAdmin($usuarioAdmin)
	{
		$this->usuarioAdmin = $usuarioAdmin;
	}
	

	/*
	 * Método construtor
	 */
	public function __construct()
	{
		$this->collectionUsuario	= NULL;
		$this->usuario				= NULL;
		$this->usuarioCodigo		= NULL;
		$this->usuarioNome			= NULL;
		$this->usuarioLogin			= NULL;
		$this->usuarioSenha			= NULL;
		$this->usuarioAdmin			= NULL;
	}
	
	/*
	 *	Método getUsuarios
	 *	Obtem todos os usuarios
	 */
	public function getUsuarios()
	{
		$this->collectionUsuario = NULL;
		
		//RECUPERA CONEXAO BANCO DE DADOS
		TTransaction::open('my_bd_site');

		//TABELA exposition_gallery
		$criteria	= new TCriteria;
		//$criteria->add(new TFilter('situacao', '=', $situacao));
		$criteria->setProperty('order', 'nome');
		
		$this->repository = new TRepository();
		
		$this->repository->addColumn('*');
		$this->repository->addEntity('catalogo_usuario');
		
		$this->collectionUsuario = $this->repository->load($criteria);
		
		return $this->collectionUsuario;
	}
}
?>