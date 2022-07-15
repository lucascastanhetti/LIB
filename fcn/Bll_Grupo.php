<?PHP

include(dirname(__FILE__) . '/../dao/Dao_Grupo.php');

class Bll_Grupo {

    public function insert(VO_Grupo $vo) {
        $dao = new Dao_Grupo();
        return $dao->insert($vo);
    }

    public function update(VO_Grupo $vo) {
        //$vo->setSenha($vo->getSenha());
        $dao = new Dao_Grupo();
        return $dao->update($vo);
    }

    public function delete(VO_Grupo $vo) {
        $dao = new Dao_Grupo();
        return $dao->delete();
    }

    public function getAll($empresas) {
        $dao = new Dao_Grupo();
        return $dao->getAll(@$empresas);
    }

    public function getById($id) {
        $dao = new Dao_Grupo();
        return $dao->getById($id);
    }

}
