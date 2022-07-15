<?PHP

include(dirname(__FILE__) . '/../model/VO_Estacao.php');

class Dao_Estacao extends Dao_ConnectionFactory {

    private $conn = null;

    public function __construct() {
        $this->conn = Dao_ConnectionFactory::createConn();
    }

    public function insert(VO_Estacao $vo) {

        $SQL = "INSERT INTO estacao(codigo,codigoadicional,codigoaneelflu,codigoaneelplu,intervalotransmissao,nome,sigla,coletaintervalo_id,coletatipo_id,empreendimento_id,empresa_id,estacaodetalhe_id,estacaotipo_id,grupo_id,status_id)";
        $SQL .= " VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getCodigo(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getCodigoadicional(), PDO::PARAM_STR);
        $query->bindValue(3, $vo->getCodigoaneelflu(), PDO::PARAM_STR);
        $query->bindValue(4, $vo->getCodigoaneelplu(), PDO::PARAM_STR);
        $query->bindValue(5, $vo->getIntervalotransmissao(), PDO::PARAM_STR);
        $query->bindValue(6, $vo->getNome(), PDO::PARAM_STR);
        $query->bindValue(7, $vo->getSigla(), PDO::PARAM_STR);
        $query->bindValue(8, $vo->getColetaintervalo_id(), PDO::PARAM_STR);
        $query->bindValue(9, $vo->getColetatipo_id(), PDO::PARAM_STR);
        $query->bindValue(10, $vo->getEmpreendimento_id(), PDO::PARAM_STR);
        $query->bindValue(11, $vo->getEmpresa_id(), PDO::PARAM_STR);
        $query->bindValue(12, $vo->getEstacaodetalhe_id(), PDO::PARAM_STR);
        $query->bindValue(13, $vo->getEstacaotipo_id(), PDO::PARAM_STR);
        $query->bindValue(14, $vo->getGrupo_id(), PDO::PARAM_STR);
        $query->bindValue(15, $vo->getStatus_id(), PDO::PARAM_STR);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete(VO_Estacao $vo) {

        $SQL = "DELETE FROM estacao WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update(VO_Estacao $vo) {
        $SQL = "UPDATE estacao SET codigo = ?,codigoadicional = ?,codigoaneelflu = ?,codigoaneelplu = ?,intervalotransmissao = ?,nome = ?,sigla = ?,coletaintervalo_id = ?,coletatipo_id = ?,empreendimento_id = ?,empresa_id = ?,estacaodetalhe_id = ?,estacaotipo_id = ?,grupo_id = ?,status_id = ?";
        $SQL .= " WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getCodigo(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getCodigoadicional(), PDO::PARAM_STR);
        $query->bindValue(3, $vo->getCodigoaneelflu(), PDO::PARAM_STR);
        $query->bindValue(4, $vo->getCodigoaneelplu(), PDO::PARAM_STR);
        $query->bindValue(5, $vo->getIntervalotransmissao(), PDO::PARAM_STR);
        $query->bindValue(6, $vo->getNome(), PDO::PARAM_STR);
        $query->bindValue(7, $vo->getSigla(), PDO::PARAM_STR);
        $query->bindValue(8, $vo->getColetaintervalo_id(), PDO::PARAM_STR);
        $query->bindValue(9, $vo->getColetatipo_id(), PDO::PARAM_STR);
        $query->bindValue(10, $vo->getEmpreendimento_id(), PDO::PARAM_STR);
        $query->bindValue(11, $vo->getEmpresa_id(), PDO::PARAM_STR);
        $query->bindValue(12, $vo->getEstacaodetalhe_id(), PDO::PARAM_STR);
        $query->bindValue(13, $vo->getEstacaotipo_id(), PDO::PARAM_STR);
        $query->bindValue(14, $vo->getGrupo_id(), PDO::PARAM_STR);
        $query->bindValue(15, $vo->getStatus_id(), PDO::PARAM_STR);

        $query->bindValue(16, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll($empresas) {
        
        $SQL = "";
        if ($empresas == null) {
            $SQL = "SELECT * FROM estacao   order by nome";
            $query = $this->conn->prepare($SQL);            
        } else {
            $SQL = "SELECT * FROM estacao WHERE empresa_id IN ($empresas)   order by nome";
            $query = $this->conn->prepare($SQL);
            
        }
        
        $query->execute();
        
        $hash[] = array();
        $i = 1;
        while ($r = $query->fetch()) {
            $vo = new VO_Estacao();
            $vo->setId($r["id"]);
            $vo->setCodigo($r["codigo"]);
            $vo->setCodigoadicional($r["codigoadicional"]);
            $vo->setCodigoaneelflu($r["codigoaneelflu"]);
            $vo->setCodigoaneelplu($r["codigoaneelplu"]);
            $vo->setIntervalotransmissao($r["intervalotransmissao"]);
            $vo->setNome($r["nome"]);
            $vo->setSigla($r["sigla"]);
            $vo->setColetaintervalo_id($r["coletaintervalo_id"]);
            $vo->setColetatipo_id($r["coletatipo_id"]);
            $vo->setEmpreendimento_id($r["empreendimento_id"]);
            $vo->setEmpresa_id($r["empresa_id"]);
            $vo->setEstacaodetalhe_id($r["estacaodetalhe_id"]);
            $vo->setEstacaotipo_id($r["estacaotipo_id"]);
            $vo->setGrupo_id($r["grupo_id"]);
            $vo->setStatus_id($r["status_id"]);
            $hash[$i] = $vo;
            $i++;
        }
        
        return $hash;
    }

    public function getById($id) {

        $SQL = "SELECT * FROM estacao WHERE id = ?";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        $vo = new VO_Estacao();

        while ($r = $query->fetch()) {
            $vo->setId($r["id"]);
            $vo->setCodigo($r["codigo"]);
            $vo->setCodigoadicional($r["codigoadicional"]);
            $vo->setCodigoaneelflu($r["codigoaneelflu"]);
            $vo->setCodigoaneelplu($r["codigoaneelplu"]);
            $vo->setIntervalotransmissao($r["intervalotransmissao"]);
            $vo->setNome($r["nome"]);
            $vo->setSigla($r["sigla"]);
            $vo->setColetaintervalo_id($r["coletaintervalo_id"]);
            $vo->setColetatipo_id($r["coletatipo_id"]);
            $vo->setEmpreendimento_id($r["empreendimento_id"]);
            $vo->setEmpresa_id($r["empresa_id"]);
            $vo->setEstacaodetalhe_id($r["estacaodetalhe_id"]);
            $vo->setEstacaotipo_id($r["estacaotipo_id"]);
            $vo->setGrupo_id($r["grupo_id"]);
            $vo->setStatus_id($r["status_id"]);
        }

        return $vo;
    }

     public function getByCodigo($cod) {

        $SQL = "SELECT * FROM estacao WHERE codigo = ?";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $cod, PDO::PARAM_INT);
        $query->execute();

        $vo = new VO_Estacao();

        while ($r = $query->fetch()) {
            $vo->setId($r["id"]);
            $vo->setCodigo($r["codigo"]);
            $vo->setCodigoadicional($r["codigoadicional"]);
            $vo->setCodigoaneelflu($r["codigoaneelflu"]);
            $vo->setCodigoaneelplu($r["codigoaneelplu"]);
            $vo->setIntervalotransmissao($r["intervalotransmissao"]);
            $vo->setNome($r["nome"]);
            $vo->setSigla($r["sigla"]);
            $vo->setColetaintervalo_id($r["coletaintervalo_id"]);
            $vo->setColetatipo_id($r["coletatipo_id"]);
            $vo->setEmpreendimento_id($r["empreendimento_id"]);
            $vo->setEmpresa_id($r["empresa_id"]);
            $vo->setEstacaodetalhe_id($r["estacaodetalhe_id"]);
            $vo->setEstacaotipo_id($r["estacaotipo_id"]);
            $vo->setGrupo_id($r["grupo_id"]);
            $vo->setStatus_id($r["status_id"]);
        }

        return $vo;
    }

}

?>