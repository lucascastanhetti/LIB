<?PHP

include(dirname(__FILE__) . '/../model/VO_Grupo.php');

class Dao_Grupo extends Dao_ConnectionFactory {

    private $conn = null;

    public function __construct() {
        $this->conn = Dao_ConnectionFactory::createConn();
    }

    public function insert(VO_Grupo $vo) {

        $SQL = "INSERT INTO grupo(descricao,latitude,longitude,empresa_id,grupopai_id,status_id)";
        $SQL .= " VALUES(?,?,?,?,?,?)";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getDescricao(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getLatitude(), PDO::PARAM_STR);
        $query->bindValue(3, $vo->getLongitude(), PDO::PARAM_STR);
        $query->bindValue(4, $vo->getEmpresa_id(), PDO::PARAM_STR);
        $query->bindValue(5, $vo->getGrupopai_id(), PDO::PARAM_STR);
        $query->bindValue(6, $vo->getStatus_id(), PDO::PARAM_STR);
        
        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete(VO_Grupo $vo) {

        $SQL = "DELETE FROM grupo WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update(VO_Grupo $vo) {
        $SQL = "UPDATE grupo SET descricao = ?,latitude = ?,longitude = ?,empresa_id = ?,grupopai_id = ?,status_id=?";
        $SQL .= " WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getDescricao(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getLatitude(), PDO::PARAM_STR);
        $query->bindValue(3, $vo->getLongitude(), PDO::PARAM_STR);
        $query->bindValue(4, $vo->getEmpresa_id(), PDO::PARAM_STR);
        $query->bindValue(5, $vo->getGrupopai_id(), PDO::PARAM_STR);
        $query->bindValue(6, $vo->getStatus_id(), PDO::PARAM_STR);

        $query->bindValue(7, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll($empresas) {
        $SQL = "";
        if ($empresas == null) {
            $SQL = "SELECT * FROM grupo where status_id <> 8 order by descricao asc";
            $query = $this->conn->prepare($SQL);            
        } else {
            $SQL = "SELECT * FROM grupo WHERE  empresa_id IN ($empresas) and  status_id <> 8 order by descricao asc" ;
            $query = $this->conn->prepare($SQL);
            
        }

        $query->execute();

        $hash[] = array();

        while ($r = $query->fetch()) {
            $vo = new VO_Grupo();
            $vo->setId($r["id"]);
            $vo->setDescricao($r["descricao"]);
            $vo->setLatitude($r["latitude"]);
            $vo->setLongitude($r["longitude"]);
            $vo->setEmpresa_id($r["empresa_id"]);
            $vo->setGrupopai_id($r["grupopai_id"]);
            $hash[$vo->getId()] = $vo;
        }

        return $hash;
    }

    public function getById($id) {

        $SQL = "SELECT * FROM grupo WHERE id = ?";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        $vo = new VO_Grupo();

        while ($r = $query->fetch()) {
            $vo->setId($r["id"]);
            $vo->setDescricao($r["descricao"]);
            $vo->setLatitude($r["latitude"]);
            $vo->setLongitude($r["longitude"]);
            $vo->setEmpresa_id($r["empresa_id"]);
            $vo->setGrupopai_id($r["grupopai_id"]);
        }

        return $vo;
    }

}
