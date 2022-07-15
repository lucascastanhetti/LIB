<?PHP

include(dirname(__FILE__) . '/../model/VO_Operadora.php');

class Dao_Operadora extends Dao_ConnectionFactory {

    private $conn = null;

    public function __construct() {
        $this->conn = Dao_ConnectionFactory::createConn();
    }

    public function insert(VO_Operadora $vo) {

        $SQL = "INSERT INTO operadora(nome)";
        $SQL .= " VALUES(?)";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getNome(), PDO::PARAM_STR);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete(VO_Operadora $vo) {

        $SQL = "DELETE FROM operadora WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update(VO_Operadora $vo) {
        $SQL = "UPDATE operadora SET nome = ?";
        $SQL .= " WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getNome(), PDO::PARAM_STR);

        $query->bindValue(2, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll() {
        $SQL = "SELECT * FROM operadora";

        $query = $this->conn->prepare($SQL);
        $query->execute();

        $hash[] = array();

        while ($r = $query->fetch()) {
            $vo = new VO_Operadora(null);
            $vo->setId($r["id"]);
            $vo->setNome($r["nome"]);
            $hash[$vo->getId()] = $vo;
        }

        return $hash;
    }

    public function getById($id) {

        $SQL = "SELECT * FROM operadora WHERE id = ?";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        $vo = new VO_Operadora(null);

        while ($r = $query->fetch()) {
            $vo->setId($r["id"]);
            $vo->setNome($r["nome"]);
        }

        return $vo;
    }

}
