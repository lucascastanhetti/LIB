<?php
    
/**
 * Description of BLL_Bacia
 *
 * @author Overtech
 * @date 14/04/2020 13:34:52
 */
 
 include (dirname(__FILE__).'/../dao/Dao_Bacia.php');
 
class  Bll_Bacia {
        
        public function insert(VO_Bacia $vo) {
            $dao = new Dao_Bacia();
            return $dao->insert($vo);
        }

        public function update(VO_Bacia $vo) {            
            $dao = new Dao_Bacia();
            return $dao->update($vo);
        }

        public function delete($id_Bacia) {
            $dao = new Dao_Bacia();
            return $dao->delete($id_Bacia);
        }

        public function getAll() {
             $dao = new Dao_Bacia();
            return $dao->getAll();
        }

        public function getById($id) {
            $dao = new Dao_Bacia();
            return $dao->getById($id);
        }
}
 ?>