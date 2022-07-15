<?php

/**
 * Description of Dao_Subbacia
 *
 * @author Overtech
 * @date 14/04/2020 13:34:24
 */
include (dirname(__FILE__) . '/../model/VO_Subbacia.php');

class Dao_Subbacia extends Dao_ConnectionFactory {

    private $conn = null;

    public function __construct() {
        $this->conn = Dao_ConnectionFactory::createConn();
    }

    public function insert(VO_Subbacia $vo, $lastId) {

        $SQL = "INSERT INTO subbacia(nome,bacia_id)";
        $SQL .= " VALUES(?,?)";

        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getNome(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getBacia_id(), PDO::PARAM_STR);


        if ($query->execute()) {
            if ($lastId == TRUE) {
                $id = $this->conn->lastInsertId();
                $this->killConn();
                return $id;
            } else {
                $this->killConn();
                return true;
            }
        } else {

            $this->killConn();
            return false;
        }
    }

    public function delete($id_Subbacia) {

        $SQL = "DELETE FROM subbacia WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $id_Subbacia, PDO::PARAM_INT);

        if ($query->execute()) {
            $this->killConn();
            return true;
        } else {
            $this->killConn();
            return false;
        }
    }

    public function update(VO_Subbacia $vo) {
        $SQL = "UPDATE subbacia SET nome = ?,bacia_id = ?";

        $SQL .= " WHERE id = ?";

        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getNome(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getBacia_id(), PDO::PARAM_STR);

        $query->bindValue(3, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            $this->killConn();
            return true;
        } else {
            $this->killConn();
            return false;
        }
    }

    public function getAll() {
        $SQL = "SELECT * FROM subbacia";
        $query = $this->conn->prepare($SQL);
        $query->execute();
        $hash[] = array();
        $i = 1;
        while ($r = $query->fetch()) {
            $vo = new SubbaciaVO(null, null);
            $vo->setId($r["id"]);
            $vo->setNome($r["nome"]);
            $vo->setBacia_id($r["bacia_id"]);

            $hash[$i] = $vo;
            $i++;
        }

        return $hash;
    }

    public function getById($id) {

        $SQL = "SELECT * FROM subbacia WHERE id = ?";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        $vo = new VO_Subbacia(null, null);

        while ($r = $query->fetch()) {
            $vo->setId($r["id"]);
            $vo->setNome($r["nome"]);
            $vo->setBacia_id($r["bacia_id"]);
        }
        $this->killConn();
        return $vo;
    }

}

?>