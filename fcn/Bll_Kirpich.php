<?PHP

include(dirname(__FILE__) . '/../dao/Dao_Kirpich.php');

class Bll_Kirpich {

    public function insert(VO_Kirpich $vo) {
        $dao = new Dao_Kirpich();
        return $dao->insert($vo);
    }

    public function update(VO_Kirpich $vo) {
        $dao = new Dao_Kirpich();
        return $dao->update($vo);
    }

    public function delete(VO_Kirpich $vo) {
        $dao = new Dao_Kirpich();
        return $dao->delete();
    }

    public function getAll() {
        $dao = new Dao_Kirpich();
        return $dao->getAll();
    }

    public function getById($id) {
        $dao = new Dao_Kirpich();
        return $dao->getById($id);
    }

    public function getByInicial($id) {
        $dao = new Dao_Kirpich();
        return $dao->getByInicial($id);
    }
    
    public function getByInicialFinal($idOrigem, $idDestino) {
        $dao = new Dao_Kirpich();
        return $dao->getByInicialFinal($idOrigem, $idDestino);
    }

    public function getAllArray() {
        $dao = new Dao_Kirpich();
        return $dao->getAllArray();
    }

}
