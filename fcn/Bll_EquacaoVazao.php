<?PHP

include(dirname(__FILE__) . '/../dao/Dao_EquacaoVazao.php');

class Bll_Equacaovazao {

    public function insert(VO_Equacaovazao $vo) {
        $dao = new Dao_Equacaovazao();
        return $dao->insert($vo);
    }

    public function update(VO_Equacaovazao $vo) {
        $dao = new Dao_Equacaovazao();
        return $dao->update($vo);
    }

    public function delete(VO_Equacaovazao $vo) {
        $dao = new Dao_Equacaovazao();
        return $dao->delete();
    }

    public function getAll() {
        $dao = new Dao_Equacaovazao();
        return $dao->getAll();
    }

    public function getById($id) {
        $dao = new Dao_Equacaovazao();
        return $dao->getById($id);
    }
    
    public function getByCurvaChave($id) {
        $dao = new Dao_Equacaovazao();
        return $dao->getByCurvaChave($id);
    }

}
