<?PHP

include(dirname(__FILE__) . '/../model/VO_Usuario_Inicial.php');
include(dirname(__FILE__) . '/../fcn/Sql_Conect.php');

class Dao_Usuario_Inicial extends Dao_ConnectionFactory {

    private $conn = null;

    public function __construct() {
        $this->conn = Dao_ConnectionFactory::createConn();
    }

    public function insert(VO_Usuario_Inicial $vo) {

        $SQL = "INSERT INTO usuario(estacao,nivel,nome,senha,usuario,empresa_id,status,ip,banco)";
        $SQL .= " VALUES(?,?,?,?,?,?,?,?,?)";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getEstacao(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getNivel(), PDO::PARAM_STR);
        $query->bindValue(3, $vo->getNome(), PDO::PARAM_STR);
        $query->bindValue(4, $vo->getSenha(), PDO::PARAM_STR);
        $query->bindValue(5, $vo->getUsuario(), PDO::PARAM_STR);
        $query->bindValue(6, $vo->getEmpresa_id(), PDO::PARAM_STR);
        $query->bindValue(7, $vo->getStatus(), PDO::PARAM_STR);
        $query->bindValue(8, $vo->getIp(), PDO::PARAM_STR);
        $query->bindValue(9, $vo->getBanco(), PDO::PARAM_STR);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete(VO_Usuario_Inicial $vo) {

        $SQL = "DELETE FROM usuario WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update(VO_Usuario_Inicial $vo) {
        $SQL = "UPDATE usuario SET estacao = ?,nivel = ?,nome = ?,senha = ?,usuario = ?,empresa_id = ?,status = ?,ip = ?,banco = ?";
        $SQL .= " WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getEstacao(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getNivel(), PDO::PARAM_STR);
        $query->bindValue(3, $vo->getNome(), PDO::PARAM_STR);
        $query->bindValue(4, $vo->getSenha(), PDO::PARAM_STR);
        $query->bindValue(5, $vo->getUsuario(), PDO::PARAM_STR);
        $query->bindValue(6, $vo->getEmpresa_id(), PDO::PARAM_STR);
        $query->bindValue(7, $vo->getStatus(), PDO::PARAM_STR);
        $query->bindValue(8, $vo->getIp(), PDO::PARAM_STR);
        $query->bindValue(9, $vo->getBanco(), PDO::PARAM_STR);

        $query->bindValue(10, $vo->getId(), PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll() {
        $SQL = "SELECT * FROM usuario";
        return $this->conn->query($SQL);
    }

    public function getById($id) {

        $SQL = "SELECT * FROM usuario WHERE id = ?";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();

        $vo = new VO_Usuario_Inicial(null, null, null, null, null, null, null, null, null);

        while ($r = $query->fetch()) {
            $vo->setId($r["id"]);
            $vo->setEstacao($r["estacao"]);
            $vo->setNivel($r["nivel"]);
            $vo->setNome($r["nome"]);
            $vo->setSenha($r["senha"]);
            $vo->setUsuario($r["usuario"]);
            $vo->setEmpresa_id($r["empresa_id"]);
            $vo->setStatus($r["status"]);
            $vo->setIp($r["ip"]);
            $vo->setBanco($r["banco"]);
        }

        return $vo;
    }
    
    public function getByLogin($user,$senha) {
        $senha = md5($senha);
        $SQL = "SELECT * FROM usuario WHERE usuario = ? and senha = ?";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $user, PDO::PARAM_STR);
        $query->bindValue(2, $senha, PDO::PARAM_STR);
        $query->execute();

        $vo = new VO_Usuario_Inicial(null, null, null, null, null, null, null, null, null);

        while ($r = $query->fetch()) {
            $vo->setId($r["id"]);
            $vo->setEstacao($r["estacao"]);
            $vo->setNivel($r["nivel"]);
            $vo->setNome($r["nome"]);
            $vo->setSenha($r["senha"]);
            $vo->setUsuario($r["usuario"]);
            $vo->setEmpresa_id($r["empresa_id"]);
            $vo->setStatus($r["status"]);
            $vo->setIp($r["ip"]);
            $vo->setBanco($r["banco"]);
        }

        return $vo;
    }

}

?>