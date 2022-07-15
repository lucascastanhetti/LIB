<?PHP

include(dirname(__FILE__) . '/../dao/Dao_Estacaotipo.php');

class Bll_Estacaotipo {

    public function insert(VO_Estacaotipo $vo) {
        $dao = new Dao_Estacaotipo();
        return $dao->insert($vo);
    }

    public function update(VO_Estacaotipo $vo) {
        //$vo->setSenha($vo->getSenha());
        $dao = new Dao_Estacaotipo();
        return $dao->update($vo);
    }

    public function delete(VO_Estacaotipo $vo) {
        $dao = new Dao_Estacaotipo();
        return $dao->delete();
    }

    public function getAll() {
        $dao = new Dao_Estacaotipo();
        return $dao->getAll();
    }

    public function getById($id) {
        $dao = new Dao_Estacaotipo();
        return $dao->getById($id);
    }

}
