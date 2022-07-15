<?PHP

include(dirname(__FILE__) . '/../model/VO_Usuario.php');
include(dirname(__FILE__) . '/../fcn/Sql_Conect_Interno.php');

class Dao_Usuario extends Dao_ConnectionFactory {

    private $conn = null;
   
    public function __construct() {
        $this->conn = Dao_ConnectionFactory::createConn();
    }

    public function insert(VO_Usuario $vo) {

        $SQL = "INSERT INTO usuario(estacao,nivel,nome,senha,usuario,empresa_id,status,empresas)";
        $SQL .= " VALUES(?,?,?,?,?,?,?,?)";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getEstacao(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getNivel(), PDO::PARAM_INT);
        $query->bindValue(3, $vo->getNome(), PDO::PARAM_STR);
        $query->bindValue(4, $vo->getSenha(), PDO::PARAM_STR);
        $query->bindValue(5, $vo->getUsuario(), PDO::PARAM_STR);
        $query->bindValue(6, $vo->getEmpresa_id(), PDO::PARAM_INT);
        $query->bindValue(7, $vo->getStatus(), PDO::PARAM_INT);
        $query->bindValue(8, $vo->getEmpresas(), PDO::PARAM_STR);
        
        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id) {

        $SQL = "DELETE FROM usuario WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $id, PDO::PARAM_INT);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update(VO_Usuario $vo) {
        $SQL = "UPDATE usuario SET estacao = ?,nivel = ?,nome = ?,senha = ?,usuario = ?,empresa_id = ?,status = ?,empresas = ?";
        $SQL .= " WHERE id = ?";
        $query = $this->conn->prepare($SQL);
        $query->bindValue(1, $vo->getEstacao(), PDO::PARAM_STR);
        $query->bindValue(2, $vo->getNivel(), PDO::PARAM_INT);
        $query->bindValue(3, $vo->getNome(), PDO::PARAM_STR);
        $query->bindValue(4, $vo->getSenha(), PDO::PARAM_STR);
        $query->bindValue(5, $vo->getUsuario(), PDO::PARAM_STR);
        $query->bindValue(6, $vo->getEmpresa_id(), PDO::PARAM_INT);
        $query->bindValue(7, $vo->getStatus(), PDO::PARAM_INT);
        $query->bindValue(8, $vo->getEmpresas(), PDO::PARAM_STR);

        $query->bindValue(9, $vo->getId(), PDO::PARAM_INT );

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

        $vo = new VO_Usuario(null, null, null, null, null, null, null,null);

        while ($r = $query->fetch()) {
            $vo->setId($r["id"]);
            $vo->setEstacao($r["estacao"]);
            $vo->setNivel($r["nivel"]);
            $vo->setNome($r["nome"]);
            $vo->setSenha($r["senha"]);
            $vo->setUsuario($r["usuario"]);
            $vo->setEmpresa_id($r["empresa_id"]);
            $vo->setStatus($r["status"]);
            $vo->setEmpresas($r["empresas"]);
        }

        return $vo;
    }
    public function getByEmpresaId($id) {

        $SQL = "SELECT * FROM usuario WHERE empresa_id = ?";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll();
    }
    
    public function getByLogin($user,$senha) {
       
        $SQL = "SELECT * FROM usuario WHERE usuario = ? and senha = ?";

        $query = $this->conn->prepare($SQL);

        $query->bindValue(1, $user, PDO::PARAM_STR);
        $query->bindValue(2, $senha, PDO::PARAM_STR);
        $query->execute();

        $vo = new VO_Usuario(null, null, null, null, null, null, null, null);

        while ($r = $query->fetch()) {
            $vo->setId($r["id"]);
            $vo->setEstacao($r["estacao"]);
            $vo->setNivel($r["nivel"]);
            $vo->setNome($r["nome"]);
            $vo->setSenha($r["senha"]);
            $vo->setUsuario($r["usuario"]);
            $vo->setEmpresa_id($r["empresa_id"]);
            $vo->setStatus($r["status"]);
            $vo->setEmpresas($r["empresas"]);
        }

        return $vo;
    }

}

?>