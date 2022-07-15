<?PHP
include(dirname(__FILE__) . '/../dao/Dao_EstacaoDetalhe.php');

class Bll_EstacaoDetalhe {
        
        public function insert(VO_Estacaodetalhe $vo) {
            $dao = new Dao_Estacaodetalhe();                        
            return $dao->insert($vo);
        }

        public function update(VO_Estacaodetalhe $vo) {
            $dao = new Dao_Estacaodetalhe();
            return $dao->update($vo);
        }

        public function delete(VO_Estacaodetalhe $vo) {
            $dao = new Dao_Estacaodetalhe();
            return $dao->delete();
        }

        public function getAll() {
            $dao = new Dao_Estacaodetalhe();
            return $dao->getAll();
        }

        public function getById($id) {
            $dao = new Dao_Estacaodetalhe();
            return $dao->getById($id);
        }
}