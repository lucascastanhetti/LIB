<?php

class VO_Alarmelog {

    //Atributos
    private $id;
    private $alarme_id;
    private $retorno;
    private $data;

    public function getAlarme_id() {
        return $this->alarme_id;
    }

    public function setAlarme_id($alarme_id) {
        $this->alarme_id = $alarme_id;
    }

    public function getRetorno() {
        return $this->retorno;
    }

    public function setRetorno($retorno) {
        $this->retorno = $retorno;
    }

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

}
