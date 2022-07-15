<?php

include(dirname(__FILE__) . '/../model/VO_Alarme.php');

class Dao_Alarme extends Dao_ConnectionFactory {
    private $conn = null;

    public function __construct() {
        $this->conn = Dao_ConnectionFactory::createConn();
    }

    public function insert(VO_Alarme $vo) {

        $SQL = "INSERT INTO alarme(sensor_id,estacao_id,valor,tipoenvio,status,nivel,evento,destinatario,datainicial,datafinal,datacadastro,usuario_id,empresa_id)";
        $SQL .= " VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getSensor_id(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getEstacao_id(), PDO::PARAM_STR);
        $query->bindValue(3, $vo->getValor(), PDO::PARAM_STR);
        $query->bindValue(4, $vo->getTipoenvio(), PDO::PARAM_STR);
        $query->bindValue(5, $vo->getStatus(), PDO::PARAM_STR);
        $query->bindValue(6, $vo->getNivel(), PDO::PARAM_STR);
        $query->bindValue(7, $vo->getEvento(), PDO::PARAM_STR);
        $query->bindValue(8, $vo->getDestinatario(), PDO::PARAM_STR);
        $query->bindValue(9, $vo->getDatainicial(), PDO::PARAM_STR);
        $query->bindValue(10, $vo->getDatafinal(), PDO::PARAM_STR);
        $query->bindValue(11, $vo->getDatacadastro(), PDO::PARAM_STR);        
        $query->bindValue(12, $vo->getUsuario_id(), PDO::PARAM_STR);        
        $query->bindValue(13, $vo->getEmpresa_id(), PDO::PARAM_STR);        

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete(VO_Alarme $vo) {

        $SQL = "DELETE FROM alarme WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update(VO_Alarme $vo) {
        $SQL = "UPDATE alarme SET sensor_id = ?,estacao_id = ?,valor = ?,tipoenvio = ?,status = ?,nivel = ?,evento = ?,destinatario = ?,datainicial = ?,datafinal = ?,datacadastro = ?, usuario_id = ?, empresa_id = ?";
        $SQL .= " WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getSensor_id(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getEstacao_id(), PDO::PARAM_STR);
        $query->bindValue(3, $vo->getValor(), PDO::PARAM_STR);
        $query->bindValue(4, $vo->getTipoenvio(), PDO::PARAM_STR);
        $query->bindValue(5, $vo->getStatus(), PDO::PARAM_STR);
        $query->bindValue(6, $vo->getNivel(), PDO::PARAM_STR);
        $query->bindValue(7, $vo->getEvento(), PDO::PARAM_STR);
        $query->bindValue(8, $vo->getDestinatario(), PDO::PARAM_STR);
        $query->bindValue(9, $vo->getDatainicial(), PDO::PARAM_STR);
        $query->bindValue(10, $vo->getDatafinal(), PDO::PARAM_STR);
        $query->bindValue(11, $vo->getDatacadastro(), PDO::PARAM_STR);
        $query->bindValue(12, $vo->getUsuario_id(), PDO::PARAM_STR);
        $query->bindValue(13, $vo->getEmpresa_id(), PDO::PARAM_STR);
        
        $query->bindValue(14, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll() {
        $SQL = "SELECT * FROM alarme";

        $query = $this->conn->prepare($SQL);
        $query->execute();

        $hash[] = array();

        while ($r = $query->fetch()) {
            $vo = new VO_Alarme();
            $vo->setId($r["id"]);
            $vo->setSensor_id($r["sensor_id"]);
            $vo->setUsuario_id($r["usuario_id"]);
            $vo->setEstacao_id($r["estacao_id"]);
            $vo->setValor($r["valor"]);
            $vo->setTipoenvio($r["tipoenvio"]);
            $vo->setStatus($r["status"]);
            $vo->setNivel($r["nivel"]);
            $vo->setEvento($r["evento"]);
            $vo->setDestinatario($r["destinatario"]);
            $vo->setDatainicial($r["datainicial"]);
            $vo->setDatafinal($r["datafinal"]);
            $vo->setDatacadastro($r["datacadastro"]);            
            $hash[$vo->getId()] = $vo;
        }

        return $hash;
    }
    
     public function getByEmpresaId($id) {
        $SQL = "SELECT * FROM alarme where empresa_id = ?";

        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        $hash[] = array();

        while ($r = $query->fetch()) {
            $vo = new VO_Alarme();
            $vo->setId($r["id"]);
            $vo->setSensor_id($r["sensor_id"]);
            $vo->setUsuario_id($r["usuario_id"]);
            $vo->setEstacao_id($r["estacao_id"]);
            $vo->setEmpresa_id($r["empresa_id"]);
            $vo->setValor($r["valor"]);
            $vo->setTipoenvio($r["tipoenvio"]);
            $vo->setStatus($r["status"]);
            $vo->setNivel($r["nivel"]);
            $vo->setEvento($r["evento"]);
            $vo->setDestinatario($r["destinatario"]);
            $vo->setDatainicial($r["datainicial"]);
            $vo->setDatafinal($r["datafinal"]);
            $vo->setDatacadastro($r["datacadastro"]);            
            $hash[$vo->getId()] = $vo;
        }

        return $hash;
    }

    public function getById($id) {
        $SQL = "SELECT * FROM alarme WHERE id = ?";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        $vo = new VO_Alarme();

        while ($r = $query->fetch()) {
            $vo->setId($r["id"]);
            $vo->setSensor_id($r["sensor_id"]);
            $vo->setUsuario_id($r["usuario_id"]);
            $vo->setEmpresa_id($r["empresa_id"]);
            $vo->setEstacao_id($r["estacao_id"]);
            $vo->setValor($r["valor"]);
            $vo->setTipoenvio($r["tipoenvio"]);
            $vo->setStatus($r["status"]);
            $vo->setNivel($r["nivel"]);
            $vo->setEvento($r["evento"]);
            $vo->setDestinatario($r["destinatario"]);
            $vo->setDatainicial($r["datainicial"]);
            $vo->setDatafinal($r["datafinal"]);
            $vo->setDatacadastro($r["datacadastro"]);            
        }

        return $vo;
    }

}
