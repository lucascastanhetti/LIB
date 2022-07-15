<?php

class VO_Alarme {
    //Atributos
    private $id;
    private $usuario_id;
    private $sensor_id;
    private $estacao_id;
    private $empresa_id;
    private $valor;
    private $tipoenvio;
    private $status;
    private $nivel;
    private $evento;
    private $destinatario;
    private $datainicial;
    private $datafinal;
    private $datacadastro;
    

    public function getUsuario_id() {
        return $this->usuario_id;
    }

    public function setUsuario_id($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    public function getSensor_id() {
        return $this->sensor_id;
    }

    public function setSensor_id($sensor_id) {
        $this->sensor_id = $sensor_id;
    }

    public function getEstacao_id() {
        return $this->estacao_id;
    }

    public function setEstacao_id($estacao_id) {
        $this->estacao_id = $estacao_id;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function getTipoenvio() {
        return $this->tipoenvio;
    }

    public function setTipoenvio($tipoenvio) {
        $this->tipoenvio = $tipoenvio;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getNivel() {
        return $this->nivel;
    }

    public function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    public function getEvento() {
        return $this->evento;
    }

    public function setEvento($evento) {
        $this->evento = $evento;
    }

    public function getDestinatario() {
        return $this->destinatario;
    }

    public function setDestinatario($destinatario) {
        $this->destinatario = $destinatario;
    }

    public function getDatainicial() {
        return $this->datainicial;
    }

    public function setDatainicial($datainicial) {
        $this->datainicial = $datainicial;
    }

    public function getDatafinal() {
        return $this->datafinal;
    }

    public function setDatafinal($datafinal) {
        $this->datafinal = $datafinal;
    }

    public function getDatacadastro() {
        return $this->datacadastro;
    }

    public function setDatacadastro($datacadastro) {
        $this->datacadastro = $datacadastro;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getEmpresa_id() {
        return $this->empresa_id;
    }

    public function setEmpresa_id($empresa_id) {
        $this->empresa_id = $empresa_id;
    }



}
