<?php

/*
 *	Classe  controladorCategoria
 *	Contrla as Categorias
 *	
 *	Sistema:	Catalogo_PimentaHot
 *	Autor:		Rogério Eduardo Pereira
 *	Data:		Sep 23, 2014
 */

	/*
	 * Classe controladorCategoria
	 */
	class controladorCategoria 
	{
		/*
		 * Variaveis
		 */
		private $collectionCategoria;
		private $categoria;

		private $categoriaCodigo;
		private $categoriaNome;
		
		
		/*
		 * Getter e Setter
		 */
		public function getCategoriaCodigo()
		{
			return $this->categoriaCodigo;
		}
		public function getCategoriaNome()
		{
			return $this->categoriaNome;
		}
		public function setCategoriaCodigo($categoriaCodigo)
		{
			$this->categoriaCodigo = $categoriaCodigo;
		}
		public function setCategoriaNome($categoriaNome)
		{
			$this->categoriaNome = $categoriaNome;
		}
	
		/*
		 * Método construtor
		 */
		public function __construct()
		{
			$this->collectionCategoria	= NULL;
			$this->categoria			= NULL;
			$this->categoriaCodigo		= NULL;
			$this->categoriaNome		= NULL;
		}
		
		/*
		 * Método getCategorias
		 * Obtem todas as categorias cadastradas
		 */
		public function getCategorias()
		{
			$this->collectionCategoria = NULL;
		
			//RECUPERA CONEXAO BANCO DE DADOS
			TTransaction::open('my_bd_site');

			//TABELA exposition_gallery
			$criteria	= new TCriteria;
			//$criteria->add(new TFilter('situacao', '=', $situacao));
			$criteria->setProperty('order', 'nome');

			$this->repository = new TRepository();

			$this->repository->addColumn('*');
			$this->repository->addEntity('catalogo_categoria');

			$this->collectionCategoria = $this->repository->load($criteria);

			TTransaction::close();

			return $this->collectionCategoria;
		}
		
		/*
		 * Método getCategorias2
		 * Obtem todas as categorias cadastradas
		 */
		public function getCategorias2()
		{
			$this->collectionCategoria = NULL;
		
			//RECUPERA CONEXAO BANCO DE DADOS
			TTransaction2::open('my_bd_site');
			echo 'aaa';
			
			//TABELA exposition_gallery
			$criteria	= new TCriteria;
			//$criteria->add(new TFilter('situacao', '=', $situacao));
			$criteria->setProperty('order', 'nome');

			$this->repository = new TRepository2();

			$this->repository->addColumn('*');
			$this->repository->addEntity('catalogo_categoria');

			$this->collectionCategoria = $this->repository->load($criteria);

			TTransaction2::close();

			return $this->collectionCategoria;
		}
		
		/*
		 * Método getCategoria
		 * Obtem a categoria com o código informado
		 */
		public function getCategoria($codigo)
		{
			$this->categoria	= NULL;
			$result				= NULL;

			//RECUPERA CONEXAO BANCO DE DADOS
			TTransaction::open('my_bd_site');

			//TABELA exposition_gallery
			$criteria	= new TCriteria;
			$criteria->add(new TFilter('codigo', '=', $codigo));
			//$criteria->setProperty('order', 'ordem ASC');

			$this->categoria = new catalogo_categoria();
			$result = $this->categoria->load($codigo);

			TTransaction::close();

			return $result;
		}
		
		
	
		/*
		 *	Método salvarCategoria2
		 *	Insere/Atualiza a situação
		 *	Usado em IFRAMES
		 */
		public function salvarCategoria2()
		{
			try
			{
				$this->categoria = new catalogo_categoria2();
				
				$this->categoria->codigo		= $this->getCategoriaCodigo();
				$this->categoria->nome			= $this->getCategoriaNome();
				
				//RECUPERA CONEXAO BANCO DE DADOS
				TTransaction2::open('my_bd_site');

				$result = $this->categoria->store();

				TTransaction2::close();

				return true;
			}
			catch(Exception $e)
			{
				return false;
			}
		}
		
		/*
	 *	Método apagaCategorias2
	 *	Apaga as categorias com o codigo especifico;
	 *	Usado em IFRAME
	 */
	public function apagaCategorias2($codigo)
	{
	try
		{
			$this->categoria = NULL;

			//RECUPERA CONEXAO BANCO DE DADOS
			TTransaction2::open('my_bd_site');

			$this->categoria = new catalogo_categoria2();
			$this->categoria->delete($codigo);

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