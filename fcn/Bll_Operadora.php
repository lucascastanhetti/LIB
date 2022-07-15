<?PHP

include(dirname(__FILE__) . '/../dao/Dao_Operadora.php');

class Bll_Operadora {
        
        public function insert(VO_Operadora $vo) {
            $dao = new Dao_Operadora();                        
            return $dao->insert($vo);
        }

        public function update(VO_Operadora $vo) {
            //$vo->setSenha($vo->getSenha());
            $dao = new Dao_Operadora();
            return $dao->update($vo);
        }

        public function delete(VO_Operadora $vo) {
            $dao = new Dao_Operadora();
            return $dao->delete();
        }

        public function getAll() {
            $dao = new Dao_Operadora();
            return $dao->getAll();
        }

        public function getById($id) {
            $dao = new Dao_Operadora();
            return $dao->getById($id);
        }
}
