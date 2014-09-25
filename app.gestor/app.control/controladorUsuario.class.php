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
		
		TTransaction::close();
		
		return $this->collectionUsuario;
	}
	
	/*
	 *	Método getUsuarios2
	 *	Obtem todos os usuarios
	 */
	public function getUsuarios2()
	{
		$this->collectionUsuario = NULL;
		
		//RECUPERA CONEXAO BANCO DE DADOS
		TTransaction2::open('my_bd_site');

		//TABELA exposition_gallery
		$criteria	= new TCriteria;
		//$criteria->add(new TFilter('situacao', '=', $situacao));
		$criteria->setProperty('order', 'nome');
		
		$this->repository = new TRepository2();
		
		$this->repository->addColumn('*');
		$this->repository->addEntity('catalogo_usuario');
		
		$this->collectionUsuario = $this->repository->load($criteria);
		
		//RECUPERA CONEXAO BANCO DE DADOS
		TTransaction2::close();
		
		return $this->collectionUsuario;
	}
	
	/*
	 * Método getUsuario
	 * Obtem o usuario com o código informado
	 */
	public function getUsuario($codigo)
	{
		$this->usuario	= NULL;
		$result			= NULL;

		//RECUPERA CONEXAO BANCO DE DADOS
		TTransaction::open('my_bd_site');

		//TABELA exposition_gallery
		$criteria	= new TCriteria;
		$criteria->add(new TFilter('codigo', '=', $codigo));
		//$criteria->setProperty('order', 'ordem ASC');

		$this->usuario = new catalogo_usuario;
		$result = $this->usuario->load($codigo);

		TTransaction::close();

		return $result;
	}
	
	/*
	 *	Método salvarUsuario2
	 *	Insere/Atualiza o Usuario
	 *	Usado em IFRAMES
	 */
	public function salvarUsuario2()
	{
	   try
	   {
		   $this->usuario = new catalogo_usuario2();

		   $this->usuario->codigo			= $this->getUsuarioCodigo();
		   $this->usuario->nome				= $this->getUsuarioNome();
		   $this->usuario->usuario			= $this->getUsuarioLogin();
		   $this->usuario->senha			= $this->getUsuarioSenha();
		   $this->usuario->administrador	= $this->getUsuarioAdmin();

		   //RECUPERA CONEXAO BANCO DE DADOS
		   TTransaction2::open('my_bd_site');

		   $this->usuario->store();

		   TTransaction2::close();

		   return true;
	   }
	   catch(Exception $e)
	   {
		   return false;
	   }
	}
	
	/*
	 *	Método apagaUsuario2
	 *	Apaga as categorias com o codigo especifico;
	 *	Usado em IFRAME
	 */
	public function apagaUsuario2($codigo)
	{
	try
		{
			$this->usuario = NULL;

			//RECUPERA CONEXAO BANCO DE DADOS
			TTransaction2::open('my_bd_site');

			$this->usuario = new catalogo_usuario2();
			$this->usuario->delete($codigo);

			TTransaction2::close();

			return true;
		}
		catch(Exception $e)
		{
			return false;
		}
	}
}
?>