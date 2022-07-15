<?PHP

include(dirname(__FILE__) . '/../model/VO_EstacaoImagem.php');

class Dao_Estacaoimagem extends Dao_ConnectionFactory {

    private $conn = null;

    public function __construct() {
        $this->conn = Dao_ConnectionFactory::createConn();
    }

    public function insert(VO_Estacaoimagem $vo) {

        $SQL = "INSERT INTO estacaoimagem(url,descricao,datacadastro,estacao_id)";
        $SQL .= " VALUES(?,?,?,?)";
        
        //echo ("INSERT INTO estacaoimagem(url,descricao,datacadastro,estacao_id) values (".$vo->getUrl().",".$vo->getDescricao().",".$vo->getDatacadastro().",".$vo->getEstacao_id());
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getUrl(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getDescricao(), PDO::PARAM_STR);
        $query->bindValue(3, $vo->getDatacadastro(), PDO::PARAM_STR);
        $query->bindValue(4, $vo->getEstacao_id(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete(VO_Estacaoimagem $vo) {

        $SQL = "DELETE FROM estacaoimagem WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update(VO_Estacaoimagem $vo) {
        $SQL = "UPDATE estacaoimagem SET url = ?,descricao = ?,datacadastro = ?,estacao_id = ?";
        $SQL .= " WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getUrl(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getDescricao(), PDO::PARAM_STR);
        $query->bindValue(3, $vo->getDatacadastro(), PDO::PARAM_STR);
        $query->bindValue(4, $vo->getEstacao_id(), PDO::PARAM_STR);

        $query->bindValue(5, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll() {
        $SQL = "SELECT * FROM estacaoimagem";

        $query = $this->conn->prepare($SQL);
        $query->execute();

        $hash[] = array();

        while ($r = $query->fetch()) {
            $vo = new VO_Estacaoimagem();
            $vo->setId($r["id"]);
            $vo->setUrl($r["url"]);
            $vo->setDescricao($r["descricao"]);
            $vo->setDatacadastro($r["datacadastro"]);
            $vo->setId($r["estacao_id"]);
            $hash[$vo->getId()] = $vo;
        }

        return $hash;
    }

    public function getById($id) {

        $SQL = "SELECT * FROM estacaoimagem WHERE id = ?";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        $vo = new VO_Estacaoimagem();

        while ($r = $query->fetch()) {
            $vo->setId($r["id"]);
            $vo->setUrl($r["url"]);
            $vo->setDescricao($r["descricao"]);
            $vo->setDatacadastro($r["datacadastro"]);
            $vo->setEstacao_id($r["estacao_id"]);
        }

        return $vo;
    }

    public function getByEstacaoId($id) {

        $SQL = "SELECT * FROM estacaoimagem WHERE estacao_id = ? order by id";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        $vo = new VO_Estacaoimagem();

        $hash[] = array();
        $i = 1;
        while ($r = $query->fetch()) {
            $vo = new VO_Estacaoimagem();
            $vo->setId($r["id"]);
            $vo->setUrl($r["url"]);
            $vo->setDescricao($r["descricao"]);
            $vo->setDatacadastro($r["datacadastro"]);
            $vo->setEstacao_id($r["estacao_id"]);
            $hash[$i] = $vo;
            $i++;
        }

        return $hash;
    }

}

?>