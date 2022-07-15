<?php
    
/**
 * Description of BLL_Subbacia
 *
 * @author Overtech
 * @date 14/04/2020 13:34:24
 */
 
 include (dirname(__FILE__).'/../dao/Dao_Subbacia.php');
 
class  Bll_Subbacia {
        
        public function insert(VO_Subbacia $vo) {
            $dao = new Dao_Subbacia();
            return $dao->insert($vo);
        }

        public function update(VO_Subbacia $vo) {            
            $dao = new Dao_Subbacia();
            return $dao->update($vo);
        }

        public function delete($id_Subbacia) {
            $dao = new Dao_Subbacia();
            return $dao->delete($id_Subbacia);
        }

        public function getAll() {
             $dao = new Dao_Subbacia();
            return $dao->getAll();
        }

        public function getById($id) {
            $dao = new Dao_Subbacia();
            return $dao->getById($id);
        }
}
 ?>