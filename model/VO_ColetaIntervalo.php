<?php

class VO_ColetaIntervalo {

//Atributos
    private $id;
    private $intervalo;
    private $tipo;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getIntervalo() {
        return $this->intervalo;
    }

    public function setIntervalo($intervalo) {
        $this->intervalo = $intervalo;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

}
