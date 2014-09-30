/*  
  JS produto
  JavaScript pré-processamento do formulario produtos.class.php e produto.class.php

  Sistema:  Catalogo_PimentaHot
  Autor:    Rogério Eduardo Pereira
  Data:     25/09/2014
*/
//Redireciona para a classe produto
function novoProduto()
{
	window.location = "?class=produto";
}

//Redireciona para a classe produto com o codigo do produto
function alteraProduto()
{
	var codigo;
	codigo = $('input[name=radioProduto]:checked').val();
	
	window.location = "?class=produto&cod="+codigo;
}

//Obtida em
//http://geniuscarrier.com/how-to-style-a-html-file-upload-button-in-pure-css/
function functionUpload()
{
	document.getElementById("uploadBtn").onchange = function () 
	{
		document.getElementById("uploadFile").value = this.value;
	};
}

//Valida o Formulario de Cadastro
function validaProduto()
{
	var valida;
	valida = true;


	//Nome
	if ($('#nome').val() == '')
	{
		alert('Digite um nome');
		$('#nome').focus();
		valida = false;
		return;
	}
	else if ($('#categoria').val() == '')
	{
		alert('Selecione uma Categoria');
		$('#categoria').focus();
		valida = false;
		return;
	}
	else if ($('#valor').val() == '' || $('#valor').val() == 0)
	{
		alert('Degite um valor');
		$('#valor').focus();
		valida = false;
		return;
	}
	else if ($('#link').val() != '')
	{
		if(!validaLink($('#link').val())) 
		{
			alert('Digite um link válido\nhttp://www.link.com.br');
			$('#link').focus();
			valida = false;
			return;
		}
	}

	if (valida == true)
		salvarProduto();		
}

function validaLink(url)
{
	var RegExp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;

    if(RegExp.test(url))
        return true;
    else
        return false;
}

function salvarProduto()
{	
	$.ajax
	({
		type: "POST",
		url: "app.control/ajax.php",
		data: 
		{
			codigo:			$('#codigo').val(),
			nome:			$('#nome').val(),
			categoria:		$('#categoria').val(),
			valor:			$('#valor').val(),
			link:			$('#link').val(),
			ativo:			$('input[name=ativo]:checked').val(),
			action:			'salvarProduto'
		},
		success: function(data) 
		{
			upload();
		}
	});
}

//Faz upload de imagem
function upload()
{
	var hiddenControl	= document.getElementById('action');
	hiddenControl.value = 'uploadProduto';
	
	$('#formularioProduto').ajaxForm
	({ 
		//target:'.back' // o callback será no elemento com o id #visualizar 
	}).submit();
	
	top.location='?class=produtos';
}

function apagaProdutos()
{
	var arrCod = [];
	$(".chkProdutosApagar:checked").each(function() {
		arrCod.push($(this).val());
	});
	
	$.ajax
	({
		type: "POST",
		url: "app.control/ajax.php",
		data: 
		{
			codigos:	arrCod,
			action:		'apagaProdutos'
		},
		success: function(data) 
		{
			$('.tabela-produtos').html(data);
		}
	});	
}