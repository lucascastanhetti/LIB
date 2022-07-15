<?PHP
include(dirname(__FILE__) . '/../dao/Dao_Estacao.php');

class Bll_Estacao {
        
        public function insert(VO_Estacao $vo) {
            $dao = new Dao_Estacao();                        
            return $dao->insert($vo);
        }

        public function update(VO_Estacao $vo) {
            //$vo->setSenha($vo->getSenha());
            $dao = new Dao_Estacao();
            return $dao->update($vo);
        }

        public function delete(VO_Estacao $vo) {
            $dao = new Dao_Estacao();
            return $dao->delete();
        }

        public function getAll($empresa) {
            $dao = new Dao_Estacao();
            return $dao->getAll($empresa);
        }

        public function getById($id) {
            $dao = new Dao_Estacao();
            return $dao->getById($id);
        }
	public function getByCodigo($cod) {
            $dao = new Dao_Estacao();
            return $dao->getByCodigo($cod);
        }
}