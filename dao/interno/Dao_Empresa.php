<?PHP

include(dirname(__FILE__) . '/../../model/interno/VO_Empresa.php');

class Dao_Empresa extends Dao_ConnectionFactory {

    private $conn = null;

    public function __construct() {
        $this->conn = Dao_ConnectionFactory::createConn();
    }

//    public function insert(VO_Empresa $vo) {
//        $SQL = "INSERT INTO empresa(abreviatura,cnpj,contato,logo,nome,tel,pathaneel)";
//        $SQL .= " VALUES(?,?,?,?,?,?,?)";
//        $query = $this->conn->prepare($SQL);
//        $query->bindValue(1, $vo->getAbreviatura(), PDO::PARAM_STR);
//        $query->bindValue(2, $vo->getCnpj(), PDO::PARAM_STR);
//        $query->bindValue(3, $vo->getContato(), PDO::PARAM_STR);
//        $query->bindValue(4, $vo->getLogo(), PDO::PARAM_STR);
//        $query->bindValue(5, $vo->getNome(), PDO::PARAM_STR);
//        $query->bindValue(6, $vo->getTel(), PDO::PARAM_STR);
//        $query->bindValue(7, $vo->getPathaneel(), PDO::PARAM_STR);
//
//        if ($query->execute()) {
//            return true;
//        } else {
//            return false;
//        }
//    }
//
//    public function delete(VO_Empresa $vo) {
//        $SQL = "DELETE FROM empresa WHERE id = ?";
//        $query = $this->conn->prepare($SQL);
//        $query->bindValue(1, $vo->getId(), PDO::PARAM_INT);
//
//        if ($query->execute()) {
//            return true;
//        } else {
//            return false;
//        }
//    }
//
//    public function update(VO_Empresa $vo) {
//        $SQL = "UPDATE empresa SET abreviatura = ?,cnpj = ?,contato = ?,logo = ?,nome = ?,tel = ?,pathaneel = ?";
//        $SQL .= " WHERE id = ?";
//        $query = $this->conn->prepare($SQL);
//        $query->bindValue(1, $vo->getAbreviatura(), PDO::PARAM_STR);
//        $query->bindValue(2, $vo->getCnpj(), PDO::PARAM_STR);
//        $query->bindValue(3, $vo->getContato(), PDO::PARAM_STR);
//        $query->bindValue(4, $vo->getLogo(), PDO::PARAM_STR);
//        $query->bindValue(5, $vo->getNome(), PDO::PARAM_STR);
//        $query->bindValue(6, $vo->getTel(), PDO::PARAM_STR);
//        $query->bindValue(7, $vo->getPathaneel(), PDO::PARAM_STR);
//
//        $query->bindValue(8, $vo->getId(), PDO::PARAM_INT);
//
//        if ($query->execute()) {
//            return true;
//        } else {
//            return false;
//        }
//    }

    public function getAll() {
        $SQL = "SELECT * FROM empresa";

        $query = $this->conn->prepare($SQL);
        $query->execute();

        $hash[] = array();

        while ($r = $query->fetch()) {
            $vo = new VO_Empresa();
            $vo->setId($r["id"]);
            $vo->setNome($r["nome"]);
            $vo->setBd($r["bd"]);            
            $hash[$vo->getId()] = $vo;
        }

        return $hash;
    }

    public function getById($id) {
        $SQL = "SELECT * FROM empresa WHERE id = ?";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        $vo = new VO_Empresa();

        while ($r = $query->fetch()) {
            $vo->setId($r["id"]);
            $vo->setNome($r["nome"]);
            $vo->setBd($r["bd"]);            
        }

        return $vo;
    }

}

?>