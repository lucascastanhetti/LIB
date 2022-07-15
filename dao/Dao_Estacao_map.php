<?PHP

include(dirname(__FILE__) . '/../model/VO_Estacao_map.php');

class Dao_Estacao_map extends Dao_ConnectionFactory {

    private $conn = null;

    public function __construct() {
        $this->conn = Dao_ConnectionFactory::createConn();
    }

    public function getAll($estacoes) {
        $SQL = "select  from estacao as A inner join estacaodetalhe as B on A.estacaodetalhe_id = B.id where A.id in ($estacoes)" ;
        return $this->conn->query($SQL);
    }

    public function getById($id) {

        $SQL = "SELECT * FROM estacao WHERE id = ?";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        $vo = new VO_Estacao_map();

        while ($r = $query->fetch()) {
            $vo->setCodigoaneelflu($r["codigoaneelflu"]);
            $vo->setCodigoaneelplu($r["codigoaneelplu"]);
            $vo->setNome($r["nome"]);
            $vo->setEstacaotipo_id($r["estacaotipo_id"]);
            $vo->setGrupo_id($r["grupo_id"]);
            $vo->setStatus_id($r["status_id"]);
            $vo->setImagemurl($r["imagemurl"]);
            $vo->setLatitude($r["latitude"]);
            $vo->setLongitude($r["longitude"]);
            $vo->setRio($r["rio"]);
            $vo->setMunicipio_id($r["municipio_id"]);
            $vo->setOperadora_id($r["operadora_id"]);
            $vo->setProtocolo_id($r["protocolo_id"]);
            $vo->setRegiao_id($r["regiao_id"]);
        }

        return $vo;
    }

}

?>