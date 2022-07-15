<?PHP
include(dirname(__FILE__) . '/../dao/Dao_Usuario_Inicial.php');

class Bll_Usuario_Inicial {

    public function insert(VO_Usuario_Inicial $vo) {
        $dao = new Dao_Usuario_Inicial();
        return $dao->insert($vo);
    }

    public function update(VO_Usuario_Inicial $vo) {
        //$vo->setSenha($vo->getSenha());
        $dao = new Dao_Usuario_Inicial();
        return $dao->update($vo);
    }

    public function delete(VO_Usuario_Inicial $vo) {
        $dao = new Dao_Usuario_Inicial();
        return $dao->delete();
    }

    public function getAll() {
        $dao = new Dao_Usuario_Inicial();
        return $dao->getAll();
    }

    public function getById($id) {
        $dao = new Dao_Usuario_Inicial();
        return $dao->getById($id);
    }

    public function getByLogin($user,$senha) {
        $dao = new Dao_Usuario_Inicial();
        return $dao->getByLogin($user,$senha);
    }
}
