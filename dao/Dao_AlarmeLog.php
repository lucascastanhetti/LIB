<?php

include(dirname(__FILE__) . '/../model/VO_Alarmelog.php');

class Dao_Alarmelog extends Dao_ConnectionFactory {

    private $conn = null;

    public function __construct() {
        $this->conn = Dao_ConnectionFactory::createConn();
    }

    public function insert(VO_Alarmelog $vo) {
        $SQL = "INSERT INTO alarmelog(retorno,data, alarme_id)";
        $SQL .= " VALUES(?,?,?)";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getRetorno(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getData(), PDO::PARAM_STR);
        $query->bindValue(3, $vo->getAlarme_id(), PDO::PARAM_STR);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete(VO_Alarmelog $vo) {
        $SQL = "DELETE FROM alarmelog WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update(VO_Alarmelog $vo) {
        $SQL = "UPDATE alarmelog SET retorno = ?,data = ?, alarme_id = ?";
        $SQL .= " WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getRetorno(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getData(), PDO::PARAM_STR);
        $query->bindValue(3, $vo->getAlarme_id(), PDO::PARAM_STR);

        $query->bindValue(4, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll() {
        $SQL = "SELECT * FROM alarmelog";

        $query = $this->conn->prepare($SQL);
        $query->execute();

        $hash[] = array();

        while ($r = $query->fetch()) {
            $vo = new VO_Alarmelog();
            $vo->setId($r["id"]);
            $vo->setRetorno($r["retorno"]);
            $vo->setData($r["data"]);            
            $hash[$vo->getId()] = $vo;
        }

        return $hash;
    }

    public function getById($id) {
        $SQL = "SELECT * FROM alarmelog WHERE id = ?";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        $vo = new VO_Alarmelog();

        while ($r = $query->fetch()) {
            $vo->setId($r["id"]);
            $vo->setRetorno($r["retorno"]);
            $vo->setData($r["data"]);            
            $vo->setAlarme_id($r["alarme_id"]); 
        }

        return $vo;
    }

}
