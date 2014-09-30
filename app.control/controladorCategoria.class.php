<?php

/*
 * 	Classe  controladorCategoria
 * 	#RESUMO DA CLASSE#
 * 	
 * 	Sistema:	Catalogo_PimentaHot
 * 	Autor:		Rogério Eduardo Pereira
 * 	Data:		Sep 26, 2014
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
}
?>