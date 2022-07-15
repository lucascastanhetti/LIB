<?PHP

include(dirname(__FILE__) . '/../dao/Dao_Gambit.php');

class Bll_Gambit {

    public function insert(VO_Gambit $vo) {
        $dao = new Dao_Gambit();
        return $dao->insert($vo);
    }

    public function update(VO_Gambit $vo) {
        //$vo->setSenha($vo->getSenha());
        $dao = new Dao_Gambit();
        return $dao->update($vo);
    }

    public function delete(VO_Gambit $vo) {
        $dao = new Dao_Gambit();
        return $dao->delete();
    }

    public function getAll() {
        $dao = new Dao_Gambit();
        return $dao->getAll();
    }

    public function getById($id) {
        $dao = new Dao_Gambit();
        return $dao->getById($id);
    }

    public function getByInicialFinal($idOrigem, $idDestino) {
        $dao = new Dao_Gambit();
        return $dao->getByInicialFinal($idOrigem, $idDestino);
    }
    
    public function getAllByEmpresaStatus($empresa, $status) {
        $dao = new Dao_Gambit();
        return $dao->getAllByEmpresaStatus($empresa, $status);
    }
    
    public function getAllByDateStatus($dateIni, $dateEnd, $status) {
        $dao = new Dao_Gambit();
        return $dao->getAllByDateStatus($dateIni, $dateEnd, $status);
    }
    
    public function getAllByDateStatusEmpresa($dateIni, $dateEnd, $empresa, $status) {
        $dao = new Dao_Gambit();
        return $dao->getAllByDateStatusEmpresa($dateIni, $dateEnd, $empresa, $status);
    }

}
