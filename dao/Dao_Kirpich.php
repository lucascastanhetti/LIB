<?PHP

include(dirname(__FILE__) . '/../model/VO_Kirpich.php');

class Dao_Kirpich extends Dao_ConnectionFactory {

    private $conn = null;

    public function __construct() {
        $this->conn = Dao_ConnectionFactory::createConn();
    }

    public function insert(VO_Kirpich $vo) {

        $SQL = "INSERT INTO kirpich(estacaoinicial_id,estacaofinal_id,distancia,caminho)";
        $SQL .= " VALUES(?,?,?,?)";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getEstacaoinicial_id(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getEstacaofinal_id(), PDO::PARAM_STR);
        $query->bindValue(3, $vo->getDistancia(), PDO::PARAM_STR);
        $query->bindValue(4, $vo->getCaminho(), PDO::PARAM_STR);
        

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete(VO_Kirpich $vo) {

        $SQL = "DELETE FROM kirpich WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update(VO_Kirpich $vo) {
        $SQL = "UPDATE kirpich SET estacaoinicial_id=?, estacaofinal_id = ?,distancia = ?,caminho = ?";
        $SQL .= " WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getEstacaoinicial_id(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getEstacaofinal_id(), PDO::PARAM_STR);
        $query->bindValue(3, $vo->getDistancia(), PDO::PARAM_STR);
        $query->bindValue(4, $vo->getCaminho(), PDO::PARAM_STR);
        
        $query->bindValue(5, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll() {
        $SQL = "SELECT * FROM kirpich";

        $query = $this->conn->prepare($SQL);
        $query->execute();

        $hash[] = array();

        while ($r = $query->fetch()) {
            $vo = new VO_Kirpich();
            $vo->setId($r["id"]);
            $vo->setEstacaoinicial_id($r["estacaoinicial_id"]);
            $vo->setEstacaofinal_id($r["estacaofinal_id"]);
            $vo->setDistancia($r["distancia"]);
            $vo->setCaminho($r["caminho"]);
            $hash[$vo->getId()] = $vo;
        }

        return $hash;
    }

    public function getById($id) {

        $SQL = "SELECT * FROM kirpich WHERE id = ?";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        $vo = new VO_Kirpich();

        while ($r = $query->fetch()) {
            $vo->setId($r["id"]);
           $vo->setEstacaoinicial_id($r["estacaoinicial_id"]);
            $vo->setEstacaofinal_id($r["estacaofinal_id"]);
            $vo->setDistancia($r["distancia"]);
            $vo->setCaminho($r["caminho"]);
            $vo->setId($r["id"]);
        }

        return $vo;
    }
    
    public function getByInicial($id) {

        $SQL = "SELECT * FROM kirpich WHERE estacaoinicial_id = ?";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        $vo = new VO_Kirpich();

        while ($r = $query->fetch()) {
            $vo->setId($r["id"]);
           
            $vo->setEstacaoinicial_id($r["estacaoinicial_id"]);
            $vo->setEstacaofinal_id($r["estacaofinal_id"]);
            $vo->setDistancia($r["distancia"]);
            $vo->setCaminho($r["caminho"]);
            $vo->setId($r["id"]);
        }

        return $vo;
    }
    
    public function getByInicialFinal($idOrigem, $idDestino) {

        $SQL = "SELECT * FROM kirpich WHERE estacaoinicial_id = ? and estacaofinal_id = ?";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $idOrigem, PDO::PARAM_INT);
        $query->bindValue(2, $idDestino, PDO::PARAM_INT);
        $query->execute();

        $vo = new VO_Kirpich();

        while ($r = $query->fetch()) {
            $vo->setId($r["id"]);
           
            $vo->setEstacaoinicial_id($r["estacaoinicial_id"]);
            $vo->setEstacaofinal_id($r["estacaofinal_id"]);
            $vo->setDistancia($r["distancia"]);
            $vo->setCaminho($r["caminho"]);
            $vo->setId($r["id"]);
        }

        return $vo;
    }

    public function getAllArray() {
        $SQL = "SELECT * FROM kirpich";

        $query = $this->conn->prepare($SQL);
        $query->execute();

        $hash[] = array();

        while ($r = $query->fetch()) {
            $vo = new VO_Kirpich();
            $vo->setId($r["id"]);
            $vo->setEstacaoinicial_id($r["estacaoinicial_id"]);
            $vo->setEstacaofinal_id($r["estacaofinal_id"]);
            $vo->setDistancia($r["distancia"]);
            $vo->setCaminho($r["caminho"]);
            $hash[$vo->getEstacaoinicial_id() . "," . $vo->getEstacaofinal_id()] = $vo;
        }

        return $hash;
    }
}
