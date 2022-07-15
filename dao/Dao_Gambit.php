<?PHP

include(dirname(__FILE__) . '/../model/VO_Gambit.php');

class Dao_Gambit extends Dao_ConnectionFactory {

    private $conn = null;

    public function __construct() {
        $this->conn = Dao_ConnectionFactory::createConn();
    }

    public function insert(VO_Gambit $vo) {
        $SQL = "INSERT INTO gambit(estacaoorigem_id,estacaodestino_id,tipo,status,datainicial,datafinal,b,a,usuario)";
        $SQL .= " VALUES(?,?,?,?,?,?,?,?,?)";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getEstacaoorigem_id(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getEstacaodestino_id(), PDO::PARAM_STR);
        $query->bindValue(3, $vo->getTipo(), PDO::PARAM_STR);
        $query->bindValue(4, $vo->getStatus(), PDO::PARAM_STR);
        $query->bindValue(5, $vo->getDatainicial(), PDO::PARAM_STR);
        $query->bindValue(6, $vo->getDatafinal(), PDO::PARAM_STR);
        $query->bindValue(7, $vo->getB(), PDO::PARAM_STR);
        $query->bindValue(8, $vo->getA(), PDO::PARAM_STR);        
        $query->bindValue(9, $vo->getUsuario(), PDO::PARAM_STR);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete(VO_Gambit $vo) {
        $SQL = "DELETE FROM gambit WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update(VO_Gambit $vo) {
        $SQL = "UPDATE gambit SET estacaoorigem_id = ?, estacaodestino_id = ?,tipo = ?,status = ?,datainicial = ?,datafinal = ?,b = ?,a = ?, usuario = ?";
        $SQL .= " WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getEstacaoorigem_id(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getEstacaodestino_id(), PDO::PARAM_STR);
        $query->bindValue(3, $vo->getTipo(), PDO::PARAM_STR);
        $query->bindValue(4, $vo->getStatus(), PDO::PARAM_STR);
        $query->bindValue(5, $vo->getDatainicial(), PDO::PARAM_STR);
        $query->bindValue(6, $vo->getDatafinal(), PDO::PARAM_STR);
        $query->bindValue(7, $vo->getB(), PDO::PARAM_STR);
        $query->bindValue(8, $vo->getA(), PDO::PARAM_STR);
        $query->bindValue(9, $vo->getUsuario(), PDO::PARAM_STR);
        $query->bindValue(10, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll() {
        $SQL = "SELECT * FROM gambit";

        $query = $this->conn->prepare($SQL);
        $query->execute();

        $hash[] = array();

        while ($r = $query->fetch()) {
            $vo = new VO_Gambit();
            $vo->setId($r["id"]);
            $vo->setEstacaoorigem_id($r["estacaoorigem_id"]);
            $vo->setEstacaodestino_id($r["estacaodestino_id"]);
            $vo->setTipo($r["tipo"]);
            $vo->setStatus($r["status"]);
            $vo->setDatainicial($r["datainicial"]);
            $vo->setDatafinal($r["datafinal"]);
            $vo->setB($r["b"]);
            $vo->setA($r["a"]);            
            $vo->setUsuario($r["usuario"]);
            $hash[$vo->getId()] = $vo;
        }

        return $hash;
    }
    
    public function getAllByEmpresaStatus($empresa, $status) {
        $SQL = "SELECT gambit.* FROM gambit INNER JOIN estacao on gambit.estacaoorigem_id = estacao.id where estacao.empresa_id = :empresa";
        if ($status != "") {
            $SQL .= " AND status = :status";
        }
        $SQL .= " order by datainicial desc";

        $query = $this->conn->prepare($SQL);
        
        $query->bindValue(':empresa', $empresa, PDO::PARAM_STR);        
        if ($status != "") {
            $query->bindValue(':status', $status, PDO::PARAM_STR);
        }
        $query->execute();
        $hash[] = array();
        $i = 1;
        while ($r = $query->fetch()) {
            $vo = new VO_Gambit();
            $vo->setId($r["id"]);
            $vo->setEstacaoorigem_id($r["estacaoorigem_id"]);
            $vo->setEstacaodestino_id($r["estacaodestino_id"]);
            $vo->setTipo($r["tipo"]);
            $vo->setStatus($r["status"]);
            $vo->setDatainicial($r["datainicial"]);
            $vo->setDatafinal($r["datafinal"]);
            $vo->setB($r["b"]);
            $vo->setA($r["a"]);            
            $vo->setUsuario($r["usuario"]);
            $hash[$i] = $vo;
            $i++;
        }

        return $hash;
    }
    
     public function getAllByDateStatus($dateIni, $dateEnd, $status) {
        $SQL = "SELECT * FROM gambit WHERE datainicial BETWEEN :start_date AND :end_date";
        if ($status != "") {
            $SQL .= " AND status = :status";
        }
        $SQL .= " order by datainicial desc";

        $query = $this->conn->prepare($SQL);
        
        $query->bindValue(':start_date', $dateIni, PDO::PARAM_STR);
        $query->bindValue(':end_date', $dateEnd, PDO::PARAM_STR);
        if ($status != "") {
            $query->bindValue(':status', $status, PDO::PARAM_STR);
        }
        $query->execute();
        $hash[] = array();
        $i = 1;
        while ($r = $query->fetch()) {
            $vo = new VO_Gambit();
            $vo->setId($r["id"]);
            $vo->setEstacaoorigem_id($r["estacaoorigem_id"]);
            $vo->setEstacaodestino_id($r["estacaodestino_id"]);
            $vo->setTipo($r["tipo"]);
            $vo->setStatus($r["status"]);
            $vo->setDatainicial($r["datainicial"]);
            $vo->setDatafinal($r["datafinal"]);
            $vo->setB($r["b"]);
            $vo->setA($r["a"]);            
            $vo->setUsuario($r["usuario"]);
            $hash[$i] = $vo;
            $i++;
        }

        return $hash;
    }

    public function getById($id) {
        $SQL = "SELECT * FROM gambit WHERE id = ?";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        $vo = new VO_Gambit();

        while ($r = $query->fetch()) {
            $vo->setId($r["id"]);
            $vo->setEstacaoorigem_id($r["estacaoorigem_id"]);
            $vo->setEstacaodestino_id($r["estacaodestino_id"]);
            $vo->setTipo($r["tipo"]);
            $vo->setStatus($r["status"]);
            $vo->setDatainicial($r["datainicial"]);
            $vo->setDatafinal($r["datafinal"]);
            $vo->setB($r["b"]);
            $vo->setA($r["a"]);            
            $vo->setUsuario($r["usuario"]);
        }

        return $vo;
    }
    
    public function getByInicialFinal($idOrigem, $idDestino) {
        $SQL = "SELECT * FROM gambit WHERE estacaoorigem_id = ? and estacaodestino_id = ? and status = true";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $idOrigem, PDO::PARAM_INT);
        $query->bindValue(2, $idDestino, PDO::PARAM_INT);
        $query->execute();

        $vo = new VO_Gambit();

        while ($r = $query->fetch()) {
            $vo->setId($r["id"]);
            $vo->setEstacaoorigem_id($r["estacaoorigem_id"]);
            $vo->setEstacaodestino_id($r["estacaodestino_id"]);
            $vo->setTipo($r["tipo"]);
            $vo->setStatus($r["status"]);
            $vo->setDatainicial($r["datainicial"]);
            $vo->setDatafinal($r["datafinal"]);
            $vo->setB($r["b"]);
            $vo->setA($r["a"]);            
            $vo->setUsuario($r["usuario"]);
        }
        return $vo;
    }
    
     public function getAllByDateStatusEmpresa($dateIni, $dateEnd, $empresa, $status) {
        $SQL = "SELECT gambit.* FROM gambit INNER JOIN estacao on gambit.estacaoorigem_id = estacao.id WHERE gambit.datainicial BETWEEN :start_date AND :end_date AND estacao.empresa_id = :empresa";
        if ($status != "") {
            $SQL .= " AND status = :status";
        }
        
        $SQL .= " order by datainicial desc";

        $query = $this->conn->prepare($SQL);
        
        $query->bindValue(':empresa', $empresa, PDO::PARAM_STR);        
        $query->bindValue(':start_date', $dateIni, PDO::PARAM_STR);
        $query->bindValue(':end_date', $dateEnd, PDO::PARAM_STR);
        if ($status != "") {
            $query->bindValue(':status', $status, PDO::PARAM_STR);
        }
        $query->execute();
        $hash[] = array();
        $i = 1;
        while ($r = $query->fetch()) {
            $vo = new VO_Gambit();
            $vo->setId($r["id"]);
            $vo->setEstacaoorigem_id($r["estacaoorigem_id"]);
            $vo->setEstacaodestino_id($r["estacaodestino_id"]);
            $vo->setTipo($r["tipo"]);
            $vo->setStatus($r["status"]);
            $vo->setDatainicial($r["datainicial"]);
            $vo->setDatafinal($r["datafinal"]);
            $vo->setB($r["b"]);
            $vo->setA($r["a"]);            
            $vo->setUsuario($r["usuario"]);
            $hash[$i] = $vo;
            $i++;
        }

        return $hash;
    }

}

?>