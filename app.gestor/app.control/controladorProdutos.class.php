<?php

/*
 * 	Classe  controladorProdutos
 * 	Controla os produtos
 * 	
 * 	Sistema:	Catalogo_PimentaHot
 * 	Autor:		Rogério Eduardo Pereira
 * 	Data:		Sep 24, 2014
 */

/*
 * Classe controladorProdutos
 */
class controladorProdutos
{
	/*
	 * Variaveis
	 */
	private $collectionProdutos;
	private $produto;
	
	private $produtoCodigo;
	private $produtoNome;
	private $produtoCategoria;
	private $produtoValor;
	private $produtoLink;
	private $produtoAtivo;
	
	/*
	 * Getters e Setters
	 */
	public function getProdutoCodigo()
	{
		return $this->produtoCodigo;
	}
	public function getProdutoNome()
	{
		return $this->produtoNome;
	}
	public function getProdutoCategoria()
	{
		return $this->produtoCategoria;
	}
	public function getProdutoValor()
	{
		return $this->produtoValor;
	}
	public function getProdutoLink()
	{
		return $this->produtoLink;
	}
	public function getProdutoAtivo()
	{
		return $this->produtoAtivo;
	}
	public function setProdutoCodigo($produtoCodigo)
	{
		$this->produtoCodigo = $produtoCodigo;
	}
	public function setProdutoNome($produtoNome)
	{
		$this->produtoNome = $produtoNome;
	}
	public function setProdutoCategoria($produtoCategoria)
	{
		$this->produtoCategoria = $produtoCategoria;
	}
	public function setProdutoValor($produtoValor)
	{
		$this->produtoValor = $produtoValor;
	}
	public function setProdutoLink($produtoLink)
	{
		$this->produtoLink = $produtoLink;
	}
	public function setProdutoAtivo($produtoAtivo)
	{
		$this->produtoAtivo = $produtoAtivo;
	}
	

	/*
	 * Método construtor
	 */
	public function __construct()
	{
		$this->collectionProdutos	= NULL;
		$this->produto				= NUll;
		$this->produtoCodigo		= NULL;
		$this->produtoNome			= NULL;
		$this->produtoCategoria		= NULL;
		$this->produtoValor			= NULL;
		$this->produtoLink			= NULL;
		$this->produtoAtivo			= NULL;
	}
	
	/*
	 * Método getCateggetProdutosorias
	 * Obtem todas os produtos cadastradas
	 */
	public function getProdutos()
	{
		$this->collectionProdutos = NULL;

		//RECUPERA CONEXAO BANCO DE DADOS
		TTransaction::open('my_bd_site');

		//TABELA exposition_gallery
		$criteria	= new TCriteria;
		//$criteria->add(new TFilter('situacao', '=', $situacao));
		$criteria->setProperty('order', 'categoria, nome');

		$this->repository = new TRepository();

		$this->repository->addColumn('*');
		$this->repository->addEntity('catalogo_produtos');

		$this->collectionProdutos = $this->repository->load($criteria);

		TTransaction::close();

		return $this->collectionProdutos;
	}
}
?>