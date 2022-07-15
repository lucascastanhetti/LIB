<?PHP
//Habilita exibição de erros (somente ambiente desenvolvimento)
ini_get('display_errors', true);
ini_get('display_startup_erros', true);
error_reporting(E_ALL);

include(dirname(__FILE__) . '/../ob/VO_EstacaoFichaRio.php');
include(dirname(__FILE__) . '/../fcn/Bll_Estacaotipo.php');
//include(dirname(__FILE__) . '/../fcn/Bll_Empresa.php');
//include(dirname(__FILE__) . '/../fcn/Bll_Grupo.php');
include(dirname(__FILE__) . '/../fcn/Bll_Municipio.php');
include(dirname(__FILE__) . '/../fcn/Bll_Empreendimento.php');
include(dirname(__FILE__) . '/../fcn/Bll_ColetaIntervalo.php');
include(dirname(__FILE__) . '/../fcn/Bll_Operadora.php');
include(dirname(__FILE__) . '/../fcn/Bll_Rio.php');
include(dirname(__FILE__) . '/../fcn/Bll_Bacia.php');
include(dirname(__FILE__) . '/../fcn/Bll_Subbacia.php');

class Fill {

    public static function getIntervalo($id) {
        $fcn_ColetaIntervalo = new Bll_ColetaIntervalo();
        $lsColetaIntervalo = $fcn_ColetaIntervalo->getAll();

        $coletaIntervalo = new VO_ColetaIntervalo();
        $coletaIntervalo = $lsColetaIntervalo[$id];

        return $coletaIntervalo->getIntervalo();
    }
    
      public static function getEmpresa($id) {
        $fcn_Empresa = new Bll_Empresa();
        $ob_Empresa = new VO_Empresa();
        $ob_Empresa = $fcn_Empresa->getById($id);

        return $ob_Empresa->getNome();
    }

    public static function getProtocolo($id) {
        switch ($id) {
            case 1:
                return "GPRS";
            case 2:
                return "Satelite";
            case 3:
                return "Rede";
            default:
                return "Rede";
        }
    }
    
    public static function getRegiao($id) {
        switch ($id) {
            case 1:
                return "Sul";
            case 2:
                return "Sudeste";
            case 3:
                return "Cetro-Oeste";
            case 4:
                return "Nordeste";
            case 5:
                return "Norte";
        }
    }

    public static function getOperadora($id) {
        $fcn_Operadora = new Bll_Operadora();
        $lsOperadora = $fcn_Operadora->getAll();

        $operadora = new VO_Operadora();
        $operadora = $lsOperadora[$id];

        return $operadora->getNome();
    }

    public static function fillEstacaoFicha($esta, $estaDetalhe) {
        $fcn_EstacaoTipo = new Bll_Estacaotipo();
        $fcn_Empreendimento = new Bll_Empreendimento();
        $fcn_Municipio =  new Bll_Municipio();
        $fcn_Grupo = new Bll_Grupo();
        $fcn_Empresa = new Bll_Empresa();
        $fcn_Rio = new Bll_Rio();
        $fcn_Bacia = new Bll_Bacia();
        $fcn_SubBacia = new Bll_Subbacia();
        

        $estacaoTipo = new VO_Estacaotipo();
        $estacaoFicha = new VO_EstacaoFicha();
        $estacao = new VO_Estacao();
        $estacaoDetalhe = new VO_EstacaoDetalhe();
        $empreendimento = new VO_Empreendimento();
        $municipio = new VO_Municipio();
        $grupo = new VO_Grupo();
        $ob_Empresa = new VO_Empresa();
        $ob_Rio = new VO_Rio();
        $ob_SubBacia = new VO_Subbacia();
        $ob_Bacia = new VO_Bacia();
        

        $estacao = $esta;
        $estacaoDetalhe = $estaDetalhe;

        $estacaoFicha->setId($estacao->getId());
        $estacaoFicha->setEstacaoId($estacao->getId());
        $estacaoFicha->setCodigo($estacao->getCodigo());
        $estacaoFicha->setCodigoaneelflu($estacao->getCodigoaneelflu());
        $estacaoFicha->setCodigoaneelplu($estacao->getCodigoaneelplu());
        $estacaoFicha->setColetaIntervalo(Fill::getIntervalo($estacao->getColetaintervalo_id()));
        $estacaoFicha->setCodigoAdicional($estacao->getCodigoadicional());
        $estacaoTipo = $fcn_EstacaoTipo->getById($estacao->getEstacaotipo_id());
        $estacaoFicha->setEstacaotipo($estacaoTipo->getDescricao());
        $estacaoFicha->setGrupo_id($estacao->getGrupo_id());
        $grupo = $fcn_Grupo->getById($estacao->getGrupo_id());
        $estacaoFicha->setGrupoNome($grupo->getDescricao());
        $estacaoFicha->setNome($estacao->getNome());
        $estacaoFicha->setSigla($estacao->getSigla());
        $estacaoFicha->setStatus_id($estacao->getStatus_id());
        //faz a busca de dados 
        $empreendimento = $fcn_Empreendimento->getById($estacao->getEmpreendimento_id());
        $estacaoFicha->setEmpreendimento_id($estacao->getEmpreendimento_id());
        $estacaoFicha->setEmpreendimento_nome($empreendimento->getNome());
        $estacaoFicha->setEmpreendimento_senha($empreendimento->getSenhaaneel());
        $estacaoFicha->setEmpreendimento_usuario($empreendimento->getUsuarioaneel());
        $estacaoFicha->setImagemurl($estacaoDetalhe->getImagemurl());
        $estacaoFicha->setMunicipio_id($estacaoDetalhe->getMunicipio_id());
        //busca em outra tabela com mais de 1 campo
        $municipio = $fcn_Municipio->getById($estacaoDetalhe->getMunicipio_id());
        $estacaoFicha->setMunicipio_nome($municipio->getNome());
        $estacaoFicha->setEstado_sigla($municipio->getUf());
        $estacaoFicha->setLatitude($estacaoDetalhe->getLatitude());
        $estacaoFicha->setLongitude($estacaoDetalhe->getLongitude());
        $estacaoFicha->setOperadora(Fill::getOperadora($estacaoDetalhe->getOperadora_id()));
        
        $estacaoFicha->setProtocolo(Fill::getProtocolo($estacaoDetalhe->getProtocolo_id()));
        $estacaoFicha->setRegiao_id($estacaoDetalhe->getRegiao_id());
        $estacaoFicha->setRegiaoNome(Fill::getRegiao($estacaoDetalhe->getRegiao_id()));
        $ob_Empresa = $fcn_Empresa->getById($estacao->getEmpresa_id());
        $estacaoFicha->setEmpresa_id($estacao->getEmpresa_id());
        $estacaoFicha->setEmpresa_nome($ob_Empresa->getNome());
        $estacaoFicha->setEmpresa_logo($ob_Empresa->getLogo());
        $estacaoFicha->setBanco($_SESSION['banco']);
        $estacaoFicha->setAltitude($estacaoDetalhe->getAltitude());
        $estacaoFicha->setCotaVertimento($estacaoDetalhe->getCotaVertimento());


        if ($estacaoDetalhe->getRiot_id() == '') {
            $estacaoFicha->setRio($estacaoDetalhe->getRio());   
            $estacaoFicha->setsubBacia(null);
            $estacaoFicha->setBacia(null);
        } else {
            
           $ob_Rio = $fcn_Rio->getById($estacaoDetalhe->getRiot_id());
           $estacaoFicha->setRio($ob_Rio->getNome());
           $ob_SubBacia = $fcn_SubBacia->getById($ob_Rio->getSubbacia_id());
           $estacaoFicha->setsubBacia($ob_SubBacia->getNome());
           $ob_Bacia = $fcn_Bacia->getById($ob_SubBacia->getBacia_id());
           $estacaoFicha->setBacia($ob_Bacia->getNome());
            
        }


        return $estacaoFicha;
    }

    public static function getById($id, $ls_estacao) {
        foreach ($ls_estacao as $d) {
            if ($d == null) {
                continue;
            }
            $estacao = new VO_EstacaoFicha();
            $estacao = $d;

            if ($estacao->getId() === $id) {
                return $estacao;
            }
        }
    }

}

class Bll_EstacaoFicha {

    public function getEstacao($user_estacao, $ls_estacao, $ls_estacaoDetalhe) {
        $hashFicha[] = array();

        if ($user_estacao == '') {
            foreach ($ls_estacao as $e) {
                if ($e == null) {
                    continue;
                }
                $estacao = new VO_Estacao();
                $estacao = $e;

                $estacaoDetalhe = new VO_EstacaoDetalhe();
                $estacaoFicha = new VO_EstacaoFicha();

                $estacaoDetalhe = $ls_estacaoDetalhe[$estacao->getId()];
                

                $estacaoFicha = Fill::fillEstacaoFicha($estacao, $estacaoDetalhe);

                $hashFicha[$estacao->getId()] = $estacaoFicha;
                //array_push($hashFicha, $estacaoFicha);
            }
        } else {
            $user_estacao = explode(',', $user_estacao);

            foreach ($ls_estacao as $e) {
                if ($e == null) {
                    continue;
                }
                $estacao = new VO_Estacao();
                $estacao = $e;
                $valida = Valida::validaEstacao($estacao->getId(), $user_estacao);
                if ($valida == FALSE) {
                    continue;
                } else {
                    $estacaoDetalhe = new VO_EstacaoDetalhe();
                    $estacaoFicha = new VO_EstacaoFicha();

                    $estacaoDetalhe = $ls_estacaoDetalhe[$estacao->getId()];

                    $estacaoFicha = Fill::fillEstacaoFicha($estacao, $estacaoDetalhe);

                    $hashFicha[$estacao->getId()] = $estacaoFicha;
                    //array_push($hashFicha, $estacaoFicha);
                }
            }
        }
        return $hashFicha;
    }

}

class Valida {

    public static function validaEstacao($idValida, $estacoesPermitidas) {
        $j = count($estacoesPermitidas);
        for ($i = 0; $i < $j; $i++) {
            if ($estacoesPermitidas[$i] == $idValida) {
                return true;
            }
        }
        return false;
    }

}
