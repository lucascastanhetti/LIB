<?PHP

include(dirname(__FILE__) . '/../model/VO_EquacaoVazao.php');

class Dao_Equacaovazao extends Dao_ConnectionFactory {

    private $conn = null;

    public function __construct() {
        $this->conn = Dao_ConnectionFactory::createConn();
    }

    public function insert(VO_Equacaovazao $vo) {

        $SQL = "INSERT INTO equacaovazao(usuario,min,max,h0,datacadastro,b,a,curvachave_id)";
        $SQL .= " VALUES(?,?,?,?,?,?,?,?)";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getUsuario(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getMin(), PDO::PARAM_STR);
        $query->bindValue(3, $vo->getMax(), PDO::PARAM_STR);
        $query->bindValue(4, $vo->getH0(), PDO::PARAM_STR);
        $query->bindValue(5, $vo->getDatacadastro(), PDO::PARAM_STR);
        $query->bindValue(6, $vo->getB(), PDO::PARAM_STR);
        $query->bindValue(7, $vo->getA(), PDO::PARAM_STR);
        $query->bindValue(8, $vo->getCurvachave_id(), PDO::PARAM_STR);
        
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

    public function delete(VO_Equacaovazao $vo) {

        $SQL = "DELETE FROM equacaovazao WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update(VO_Equacaovazao $vo) {
        $SQL = "UPDATE equacaovazao SET usuario = ?,min = ?,max = ?,h0 = ?,datacadastro = ?,b = ?,a = ?, curvachave_id = ?";
        $SQL .= " WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getUsuario(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getMin(), PDO::PARAM_STR);
        $query->bindValue(3, $vo->getMax(), PDO::PARAM_STR);
        $query->bindValue(4, $vo->getH0(), PDO::PARAM_STR);
        $query->bindValue(5, $vo->getDatacadastro(), PDO::PARAM_STR);
        $query->bindValue(6, $vo->getB(), PDO::PARAM_STR);
        $query->bindValue(7, $vo->getA(), PDO::PARAM_STR);
        $query->bindValue(8, $vo->getCurvachave_id(), PDO::PARAM_STR);
        
        $query->bindValue(9, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll() {
        $SQL = "SELECT * FROM equacaovazao";

        $query = $this->conn->prepare($SQL);
        $query->execute();

        $hash[] = array();

        while ($r = $query->fetch()) {
            $vo = new VO_Equacaovazao();
            $vo->setId($r["id"]);
            $vo->setUsuario($r["usuario"]);
            $vo->setMin($r["min"]);
            $vo->setMax($r["max"]);
            $vo->setH0($r["h0"]);
            $vo->setDatacadastro($r["datacadastro"]);
            $vo->setB($r["b"]);
            $vo->setA($r["a"]);
            $vo->setCurvachave_id($r["curvachave_id"]);
            $hash[$vo->getId()] = $vo;
        }

        return $hash;
    }

    public function getById($id) {

        $SQL = "SELECT * FROM equacaovazao WHERE id = ?";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        $vo = new VO_Equacaovazao();

        while ($r = $query->fetch()) {
            $vo->setId($r["id"]);
            $vo->setUsuario($r["usuario"]);
            $vo->setMin($r["min"]);
            $vo->setMax($r["max"]);
            $vo->setH0($r["h0"]);
            $vo->setDatacadastro($r["datacadastro"]);
            $vo->setB($r["b"]);
            $vo->setA($r["a"]);            
            $vo->setCurvachave_id($r["curvachave_id"]);
        }

        return $vo;
    }
    
    public function getByCurvaChave($curvaChave) {
        $SQL = "SELECT * FROM equacaovazao WHERE curvachave_id = ?";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $curvaChave, PDO::PARAM_INT);
        $query->execute();

        $hash[] = array();
        
        while ($r = $query->fetch()) {
            $vo = new VO_Equacaovazao();
            $vo->setId($r["id"]);
            $vo->setUsuario($r["usuario"]);
            $vo->setMin($r["min"]);
            $vo->setMax($r["max"]);
            $vo->setH0($r["h0"]);
            $vo->setDatacadastro($r["datacadastro"]);
            $vo->setB($r["b"]);
            $vo->setA($r["a"]);            
            $vo->setCurvachave_id($r["curvachave_id"]);
            $hash[$vo->getId()] = $vo;
        }

        return $hash;
    }

}
