<?PHP

include(dirname(__FILE__) . '/../ob/VO_dadoUnitarioPrevisao.php');
include(dirname(__FILE__) . '/../fcn/Geral.php');

class Bll_DadoUnitarioPrevisao {

    public function getDadosUnitarios($ls_dadosExibicao) {
        $hashdado[] = array();


        $hashdado = $this->getDados($ls_dadosExibicao, 900);

//       Caso Futuramente suja necessidade        
//        if ($intervalo == 'hora') {
//            $hashdado = $this->getDados($ls_dadosExibicao, 3600);
//        }
//        if ($intervalo == 'dia') {
//            $hashdado = $this->getDados($ls_dadosExibicao, 86400);
//        }

        return $hashdado;
    }

    public function getDados($ls_dadosExibicao, $intervalo) {
        $hashdado[] = array();
        $geral = new Geral();

        $isFirstData = TRUE;
        foreach ($ls_dadosExibicao as $dados) {
            //Se dado vazio, ignora
            if ($dados == null) {
                continue;
            }

            if (($dados->getSensornome() == 'ChuvaHoraria') || ($dados->getSensornome() == 'Nivel') || ($dados->getSensornome() == 'ChuvaIntervalo') || ($dados->getSensornome() == 'ChuvaColetada') || ($dados->getSensornome() == 'ChuvaDiaria')) {
                continue;
            }



            //Converte a data em milisegundos
            $dataMili = $geral->converter($dados->getColetahorario());

            //Se a ultima data for nula (primeira coleta) ou se mudou o intervalo.
            if ((@$lastData == null) || (@$lastData != $dados->getColetahorario())) {
                //Se a ultima data for diferente de nulo, ou seja, se o intervalo é intermediario
                if (@$lastData != null) {
                    //Encontra a diferença de tempo entre a data atual e a ultima coleta do laço
                    $timeDif = $dataMili - $lastDataMili;
                    //Se for 15 minutos, adiciona no array. Se for maior que isso, preenche o gap com null
                    if ($timeDif == $intervalo) {
                        array_push($hashdado, $dadoUnitario);
                    } elseif ($timeDif > $intervalo) {
                        $gaps = $timeDif / $intervalo;
                        //Encontra a ultima data com dado válido
                        $lastValidDate = $dataMili - $timeDif;
                        for ($i = 1; $i <= $gaps; $i++) {
                            //Formata a nova data no formato do BD
                            $newDateBD = date("Y-m-d H:i:s", $lastValidDate);
                            $dadoUnitario = new VO_dadoUnitarioPrevisao();
                            $dadoUnitario->setEstacaoId($dados->getEstacaoid());
                            $dadoUnitario->setEstacaoNome($dados->getEstacaoNome());
                            $dadoUnitario->setHorario($newDateBD);
                            $dadoUnitario->setVazao(NULL);
                            $dadoUnitario->setPrevista(NULL);
                            $dadoUnitario->setRealizada(NULL);
                            array_push($hashdado, $dadoUnitario);
                            //Incrementa o intervalo
                            $lastValidDate+=$intervalo;
                        }
                    }
                }
                //Se não for dado intermediário, testa se é o primeiro. Se não for, apenas coloca horario.
                if ($isFirstData == TRUE) {
                    $lastData = $geral->testaPrimeiaHora($dados->getColetahorario());
                    $isFirstData = FALSE;
                } else {
                    $lastData = $dados->getColetahorario();
                }
                $lastDataMili = $geral->converter($lastData);
                $dadoUnitario = new VO_dadoUnitarioPrevisao();
                $dadoUnitario->setHorario($lastData);
            }

            //Se não mudou de intervalo, preenche os sensores
            if ($dados->getSensornome() == 'Vazao') {
                $dadoUnitario->setVazao($dados->getValor());
            } elseif ($dados->getSensornome() == 'GeracaoPrevista') {
                $dadoUnitario->setPrevista($dados->getValor());
            } elseif ($dados->getSensornome() == 'GeracaoRealizada') {
                $dadoUnitario->setRealizada($dados->getValor());
            }

            $dadoUnitario->setEstacaoId($dados->getEstacaoid());
            $dadoUnitario->setEstacaoNome($dados->getEstacaoNome());
        }

        //Colocando ultimo intervalo de dado válido
        @array_push($hashdado, $dadoUnitario);

        return $hashdado;
    }

}
