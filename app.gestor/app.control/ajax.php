<?php 
	session_start();
	header("Content-Type:text/html; charset=UTF-8",true) 
?>

<?php
/*
 * 	Arquivo  ajax
 * 	Destino de todos os fomrularios
 * 	
 * 	Sistema:	Kanban
 * 	Autor:	Rogério Eduardo Pereira
 * 	Data:	Aug 29, 2014
 */

    //Autoload
    function __autoload($classe)
    {
        $pastas = array('../app.widgets', '../app.ado', '../app.config', '../app.model', '../app.control','../app.view');
        foreach ($pastas as $pasta)
        {
            if (file_exists("{$pasta}/{$classe}.class.php"))
            {
                include_once "{$pasta}/{$classe}.class.php";
            }
        }
    }
	
//	/error_reporting(E_WARNING);
	
	//Obtem informação do que sera feito através do campo hiddens
	$request = $_POST['action'];
	
	//Salva/Altera Categoria
	if($request == 'salvarCategoria')
	{		
		$controlador = new controladorCategoria();
		
		$controlador->setCategoriaCodigo($_POST['codigo']);
		$controlador->setCategoriaNome($_POST['nome']);
		
		
		if($controlador->salvarCategoria2() == true)
		{
			return true;
		}
		else
		{
			echo "<script> alert('Impossivel salvar Categoria');</script>";
			
			return false;
		}
	}
	
	//Apaga Categorias
	else if($request == 'apagaCategorias')
	{		
		$codigos = $_POST['codigos'];
		$apagado  = 0;
		
		$controlador	= new controladorCategoria();
		
		foreach ($codigos as $codigo)
		{
			$controlador->apagaCategorias2($codigo);
		}
		
		$collectionCategorias = $controlador->getCategorias2();
		
		echo 
			"
				<tr>
					<td>Alterar</td>
					<td>Nome</td>
					<td>Apagar</td>
				</tr>
			";
				
		foreach ($collectionCategorias as $categoria)
		{
			echo
				"
					<!--{$categoria->nome}-->
					<tr>
						<td>
							<input type='radio' name='radioCategoria' id='radioCategoria' value='$categoria->codigo'>
						</td>
						<td>
							{$categoria->nome}
						</td>
						<td style='text-align: center;'>
							<input type='checkbox' name='categoriasApagar[]' class='chkCategoriasApagar' value='{$categoria->codigo}'>
						</td>
					</tr>
				";
		}

		echo 
			"
				<tr>
					<td colspan='3'>
						<hr>
					</td>
				</tr>
				<tr>
					<td colspan='3' style='text-align: center'>
						<input type='button' value='Nova'		onclick='novaCategoria()'>
						<input type='button' value='Alterar'	onclick='alteraCategoria()'>
			";
				
		if(count($collectionCategorias) > 0)
			echo "<input type='button' value='Apagar' onclick='apagaCategorias()'>";
		
		echo "
					</td>
				</tr>
			";
	}
?>