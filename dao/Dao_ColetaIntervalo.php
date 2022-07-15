<?php

include(dirname(__FILE__) . '/../model/VO_ColetaIntervalo.php');

class Dao_ColetaIntervalo extends Dao_ConnectionFactory {

    private $conn = null;

    public function __construct() {
        $this->conn = Dao_ConnectionFactory::createConn();
    }

    public function insert(VO_ColetaIntervalo $vo) {

        $SQL = "INSERT INTO coletaintervalo(intervalo,tipo)";
        $SQL .= " VALUES(?,?)";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getIntervalo(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getTipo(), PDO::PARAM_STR);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete(VO_ColetaIntervalo $vo) {

        $SQL = "DELETE FROM coletaintervalo WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update(VO_ColetaIntervalo $vo) {
        $SQL = "UPDATE coletaintervalo SET intervalo = ?,tipo = ?";
        $SQL .= " WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getIntervalo(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getTipo(), PDO::PARAM_STR);

        $query->bindValue(3, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll() {
        $SQL = "SELECT * FROM coletaintervalo";

        $query = $this->conn->prepare($SQL);
        $query->execute();

        $hash[] = array();

        while ($r = $query->fetch()) {
            $vo = new VO_ColetaIntervalo(null, null);
            $vo->setId($r["id"]);
            $vo->setIntervalo($r["intervalo"]);
            $vo->setTipo($r["tipo"]);
            $hash[$vo->getId()] = $vo;
        }

        return $hash;
    }

    public function getById($id) {

        $SQL = "SELECT * FROM coletaintervalo WHERE id = ?";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        $vo = new VO_ColetaIntervalo(null, null);

        while ($r = $query->fetch()) {
            $vo->setId($r["id"]);
            $vo->setIntervalo($r["intervalo"]);
            $vo->setTipo($r["tipo"]);
        }

        return $vo;
    }

}
