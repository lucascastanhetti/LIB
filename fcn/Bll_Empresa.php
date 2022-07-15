<?PHP
include(dirname(__FILE__) . '/../dao/Dao_Empresa.php');

class Bll_Empresa {
        
        public function insert(VO_Empresa $vo) {
            $dao = new Dao_Empresa();                        
            return $dao->insert($vo);
        }

        public function update(VO_Empresa $vo) {
            //$vo->setSenha($vo->getSenha());
            $dao = new Dao_Empresa();
            return $dao->update($vo);
        }

        public function delete(VO_Empresa $vo) {
            $dao = new Dao_Empresa();
            return $dao->delete();
        }

        public function getAll() {
            $dao = new Dao_Empresa();
            return $dao->getAll();
        }

        public function getById($id) {
            $dao = new Dao_Empresa();
            return $dao->getById($id);
        }
}