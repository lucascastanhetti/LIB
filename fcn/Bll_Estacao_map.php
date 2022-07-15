<?PHP
include(dirname(__FILE__) . '/../dao/Dao_Estacao_map.php');

class Bll_Estacao_map {
        
        public function getAll($estacao) {
            $dao = new Dao_Estacao_map();
            return $dao->getAll($estacao);
        }

        public function getById($id) {
            $dao = new Dao_Estacao_map();
            return $dao->getById($id);
        }
}