<?php

/**
 * Description of DAO_Rio
 *
 * @author Overtech
 * @date 14/04/2020 13:33:40
 */
include (dirname(__FILE__) . '/../model/VO_Rio.php');

class Dao_Rio extends Dao_ConnectionFactory {

    private $conn = null;

    public function __construct() {
        $this->conn = Dao_ConnectionFactory::createConn();
    }

    public function insert(VO_Rio $vo, $lastId) {

        $SQL = "INSERT INTO rio(nome,subbacia_id,codigo)";
        $SQL .= " VALUES(?,?,?)";

        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getNome(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getSubbacia_id(), PDO::PARAM_STR);
        $query->bindValue(3, $vo->getCodigo(), PDO::PARAM_STR);


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

    public function delete($id_Rio) {

        $SQL = "DELETE FROM rio WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $id_Rio, PDO::PARAM_INT);

        if ($query->execute()) {
            $this->killConn();
            return true;
        } else {
            $this->killConn();
            return false;
        }
    }

    public function update(VO_Rio $vo) {
        $SQL = "UPDATE rio SET nome = ?,subbacia_id = ?,codigo = ?";

        $SQL .= " WHERE id = ?";

        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getNome(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getSubbacia_id(), PDO::PARAM_STR);
        $query->bindValue(3, $vo->getCodigo(), PDO::PARAM_STR);

        $query->bindValue(4, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            $this->killConn();
            return true;
        } else {
            $this->killConn();
            return false;
        }
    }

    public function getAll() {
        $SQL = "SELECT * FROM rio";
        $query = $this->conn->prepare($SQL);
        $query->execute();
        $hash[] = array();
        $i = 1;
        while ($r = $query->fetch()) {
            $vo = new RioVO(null, null, null);
            $vo->setId($r["id"]);
            $vo->setNome($r["nome"]);
            $vo->setSubbacia_id($r["subbacia_id"]);
            $vo->setCodigo($r["codigo"]);

            $hash[$i] = $vo;
            $i++;
        }

        return $hash;
    }

    public function getById($id) {

        $SQL = "SELECT * FROM rio WHERE id = ?";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        $vo = new VO_Rio(null, null, null);

        while ($r = $query->fetch()) {
            $vo->setId($r["id"]);
            $vo->setNome($r["nome"]);
            $vo->setSubbacia_id($r["subbacia_id"]);
            $vo->setCodigo($r["codigo"]);
        }
        $this->killConn();
        return $vo;
    }

}

?>