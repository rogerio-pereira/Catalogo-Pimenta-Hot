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
	
	//error_reporting(E_WARNING);
	
	//Obtem informação do que sera feito através do campo hiddens
	$request = $_POST['action'];
	
	//Login
	if($request == 'login')
	{
		$controlador	= new controladorLogin();
		
		$controlador->setUsuario( $_POST['usuario']);
		$controlador->setSenha($_POST['senha']);
		
		$retorno = $controlador->login();
		
		if($retorno == true)
		{
			return true;
		}
		else
		{
			session_destroy();
			echo "
					<script>
						alert('Falha ao fazer login');
					</script>
				";
		}
	}	
	//Salva/Altera Categoria
	else if($request == 'salvarCategoria')
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
	//Salva/Altera Usuario
	else if($request == 'salvarUsuario')
	{	
		$controlador = new controladorUsuario();
		
		$controlador->setUsuarioCodigo($_POST['codigo']);
		$controlador->setUsuarioNome($_POST['nome']);
		$controlador->setUsuarioLogin($_POST['usuario']);
		if($_POST['senha'] != NULL)
			$controlador->setUsuarioSenha($_POST['senha']);
		$controlador->setUsuarioAdmin($_POST['administrador']);
		
		if($controlador->salvarUsuario2() == true)
		{
			return true;
		}
		else
		{
			echo "<script> alert('Impossivel salvar Usuario');</script>";
			
			return false;
		}
	}
	//Apaga Usuarios
	else if($request == 'apagaUsuarios')
	{		
		$codigos = $_POST['codigos'];
		$apagado  = 0;
		
		$controlador	= new controladorUsuario();
		
		foreach ($codigos as $codigo)
		{
			$controlador->apagaUsuario2($codigo);
		}
		
		$collectionUsuarios= $controlador->getUsuarios2();
		
		echo 
			"
				<tr>
					<td colspan='5' class='center'>
						<input type='button' value='Alterar Senha' onclick='alteraSenha()'>
					</td>
				</tr>
			";
		
		if($_SESSION['usuario']->administrador == true)			
		{
			echo
				" 
					<tr>
						<td colspan='5'>
							<hr>
						</td>
					</tr>
					<tr class='titulo'>
						<td>Apagar</td>
						<td>Nome</td>
						<td>Usuario</td>
						<td>Tipo Usuario</td>
						<td>Apagar</td>
					</tr>
					<tr>
						<td colspan='5'>
							<hr>
						</td>
					</tr>
				";
			foreach ($this->collectionUsuario as $usuario)
			{
				echo
					"
						<!--{$usuario->nome}-->
						<tr>
							<td class='center'>
								<input type='radio' name='radioUsuario' id='radioUsuario' value='$usuario->codigo'>
							</td>
							<td>
								{$usuario->nome}
							</td>
							<td>
								{$usuario->usuario}
							</td>
							<td>
					";
				if($usuario->administrador == 1)
					echo 'Administrador';
				else
					echo 'Usuario Comum';
				echo 
					"		</td>
							<td class='center'>
								<input type='checkbox' name='usuariosApagar[]' class='chkUsuariosApagar' value='{$usuario->codigo}'>
							</td>
						</tr>
					";
			}
			echo
				" 
					<tr>
						<td colspan='5'>
							<hr>
						</td>
					</tr>
					<tr>
						<td colspan='5' style='text-align: center'>
							<input type='button' value='Novo'		onclick='novoUsuario()'>
							<input type='button' value='Alterar'	onclick='alteraUsuario()'>
				";
			if(count($this->collectionUsuario) > 0)
					echo "<input type='button' value='Apagar' onclick='apagaUsuario()'>";

			echo
				" 
						</td>
					</tr>
				";
		}
	}
	//AlteraSenha
	else if($request=='alteraSenha')
	{
		$controlador	= new controladorAlterarSenha();
		
		$controlador->setSenhaAtual($_POST['senhaAtual']);
		$controlador->setSenhaNova($_POST['senhaNova']);
		
		if($controlador->compara() == true)
		{
			if($controlador->altera())
				echo "
					<script>
						alert('Senha alterada com sucesso!');
					</script>
				";
			else
				echo "
					<script>
						alert('Falha ao alterar Senha!');
					</script>
				";
		}
		else
			echo "
					<script>
						alert('Senha inválida!');
					</script>
				";		
	}
	else if($request == 'salvarProduto')
	{
		$controlador = new controladorProdutos();
		
		$controlador->setProdutoCodigo($_POST['codigo']);
		$controlador->setProdutoNome($_POST['nome']);
		$controlador->setProdutoCategoria($_POST['categoria']);
		$controlador->setProdutoValor($_POST['valor']);
		$controlador->setProdutoLink($_POST['link']);
		$controlador->setProdutoAtivo($_POST['ativo']);
		
		if($controlador->salvarProduto2() == true)
		{
			return true;
		}
		else
		{
			echo "<script> alert('Impossivel salvar Produto');</script>";
			
			return false;
		}
	}
	else if($request == 'uploadProduto')
	{
		$controlador	= new controladorUpload;
		$produto		= new catalogo_produtos2;
		
		TTransaction2::open('my_bd_site');
		
		$controlador->setNomeNovo($produto->getLast());
		
		TTransaction2::close();
				
		$controlador->setImagem_temp($_FILES["uploadBtn"]["tmp_name"]);
		$controlador->setImagem_nome($_FILES["uploadBtn"]["name"]);
		$controlador->setImagem_tamanho($_FILES["uploadBtn"]["size"]);
		$controlador->setImagem_tipo($_FILES["uploadBtn"]["type"]);
		
		if($controlador->upload())
			return true;
		else
		{
			echo "<script> alert('Impossivel fazer o upload da imagem do produto!');</script>";
			
			return false;
		}
	}
	//Apaga Produtos
	else if($request == 'apagaProdutos')
	{		
		$codigos				= $_POST['codigos'];
		$apagado				= 0;
		
		$controladorProdutos	= new controladorProdutos();
		$controladorUpload		= new controladorUpload();
		
		foreach ($codigos as $codigo)
		{
			if($controladorProdutos->apagaProdutos2($codigo))
			{
				if($controladorUpload->apagar($codigo))
					$apagado = $apagado;
				else
					$apagado++;
			}
			else
				$apagado++;
			
		}
		
		/*if($apagado == 0)
			echo
				" 
					<script>
						alert('Todos os produtos foram apagados com sucesso!');
					</script>
				";
		else
			echo
				" 
					<script>
						alert('Erro ao apagar Produto ou imagem!');
					</script>
				";*/
		
		$collectionProdutos = $controladorProdutos->getProdutos2();
		
		echo 
			"
				<tr class='titulo'>
					<td>Alterar</td>
					<td>Nome</td>
					<td>Categoria</td>
					<td>Ativo</td>
					<td>Apagar</td>
				</tr>
				<tr>
					<td colspan='5'>
						<hr>
					</td>
				</tr>
			";
				
		foreach($collectionProdutos as $produto)
		{
			echo
				"
					<tr>
						<td class='center'>
							<input type='radio' name='radioProduto' id='radioproduto' value='{$produto->codigo}'>
						</td>
						<td>
							{$produto->nome}
						</td>
						<td>
							{produto->categoria->nome}
						</td>
						<td>
				";
							if($produto->ativo == true)
								echo '&check;';
			echo
				"
						</td>
						<td>
							<input type='checkbox' name='produtosApagar[]' class='chkProdutosApagar' value='{$produto->codigo}'>
						</td>
					</tr><br>
				";
		}
		
		echo 
			" 
				<tr>
					<td colspan='5'>
						<hr>
					</td>
				</tr>
				<tr>
					<td colspan='5' class='center'>
						<input type='button' value='Novo'		onclick='novoProduto()'>
			";
		
		if(count($collectionProdutos) > 0)
			echo 
				" 
					<input type='button' value='Alterar'	onclick='alteraProduto()'>
					<input type='button' value='Apagar'		onclick='apagaProdutos()'>
				";
		
		echo 
			"
					</td>
				</tr>
			";
	}
?>