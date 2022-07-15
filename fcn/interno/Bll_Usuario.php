<?PHP
include(dirname(__FILE__) . '/../../dao/interno/Dao_Usuario.php');

class Bll_Usuario {

    public function insert(VO_Usuario $vo) {
        $dao = new Dao_Usuario();
        return $dao->insert($vo);
    }

    public function update(VO_Usuario $vo) {
        //$vo->setSenha($vo->getSenha());
        $dao = new Dao_Usuario();
        return $dao->update($vo);
    }

    public function delete(VO_Usuario $vo) {
        $dao = new Dao_Usuario();
        return $dao->delete();
    }

    public function getAll() {
        $dao = new Dao_Usuario();
        return $dao->getAll();
    }

    public function getById($id) {
        $dao = new Dao_Usuario();
        return $dao->getById($id);
    }

    public function getByLogin($user,$senha) {
        $dao = new Dao_Usuario();
        return $dao->getByLogin($user,$senha);
    }
}
