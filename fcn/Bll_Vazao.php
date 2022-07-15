<?PHP
include(dirname(__FILE__) . '/../dao/Dao_Vazao.php');
class Bll_Vazao {
        
        public function insert(VO_Vazao $vo) {
            $dao = new Dao_Vazao();                        
            return $dao->insert($vo);
        }

        public function update(VO_Vazao $vo) {
            //$vo->setSenha($vo->getSenha());
            $dao = new Dao_Vazao();
            return $dao->update($vo);
        }

        public function delete(VO_Vazao $vo) {
            $dao = new Dao_Vazao();
            return $dao->delete();
        }

        public function getAll() {
            $dao = new Dao_Vazao();
            return $dao->getAll();
        }

        public function getById($id) {
            $dao = new Dao_Vazao();
            return $dao->getById($id);
        }
        
        public function getByCurvaChave($id) {
            $dao = new Dao_Vazao();
            return $dao->getByCurvaChave($id);
        }
}