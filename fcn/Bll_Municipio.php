<?PHP

include(dirname(__FILE__) . '/../dao/Dao_Municipio.php');

class Bll_Municipio {
        
        public function insert(VO_Municipio $vo) {
            $dao = new Dao_Municipio();                        
            return $dao->insert($vo);
        }

        public function update(VO_Municipio $vo) {
            //$vo->setSenha($vo->getSenha());
            $dao = new Dao_Municipio();
            return $dao->update($vo);
        }

        public function delete(VO_Municipio $vo) {
            $dao = new Dao_Municipio();
            return $dao->delete();
        }

        public function getAll() {
            $dao = new Dao_Municipio();
            return $dao->getAll();
        }

        public function getById($id) {
            $dao = new Dao_Municipio();
            return $dao->getById($id);
        }
}