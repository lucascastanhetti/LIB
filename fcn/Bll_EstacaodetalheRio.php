<?php
    
/**
 * Description of BLL_Estacaodetalhe
 *
 * @author Overtech
 * @date 17/04/2020 14:49:14
 */
 
 include (dirname(__FILE__).'/../dao/Dao_EstacaodetalheRio.php');
 
class  Bll_EstacaoDetalhe {
        
        public function insert(VO_Estacaodetalhe $vo) {
            $dao = new Dao_Estacaodetalhe();
            return $dao->insert($vo);
        }

        public function update(VO_Estacaodetalhe $vo) {            
            $dao = new Dao_Estacaodetalhe();
            return $dao->update($vo);
        }

        public function delete($id_Estacaodetalhe) {
            $dao = new Dao_Estacaodetalhe();
            return $dao->delete($id_Estacaodetalhe);
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
 ?>