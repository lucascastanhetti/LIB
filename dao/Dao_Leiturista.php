<?PHP

include(dirname(__FILE__) . '/../model/VO_Leiturista.php');

class Dao_Leiturista extends Dao_ConnectionFactory {

    private $conn = null;

    public function __construct() {
        $this->conn = Dao_ConnectionFactory::createConn();
    }

    public function insert(VO_Leiturista $vo) {

        $SQL = "INSERT INTO leiturista(valor,telefone,status,rg,nome,cpf,conta,celular,banco,agencia,id)";
        $SQL .= " VALUES(?,?,?,?,?,?,?,?,?,?,?)";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getValor(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getTelefone(), PDO::PARAM_STR);
        $query->bindValue(3, $vo->getStatus(), PDO::PARAM_STR);
        $query->bindValue(4, $vo->getRg(), PDO::PARAM_STR);
        $query->bindValue(5, $vo->getNome(), PDO::PARAM_STR);
        $query->bindValue(6, $vo->getCpf(), PDO::PARAM_STR);
        $query->bindValue(7, $vo->getConta(), PDO::PARAM_STR);
        $query->bindValue(8, $vo->getCelular(), PDO::PARAM_STR);
        $query->bindValue(9, $vo->getBanco(), PDO::PARAM_STR);
        $query->bindValue(10, $vo->getAgencia(), PDO::PARAM_STR);
        $query->bindValue(11, $vo->getId(), PDO::PARAM_STR);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete(VO_Leiturista $vo) {

        $SQL = "DELETE FROM leiturista WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update(VO_Leiturista $vo) {
        $SQL = "UPDATE leiturista SET valor = ?,telefone = ?,status = ?,rg = ?,nome = ?,cpf = ?,conta = ?,celular = ?,banco = ?,agencia = ?,id = ?";
        $SQL .= " WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getValor(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getTelefone(), PDO::PARAM_STR);
        $query->bindValue(3, $vo->getStatus(), PDO::PARAM_STR);
        $query->bindValue(4, $vo->getRg(), PDO::PARAM_STR);
        $query->bindValue(5, $vo->getNome(), PDO::PARAM_STR);
        $query->bindValue(6, $vo->getCpf(), PDO::PARAM_STR);
        $query->bindValue(7, $vo->getConta(), PDO::PARAM_STR);
        $query->bindValue(8, $vo->getCelular(), PDO::PARAM_STR);
        $query->bindValue(9, $vo->getBanco(), PDO::PARAM_STR);
        $query->bindValue(10, $vo->getAgencia(), PDO::PARAM_STR);
        $query->bindValue(11, $vo->getId(), PDO::PARAM_STR);

        $query->bindValue(12, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll() {
        $SQL = "SELECT * FROM leiturista";

        $query = $this->conn->prepare($SQL);
        $query->execute();

        $hash[] = array();

        while ($r = $query->fetch()) {
            $vo = new VO_Leiturista(null, null, null, null, null, null, null, null, null, null, null);
            $vo->setId($r["id"]);
            $vo->setValor($r["valor"]);
            $vo->setTelefone($r["telefone"]);
            $vo->setStatus($r["status"]);
            $vo->setRg($r["rg"]);
            $vo->setNome($r["nome"]);
            $vo->setCpf($r["cpf"]);
            $vo->setConta($r["conta"]);
            $vo->setCelular($r["celular"]);
            $vo->setBanco($r["banco"]);
            $vo->setAgencia($r["agencia"]);
            $vo->setId($r["id"]);
            $hash[$vo->getId()] = $vo;
        }

        return $hash;
    }

    public function getById($id) {

        $SQL = "SELECT * FROM leiturista WHERE id = ?";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        $vo = new VO_Leiturista(null, null, null, null, null, null, null, null, null, null, null);

        while ($r = $query->fetch()) {
            $vo->setId($r["id"]);
            $vo->setValor($r["valor"]);
            $vo->setTelefone($r["telefone"]);
            $vo->setStatus($r["status"]);
            $vo->setRg($r["rg"]);
            $vo->setNome($r["nome"]);
            $vo->setCpf($r["cpf"]);
            $vo->setConta($r["conta"]);
            $vo->setCelular($r["celular"]);
            $vo->setBanco($r["banco"]);
            $vo->setAgencia($r["agencia"]);
            $vo->setId($r["id"]);
        }

        return $vo;
    }
    
     public function getByEstacao($id) {

        $SQL = "SELECT * FROM leiturista WHERE estacao_id = ? and status = 1";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        $vo = new VO_Leiturista(null, null, null, null, null, null, null, null, null, null, null);

        while ($r = $query->fetch()) {
            $vo->setId($r["id"]);
            $vo->setValor($r["valor"]);
            $vo->setTelefone($r["telefone"]);
            $vo->setStatus($r["status"]);
            $vo->setRg($r["rg"]);
            $vo->setNome($r["nome"]);
            $vo->setCpf($r["cpf"]);
            $vo->setConta($r["conta"]);
            $vo->setCelular($r["celular"]);
            $vo->setBanco($r["banco"]);
            $vo->setAgencia($r["agencia"]);
            $vo->setId($r["id"]);
        }

        return $vo;
    }

}
