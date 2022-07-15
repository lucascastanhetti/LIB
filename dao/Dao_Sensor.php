<?PHP

include(dirname(__FILE__) . '/../model/VO_Sensor.php');

class Dao_Sensor extends Dao_ConnectionFactory {

    private $conn = null;

    public function __construct() {
        $this->conn = Dao_ConnectionFactory::createConn();
    }

    public function insert(VO_Sensor $vo) {

        $SQL = "INSERT INTO sensor(status_id,sensortipo_id,sensornatureza_id,estacao_id,un,parametrourl,nome,descricao,datainicial,coef, round, rn)";
        $SQL .= " VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getStatus_id(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getSensortipo_id(), PDO::PARAM_STR);
        $query->bindValue(3, $vo->getSensornatureza_id(), PDO::PARAM_STR);
        $query->bindValue(4, $vo->getEstacao_id(), PDO::PARAM_STR);
        $query->bindValue(5, $vo->getUn(), PDO::PARAM_STR);
        $query->bindValue(6, $vo->getParametrourl(), PDO::PARAM_STR);
        $query->bindValue(7, $vo->getNome(), PDO::PARAM_STR);
        $query->bindValue(8, $vo->getDescricao(), PDO::PARAM_STR);
        $query->bindValue(9, $vo->getDatainicial(), PDO::PARAM_STR);
        $query->bindValue(10, $vo->getCoef(), PDO::PARAM_STR);
        $query->bindValue(11, $vo->getRound(), PDO::PARAM_STR);
        $query->bindValue(12, $vo->getRn(), PDO::PARAM_STR);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete(VO_Sensor $vo) {

        $SQL = "DELETE FROM sensor WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update(VO_Sensor $vo) {
        $SQL = "UPDATE sensor SET status_id = ?,sensortipo_id = ?,sensornatureza_id = ?,estacao_id = ?,un = ?,parametrourl = ?,nome = ?,descricao = ?,datainicial = ?,coef = ?, round = ?, rn = ?";
        $SQL .= " WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getStatus_id(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getSensortipo_id(), PDO::PARAM_STR);
        $query->bindValue(3, $vo->getSensornatureza_id(), PDO::PARAM_STR);
        $query->bindValue(4, $vo->getEstacao_id(), PDO::PARAM_STR);
        $query->bindValue(5, $vo->getUn(), PDO::PARAM_STR);
        $query->bindValue(6, $vo->getParametrourl(), PDO::PARAM_STR);
        $query->bindValue(7, $vo->getNome(), PDO::PARAM_STR);
        $query->bindValue(8, $vo->getDescricao(), PDO::PARAM_STR);
        $query->bindValue(9, $vo->getDatainicial(), PDO::PARAM_STR);
        $query->bindValue(10, $vo->getCoef(), PDO::PARAM_STR);
        $query->bindValue(11, $vo->getRound(), PDO::PARAM_STR);
        $query->bindValue(12, $vo->getRn(), PDO::PARAM_STR);

        $query->bindValue(13, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll() {
        $SQL = "SELECT * FROM sensor";

        $query = $this->conn->prepare($SQL);

        $query->execute();
        $hash[] = array();
        //$i = 1;

        while ($r = $query->fetch()) {
            $vo = new VO_Sensor();
            $vo->setId($r["id"]);
            $vo->setStatus_id($r["status_id"]);
            $vo->setSensortipo_id($r["sensortipo_id"]);
            $vo->setSensornatureza_id($r["sensornatureza_id"]);
            $vo->setEstacao_id($r["estacao_id"]);
            $vo->setUn($r["un"]);
            $vo->setParametrourl($r["parametrourl"]);
            $vo->setNome($r["nome"]);
            $vo->setDescricao($r["descricao"]);
            $vo->setDatainicial($r["datainicial"]);
            $vo->setCoef($r["coef"]);
            $vo->setRound($r["round"]);
            $vo->setRn($r["rn"]);
            $hash[$r["id"]] = $vo;
            //$i++;
        }

        return $hash;
    }

    public function getRoundNivel($empresa) {
        $SQL = "SELECT sensor.* FROM sensor INNER JOIN estacao on sensor.estacao_id = estacao.id where sensor.nome ilike 'Nivel' and round is not null and estacao.empresa_id = :empresa order by id";

        $query = $this->conn->prepare($SQL);
        $query->bindValue(':empresa', $empresa, PDO::PARAM_STR);

        $query->execute();
        $hash[] = array();
        $i = 1;

        while ($r = $query->fetch()) {
            $vo = new VO_Sensor();
            $vo->setId($r["id"]);
            $vo->setStatus_id($r["status_id"]);
            $vo->setSensortipo_id($r["sensortipo_id"]);
            $vo->setSensornatureza_id($r["sensornatureza_id"]);
            $vo->setEstacao_id($r["estacao_id"]);
            $vo->setUn($r["un"]);
            $vo->setParametrourl($r["parametrourl"]);
            $vo->setNome($r["nome"]);
            $vo->setDescricao($r["descricao"]);
            $vo->setDatainicial($r["datainicial"]);
            $vo->setCoef($r["coef"]);
            $vo->setRound($r["round"]);
            $vo->setRn($r["rn"]);
            $hash[$i] = $vo;
            $i++;
        }

        return $hash;
    }

    public function getById($id) {

        $SQL = "SELECT * FROM sensor WHERE id = ?";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        $vo = new VO_Sensor();

        while ($r = $query->fetch()) {
            $vo->setId($r["id"]);
            $vo->setStatus_id($r["status_id"]);
            $vo->setSensortipo_id($r["sensortipo_id"]);
            $vo->setSensornatureza_id($r["sensornatureza_id"]);
            $vo->setEstacao_id($r["estacao_id"]);
            $vo->setUn($r["un"]);
            $vo->setParametrourl($r["parametrourl"]);
            $vo->setNome($r["nome"]);
            $vo->setDescricao($r["descricao"]);
            $vo->setDatainicial($r["datainicial"]);
            $vo->setCoef($r["coef"]);
            $vo->setRound($r["round"]);
            $vo->setRn($r["rn"]);
        }

        return $vo;
    }

    public function hasSensor($estacaoId, $sensorNome) {
        $SQL = "SELECT * FROM sensor WHERE estacao_id = ? and nome = ?";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $estacaoId, PDO::PARAM_INT);
        $query->bindValue(2, $sensorNome, PDO::PARAM_STR);
        $query->execute();

        $vo = new VO_Sensor();
        $hasSensor = false;

        while ($r = $query->fetch()) {
            $vo->setId($r["id"]);
            $vo->setStatus_id($r["status_id"]);
            $vo->setSensortipo_id($r["sensortipo_id"]);
            $vo->setSensornatureza_id($r["sensornatureza_id"]);
            $vo->setEstacao_id($r["estacao_id"]);
            $vo->setUn($r["un"]);
            $vo->setParametrourl($r["parametrourl"]);
            $vo->setNome($r["nome"]);
            $vo->setDescricao($r["descricao"]);
            $vo->setDatainicial($r["datainicial"]);
            $vo->setCoef($r["coef"]);
            $vo->setRound($r["round"]);
            $vo->setRn($r["rn"]);

            if ($vo->getId() > 0) {
                $hasSensor = true;
            }
        }

        return $hasSensor;
    }

}

?>