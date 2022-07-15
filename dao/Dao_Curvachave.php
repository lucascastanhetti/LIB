<?PHP

include(dirname(__FILE__) . '/../model/VO_Curvachave.php');

class Dao_Curvachave extends Dao_ConnectionFactory {

    private $conn = null;

    public function __construct() {
        $this->conn = Dao_ConnectionFactory::createConn();
    }

    public function insert(VO_Curvachave $vo) {
        $SQL = "INSERT INTO curvachave(urlcurva,datacadastro,estacao_id,datainicial, usuario)";
        $SQL .= " VALUES(?,?,?,?,?)";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getUrlcurva(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getDatacadastro(), PDO::PARAM_STR);
        $query->bindValue(3, $vo->getEstacao_id(), PDO::PARAM_STR);
        $query->bindValue(4, $vo->getDatainicial(), PDO::PARAM_STR);
        $query->bindValue(5, $vo->getUsuario(), PDO::PARAM_STR);

        try {
            if ($query->execute()) {
                return $this->conn->lastInsertId("curvachave_id_seq");
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo(var_dump($ex->getMessage()));
        }
    }

    public function delete(VO_Curvachave $vo) {

        $SQL = "DELETE FROM curvachave WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update(VO_Curvachave $vo) {
        $SQL = "UPDATE curvachave SET urlcurva = ?,datacadastro = ?,estacao_id = ?,datainicial = ?, usuario = ?";
        $SQL .= " WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getUrlcurva(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getDatacadastro(), PDO::PARAM_STR);
        $query->bindValue(3, $vo->getEstacao_id(), PDO::PARAM_STR);
        $query->bindValue(4, $vo->getDatainicial(), PDO::PARAM_STR);
        $query->bindValue(5, $vo->getUsuario(), PDO::PARAM_STR);

        $query->bindValue(6, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll() {
        $SQL = "SELECT * FROM curvachave";

        $query = $this->conn->prepare($SQL);
        $query->execute();

        $hash[] = array();

        while ($r = $query->fetch()) {
            $vo = new VO_Curvachave();
            $vo->setId($r["id"]);
            $vo->setUrlcurva($r["urlcurva"]);
            $vo->setDatacadastro($r["datacadastro"]);
            $vo->setEstacao_id($r["estacao_id"]);
            $vo->setDatainicial($r["datainicial"]);
            $vo->setUsuario($r["usuario"]);
            $hash[$vo->getId()] = $vo;
        }

        return $hash;
    }

    public function getById($id) {

        $SQL = "SELECT * FROM curvachave WHERE id = ?";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        $vo = new VO_Curvachave();

        while ($r = $query->fetch()) {
            $vo->setId($r["id"]);
            $vo->setUrlcurva($r["urlcurva"]);
            $vo->setDatacadastro($r["datacadastro"]);
            $vo->setEstacao_id($r["estacao_id"]);
            $vo->setDatainicial($r["datainicial"]);
            $vo->setUsuario($r["usuario"]);
        }

        return $vo;
    }

    public function getByEstacaoId($id) {

        $SQL = "SELECT * FROM curvachave WHERE estacao_id = ?";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        $vo = new VO_Curvachave();

        while ($r = $query->fetch()) {
            $vo->setId($r["id"]);
            $vo->setUrlcurva($r["urlcurva"]);
            $vo->setDatacadastro($r["datacadastro"]);
            $vo->setEstacao_id($r["estacao_id"]);
            $vo->setDatainicial($r["datainicial"]);
            $vo->setUsuario($r["usuario"]);
        }

        return $vo;
    }
    public function updateImg($url,$id) {
        $SQL = "UPDATE curvachave SET urlcurva = ?";
        $SQL .= " WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $url, PDO::PARAM_STR);
        $query->bindValue(2, $id, PDO::PARAM_STR);
        
        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }


}

?>