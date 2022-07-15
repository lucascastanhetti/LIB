<?PHP

include(dirname(__FILE__) . '/../model/VO_Vazao.php');

class Dao_Vazao extends Dao_ConnectionFactory {

    private $conn = null;

    public function __construct() {
        $this->conn = Dao_ConnectionFactory::createConn();
    }

    public function insert(VO_Vazao $vo) {

        $SQL = "INSERT INTO vazao(vazao,nivel, curvachave_id)";
        $SQL .= " VALUES(?,?,?)";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getVazao(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getNivel(), PDO::PARAM_STR);
        $query->bindValue(3, $vo->getCurvachave_id(), PDO::PARAM_STR);
        
        try {
            if ($query->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo(var_dump($ex->getMessage()));
        }
    }

    public function delete(VO_Vazao $vo) {

        $SQL = "DELETE FROM vazao WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update(VO_Vazao $vo) {
        $SQL = "UPDATE vazao SET vazao = ?,nivel = ?, curvachave_id = ?";
        $SQL .= " WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getVazao(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getNivel(), PDO::PARAM_STR);
        $query->bindValue(3, $vo->getCurvachave_id(), PDO::PARAM_STR);
        
        $query->bindValue(4, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll() {
        $SQL = "SELECT * FROM vazao";

        $query = $this->conn->prepare($SQL);
        $query->execute();

        $hash[] = array();

        while ($r = $query->fetch()) {
            $vo = new VO_Vazao();
            $vo->setId($r["id"]);
            $vo->setVazao($r["vazao"]);
            $vo->setNivel($r["nivel"]);
            $vo->setCurvachave_id($r["curvachave_id"]);
            $hash[$vo->getId()] = $vo;
        }

        return $hash;
    }

    public function getById($id) {
        $SQL = "SELECT * FROM vazao WHERE id = ?";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        $vo = new VO_Vazao();

        while ($r = $query->fetch()) {
            $vo->setId($r["id"]);
            $vo->setVazao($r["vazao"]);
            $vo->setNivel($r["nivel"]);            
            $vo->setCurvachave_id($r["curvachave_id"]);
        }

        return $vo;
    }
    
    public function getByCurvaChave($id) {
        $SQL = "SELECT * FROM vazao WHERE curvachave_id = ?";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        $hash[] = array();

        while ($r = $query->fetch()) {
            $vo = new VO_Vazao();
            $vo->setId($r["id"]);
            $vo->setVazao($r["vazao"]);
            $vo->setNivel($r["nivel"]);            
            $vo->setCurvachave_id($r["curvachave_id"]);
            $hash[$vo->getId()] = $vo;
        }

        return $hash;
    }

}

?>