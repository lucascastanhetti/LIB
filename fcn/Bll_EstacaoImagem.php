<?PHP

include(dirname(__FILE__) . '/../dao/Dao_EstacaoImagem.php');

class Bll_Estacaoimagem {

    public function insert(VO_Estacaoimagem $vo) {
        $dao = new Dao_Estacaoimagem();
        return $dao->insert($vo);
    }

    public function update(VO_Estacaoimagem $vo) {
        //$vo->setSenha($vo->getSenha());
        $dao = new Dao_Estacaoimagem();
        return $dao->update($vo);
    }

    public function delete(VO_Estacaoimagem $vo) {
        $dao = new Dao_Estacaoimagem();
        return $dao->delete($vo);
    }

    public function getAll() {
        $dao = new Dao_Estacaoimagem();
        return $dao->getAll();
    }

    public function getById($id) {
        $dao = new Dao_Estacaoimagem();
        return $dao->getById($id);
    }

    public function getByEstacaoId($id) {
        $dao = new Dao_Estacaoimagem();
        return $dao->getByEstacaoId($id);
    }

}
