<?php header("Content-Type:text/html; charset=UTF-8",true) ?>

<?php 
/*
 *  Funcao Autoload
 *  Carraga a classe quando for instanciada
 */
function __autoload($classe)
{
    $pastas = array('app.widgets', 'app.ado', 'app.config', 'app.model', 'app.control','app.view');
    foreach ($pastas as $pasta)
    {
        if (file_exists("{$pasta}/{$classe}.class.php"))
        {
            include_once "{$pasta}/{$classe}.class.php";
        }
    }
}

/*
 *  Classe TApllication
 *  Aplicacao Principal
 */
class TApplication
{
    /*
     *  Funcao run
     *  Carrega conteudo da pagina
     */
    static public function run()
    {
        //Suprimir Warnings
        //error_reporting(E_WARNING);
        
        //$template = file_get_contents('app.view/template.class.php');
        $catalogo = new catalogo;
        $catalogo->show();
    }
}
//new ContaVisitas();
TApplication::run();
?>

