<?php

/**
 * Description of DAO_Bacia
 *
 * @author Overtech
 * @date 14/04/2020 13:34:52
 */
include (dirname(__FILE__) . '/../model/VO_Bacia.php');

class Dao_Bacia extends Dao_ConnectionFactory {

    private $conn = null;

    public function __construct() {
        $this->conn = Dao_ConnectionFactory::createConn();
    }

    public function insert(VO_Bacia $vo, $lastId) {

        $SQL = "INSERT INTO bacia(nome)";
        $SQL .= " VALUES(?)";

        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getNome(), PDO::PARAM_STR);


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

    public function delete($id_Bacia) {

        $SQL = "DELETE FROM bacia WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $id_Bacia, PDO::PARAM_INT);

        if ($query->execute()) {
            $this->killConn();
            return true;
        } else {
            $this->killConn();
            return false;
        }
    }

    public function update(VO_Bacia $vo) {
        $SQL = "UPDATE bacia SET nome = ?";

        $SQL .= " WHERE id = ?";

        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getNome(), PDO::PARAM_STR);

        $query->bindValue(2, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            $this->killConn();
            return true;
        } else {
            $this->killConn();
            return false;
        }
    }

    public function getAll() {
        $SQL = "SELECT * FROM bacia";
        $query = $this->conn->prepare($SQL);
        $query->execute();
        $hash[] = array();
        $i = 1;
        while ($r = $query->fetch()) {
            $vo = new BaciaVO(null);
            $vo->setId($r["id"]);
            $vo->setNome($r["nome"]);

            $hash[$i] = $vo;
            $i++;
        }

        return $hash;
    }

    public function getById($id) {

        $SQL = "SELECT * FROM bacia WHERE id = ?";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        $vo = new VO_Bacia(null);

        while ($r = $query->fetch()) {
            $vo->setId($r["id"]);
            $vo->setNome($r["nome"]);
        }
        $this->killConn();
        return $vo;
    }

}

?>