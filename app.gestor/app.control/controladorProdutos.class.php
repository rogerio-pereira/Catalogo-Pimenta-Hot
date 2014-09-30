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
	
	private $imagem_temp;
	private $imagem_nome;
	private $imagem_tamanho;
	private $imagem_tipo;
	
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
		$valor = $produtoValor;
		
		$valor = str_replace('R$',	'',		$valor);
		$valor = str_replace(' ',	'',		$valor);
		$valor = str_replace('.',	'',		$valor);
		$valor = str_replace(',',	'.',	$valor);
		
		$this->produtoValor = $valor;
	}
	public function setProdutoLink($produtoLink)
	{
		$this->produtoLink = $produtoLink;
	}
	public function setProdutoAtivo($produtoAtivo)
	{
		$this->produtoAtivo = $produtoAtivo;
	}
	public function getImagem_temp()
	{
		return $this->imagem_temp;
	}
	public function getImagem_nome()
	{
		return $this->imagem_nome;
	}
	public function getImagem_tamanho()
	{
		return $this->imagem_tamanho;
	}
	public function getImagem_tipo()
	{
		return $this->imagem_tipo;
	}
	public function setImagem_temp($imagem_temp)
	{
		$this->imagem_temp = $imagem_temp;
	}
	public function setImagem_nome($imagem_nome)
	{
		$this->imagem_nome = $imagem_nome;
	}
	public function setImagem_tamanho($imagem_tamanho)
	{
		$this->imagem_tamanho = $imagem_tamanho;
	}
	public function setImagem_tipo($imagem_tipo)
	{
		$this->imagem_tipo = $imagem_tipo;
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
	
	/*
	 * Método getProdutos2
	 * Obtem todas os produtos cadastradas
	 */
	public function getProdutos2()
	{
		$this->collectionProdutos = NULL;

		//RECUPERA CONEXAO BANCO DE DADOS
		TTransaction2::open('my_bd_site');

		//TABELA exposition_gallery
		$criteria	= new TCriteria;
		//$criteria->add(new TFilter('situacao', '=', $situacao));
		$criteria->setProperty('order', 'categoria, nome');

		$this->repository = new TRepository2();

		$this->repository->addColumn('*');
		$this->repository->addEntity('catalogo_produtos');

		$this->collectionProdutos = $this->repository->load($criteria);

		TTransaction::close();

		return $this->collectionProdutos;
	}
	
	/*
	 * Método getProduto
	 * Obtem o produto com o código informado
	 */
	public function getProduto($codigo)
	{
		$this->produto	= NULL;
		$result			= NULL;

		//RECUPERA CONEXAO BANCO DE DADOS
		TTransaction::open('my_bd_site');

		//TABELA exposition_gallery
		$criteria	= new TCriteria;
		$criteria->add(new TFilter('codigo', '=', $codigo));
		//$criteria->setProperty('order', 'ordem ASC');

		$this->produto = new catalogo_produtos();
		$result = $this->produto->load($codigo);

		TTransaction::close();

		return $result;
	}
	
	/*
	 *	Método salvarCategoria2
	 *	Insere/Atualiza a situação
	 *	Usado em IFRAMES
	 */
	public function salvarProduto2()
	{
		try
		{
			$this->produto = new catalogo_produtos2();

			$this->produto->codigo		= $this->getProdutoCodigo();
			$this->produto->nome		= $this->getProdutoNome();
			$this->produto->categoria	= $this->getProdutoCategoria();
			$this->produto->valor		= $this->getProdutoValor();
			$this->produto->link		= $this->getProdutoLink();
			$this->produto->ativo		= $this->getProdutoAtivo();

			//RECUPERA CONEXAO BANCO DE DADOS
			TTransaction2::open('my_bd_site');

			$result = $this->produto->store();

			TTransaction2::close();

			return true;
		}
		catch(Exception $e)
		{
			return false;
		}
	}
	
	/*
	 *	Método apagaProdutos2
	 *	Apaga as categorias com o codigo especifico;
	 *	Usado em IFRAME
	 */
	public function apagaProdutos2($codigo)
	{
		try
		{
			$this->produto = NULL;

			//RECUPERA CONEXAO BANCO DE DADOS
			TTransaction2::open('my_bd_site');

			$this->produto = new catalogo_produtos2();
			$this->produto->delete($codigo);

			TTransaction2::close();

			return true;
		}
		catch(Exception $e)
		{
			return false;
		}
	}
	
	/*
	 * Método converteValor
	 * Converte o valor do banco de dados para REAL
	 */
	public function converteValor($valor)
	{
		return 'R$ '.number_format($valor, 2, ',', '.'); 
	}
}
?>