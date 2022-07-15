<?php

class VO_dadoMedia {

    //Atributos
    private $estacaoId;
    private $data;
    private $valor;
    private $sensor;
    
    function getEstacaoId() {
        return $this->estacaoId;
    }

    function getData() {
        return $this->data;
    }

    function getValor() {
        return $this->valor;
    }

    function setEstacaoId($estacaoId) {
        $this->estacaoId = $estacaoId;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }
    
    function getSensor() {
        return $this->sensor;
    }

    function setSensor($sensor) {
        $this->sensor = $sensor;
    }




}
