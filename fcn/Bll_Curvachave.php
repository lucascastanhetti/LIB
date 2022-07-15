<?PHP
include(dirname(__FILE__) . '/../dao/Dao_Curvachave.php');
class Bll_Curvachave {
        
        public function insert(VO_Curvachave $vo) {
            $dao = new Dao_Curvachave();                        
            return $dao->insert($vo);
        }

        public function update(VO_Curvachave $vo) {
            //$vo->setSenha($vo->getSenha());
            $dao = new Dao_Curvachave();
            return $dao->update($vo);
        }

        public function delete(VO_Curvachave $vo) {
            $dao = new Dao_Curvachave();
            return $dao->delete();
        }

        public function getAll() {
            $dao = new Dao_Curvachave();
            return $dao->getAll();
        }

        public function getById($id) {
            $dao = new Dao_Curvachave();
            return $dao->getById($id);
        }
        public function getByEstacaoId($id) {
            $dao = new Dao_Curvachave();
            return $dao->getByEstacaoId($id);
        }
        public function updateImg($url,$id) {
            $dao = new Dao_Curvachave();
            return $dao->updateImg($url,$id);
        }
}