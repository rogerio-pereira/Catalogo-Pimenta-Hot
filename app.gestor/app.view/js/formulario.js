/*  
  JS formulario
  JavaScript de envio sem ajax

  Sistema:  Catalogo_PimentaHot
  Autor:    Rogério Eduardo Pereira
  Data:     23/09/2014
*/
function doPost(formName, actionName)
{
	var hiddenControl = document.getElementById('action');
	var theForm = document.getElementById(formName);

	hiddenControl.value = actionName;
    theForm.submit();
}