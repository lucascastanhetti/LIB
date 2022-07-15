<?PHP

include(dirname(__FILE__) . '/../ob/VO_EstacaoView.php');
include(dirname(__FILE__) . '/../fcn/Bll_Estacaotipo.php');
include(dirname(__FILE__) . '/../fcn/Bll_ColetaIntervalo.php');
include(dirname(__FILE__) . '/../fcn/Bll_Operadora.php');

class Fill {

    public static function getIntervalo($id) {
        $fcn_ColetaIntervalo = new Bll_ColetaIntervalo();
        $lsColetaIntervalo = $fcn_ColetaIntervalo->getAll();

        $coletaIntervalo = new VO_ColetaIntervalo();
        $coletaIntervalo = $lsColetaIntervalo[$id];

        return $coletaIntervalo->getIntervalo();
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

    public static function getOperadora($id) {
        $fcn_Operadora = new Bll_Operadora();
        $lsOperadora = $fcn_Operadora->getAll();

        $operadora = new VO_Operadora();
        $operadora = $lsOperadora[$id];

        return $operadora->getNome();
    }

    public static function fillEstacaoView($esta, $estaDetalhe) {
        $fcn_EstacaoTipo = new Bll_Estacaotipo();

        $estacaoTipo = new VO_Estacaotipo();
        $estacaoView = new VO_EstacaoView();
        $estacao = new VO_Estacao();
        $estacaoDetalhe = new VO_EstacaoDetalhe();


        $estacao = $esta;
        $estacaoDetalhe = $estaDetalhe;

        $estacaoView->setId($estacao->getId());
        $estacaoView->setCodigoaneelflu($estacao->getCodigoaneelflu());
        $estacaoView->setCodigoaneelplu($estacao->getCodigoaneelplu());
        $estacaoView->setColetaIntervalo(Fill::getIntervalo($estacao->getColetaintervalo_id()));
        $estacaoView->setCodigoAdicional($estacao->getCodigoadicional());
        $estacaoTipo = $fcn_EstacaoTipo->getById($estacao->getEstacaotipo_id());
        $estacaoView->setEstacaotipo($estacaoTipo->getDescricao());
        $estacaoView->setGrupo_id($estacao->getGrupo_id());
        $estacaoView->setNome($estacao->getNome());
        $estacaoView->setStatus_id($estacao->getStatus_id());
        $estacaoView->setEmpreendimento_id($estacao->getEmpreendimento_id());
        $estacaoView->setImagemurl($estacaoDetalhe->getImagemurl());
        $estacaoView->setMunicipio_id($estacaoDetalhe->getMunicipio_id());
        $estacaoView->setLatitude($estacaoDetalhe->getLatitude());
        $estacaoView->setLongitude($estacaoDetalhe->getLongitude());
        $estacaoView->setOperadora(Fill::getOperadora($estacaoDetalhe->getOperadora_id()));
        $estacaoView->setRio($estacaoDetalhe->getRio());
        $estacaoView->setProtocolo(Fill::getProtocolo($estacaoDetalhe->getProtocolo_id()));
        $estacaoView->setRegiao_id($estacaoDetalhe->getRegiao_id());
        $estacaoView->setEmpresa_id($estacao->getEmpresa_id());
        $estacaoView->setBanco($_SESSION['banco']);
        $estacaoView->setAltitude($estacaoDetalhe->getAltitude());
        $estacaoView->setCotaVertimento($estacaoDetalhe->getCotaVertimento());

        return $estacaoView;
    }

    public static function getById($id, $ls_estacao) {
        foreach ($ls_estacao as $d) {
            if ($d == null) {
                continue;
            }
            $estacao = new VO_EstacaoView();
            $estacao = $d;

            if ($estacao->getId() === $id) {
                return $estacao;
            }
        }
    }

}

class Bll_EstacaoView {

    public function getEstacao($user_estacao, $ls_estacao, $ls_estacaoDetalhe) {
        $hashView[] = array();

        if ($user_estacao == '') {
            foreach ($ls_estacao as $e) {
                if ($e == null) {
                    continue;
                }
                $estacao = new VO_Estacao();
                $estacao = $e;

                $estacaoDetalhe = new VO_EstacaoDetalhe();
                $estacaoView = new VO_EstacaoView();

                $estacaoDetalhe = $ls_estacaoDetalhe[$estacao->getId()];

                $estacaoView = Fill::fillEstacaoView($estacao, $estacaoDetalhe);

                $hashView[$estacao->getId()] = $estacaoView;
                //array_push($hashView, $estacaoView);
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
                    $estacaoView = new VO_EstacaoView();

                    $estacaoDetalhe = $ls_estacaoDetalhe[$estacao->getId()];

                    $estacaoView = Fill::fillEstacaoView($estacao, $estacaoDetalhe);

                    $hashView[$estacao->getId()] = $estacaoView;
                    //array_push($hashView, $estacaoView);
                }
            }
        }
        return $hashView;
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
