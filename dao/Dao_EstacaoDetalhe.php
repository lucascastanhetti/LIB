<?PHP

include(dirname(__FILE__) . '/../model/VO_EstacaoDetalhe.php');

class Dao_Estacaodetalhe extends Dao_ConnectionFactory {

    private $conn = null;

    public function __construct() {
        $this->conn = Dao_ConnectionFactory::createConn();
    }

    public function insert(VO_Estacaodetalhe $vo) {

        $SQL = "INSERT INTO estacaodetalhe(acessibilidade,dataimplantacao,datavisita,descricao,imagemurl,latitude,localizacao,longitude,offsettransmissao,rio,municipio_id,operadora_id,protocolo_id,regiao_id, altitude,areadrenagem,na,cotavertimento,riot_id)";
        $SQL .= " VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getAcessibilidade(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getDataimplantacao(), PDO::PARAM_STR);
        $query->bindValue(3, $vo->getDatavisita(), PDO::PARAM_STR);
        $query->bindValue(4, $vo->getDescricao(), PDO::PARAM_STR);
        $query->bindValue(5, $vo->getImagemurl(), PDO::PARAM_STR);
        $query->bindValue(6, $vo->getLatitude(), PDO::PARAM_STR);
        $query->bindValue(7, $vo->getLocalizacao(), PDO::PARAM_STR);
        $query->bindValue(8, $vo->getLongitude(), PDO::PARAM_STR);
        $query->bindValue(9, $vo->getOffsettransmissao(), PDO::PARAM_STR);
        $query->bindValue(10, $vo->getRio(), PDO::PARAM_STR);
        $query->bindValue(11, $vo->getMunicipio_id(), PDO::PARAM_STR);
        $query->bindValue(12, $vo->getOperadora_id(), PDO::PARAM_STR);
        $query->bindValue(13, $vo->getProtocolo_id(), PDO::PARAM_STR);
        $query->bindValue(14, $vo->getRegiao_id(), PDO::PARAM_STR);
        $query->bindValue(15, $vo->getAltitude(), PDO::PARAM_STR);
        $query->bindValue(16, $vo->getAreadrenagem(), PDO::PARAM_STR);
        $query->bindValue(17, $vo->getNA(), PDO::PARAM_STR);
        $query->bindValue(18, $vo->getCotaVertimento(), PDO::PARAM_STR);
        $query->bindValue(19, $vo->getRiot_id(), PDO::PARAM_STR);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete(VO_Estacaodetalhe $vo) {

        $SQL = "DELETE FROM estacaodetalhe WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update(VO_Estacaodetalhe $vo) {
        $SQL = "UPDATE estacaodetalhe SET acessibilidade = ?,dataimplantacao = ?,datavisita = ?,descricao = ?,imagemurl = ?,latitude = ?,localizacao = ?,longitude = ?,offsettransmissao = ?,rio = ?,municipio_id = ?,operadora_id = ?,protocolo_id = ?,regiao_id = ?, altitude = ?,areadrenagem = ?,na = ?,cotavertimento = ?,riot_id = ?";
        $SQL .= " WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getAcessibilidade(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getDataimplantacao(), PDO::PARAM_STR);
        $query->bindValue(3, $vo->getDatavisita(), PDO::PARAM_STR);
        $query->bindValue(4, $vo->getDescricao(), PDO::PARAM_STR);
        $query->bindValue(5, $vo->getImagemurl(), PDO::PARAM_STR);
        $query->bindValue(6, $vo->getLatitude(), PDO::PARAM_STR);
        $query->bindValue(7, $vo->getLocalizacao(), PDO::PARAM_STR);
        $query->bindValue(8, $vo->getLongitude(), PDO::PARAM_STR);
        $query->bindValue(9, $vo->getOffsettransmissao(), PDO::PARAM_STR);
        $query->bindValue(10, $vo->getRio(), PDO::PARAM_STR);
        $query->bindValue(11, $vo->getMunicipio_id(), PDO::PARAM_STR);
        $query->bindValue(12, $vo->getOperadora_id(), PDO::PARAM_STR);
        $query->bindValue(13, $vo->getProtocolo_id(), PDO::PARAM_STR);
        $query->bindValue(14, $vo->getRegiao_id(), PDO::PARAM_STR);
        $query->bindValue(15, $vo->getAltitude(), PDO::PARAM_STR);
        $query->bindValue(16, $vo->getAreadrenagem(), PDO::PARAM_STR);
        $query->bindValue(17, $vo->getNA(), PDO::PARAM_STR);
        $query->bindValue(18, $vo->getCotaVertimento(), PDO::PARAM_STR);
        $query->bindValue(19, $vo->getRiot_id(), PDO::PARAM_STR);
        
        $query->bindValue(20, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll() {
        $SQL = "SELECT * FROM estacaodetalhe";

        $query = $this->conn->prepare($SQL);
        $query->execute();

        $hash[] = array();

        while ($r = $query->fetch()) {
            $vo = new VO_Estacaodetalhe();
            $vo->setId($r["id"]);
            $vo->setAcessibilidade($r["acessibilidade"]);
            $vo->setDataimplantacao($r["dataimplantacao"]);
            $vo->setDatavisita($r["datavisita"]);
            $vo->setDescricao($r["descricao"]);
            $vo->setImagemurl($r["imagemurl"]);
            $vo->setLatitude($r["latitude"]);
            $vo->setLocalizacao($r["localizacao"]);
            $vo->setLongitude($r["longitude"]);
            $vo->setOffsettransmissao($r["offsettransmissao"]);
            $vo->setRio($r["rio"]);
            $vo->setMunicipio_id($r["municipio_id"]);
            $vo->setOperadora_id($r["operadora_id"]);
            $vo->setProtocolo_id($r["protocolo_id"]);
            $vo->setRegiao_id($r["regiao_id"]);
            $vo->setAltitude($r["altitude"]);
            $vo->setAreadrenagem($r["areadrenagem"]);
            $vo->setNA($r["na"]);
            $vo->setCotaVertimento($r["cotavertimento"]);
            $vo->setRiot_id($r["riot_id"]);
            
            $hash[$vo->getId()] = $vo;
        }

        return $hash;
    }

    public function getById($id) {

        $SQL = "SELECT * FROM estacaodetalhe WHERE id = ?";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        $vo = new VO_Estacaodetalhe();

        while ($r = $query->fetch()) {
            $vo->setId($r["id"]);
            $vo->setAcessibilidade($r["acessibilidade"]);
            $vo->setDataimplantacao($r["dataimplantacao"]);
            $vo->setDatavisita($r["datavisita"]);
            $vo->setDescricao($r["descricao"]);
            $vo->setImagemurl($r["imagemurl"]);
            $vo->setLatitude($r["latitude"]);
            $vo->setLocalizacao($r["localizacao"]);
            $vo->setLongitude($r["longitude"]);
            $vo->setOffsettransmissao($r["offsettransmissao"]);
            $vo->setRio($r["rio"]);
            $vo->setMunicipio_id($r["municipio_id"]);
            $vo->setOperadora_id($r["operadora_id"]);
            $vo->setProtocolo_id($r["protocolo_id"]);
            $vo->setRegiao_id($r["regiao_id"]);
            $vo->setAltitude($r["altitude"]);
            $vo->setAreadrenagem($r["areadrenagem"]);
            $vo->setNA($r["na"]);
            $vo->setCotaVertimento($r["cotavertimento"]);
            $vo->setRiot_id($r["riot_id"]);
        }

        return $vo;
    }
}
