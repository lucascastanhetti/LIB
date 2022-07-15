<?PHP
//Habilita exibição de erros
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

include(dirname(__FILE__) . '/../fcn/Bll_Estacao.php');
include(dirname(__FILE__) . '/../fcn/Bll_EstacaoDetalhe.php');
include(dirname(__FILE__) . '/../fcn/Bll_Grupo.php');

class Bll_Busca {

    private $ls_estacao;
    private $ls_grupo;
    private $ls_Empresas;
    private $ls_estacaoDetalhe;

    function __construct($empresa) {
        $fcnEmpresa = new Bll_Empresa();
        $fcnEstacao = new Bll_Estacao();
        $fcnGrupo = new Bll_Grupo();
        $fcnEstacaoDetalhe = new Bll_EstacaoDetalhe();
        
        $this->ls_Empresas = $fcnEmpresa->getAll();
        
        $this->ls_grupo = $fcnGrupo->getAll($empresa);

        $this->ls_estacao = $fcnEstacao->getAll($empresa);

        $this->ls_estacaoDetalhe = $fcnEstacaoDetalhe->getAll();
    }

    public function getListEmpresa() {
        return $this->ls_Empresas;
    }
    public function getListEstacao() {
        return $this->ls_estacao;
    }
    public function getListEstacaoDetalhe() {
        return $this->ls_estacaoDetalhe;
    }
    public function getListGrupo() {
        return $this->ls_grupo;
    }
}
