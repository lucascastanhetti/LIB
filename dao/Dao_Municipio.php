<?PHP

include(dirname(__FILE__) . '/../model/VO_Municipio.php');

class Dao_Municipio extends Dao_ConnectionFactory {

    private $conn = null;

    public function __construct() {
        $this->conn = Dao_ConnectionFactory::createConn();
    }

    public function insert(VO_Municipio $vo) {

        $SQL = "INSERT INTO municipio(nome,uf)";
        $SQL .= " VALUES(?,?)";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getNome(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getUf(), PDO::PARAM_STR);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete(VO_Municipio $vo) {

        $SQL = "DELETE FROM municipio WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update(VO_Municipio $vo) {
        $SQL = "UPDATE municipio SET nome = ?,uf = ?";
        $SQL .= " WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getNome(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getUf(), PDO::PARAM_STR);

        $query->bindValue(3, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll() {
        $SQL = "SELECT * FROM municipio";

        $query = $this->conn->prepare($SQL);
        $query->execute();

        $hash[] = array();

        while ($r = $query->fetch()) {
            $vo = new VO_Municipio(null, null);
            $vo->setId($r["id"]);
            $vo->setNome($r["nome"]);
            $vo->setUf($r["uf"]);
            $hash[$vo->getId()] = $vo;
        }

        return $hash;
    }

    public function getById($id) {

        $SQL = "SELECT * FROM municipio WHERE id = ?";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        $vo = new VO_Municipio(null, null);

        while ($r = $query->fetch()) {
            $vo->setId($r["id"]);
            $vo->setNome($r["nome"]);
            $vo->setUf($r["uf"]);
        }

        return $vo;
    }

}
