<?php

class VO_dadoUnitarioBalancoHidrico {

    //Atributos
    private $estacao;
    private $estacaoNome;
    private $sensor;
    private $valor;
    
    function getEstacao() {
        return $this->estacao;
    }

    function getEstacaoNome() {
        return $this->estacaoNome;
    }

    function getSensor() {
        return $this->sensor;
    }

    function getValor() {
        return $this->valor;
    }

    function setEstacao($estacao) {
        $this->estacao = $estacao;
    }

    function setEstacaoNome($estacaoNome) {
        $this->estacaoNome = $estacaoNome;
    }

    function setSensor($sensor) {
        $this->sensor = $sensor;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }


    
}
?>

