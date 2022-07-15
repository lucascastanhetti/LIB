<?PHP

include(dirname(__FILE__) . '/../model/VO_Estacaotipo.php');

class Dao_Estacaotipo extends Dao_ConnectionFactory {

    private $conn = null;

    public function __construct() {
        $this->conn = Dao_ConnectionFactory::createConn();
    }

    public function insert(VO_Estacaotipo $vo) {

        $SQL = "INSERT INTO estacaotipo(descricao)";
        $SQL .= " VALUES(?)";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getDescricao(), PDO::PARAM_STR);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete(VO_Estacaotipo $vo) {

        $SQL = "DELETE FROM estacaotipo WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update(VO_Estacaotipo $vo) {
        $SQL = "UPDATE estacaotipo SET descricao = ?";
        $SQL .= " WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getDescricao(), PDO::PARAM_STR);

        $query->bindValue(2, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll() {
        $SQL = "SELECT * FROM estacaotipo";

        $query = $this->conn->prepare($SQL);
        $query->execute();

        $hash[] = array();

        while ($r = $query->fetch()) {
            $vo = new VO_Estacaotipo(null);
            $vo->setId($r["id"]);
            $vo->setDescricao($r["descricao"]);
            $hash[$vo->getId()] = $vo;
        }

        return $hash;
    }

    public function getById($id) {

        $SQL = "SELECT * FROM estacaotipo WHERE id = ?";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        $vo = new VO_Estacaotipo(null);

        while ($r = $query->fetch()) {
            $vo->setId($r["id"]);
            $vo->setDescricao($r["descricao"]);
        }

        return $vo;
    }

}
