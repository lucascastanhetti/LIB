<?php

/**
 * Description of DAO_Estacaodetalhe
 *
 * @author Overtech
 * @date 17/04/2020 14:49:14
 */
include (dirname(__FILE__) . '/../model/VO_EstacaodetalheRio.php');

class DAO_Estacaodetalhe extends Dao_ConnectionFactory {

    private $conn = null;

    public function __construct() {
        $this->conn = Dao_ConnectionFactory::createConn();
    }

    public function insert(VO_Estacaodetalhe $vo, $lastId) {

        $SQL = "INSERT INTO estacaodetalhe(na,acessibilidade,altitude,areadrenagem,cotavertimento,dataimplantacao,datavisita,descricao,imagemurl,latitude,localizacao,longitude,offsettransmissao,rio,municipio_id,operadora_id,protocolo_id,regiao_id,riot_id)";
        $SQL .= " VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getNa(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getAcessibilidade(), PDO::PARAM_STR);
        $query->bindValue(3, $vo->getAltitude(), PDO::PARAM_STR);
        $query->bindValue(4, $vo->getAreadrenagem(), PDO::PARAM_STR);
        $query->bindValue(5, $vo->getCotavertimento(), PDO::PARAM_STR);
        $query->bindValue(6, $vo->getDataimplantacao(), PDO::PARAM_STR);
        $query->bindValue(7, $vo->getDatavisita(), PDO::PARAM_STR);
        $query->bindValue(8, $vo->getDescricao(), PDO::PARAM_STR);
        $query->bindValue(9, $vo->getImagemurl(), PDO::PARAM_STR);
        $query->bindValue(10, $vo->getLatitude(), PDO::PARAM_STR);
        $query->bindValue(11, $vo->getLocalizacao(), PDO::PARAM_STR);
        $query->bindValue(12, $vo->getLongitude(), PDO::PARAM_STR);
        $query->bindValue(13, $vo->getOffsettransmissao(), PDO::PARAM_STR);
        $query->bindValue(14, $vo->getRio(), PDO::PARAM_STR);
        $query->bindValue(15, $vo->getMunicipio_id(), PDO::PARAM_STR);
        $query->bindValue(16, $vo->getOperadora_id(), PDO::PARAM_STR);
        $query->bindValue(17, $vo->getProtocolo_id(), PDO::PARAM_STR);
        $query->bindValue(18, $vo->getRegiao_id(), PDO::PARAM_STR);
        $query->bindValue(19, $vo->getRiot_id(), PDO::PARAM_STR);


        if ($query->execute()) {
            if ($lastId == TRUE) {
                $id = $this->conn->lastInsertId();
                $this->killConn();
                return $id;
            } else {
                $this->killConn();
                return true;
            }
        } else {

            $this->killConn();
            return false;
        }
    }

    public function delete($id_Estacaodetalhe) {

        $SQL = "DELETE FROM estacaodetalhe WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $id_Estacaodetalhe, PDO::PARAM_INT);

        if ($query->execute()) {
            $this->killConn();
            return true;
        } else {
            $this->killConn();
            return false;
        }
    }

    public function update(VO_Estacaodetalhe $vo) {
        $SQL = "UPDATE estacaodetalhe SET na = ?,acessibilidade = ?,altitude = ?,areadrenagem = ?,cotavertimento = ?,dataimplantacao = ?,datavisita = ?,descricao = ?,imagemurl = ?,latitude = ?,localizacao = ?,longitude = ?,offsettransmissao = ?,rio = ?,municipio_id = ?,operadora_id = ?,protocolo_id = ?,regiao_id = ?,riot_id = ?";

        $SQL .= " WHERE id = ?";

        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getNa(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getAcessibilidade(), PDO::PARAM_STR);
        $query->bindValue(3, $vo->getAltitude(), PDO::PARAM_STR);
        $query->bindValue(4, $vo->getAreadrenagem(), PDO::PARAM_STR);
        $query->bindValue(5, $vo->getCotavertimento(), PDO::PARAM_STR);
        $query->bindValue(6, $vo->getDataimplantacao(), PDO::PARAM_STR);
        $query->bindValue(7, $vo->getDatavisita(), PDO::PARAM_STR);
        $query->bindValue(8, $vo->getDescricao(), PDO::PARAM_STR);
        $query->bindValue(9, $vo->getImagemurl(), PDO::PARAM_STR);
        $query->bindValue(10, $vo->getLatitude(), PDO::PARAM_STR);
        $query->bindValue(11, $vo->getLocalizacao(), PDO::PARAM_STR);
        $query->bindValue(12, $vo->getLongitude(), PDO::PARAM_STR);
        $query->bindValue(13, $vo->getOffsettransmissao(), PDO::PARAM_STR);
        $query->bindValue(14, $vo->getRio(), PDO::PARAM_STR);
        $query->bindValue(15, $vo->getMunicipio_id(), PDO::PARAM_STR);
        $query->bindValue(16, $vo->getOperadora_id(), PDO::PARAM_STR);
        $query->bindValue(17, $vo->getProtocolo_id(), PDO::PARAM_STR);
        $query->bindValue(18, $vo->getRegiao_id(), PDO::PARAM_STR);
        $query->bindValue(19, $vo->getRiot_id(), PDO::PARAM_STR);

        $query->bindValue(20, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            $this->killConn();
            return true;
        } else {
            $this->killConn();
            return false;
        }
    }

    public function getAll() {
        $SQL = "SELECT * FROM estacaodetalhe where id < 9000 order by id";
        $query = $this->conn->prepare($SQL);
        $query->execute();
        $hash[] = array();
       
        while ($r = $query->fetch()) {
            $vo = new VO_Estacaodetalhe();
            $vo->setId($r["id"]);
            $vo->setNa($r["na"]);
            $vo->setAcessibilidade($r["acessibilidade"]);
            $vo->setAltitude($r["altitude"]);
            $vo->setAreadrenagem($r["areadrenagem"]);
            $vo->setCotavertimento($r["cotavertimento"]);
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

        $vo = new VO_Estacaodetalhe(null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);

        while ($r = $query->fetch()) {
            $vo->setId($r["id"]);
            $vo->setNa($r["na"]);
            $vo->setAcessibilidade($r["acessibilidade"]);
            $vo->setAltitude($r["altitude"]);
            $vo->setAreadrenagem($r["areadrenagem"]);
            $vo->setCotavertimento($r["cotavertimento"]);
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
            $vo->setRiot_id($r["riot_id"]);
        }
        $this->killConn();
        return $vo;
    }

}

?>