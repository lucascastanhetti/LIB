<?PHP

include(dirname(__FILE__) . '/../model/VO_Empreendimento.php');

class Dao_Empreendimento extends Dao_ConnectionFactory {

    private $conn = null;

    public function __construct() {
        $this->conn = Dao_ConnectionFactory::createConn();
    }

    public function insert(VO_Empreendimento $vo) {

        $SQL = "INSERT INTO empreendimento(cnpj,nome,senhaaneel,usuarioaneel,tosend, geracaomedia, vazaosanitaria, areadrenagem, hasbalancohidrico)";
        $SQL .= " VALUES(?,?,?,?,?,?,?,?,?)";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getCnpj(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getNome(), PDO::PARAM_STR);
        $query->bindValue(3, $vo->getSenhaaneel(), PDO::PARAM_STR);
        $query->bindValue(4, $vo->getUsuarioaneel(), PDO::PARAM_STR);
        $query->bindValue(5, $vo->getTosend(), PDO::PARAM_STR);
        $query->bindValue(6, $vo->getGeracaomedia(), PDO::PARAM_STR);
        $query->bindValue(7, $vo->getVazaosanitaria(), PDO::PARAM_STR);
        $query->bindValue(8, $vo->getAreadrenagem(), PDO::PARAM_STR);
        $query->bindValue(9, $vo->getHasBalancoHidrico(), PDO::PARAM_STR);
        
        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete(VO_Empreendimento $vo) {

        $SQL = "DELETE FROM empreendimento WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update(VO_Empreendimento $vo) {
        $SQL = "UPDATE empreendimento SET cnpj = ?,nome = ?,senhaaneel = ?,usuarioaneel = ?,tosend = ?,geracaomedia = ?,vazaosanitaria = ?, areadrenagem = ?, hasbalancohidrico = ?";
        $SQL .= " WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getCnpj(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getNome(), PDO::PARAM_STR);
        $query->bindValue(3, $vo->getSenhaaneel(), PDO::PARAM_STR);
        $query->bindValue(4, $vo->getUsuarioaneel(), PDO::PARAM_STR);
        $query->bindValue(5, $vo->getTosend(), PDO::PARAM_STR);
        $query->bindValue(6, $vo->getGeracaomedia(), PDO::PARAM_STR);
        $query->bindValue(7, $vo->getVazaosanitaria(), PDO::PARAM_STR);
        $query->bindValue(8, $vo->getAreadrenagem(), PDO::PARAM_STR);
        $query->bindValue(9, $vo->getHasBalancoHidrico(), PDO::PARAM_STR);
        
        $query->bindValue(10, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll() {
        $SQL = "SELECT * FROM empreendimento";

        $query = $this->conn->prepare($SQL);
        $query->execute();

        $hash[] = array();

        while ($r = $query->fetch()) {
            $vo = new VO_Empreendimento();
            $vo->setId($r["id"]);
            $vo->setCnpj($r["cnpj"]);
            $vo->setNome($r["nome"]);
            $vo->setSenhaaneel($r["senhaaneel"]);
            $vo->setUsuarioaneel($r["usuarioaneel"]);
            $vo->setTosend($r["tosend"]);
            $vo->setAreadrenagem($r["areadrenagem"]);
            $vo->setGeracaomedia($r["geracaomedia"]);
            $vo->setVazaosanitaria($r["vazaosanitaria"]);
            $vo->setHasBalancoHidrico($r["hasbalancohidrico"]);
            $vo->setFantasia($r["fantasia"]);
            $hash[$vo->getId()] = $vo;
        }

        return $hash;
    }

    public function getById($id) {

        $SQL = "SELECT * FROM empreendimento WHERE id = ?";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        $vo = new VO_Empreendimento();

        while ($r = $query->fetch()) {
            $vo->setId($r["id"]);
            $vo->setCnpj($r["cnpj"]);
            $vo->setNome($r["nome"]);
            $vo->setSenhaaneel($r["senhaaneel"]);
            $vo->setUsuarioaneel($r["usuarioaneel"]);
            $vo->setTosend($r["tosend"]);
            $vo->setAreadrenagem($r["areadrenagem"]);
            $vo->setGeracaomedia($r["geracaomedia"]);
            $vo->setVazaosanitaria($r["vazaosanitaria"]);
            $vo->setHasBalancoHidrico($r["hasbalancohidrico"]);
            $vo->setFantasia($r["fantasia"]);
            
        }

        return $vo;
    }

}

?>