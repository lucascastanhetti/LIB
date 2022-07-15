<?PHP
include(dirname(__FILE__) . '/../dao/Dao_Leiturista.php');
class Bll_Leiturista {
        
        public function insert(VO_Leiturista $vo) {
            $dao = new Dao_Leiturista();                        
            return $dao->insert($vo);
        }

        public function update(VO_Leiturista $vo) {
            //$vo->setSenha($vo->getSenha());
            $dao = new Dao_Leiturista();
            return $dao->update($vo);
        }

        public function delete(VO_Leiturista $vo) {
            $dao = new Dao_Leiturista();
            return $dao->delete();
        }

        public function getAll() {
            $dao = new Dao_Leiturista();
            return $dao->getAll();
        }

        public function getById($id) {
            $dao = new Dao_Leiturista();
            return $dao->getById($id);
        }
        
        public function getByEstacao($id) {
            $dao = new Dao_Leiturista();
            return $dao->getByEstacao($id);
        }
}