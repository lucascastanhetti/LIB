<?php

//Habilita exibição de erros
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

class Cronus {

    function __construct() {
        $_SESSION['ip'] = '192.168.0.103';
        $_SESSION['banco'] = 'over.smaTd';
    }

    public function getEstacaoGeral() {
        //Instancia a classe de funções gerais
        $geral = new Geral();

        //Instancia os FCN's
        $fcn_User = new Bll_Usuario();
        $fcn_Empresa = new Bll_Empresa();
        $fcn_EstacaoView = new Bll_EstacaoView();
        //buscar curva chave para manter na sessão
        $curvachave = new Bll_Curvachave();
        $ls_CurvaChave = $curvachave->getAll();
        //$_SESSION['over.smaTd'] =  $ls_CurvaChave;
        
        //Instancia os OBJETOS
        $ob_Usuario = new VO_Usuario();
        $ob_Empresa = new VO_Empresa();

        //Pega o objeto user passado pela index
        $ob_Usuario = $fcn_User->getByLogin("brookadmin", '654123');

        //Instancia a classe de busca com o Id das empresas
        $fcn_Busca = new Bll_Busca($ob_Usuario->getEmpresas());

        //Lista todas as estações
        $ls_estacaoTodas = $fcn_Busca->getListEstacao();
        //Lista todas as estacoesDetalhe
        $ls_estacaoDetalhe = $fcn_Busca->getListEstacaoDetalhe();
        //Lista todos os grupos da empresa
        //$ls_grupo = $fcn_Busca->getListGrupo();
        //Lista todas as empresas
        //$ls_empresas = $fcn_Busca->getListEmpresa();


        //Busca empresa principal para carregamento de logo, nome, etc
        $ob_Empresa = $fcn_Empresa->getById($ob_Usuario->getEmpresa_id());
        //Busca a lista de objetos EstacaoView, que é o objeto de união de estação e estaçãoDetalhe
        $ls_estacao = $fcn_EstacaoView->getEstacao('', $ls_estacaoTodas, $ls_estacaoDetalhe);
        //Dao_ConnectionFactory::killConn();

        return $ls_estacao;
    }

}
?>

