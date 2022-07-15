<?PHP

include(dirname(__FILE__) . '/../model/VO_Aneellog.php');

class Dao_Aneellog extends Dao_ConnectionFactory {

    private $conn = null;

    public function __construct() {
        $this->conn = Dao_ConnectionFactory::createConn();
    }

    public function insert(VO_Aneellog $vo) {

        $SQL = "INSERT INTO aneellog(horarioenvio,estacaonome,estacaocodigo,codigoplu,codigoflu,id)";
        $SQL .= " VALUES(?,?,?,?,?,?)";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getHorarioenvio(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getEstacaonome(), PDO::PARAM_STR);
        $query->bindValue(3, $vo->getEstacaocodigo(), PDO::PARAM_STR);
        $query->bindValue(4, $vo->getCodigoplu(), PDO::PARAM_STR);
        $query->bindValue(5, $vo->getCodigoflu(), PDO::PARAM_STR);
        $query->bindValue(6, $vo->getId(), PDO::PARAM_STR);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete(VO_Aneellog $vo) {

        $SQL = "DELETE FROM aneellog WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update(VO_Aneellog $vo) {
        $SQL = "UPDATE aneellog SET horarioenvio = ?,estacaonome = ?,estacaocodigo = ?,codigoplu = ?,codigoflu = ?,id = ?";
        $SQL .= " WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getHorarioenvio(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getEstacaonome(), PDO::PARAM_STR);
        $query->bindValue(3, $vo->getEstacaocodigo(), PDO::PARAM_STR);
        $query->bindValue(4, $vo->getCodigoplu(), PDO::PARAM_STR);
        $query->bindValue(5, $vo->getCodigoflu(), PDO::PARAM_STR);
        $query->bindValue(6, $vo->getId(), PDO::PARAM_STR);

        $query->bindValue(7, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll() {
        $SQL = "SELECT * FROM aneellog";

        $query = $this->conn->prepare($SQL);
        $query->execute();

        $hash[] = array();

        while ($r = $query->fetch()) {
            $vo = new VO_Aneellog(null, null, null, null, null, null);
            $vo->setId($r["id"]);
            $vo->setHorarioenvio($r["horarioenvio"]);
            $vo->setEstacaonome($r["estacaonome"]);
            $vo->setEstacaocodigo($r["estacaocodigo"]);
            $vo->setCodigoplu($r["codigoplu"]);
            $vo->setCodigoflu($r["codigoflu"]);
            $vo->setId($r["id"]);
            $hash[$vo->getId()] = $vo;
        }

        return $hash;
    }

    public function getById($id) {

        $SQL = "SELECT * FROM aneellog WHERE id = ?";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        $vo = new VO_Aneellog(null, null, null, null, null, null);

        while ($r = $query->fetch()) {
            $vo->setId($r["id"]);
            $vo->setHorarioenvio($r["horarioenvio"]);
            $vo->setEstacaonome($r["estacaonome"]);
            $vo->setEstacaocodigo($r["estacaocodigo"]);
            $vo->setCodigoplu($r["codigoplu"]);
            $vo->setCodigoflu($r["codigoflu"]);
            $vo->setId($r["id"]);
        }

        return $vo;
    }
    
    public function getByData($codigo,$data) {

        $SQL = "SELECT * FROM aneellog WHERE estacaocodigo = '".$codigo."' and horarioenvio >= '".$data." 00:00:00' and horarioenvio <= '".$data." 23:59:00'";

        $query = $this->conn->prepare($SQL);

        
        $query->execute();

       return $query->fetchAll();
    }
    
    public function getByCodigo($codigo) {

        $SQL = "SELECT * FROM aneellog WHERE estacaocodigo = ? limit 20";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $codigo, PDO::PARAM_INT);
     
         $query->execute();
        return $query->fetchAll();
    }
     public function getBySucess($codigo) {

        $SQL = "select  date_part('year',horarioenvio) as ano,    date_part('month', horarioenvio) as mes,count(estacaonome)as N
    from aneellog where estacaocodigo = '".$codigo."'  and retorno like '%SUCESSO!%'  
	group by date_part('year',horarioenvio),date_part('month',horarioenvio) order by ano,mes";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $codigo, PDO::PARAM_INT);
     
         $query->execute();
        return $query->fetchAll();
    }


}
