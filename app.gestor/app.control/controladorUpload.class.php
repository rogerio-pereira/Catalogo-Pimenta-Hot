<?php

/*
 * 	Classe  controladorUpload
 * 	Controla arquivos (Usado em produto.class.php)
 * 	
 * 	Sistema:	Catalogo_PimentaHot
 * 	Autor:		Rogério Eduardo Pereira
 * 	Data:		Sep 26, 2014
 */

/*
 * Classe controladorUpload
 */
class controladorUpload
{
	/*
	 * Variaveis
	 */
	
	private $nomeNovo;
	private $imagem_temp;
	private $imagem_nome;
	private $imagem_tamanho;
	private $imagem_tipo;
	
	public function getNomeNovo()
	{
		return $this->nomeNovo;
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
	public function setNomeNovo($nomeNovo)
	{
		$this->nomeNovo = $nomeNovo;
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
		$this->nomeNovo			= NULL;
		$this->imagem_temp		= NULL;
		$this->imagem_nome		= NULL;
		$this->imagem_tamanho	= NULL;
		$this->imagem_tipo		= NULL;
	}
	
	/*
	 * Método upload
	 * Faz upload da imagem selecionada
	 */
	public function upload()
	{
		try
		{			
			//Alterando nome da imagem
			$array = explode('.', $this->getImagem_nome());
			$array[0] = $this->getNomeNovo();
			$this->setImagem_nome(implode('.', $array));
			
			move_uploaded_file($this->getImagem_temp(),"../../app.view/img/produtos/".$this->getImagem_nome());
			
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
	public function apagar($codigo)
	{
		try
		{
			if(unlink('../../app.view/img/produtos/'.$codigo.'.png'))
				return true;
			else
				return false;
		}
		catch (Exception $e)
		{
			return false;
		}
	}
}
?>