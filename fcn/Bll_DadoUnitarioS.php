<?PHP

include(dirname(__FILE__) . '/../ob/VO_dadoUnitario.php');
include_once(dirname(__FILE__) . '/../model/VO_Sensor.php');
include_once(dirname(__FILE__) . '/../fcn/Geral.php');

class Bll_DadoUnitario {

    public function getDadosUnitarios($ls_dadosExibicao, $intervalo, $intervaloseg, $sensores) {
        $hashdado[] = array();

        if ($intervalo == 'min') {
            $segundos = $intervaloseg * 60;
            $hashdado = $this->getDados($ls_dadosExibicao, $segundos, $sensores);
        }
         if ($intervalo == 'trinta') {
            $segundos = $intervaloseg * 60;
            $hashdado = $this->getDados($ls_dadosExibicao, $segundos, $sensores);
        }
        if ($intervalo == 'hora') {
            $hashdado = $this->getDados($ls_dadosExibicao, 3600, $sensores);
        } 
        if ($intervalo == 'dia') {
            $hashdado = $this->getDados($ls_dadosExibicao, 86400, $sensores);
        }

        return $hashdado;
    }

    public function getDados($ls_dadosExibicao, $intervalo, $sensores) {
        $hashdado[] = array();
        $geral = new Geral();

        $isFirstData = TRUE;
        foreach ($ls_dadosExibicao as $dados) {
            //Se dado vazio, ignora
            if ($dados == null) {
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
                    //Se for o intervalo minutos, adiciona no array. Se for maior que isso, preenche o gap com null
                    if (($timeDif == $intervalo) || ($lastEstacao != $dados->getEstacaoid())) {
                        array_push($hashdado, $dadoUnitario);
                    } elseif ($timeDif > $intervalo) {
                        $gaps = $timeDif / $intervalo;
                        //Encontra a ultima data com dado válido
                        $lastValidDate = $dataMili - $timeDif;
                        for ($i = 1; $i <= $gaps; $i++) {
                            //Formata a nova data no formato do BD
                            $newDateBD = date("Y-m-d H:i:s", $lastValidDate);
                            $dadoUnitario = new VO_dadoUnitario();
                            $dadoUnitario->setEstacao($dados->getEstacaoid());
                            $dadoUnitario->setEstacaoNome($dados->getEstacaoNome());
                            $dadoUnitario->setHorario($newDateBD);
                            $dadoUnitario->setVazao(NULL);
                            $dadoUnitario->getNivel(NULL);
                            $dadoUnitario->setChuvaColetada(NULL);
                            $dadoUnitario->setChuvaDiaria(NULL);
                            $dadoUnitario->setChuvaHoraria(NULL);
                            $dadoUnitario->setChuvaIntevalo(NULL);
                            $dadoUnitario->setChuvaLeiturista(NULL);
                            $dadoUnitario->setNivelLeiturista(NULL);
                            $dadoUnitario->setCMP1(NULL);
                            $dadoUnitario->setCMP2(NULL);
                            $dadoUnitario->setCMP3(NULL);
                            
                            array_push($hashdado, $dadoUnitario);
                            //Incrementa o intervalo
                            $lastValidDate += $intervalo;
                        }
                    }
                }
                //Se não for dado intermediário, testa se é o primeiro. Se não for, apenas coloca horario.
                if ($isFirstData == TRUE) {
                    $lastData = $geral->testaPrimeiaHora($dados->getColetahorario());
                    $lastEstacao = $dados->getEstacaoid();
                    $isFirstData = FALSE;
                } else {
                    $lastData = $dados->getColetahorario();
                    $lastEstacao = $dados->getEstacaoid();
                }
                $lastDataMili = $geral->converter($lastData);
                $dadoUnitario = new VO_dadoUnitario();
                $dadoUnitario->setHorario($lastData);
            }

            //Se não mudou de intervalo, preenche os sensores
            if ($dados->getSensornome() == 'Vazao') {
                $dadoUnitario->setVazao($dados->getValor());
            } elseif ($dados->getSensornome() == 'Nivel') {
                if ($sensores != null) {
                    //Gambiarra Votorantim para somar RN nas estações de jusante. Quando houver, soma, quando não, apenas exibe.
                    $sensorAux = new VO_Sensor();                    
                    $sensorAux = $sensores[$dados->getSensorid()];
                    if ($sensorAux->getRn() == null) {
                        $dadoUnitario->setNivel($dados->getValor());
                    } else {
                        $dadoUnitario->setNivel($dados->getValor() + $sensorAux->getRn());
                    }
                } else {
                    $dadoUnitario->setNivel($dados->getValor());
                }

                
            } elseif ($dados->getSensornome() == 'NivelLeiturista') {
                $dadoUnitario->setNivelLeiturista($dados->getValor());
            } elseif ($dados->getSensornome() == 'ChuvaColetada') {
                $dadoUnitario->setChuvaColetada($dados->getValor());
            } elseif ($dados->getSensornome() == 'ChuvaDiaria') {
                $dadoUnitario->setChuvaDiaria($dados->getValor());
            } elseif ($dados->getSensornome() == 'ChuvaHoraria') {
                $dadoUnitario->setChuvaHoraria($dados->getValor());
            } elseif ($dados->getSensornome() == 'ChuvaIntervalo') {
                $dadoUnitario->setChuvaIntevalo($dados->getValor());
            } elseif ($dados->getSensornome() == 'ChuvaLeiturista') {
                $dadoUnitario->setChuvaLeiturista($dados->getValor());
            } elseif ($dados->getSensornome() == 'Temperatura') {
                $dadoUnitario->setTemperatura($dados->getValor());
            } elseif ($dados->getSensornome() == 'Umidade') {
                $dadoUnitario->setUmidade($dados->getValor());
            } elseif ($dados->getSensornome() == 'Radiacao') {
                $dadoUnitario->setRadiacao($dados->getValor());
            } elseif ($dados->getSensornome() == 'Pressao') {
                $dadoUnitario->setPressao($dados->getValor());
            } elseif ($dados->getSensornome() == 'VelocidadeVento') {
                $dadoUnitario->setVelocidadeVento($dados->getValor());
            } elseif ($dados->getSensornome() == 'DirecaoVento') {
                $dadoUnitario->setDirecaoVento($dados->getValor());
            } elseif ($dados->getSensornome() == 'VazaoTurbinada') {
                $dadoUnitario->setVazaoTurbinada($dados->getValor());
            } elseif ($dados->getSensornome() == 'VazaoRemanescente') {
                $dadoUnitario->setVazaoRemanescente($dados->getValor());
            } elseif ($dados->getSensornome() == 'VazaoVertida') {
                $dadoUnitario->setVazaoVertida($dados->getValor());
            } elseif ($dados->getSensornome() == 'Cmp. Seg 1') {
                $dadoUnitario->setCMP1($dados->getValor());
            } elseif ($dados->getSensornome() == 'Cmp. Seg 2') {
                $dadoUnitario->setCMP2($dados->getValor());
            } elseif ($dados->getSensornome() == 'Cmp. Seg 3') {
                $dadoUnitario->setCMP3($dados->getValor());
            }

            $dadoUnitario->setEstacao($dados->getEstacaoid());
            $dadoUnitario->setEstacaoNome($dados->getEstacaoNome());
        }

        //Colocando ultimo intervalo de dado válido
        @array_push($hashdado, $dadoUnitario);

        return $hashdado;
    }

}
