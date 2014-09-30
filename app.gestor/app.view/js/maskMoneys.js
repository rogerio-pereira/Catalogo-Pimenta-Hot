/*  
  JS maskMoney
  Javascript obtido para gerar mascaras de dinheiro

  Sistema:  Catalogo_PimentaHot
  Autor:    Rogério Eduardo Pereira
  Data:     25/09/2014
*/
function createMaskValor()
{
	$('#valor').maskMoney
	({
		prefix:			'R$ ', 
		allowNegative:	true, 
		thousands:		'.', 
		decimal:		',', 
		affixesStay:	true
	});
}