/*  
  JS login
  JavaScript pré-processamento do formulario login.class.php

  Sistema:  Catalogo_PimentaHot
  Autor:    Rogério Eduardo Pereira
  Data:		Sep 25, 2014
*/
function executaLogin()
{
	$.ajax
	({
		type: "POST",
		url: "app.control/ajax.php",
		data: 
		{
			usuario:	$('#usuario').val(),
			senha:		$('#senha').val(),
			action:		'login'
		},
		success: function(data) 
		{
			location.reload();
		}
	});
}