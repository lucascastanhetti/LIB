<?PHP
include(dirname(__FILE__) . '/../dao/Dao_Empreendimento.php');

class Bll_Empreendimento {
        
        public function insert(VO_Empreendimento $vo) {
            $dao = new Dao_Empreendimento();                        
            return $dao->insert($vo);
        }

        public function update(VO_Empreendimento $vo) {
            //$vo->setSenha($vo->getSenha());
            $dao = new Dao_Empreendimento();
            return $dao->update($vo);
        }

        public function delete(VO_Empreendimento $vo) {
            $dao = new Dao_Empreendimento();
            return $dao->delete();
        }

        public function getAll() {
            $dao = new Dao_Empreendimento();
            return $dao->getAll();
        }

        public function getById($id) {
            $dao = new Dao_Empreendimento();
            return $dao->getById($id);
        }
}