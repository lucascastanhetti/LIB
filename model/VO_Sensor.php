<?php

class VO_Sensor {

    //Atributos
    private $id;
    private $round;
    private $status_id;
    private $sensortipo_id;
    private $sensornatureza_id;
    private $estacao_id;
    private $un;
    private $parametrourl;
    private $nome;
    private $descricao;
    private $datainicial;
    private $coef;
    private $rn;

    public function getRound() {
        return $this->round;
    }

    public function setRound($round) {
        $this->round = $round;
    }

    public function getStatus_id() {
        return $this->status_id;
    }

    public function setStatus_id($status_id) {
        $this->status_id = $status_id;
    }

    public function getSensortipo_id() {
        return $this->sensortipo_id;
    }

    public function setSensortipo_id($sensortipo_id) {
        $this->sensortipo_id = $sensortipo_id;
    }

    public function getSensornatureza_id() {
        return $this->sensornatureza_id;
    }

    public function setSensornatureza_id($sensornatureza_id) {
        $this->sensornatureza_id = $sensornatureza_id;
    }

    public function getEstacao_id() {
        return $this->estacao_id;
    }

    public function setEstacao_id($estacao_id) {
        $this->estacao_id = $estacao_id;
    }

    public function getUn() {
        return $this->un;
    }

    public function setUn($un) {
        $this->un = $un;
    }

    public function getParametrourl() {
        return $this->parametrourl;
    }

    public function setParametrourl($parametrourl) {
        $this->parametrourl = $parametrourl;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getDatainicial() {
        return $this->datainicial;
    }

    public function setDatainicial($datainicial) {
        $this->datainicial = $datainicial;
    }

    public function getCoef() {
        return $this->coef;
    }

    public function setCoef($coef) {
        $this->coef = $coef;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    function getRn() {
        return $this->rn;
    }

    function setRn($rn) {
        $this->rn = $rn;
    }



}
