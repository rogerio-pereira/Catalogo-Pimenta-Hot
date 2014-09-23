/*  
  JS categoria
  JavaScript pré-processamento do formulario categorias.class.php e categoria.class.php

  Sistema:  Catalogo_PimentaHot
  Autor:    Rogério Eduardo Pereira
  Data:     23/09/2014
*/
//Redireciona para a classe categoria
function novaCategoria()
{
	window.location = "?class=categoria";
}

//Redireciona para a classe categoria com o codigo
function alteraCategoria()
{
	var codigo;
	codigo = $('input[name=radioCategoria]:checked').val();
	
	window.location = "?class=categoria&cod="+codigo;
}

//Verifica se o nome nao esta em branco
function validaCategoria()
{
	var valida;
	valida = true;
	
	if ($('#nome').val() == '')
	{
		alert('Digite um nome');
		$('#nome').focus();
		valida = false;
		return;
	}
	
	if (valida = true)
		salvarCategoria();		
}

//Salva/Altera a Categoria
function salvarCategoria()
{
	$.ajax
	({
		type: "POST",
		url: "app.control/ajax.php",
		data: 
		{
			codigo:		$('#codigo').val(),
			nome:		$('#nome').val(),
			action:		'salvarCategoria'
		},
		success: function(data) 
		{
			top.location='?class=categorias';
		}
	});
}

//Apaga a Categoria
function apagaCategorias()
{
	var arrCod = [];
	$(".chkCategoriasApagar:checked").each(function() {
		arrCod.push($(this).val());
	});
	
	$.ajax
	({
		type: "POST",
		url: "app.control/ajax.php",
		data: 
		{
			codigos:	arrCod,
			action:		'apagaCategorias'
		},
		success: function(data) 
		{
			$('.tabela-categorias').html(data);
		}
	});	
}