<?PHP

include(dirname(__FILE__) . '/../dao/Dao_Aneellog.php');

class Bll_Aneellog {
        
        public function insert(VO_Aneellog $vo) {
            $dao = new Dao_Aneellog();                        
            return $dao->insert($vo);
        }

        public function update(VO_Aneellog $vo) {
            //$vo->setSenha($vo->getSenha());
            $dao = new Dao_Aneellog();
            return $dao->update($vo);
        }

        public function delete(VO_Aneellog $vo) {
            $dao = new Dao_Aneellog();
            return $dao->delete();
        }

        public function getAll() {
            $dao = new Dao_Aneellog();
            return $dao->getAll();
        }

        public function getById($id) {
            $dao = new Dao_Aneellog();
            return $dao->getById($id);
        }
        public function getByCodigo($codigo) {
            $dao = new Dao_Aneellog();
            return $dao->getByCodigo($codigo);
        }
        public function getByData($codigo,$data) {
            $dao = new Dao_Aneellog();
            return $dao->getByData($codigo,$data);
        }
        
}
