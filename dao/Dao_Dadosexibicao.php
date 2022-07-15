<?PHP

include(dirname(__FILE__) . '/../model/VO_Dadosexibicao.php');
include(dirname(__FILE__) . '/../ob/VO_dadoMedia.php');
include(dirname(__FILE__) . '/../ob/VO_DadoSuspeito.php');

class Dao_Dadosexibicao extends Dao_ConnectionFactory {

    private $conn = null;

    public function __construct() {
        $this->conn = Dao_ConnectionFactory::createConn();
    }

    public function insert(VO_Dadosexibicao $vo) {

        $SQL = "INSERT INTO dadosexibicao(coletahorario,estacaocodigo,estacaoid,estacaonome,estacaosigla,parametro,qualidade,sensorid,sensornome,valor,coletasensor_id)";
        $SQL .= " VALUES(?,?,?,?,?,?,?,?,?,?,?)";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getColetahorario(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getEstacaocodigo(), PDO::PARAM_STR);
        $query->bindValue(3, $vo->getEstacaoid(), PDO::PARAM_STR);
        $query->bindValue(4, $vo->getEstacaonome(), PDO::PARAM_STR);
        $query->bindValue(5, $vo->getEstacaosigla(), PDO::PARAM_STR);
        $query->bindValue(6, $vo->getParametro(), PDO::PARAM_STR);
        $query->bindValue(7, $vo->getQualidade(), PDO::PARAM_STR);
        $query->bindValue(8, $vo->getSensorid(), PDO::PARAM_STR);
        $query->bindValue(9, $vo->getSensornome(), PDO::PARAM_STR);
        $query->bindValue(10, $vo->getValor(), PDO::PARAM_STR);
        $query->bindValue(11, $vo->getColetasensor_id(), PDO::PARAM_STR);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete(VO_Dadosexibicao $vo) {

        $SQL = "DELETE FROM dadosexibicao WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update(VO_Dadosexibicao $vo) {
        $SQL = "UPDATE dadosexibicao SET coletahorario = ?,estacaocodigo = ?,estacaoid = ?,estacaonome = ?,estacaosigla = ?,parametro = ?,qualidade = ?,sensorid = ?,sensornome = ?,valor = ?,coletasensor_id = ?";
        $SQL .= " WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getColetahorario(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getEstacaocodigo(), PDO::PARAM_STR);
        $query->bindValue(3, $vo->getEstacaoid(), PDO::PARAM_STR);
        $query->bindValue(4, $vo->getEstacaonome(), PDO::PARAM_STR);
        $query->bindValue(5, $vo->getEstacaosigla(), PDO::PARAM_STR);
        $query->bindValue(6, $vo->getParametro(), PDO::PARAM_STR);
        $query->bindValue(7, $vo->getQualidade(), PDO::PARAM_STR);
        $query->bindValue(8, $vo->getSensorid(), PDO::PARAM_STR);
        $query->bindValue(9, $vo->getSensornome(), PDO::PARAM_STR);
        $query->bindValue(10, $vo->getValor(), PDO::PARAM_STR);
        $query->bindValue(11, $vo->getColetasensor_id(), PDO::PARAM_STR);

        $query->bindValue(12, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll() {
        $SQL = "SELECT * FROM dadosexibicao";

        $query = $this->conn->prepare($SQL);
        $query->execute();

        $hash[] = array();

        while ($r = $query->fetch()) {
            $vo = new VO_Dadosexibicao(null, null, null, null, null, null, null, null, null, null, null);
            $vo->setId($r["id"]);
            $vo->setColetahorario($r["coletahorario"]);
            $vo->setEstacaocodigo($r["estacaocodigo"]);
            $vo->setEstacaoid($r["estacaoid"]);
            $vo->setEstacaonome($r["estacaonome"]);
            $vo->setEstacaosigla($r["estacaosigla"]);
            $vo->setParametro($r["parametro"]);
            $vo->setQualidade($r["qualidade"]);
            $vo->setSensorid($r["sensorid"]);
            $vo->setSensornome($r["sensornome"]);
            $vo->setValor($r["valor"]);
            $vo->setColetasensor_id($r["coletasensor_id"]);
            $hash[$vo->getId()] = $vo;
        }

        return $hash;
    }

    public function getById($id) {

        $SQL = "SELECT * FROM dadosexibicao WHERE id = ?";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        $vo = new VO_Dadosexibicao(null, null, null, null, null, null, null, null, null, null, null);

        while ($r = $query->fetch()) {
            $vo->setId($r["id"]);
            $vo->setColetahorario($r["coletahorario"]);
            $vo->setEstacaocodigo($r["estacaocodigo"]);
            $vo->setEstacaoid($r["estacaoid"]);
            $vo->setEstacaonome($r["estacaonome"]);
            $vo->setEstacaosigla($r["estacaosigla"]);
            $vo->setParametro($r["parametro"]);
            $vo->setQualidade($r["qualidade"]);
            $vo->setSensorid($r["sensorid"]);
            $vo->setSensornome($r["sensornome"]);
            $vo->setValor($r["valor"]);
            $vo->setColetasensor_id($r["coletasensor_id"]);
        }

        return $vo;
    }

    public function getByUltima($id) {

        $SQL = "select * from dadosexibicao where estacaoid = ? and coletahorario = (select coletahorario from dadosexibicao where estacaoid = ? order by coletahorario desc limit 1) ";
        //$SQL = "select * from dadosexibicao where estacaoid = ? order by coletahorario desc limit 1 ";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->bindValue(2, $id, PDO::PARAM_INT);
        $query->execute();

        $hash[] = array();



        while ($r = $query->fetch()) {
            $vo = new VO_Dadosexibicao(null, null, null, null, null, null, null, null, null, null, null);
            $vo->setId($r["id"]);
            $vo->setColetahorario($r["coletahorario"]);
            $vo->setEstacaocodigo($r["estacaocodigo"]);
            $vo->setEstacaoid($r["estacaoid"]);
            $vo->setEstacaonome($r["estacaonome"]);
            $vo->setEstacaosigla($r["estacaosigla"]);
            $vo->setParametro($r["parametro"]);
            $vo->setQualidade($r["qualidade"]);
            $vo->setSensorid($r["sensorid"]);
            $vo->setSensornome($r["sensornome"]);
            $vo->setValor($r["valor"]);
            $vo->setColetasensor_id($r["coletasensor_id"]);
            $hash[$r["sensornome"]] = $vo;
        }

        return $hash;
    }

    public function getByUltimaSensor($id, $sensor) {

        $SQL = "select * from dadosexibicao where estacaoid = ? and coletahorario = (select coletahorario from dadosexibicao where sensornome='" . $sensor . "' and estacaoid = ? order by coletahorario desc limit 1)";
        //$SQL = "select * from dadosexibicao where estacaoid = ? order by coletahorario desc limit 1 ";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->bindValue(2, $id, PDO::PARAM_INT);

        $query->execute();

        $hash[] = array();



        while ($r = $query->fetch()) {
            $vo = new VO_Dadosexibicao(null, null, null, null, null, null, null, null, null, null, null);
            $vo->setId($r["id"]);
            $vo->setColetahorario($r["coletahorario"]);
            $vo->setEstacaocodigo($r["estacaocodigo"]);
            $vo->setEstacaoid($r["estacaoid"]);
            $vo->setEstacaonome($r["estacaonome"]);
            $vo->setEstacaosigla($r["estacaosigla"]);
            $vo->setParametro($r["parametro"]);
            $vo->setQualidade($r["qualidade"]);
            $vo->setSensorid($r["sensorid"]);
            $vo->setSensornome($r["sensornome"]);
            $vo->setValor($r["valor"]);
            $vo->setColetasensor_id($r["coletasensor_id"]);
            $hash[$r["sensornome"]] = $vo;
        }

        return $hash;
    }

    public function getByGeracao($id, $sensor) {

        $SQL = "select * from dadosexibicao where estacaoid = ? and sensornome = '" . $sensor . "' and coletahorario = (select coletahorario from dadosexibicao where estacaoid = ? order by coletahorario desc limit 1) ";
        //$SQL = "select * from dadosexibicao where estacaoid = ? order by coletahorario desc limit 1 ";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->bindValue(2, $id, PDO::PARAM_INT);
        $query->execute();

        $hash[] = array();



        while ($r = $query->fetch()) {
            $vo = new VO_Dadosexibicao(null, null, null, null, null, null, null, null, null, null, null);
            $vo->setId($r["id"]);
            $vo->setColetahorario($r["coletahorario"]);
            $vo->setEstacaocodigo($r["estacaocodigo"]);
            $vo->setEstacaoid($r["estacaoid"]);
            $vo->setEstacaonome($r["estacaonome"]);
            $vo->setEstacaosigla($r["estacaosigla"]);
            $vo->setParametro($r["parametro"]);
            $vo->setQualidade($r["qualidade"]);
            $vo->setSensorid($r["sensorid"]);
            $vo->setSensornome($r["sensornome"]);
            $vo->setValor($r["valor"]);
            $vo->setColetasensor_id($r["coletasensor_id"]);
            $hash[$r["sensornome"]] = $vo;
        }

        return $hash;
    }

    public function getByDadosGeracao($ids, $data) {
        $dataFinal = $data;
        list($ano, $mes, $dia) = explode('-', $data);
        $dataFinal = $ano . "-" . $mes . "-" . $dia;
        $dataFinal = date('Y-m-d', strtotime("+1 day", strtotime($dataFinal)));

        $SQL = "select * from dadosexibicao where estacaoid in (" . $ids . ") and coletahorario >= '" . $data . " 00:00:00' and coletahorario <= '" . $dataFinal . " 00:00:00'  order by coletahorario asc  ";
        //$SQL = "select * from dadosexibicao where estacaoid = ? order by coletahorario desc limit 1 ";

        $query = $this->conn->prepare($SQL);

        $query->execute();

        $hash[] = array();

        while ($r = $query->fetch()) {
            $vo = new VO_Dadosexibicao();
            $vo->setId($r["id"]);
            $vo->setColetahorario($r["coletahorario"]);
            $vo->setEstacaocodigo($r["estacaocodigo"]);
            $vo->setEstacaoid($r["estacaoid"]);
            $vo->setEstacaonome($r["estacaonome"]);
            $vo->setEstacaosigla($r["estacaosigla"]);
            $vo->setParametro($r["parametro"]);
            $vo->setQualidade($r["qualidade"]);
            $vo->setSensorid($r["sensorid"]);
            $vo->setSensornome($r["sensornome"]);
            $vo->setValor($r["valor"]);
            $vo->setColetasensor_id($r["coletasensor_id"]);
            array_push($hash, $vo);
        }

        return $hash;
    }

    public function getByUltimaDetalhada($id, $sensorNome) {

        $SQL = "select * from dadosexibicao where estacaoid = ? and sensorNome = ? order by coletahorario desc limit 97";
        //$SQL = "select * from dadosexibicao where estacaoid = ? order by coletahorario desc limit 1 ";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->bindValue(2, $sensorNome, PDO::PARAM_STR);
        $query->execute();

        $hash[] = array();

        while ($r = $query->fetch()) {
            $vo = new VO_Dadosexibicao(null, null, null, null, null, null, null, null, null, null, null);
            $vo->setId($r["id"]);
            $vo->setColetahorario($r["coletahorario"]);
            $vo->setEstacaocodigo($r["estacaocodigo"]);
            $vo->setEstacaoid($r["estacaoid"]);
            $vo->setEstacaonome($r["estacaonome"]);
            $vo->setEstacaosigla($r["estacaosigla"]);
            $vo->setParametro($r["parametro"]);
            $vo->setQualidade($r["qualidade"]);
            $vo->setSensorid($r["sensorid"]);
            $vo->setSensornome($r["sensornome"]);
            $vo->setValor($r["valor"]);
            $vo->setColetasensor_id($r["coletasensor_id"]);
            array_push($hash, $vo);
        }

        return $hash;
    }

    public function getChuvaSuspeita($id) {
        //Busca data atual
        $data = new DateTime();
        //Formato necess�rio para consulta no banco
        $dataEnd = $data->format('Y-m-d H:i:s');
        //Desconta 7 dias para encontrar o periodo correto
        $data = $data->sub(new DateInterval('P7D'));
        //Formato necess�rio para consulta no banco
        $dataIni = $data->format('Y-m-d H:i:s');

        $SQL = "select * from dadosexibicao where estacaoid = ? and valor > 20 and sensorNome = 'ChuvaIntervalo' and coletahorario >= '" . $dataIni . "' and coletahorario <= '" . $dataEnd . "'";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        $hash[] = array();

        while ($r = $query->fetch()) {
            $vo = new VO_DadoSuspeito();
            $vo->setEstacao($r["estacaonome"]);
            $vo->setSensor($r["sensornome"]);
            $vo->setHorario($r["coletahorario"]);
            $vo->setValor($r["valor"]);
            array_push($hash, $vo);
        }

        return $hash;
    }

    public function getNivelSuspeito($id) {
        //Busca data atual
        $data = new DateTime();
        //Formato necess�rio para consulta no banco
        $dataEnd = $data->format('Y-m-d H:i:s');
        //Desconta 7 dias para encontrar o periodo correto
        $data = $data->sub(new DateInterval('P1D'));
        //Formato necess�rio para consulta no banco
        $dataIni = $data->format('Y-m-d H:i:s');

        $SQL = "SELECT coletahorario,estacaonome,sensornome,valor,lag(valor) OVER (ORDER BY coletahorario ASC) - valor as diferenca
                FROM dadosexibicao
                WHERE coletahorario >= '" . $dataIni . "' and coletahorario <= '" . $dataEnd . "' and estacaoid = ? and sensornome = 'Nivel'
                ORDER BY coletahorario ASC";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        $hash[] = array();

        while ($r = $query->fetch()) {
            $vo = new VO_DadoSuspeito();
            $vo->setEstacao($r["estacaonome"]);
            $vo->setSensor($r["sensornome"]);
            $vo->setHorario($r["coletahorario"]);
            $vo->setValor($r["valor"]);
            $vo->setDiferenca($r["diferenca"]);
            array_push($hash, $vo);
        }

        return $hash;
    }

    public function getCount($id) {
        //Busca data atual
        $data = new DateTime();
        //Diminui 2 horas para evitar delays
        $data = $data->sub(new DateInterval('PT2H'));
        //Formato necess�rio para consulta no banco
        $dataEnd = $data->format('Y-m-d H:i:s');
        //Desconta 1 dia para encontrar o periodo correto
        $data = $data->sub(new DateInterval('P1D'));
        //Formato necess�rio para consulta no banco
        $dataIni = $data->format('Y-m-d H:i:s');

        $SQL = "select count(distinct coletahorario) from dadosexibicao where estacaoid = ? and coletahorario >= '" . $dataIni . "' and coletahorario <= '" . $dataEnd . "'";

        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        $rows = $query->fetch(PDO::FETCH_NUM);

        return $rows[0];
    }

    public function getLastDate($id) {
        $SQL = "select coletahorario from dadosexibicao where estacaoid = ? order by coletahorario desc limit 1";

        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        $rows = $query->fetch(PDO::FETCH_NUM);

        return $rows[0];
    }

    public function getByDia($id, $data) {
        $dataFinal = $data;
        list($ano, $mes, $dia) = explode('-', $data);
        $dataFinal = $ano . "-" . $mes . "-" . $dia;
        $dataFinal = date('Y-m-d', strtotime("+1 day", strtotime($dataFinal)));

        $SQL = "select * from dadosexibicao where estacaoid = ? and coletahorario >= '" . $data . " 00:00:00' and coletahorario <= '" . $dataFinal . " 00:00:00' order by coletahorario asc ";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);

        $query->execute();

        $hash[] = array();


        $i = 1;
        while ($r = $query->fetch()) {
            $vo = new VO_Dadosexibicao(null, null, null, null, null, null, null, null, null, null, null);
            $vo->setId($r["id"]);
            $vo->setColetahorario($r["coletahorario"]);
            $vo->setEstacaocodigo($r["estacaocodigo"]);
            $vo->setEstacaoid($r["estacaoid"]);
            $vo->setEstacaonome($r["estacaonome"]);
            $vo->setEstacaosigla($r["estacaosigla"]);
            $vo->setParametro($r["parametro"]);
            $vo->setQualidade($r["qualidade"]);
            $vo->setSensorid($r["sensorid"]);
            $vo->setSensornome($r["sensornome"]);
            $vo->setValor($r["valor"]);
            $vo->setColetasensor_id($r["coletasensor_id"]);
            $hash[$i] = $vo;
            $i++;
        }

        return $hash;
    }

    public function getByPeriod($id, $dataIni, $dataEnd, $tipo) {
        $dataFinal = $dataEnd;
        list($ano, $mes, $dia) = explode('-', $dataFinal);
        $dataFinal = $ano . "-" . $mes . "-" . $dia;
        $dataFinal = date('Y-m-d', strtotime("+1 day", strtotime($dataFinal)));

        //Faz select padr�o, se o tipo for algo especifico, altera o select
        $SQL = "select * from dadosexibicao where estacaoid = ? and coletahorario >= '" . $dataIni . " 00:00:00' and coletahorario <= '" . $dataFinal . " 23:59:00' order by coletahorario asc ";
        if ($tipo == 'hora') {
            $SQL = "select * from dadosexibicao where estacaoid = ? and coletahorario >= '" . $dataIni . " 00:00:00' and coletahorario <= '" . $dataFinal . " 23:59:00' and date_part('minute',coletahorario) = 0 order by coletahorario asc ";
        } else if ($tipo == 'dia') {
            $SQL = "select * from dadosexibicao where estacaoid = ? and coletahorario >= '" . $dataIni . " 00:00:00' and coletahorario <= '" . $dataFinal . " 23:59:00' and date_part('hour',coletahorario) = 0 and date_part('minute',coletahorario) = 0 order by coletahorario asc ";
        }

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);

        $query->execute();

        $hash[] = array();


        $i = 1;
        while ($r = $query->fetch()) {
            $vo = new VO_Dadosexibicao(null, null, null, null, null, null, null, null, null, null, null);
            $vo->setId($r["id"]);
            $vo->setColetahorario($r["coletahorario"]);
            $vo->setEstacaocodigo($r["estacaocodigo"]);
            $vo->setEstacaoid($r["estacaoid"]);
            $vo->setEstacaonome($r["estacaonome"]);
            $vo->setEstacaosigla($r["estacaosigla"]);
            $vo->setParametro($r["parametro"]);
            $vo->setQualidade($r["qualidade"]);
            $vo->setSensorid($r["sensorid"]);
            $vo->setSensornome($r["sensornome"]);
            $vo->setValor($r["valor"]);
            $vo->setColetasensor_id($r["coletasensor_id"]);
            $hash[$i] = $vo;
            $i++;
        }

        return $hash;
    }
    
    public function getByPeriodChuva($idSensor, $dataIni, $dataEnd) {
       

        //Faz select padr�o, se o tipo for algo especifico, altera o select
         $SQL ="SELECT * FROM dadosexibicao where sensorid in (".$idSensor.") and coletahorario > '" . $dataIni . " 00:00:00'  and coletahorario <= '" . $dataEnd . " 23:59:00' order by coletahorario asc";
        
        
        $query = $this->conn->prepare($SQL);

       

        $query->execute();

        $hash[] = array();


        $i = 1;
        while ($r = $query->fetch()) {
                       
            $vo = new VO_Dadosexibicao();
            $vo->setId($r["id"]);
            $vo->setColetahorario($r["coletahorario"]);
            $vo->setEstacaocodigo($r["estacaocodigo"]);
            $vo->setEstacaoid($r["estacaoid"]);
            $vo->setEstacaonome($r["estacaonome"]);
            $vo->setEstacaosigla($r["estacaosigla"]);
            $vo->setParametro($r["parametro"]);
            $vo->setQualidade($r["qualidade"]);
            $vo->setSensorid($r["sensorid"]);
            $vo->setSensornome($r["sensornome"]);
            $vo->setValor($r["valor"]);
            $vo->setColetasensor_id($r["coletasensor_id"]);
            $hash[$i] = $vo;
            $i++;
        }

        return $hash;
    }
    
    
    public function getByPeriodSensor($ids, $dataIni, $dataEnd, $tipo, $sensor) {
        $dataFinal = $dataEnd;
        list($ano, $mes, $dia) = explode('-', $dataFinal);
        $dataFinal = $ano . "-" . $mes . "-" . $dia;
        $dataFinal = date('Y-m-d', strtotime("+1 day", strtotime($dataFinal)));

        //Faz select padr�o, se o tipo for algo especifico, altera o select
        $SQL = "select * from dadosexibicao where estacaoid in (" . $ids . ") and coletahorario >= '" . $dataIni . " 00:00:00' and coletahorario <= '" . $dataFinal . " 00:00:00' and sensorNome = '" . $sensor . "' order by estacaoid, coletahorario asc ";
        if ($tipo == 'hora') {
            $SQL = "select * from dadosexibicao where estacaoid in (" . $ids . ") and coletahorario >= '" . $dataIni . " 00:00:00' and coletahorario <= '" . $dataFinal . " 00:00:00' and date_part('minute',coletahorario) = 0 and sensorNome = '" . $sensor . "' order by estacaoid, coletahorario asc ";
        } else if ($tipo == 'dia') {
            $SQL = "select * from dadosexibicao where estacaoid in (" . $ids . ") and coletahorario >= '" . $dataIni . " 00:00:00' and coletahorario <= '" . $dataFinal . " 00:00:00' and date_part('hour',coletahorario) = 0 and date_part('minute',coletahorario) = 0 and sensorNome = '" . $sensor . "' order by estacaoid, coletahorario asc ";
        }

        $query = $this->conn->prepare($SQL);

        $query->execute();

        $hash[] = array();


        $i = 1;
        while ($r = $query->fetch()) {
            $vo = new VO_Dadosexibicao(null, null, null, null, null, null, null, null, null, null, null);
            $vo->setId($r["id"]);
            $vo->setColetahorario($r["coletahorario"]);
            $vo->setEstacaocodigo($r["estacaocodigo"]);
            $vo->setEstacaoid($r["estacaoid"]);
            $vo->setEstacaonome($r["estacaonome"]);
            $vo->setEstacaosigla($r["estacaosigla"]);
            $vo->setParametro($r["parametro"]);
            $vo->setQualidade($r["qualidade"]);
            $vo->setSensorid($r["sensorid"]);
            $vo->setSensornome($r["sensornome"]);
            $vo->setValor($r["valor"]);
            $vo->setColetasensor_id($r["coletasensor_id"]);
            $hash[$i] = $vo;
            $i++;
        }

        return $hash;
    }

    public function getByPeriodAverage($id, $dataIni, $dataEnd, $sensor) {

        $dataSegunda = $dataIni;
        list($ano, $mes, $dia) = explode('-', $dataSegunda);
        $dataSegunda = $ano . "-" . $mes . "-" . $dia;
        $dataSegunda = date('Y-m-d', strtotime("+1 day", strtotime($dataSegunda)));


        $dataPrimeira = $dataIni;
        list($ano, $mes, $dia) = explode('-', $dataPrimeira);
        $dataPrimeira = $ano . "-" . $mes . "-" . $dia;



        // converte as datas para o formato timestamp
        $d1 = strtotime($dataIni);
        $d2 = strtotime("+1 day", strtotime($dataEnd));
        // verifica a diferença em segundos entre as duas datas e divide pelo número de segundos que um dia possui
        $diferenca = ($d2 - $d1) / 86400;




        $hash[] = array();
        $j = 1;

        for ($i = 1; $i <= $diferenca; $i++) {



            $SQL = "select estacaocodigo, estacaoid, estacaonome, estacaosigla, qualidade, sensorid, sensornome,  avg(valor) as valor, max(valor) as maxValor from dadosexibicao where estacaoid in (" . $id . ") and coletahorario > '" . $dataPrimeira . "  00:01:00' and coletahorario <= '" . $dataSegunda . "  00:14:00' group by estacaocodigo, estacaoid, estacaonome, estacaosigla, qualidade, sensorid, sensornome order by estacaoid asc";
//        print_r($SQL);
//        echo "<br>";
            $query = $this->conn->prepare($SQL);
            $query->execute();



            //$r = $query->fetch();


            while ($r = $query->fetch()) {
                $vo = new VO_Dadosexibicao();
                $vo->setId("");
                $vo->setColetahorario($dataPrimeira . " 00:00:00");
                $vo->setEstacaocodigo($r["estacaocodigo"]);
                $vo->setEstacaoid($r["estacaoid"]);
                $vo->setEstacaonome($r["estacaonome"]);
                $vo->setEstacaosigla($r["estacaosigla"]);
                $vo->setParametro("");
                $vo->setQualidade($r["qualidade"]);
                $vo->setSensorid($r["sensorid"]);
                $vo->setSensornome($r["sensornome"]);
                if ($r["sensornome"] == 'ChuvaDiaria') {
                    $vo->setValor(round($r["maxvalor"], 2));
                } else {
                    $vo->setValor(round($r["valor"], 2));
                }

                $vo->setColetasensor_id("");
                $hash[$j] = $vo;
                $j++;
            }



            $dataSegunda = date('Y-m-d', strtotime("+1 day", strtotime($dataSegunda)));

            $dataPrimeira = date('Y-m-d', strtotime("+1 day", strtotime($dataPrimeira)));
        }


        /* select para testar  fazendo dia a dia pra resolver o problema de chuva
          //select estacaocodigo, estacaoid, estacaonome, estacaosigla, qualidade, sensorid, sensornome,  avg(valor) as valor, max(valor) as maxValor from dadosexibicao where estacaoid in (58) and coletahorario > '2020-01-10 00:01:00' and coletahorario <= '2020-01-11 00:14:00' group by estacaocodigo, estacaoid, estacaonome, estacaosigla, qualidade, sensorid, sensornome order by estacaoid asc
          //Faz select padr�o, se o tipo for algo especifico, altera o select
          $SQL = "select estacaocodigo, estacaoid, estacaonome, estacaosigla, qualidade, sensorid, sensornome, cast(coletahorario as date) as data, avg(valor) as valor, max(valor) as maxValor from dadosexibicao where estacaoid in (" . $id . ") and coletahorario > '" . $dataIni . " 00:00:00' and coletahorario <= '" . $dataFinal . " 00:00:00' and sensorNome ilike '" . $sensor . "' and extract(hour from coletahorario) > 0 group by data, estacaocodigo, estacaoid, estacaonome, estacaosigla, qualidade, sensorid, sensornome order by estacaoid, data asc";
          $query = $this->conn->prepare($SQL);

          $query->execute();

          $hash[] = array();

          $i = 1;
          while ($r = $query->fetch()) {
          $vo = new VO_Dadosexibicao();
          $vo->setId("");
          $vo->setColetahorario($r["data"] . " 00:00:00");
          $vo->setEstacaocodigo($r["estacaocodigo"]);
          $vo->setEstacaoid($r["estacaoid"]);
          $vo->setEstacaonome($r["estacaonome"]);
          $vo->setEstacaosigla($r["estacaosigla"]);
          $vo->setParametro("");
          $vo->setQualidade($r["qualidade"]);
          $vo->setSensorid($r["sensorid"]);
          $vo->setSensornome($r["sensornome"]);
          if ($r["sensornome"] == 'ChuvaDiaria') {
          $vo->setValor(round($r["maxvalor"], 2));
          } else {
          $vo->setValor(round($r["valor"], 2));
          }

          $vo->setColetasensor_id("");
          $hash[$i] = $vo;
          $i++;
          } */
//        echo "<pre>";
//         print_r($hash);
//        echo "<\pre>";
        return $hash;
    }

    public function getByMedias($id, $dataIni, $dataEnd) {
        $dataFinal = $dataEnd;
        list($ano, $mes, $dia) = explode('-', $dataFinal);
        $dataFinal = $ano . "-" . $mes . "-" . $dia;
        $dataFinal = date('Y-m-d', strtotime("+1 day", strtotime($dataFinal)));

        //Faz select padr�o, se o tipo for algo especifico, altera o select
        $SQL = "SELECT extract(year from coletahorario) AS ano,extract(month from coletahorario) AS mes, extract(day from coletahorario) AS dia, ROUND(AVG(valor),2) as media FROM public.dadosexibicao where coletahorario >'2010-01-01 00:00:00' and coletahorario <'2018-06-30 23:59:00' and estacaoid = " . $id . " and sensornome ='Vazao' GROUP BY ano,mes, dia ORDER BY media desc";
        $query = $this->conn->prepare($SQL);

        $query->execute();

        $hash[] = array();
        $r = $query->fetch();

//        $i = 1;
//        while ($r = $query->fetch()) {
//            $hash[$i] = ;
//            $hash[$i] = $vo;
//            $i++;
//        }

        return $r;
    }

    public function getByChuvaHoraria($id) {

        $SQL = "select * from dadosexibicao where estacaoid = ? and sensornome = 'ChuvaHoraria'  order by coletahorario desc limit 1";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        $vo = new VO_Dadosexibicao(null, null, null, null, null, null, null, null, null, null, null);

        while ($r = $query->fetch()) {
            $vo->setId($r["id"]);
            $vo->setColetahorario($r["coletahorario"]);
            $vo->setEstacaocodigo($r["estacaocodigo"]);
            $vo->setEstacaoid($r["estacaoid"]);
            $vo->setEstacaonome($r["estacaonome"]);
            $vo->setEstacaosigla($r["estacaosigla"]);
            $vo->setParametro($r["parametro"]);
            $vo->setQualidade($r["qualidade"]);
            $vo->setSensorid($r["sensorid"]);
            $vo->setSensornome($r["sensornome"]);
            $vo->setValor($r["valor"]);
            $vo->setColetasensor_id($r["coletasensor_id"]);
        }

        return $vo;
    }

    public function getByChuvaDiaria($id) {

        $SQL = "select * from dadosexibicao where estacaoid = ? and sensornome = 'ChuvaDiaria'  order by coletahorario desc limit 1";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        $vo = new VO_Dadosexibicao(null, null, null, null, null, null, null, null, null, null, null);

        while ($r = $query->fetch()) {
            $vo->setId($r["id"]);
            $vo->setColetahorario($r["coletahorario"]);
            $vo->setEstacaocodigo($r["estacaocodigo"]);
            $vo->setEstacaoid($r["estacaoid"]);
            $vo->setEstacaonome($r["estacaonome"]);
            $vo->setEstacaosigla($r["estacaosigla"]);
            $vo->setParametro($r["parametro"]);
            $vo->setQualidade($r["qualidade"]);
            $vo->setSensorid($r["sensorid"]);
            $vo->setSensornome($r["sensornome"]);
            $vo->setValor($r["valor"]);
            $vo->setColetasensor_id($r["coletasensor_id"]);
        }

        return $vo;
    }

    public function getSum($sensor, $dataIni, $dataEnd, $empresa) {
        //Faz select padr�o, se o tipo for algo especifico, altera o select
        $SQL = "SELECT dadosexibicao.estacaonome, sum(dadosexibicao.valor) FROM dadosexibicao INNER JOIN estacao on dadosexibicao.estacaoid = estacao.id WHERE dadosexibicao.sensornome ilike :sensorNome and dadosexibicao.coletahorario BETWEEN :start_date AND :end_date";
        if ($empresa != "") {
            $SQL .= " AND estacao.empresa_id = :empresaId";
        }
        $SQL .= " group by dadosexibicao.estacaonome order by dadosexibicao.estacaonome asc";

//        echo $SQL;
//        echo " ".$sensor;
//        echo " ".$dataIni;
//        echo " ".$dataEnd;
//        echo " ".$empresa;

        $query = $this->conn->prepare($SQL);
        $query->bindValue(':sensorNome', $sensor, PDO::PARAM_STR);
        $query->bindValue(':start_date', $dataIni, PDO::PARAM_STR);
        $query->bindValue(':end_date', $dataEnd, PDO::PARAM_STR);
        if ($empresa != "") {
            $query->bindValue(':empresaId', $empresa, PDO::PARAM_STR);
        }
        $query->execute();

        $hash[] = array();
        $i = 1;
        while ($r = $query->fetch()) {
            $valor = $r["estacaonome"] . "," . $r["sum"];
            $hash[$i] = $valor;
            $i++;
        }

        return $hash;
    }

    public function getLastEvent($sensor, $dataIni, $dataEnd, $empresa) {
        //Faz select padr�o, se o tipo for algo especifico, altera o select
        $SQL = "SELECT dadosexibicao.estacaonome, max(dadosexibicao.coletahorario) as max FROM dadosexibicao INNER JOIN estacao on dadosexibicao.estacaoid = estacao.id WHERE dadosexibicao.coletahorario BETWEEN :start_date AND :end_date and dadosexibicao.valor > 0 and dadosexibicao.sensornome ilike :sensorNome";
        if ($empresa != "") {
            $SQL .= " AND estacao.empresa_id = :empresaId";
        }
        $SQL .= " group by dadosexibicao.estacaonome order by dadosexibicao.estacaonome asc";

//        echo $SQL;
//        echo " ".$sensor;
//        echo " ".$dataIni;
//        echo " ".$dataEnd;
//        echo " ".$empresa;

        $query = $this->conn->prepare($SQL);
        $query->bindValue(':start_date', $dataIni, PDO::PARAM_STR);
        $query->bindValue(':end_date', $dataEnd, PDO::PARAM_STR);
        $query->bindValue(':sensorNome', $sensor, PDO::PARAM_STR);
        if ($empresa != "") {
            $query->bindValue(':empresaId', $empresa, PDO::PARAM_STR);
        }
        $query->execute();

        $hash[] = array();
        $i = 1;
        while ($r = $query->fetch()) {
            $valor = $r["estacaonome"] . "," . $r["max"];
            $hash[$i] = $valor;
            $i++;
        }

        return $hash;
    }

    public function getLastRain() {
        $dataf = date('Y/m/d h:m:s');
        $datai = date('Y/m/d h:m:s', strtotime('-6 months'));

        $SQL = "SELECT dadosexibicao.estacaoid, max(dadosexibicao.coletahorario) as max FROM dadosexibicao 
                    WHERE dadosexibicao.coletahorario BETWEEN '" . $datai . "' AND '" . $dataf . "' and dadosexibicao.valor > 0 and dadosexibicao.sensornome ilike 'ChuvaIntervalo'
                    group by dadosexibicao.estacaoid order by dadosexibicao.estacaoid asc";

        $query = $this->conn->prepare($SQL);

        $query->execute();

        $hash[] = array();
        $i = 1;
        while ($r = $query->fetch()) {
            //transforma a string data em data php

            $diferenca = strtotime($r['max']) - strtotime($dataf);
            //Calcula a diferença em dias
            $dias = floor($diferenca / (60 * 60 * 24));

            $hash [$r['estacaoid']] = ($dias)*-1;
            $i++;
        }

        return $hash;
    }

    public function getByCurvaPermanencia($id) {

        $data = date('Y-m-d');

        $dataFinal = date('Y-m-d', strtotime("-10 year", strtotime($data)));


        $SQL = "SELECT extract(year from coletahorario) AS ano,extract(month from coletahorario) AS mes, extract(day from coletahorario) AS dia, ROUND(AVG(valor),2) as media FROM public.dadosexibicao where coletahorario >'" . $dataFinal . " 00:00:00' and coletahorario <'" . $data . " 23:59:00' and estacaoid = ? and sensornome ='Vazao' GROUP BY ano,mes, dia ORDER BY media desc;";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        while ($r = $query->fetch()) {
            $valor ['ano'] = $r["ano"];
            $valor ['mes'] = $r["mes"];
            $valor ['dia'] = $r["dia"];
            $valor ['media'] = $r["media"];
            @$hash[$i] = $valor;
            @$i++;
        }

        return $hash;
    }

    public function getByUltimaEstacaoSensor($id_estacao, $id_sensor) {

        $SQL = "select * from dadosexibicao where estacaoid = ? and sensorid = ? order by coletahorario desc limit 1";


        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id_estacao, PDO::PARAM_INT);
        $query->bindValue(2, $id_sensor, PDO::PARAM_INT);
        $query->execute();

        $vo = new VO_Dadosexibicao();

        while ($r = $query->fetch()) {

            $vo->setId($r["id"]);
            $vo->setColetahorario($r["coletahorario"]);
            $vo->setEstacaocodigo($r["estacaocodigo"]);
            $vo->setEstacaoid($r["estacaoid"]);
            $vo->setEstacaonome($r["estacaonome"]);
            $vo->setEstacaosigla($r["estacaosigla"]);
            $vo->setParametro($r["parametro"]);
            $vo->setQualidade($r["qualidade"]);
            $vo->setSensorid($r["sensorid"]);
            $vo->setSensornome($r["sensornome"]);
            $vo->setValor($r["valor"]);
            $vo->setColetasensor_id($r["coletasensor_id"]);
        }

        return $vo;
    }

}
