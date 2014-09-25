/*  
  JS usuario
  JavaScript pré-processamento do formulario usuarios.class.php e usuario.class.php

  Sistema:  Catalogo_PimentaHot
  Autor:    Rogério Eduardo Pereira
  Data:     4/09/2014
*/
//Redireciona para a classe usuario
function novoUsuario()
{
	window.location = "?class=usuario";
}

//Redireciona para a classe usuario com o codigo
function alteraUsuario()
{
	var codigo;
	codigo = $('input[name=radioUsuario]:checked').val();
	
	window.location = "?class=usuario&cod="+codigo;
}

//Valida o Formulario de Cadastro
function validaUsuario()
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
	//Usuario
	if ($('#usuario').val() == '')
	{
		alert('Digite um usuário');
		$('#usuario').focus();
		valida = false;
		return;
	}
	//Senha em branco
	if ($('#senha').val() == '')
	{
		alert('Digite uma senha');
		$('#senha').focus();
		valida = false;
		return;
	}
	//Confirmação diferente da senha
	if ($('#senha').val() != $('#confirmacao').val())
	{
		alert('A confirmação da senha não confere com a senha');
		$('#senha').val('');
		$('#confirmacao').val('');
		$('#senha').focus();
		valida = false;
		return;
	}
	
	
	if (valida = true)
		salvarUsuario();		
}

//Salva/Altera o Usuario
function salvarUsuario()
{
	var administrador;
	
	if($('input[name=adminstrador]:checked').val())
		administrador = true;
	else
		administrador = false;
	$.ajax
	({
		type: "POST",
		url: "app.control/ajax.php",
		data: 
		{
			codigo:			$('#codigo').val(),
			nome:			$('#nome').val(),
			usuario:		$('#usuario').val(),
			senha:			$('#senha').val(),
			administrador:	$('input[name=adminstrador]:checked').val(),
			action:			'salvarUsuario'
		},
		success: function(data) 
		{
			top.location='?class=usuarios';
		}
	});
}

//Apaga o usuario
function apagaUsuario()
{
	var arrCod = [];
	$(".chkUsuariosApagar:checked").each(function() {
		arrCod.push($(this).val());
	});
	
	$.ajax
	({
		type: "POST",
		url: "app.control/ajax.php",
		data: 
		{
			codigos:	arrCod,
			action:		'apagaUsuarios'
		},
		success: function(data) 
		{
			$('.tabela-usuarios').html(data);
		}
	});	
}

//Redireciona para a classe alteraSenha
function alteraSenhaRedirect()
{
	window.location = "?class=alteraSenha";
}

function validaAlterarSenha()
{
	var valida;
	valida = true;
	
	if ($('#senhaAtual').val() == '')
	{
		alert('Digite a Senha Atual!');
		$('#senhaAtual').focus();
		return;
	}
	if ($('#senhaNova').val() == '')
	{
		alert('Digite a Senha Nova!');
		$('#senhaNova').focus();
		return;
	}
	else if ($('#senhaNova').val() !=  $('#confirmacao').val())
	{
		alert('Senha nova diferente da Confirmação!');
		
		$('#senhaNova').val('');
		$('#confirmacao').val('');
		
		$('#senhaNova').focus();
		
		return;
	}
	
	if (valida = true)
		alterarSenha();		
}

function alterarSenha()
{
	$.ajax
	({
		type: "POST",
		url: "app.control/ajax.php",
		data: 
		{
			senhaAtual:	$('#senhaAtual').val(),
			senhaNova:	$('#senhaNova').val(),
			action:		'alteraSenha'
		},
		success: function(data) 
		{
			top.location='?class=usuarios';
		}
	});
}