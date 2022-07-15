<?php
    
/**
 * Description of BLL_Rio
 *
 * @author Overtech
 * @date 14/04/2020 13:33:40
 */
 
 include (dirname(__FILE__).'/../dao/Dao_Rio.php');
 
class  Bll_Rio {
        
        public function insert(VO_Rio $vo) {
            $dao = new Dao_Rio();
            return $dao->insert($vo);
        }

        public function update(VO_Rio $vo) {            
            $dao = new Dao_Rio();
            return $dao->update($vo);
        }

        public function delete($id_Rio) {
            $dao = new Dao_Rio();
            return $dao->delete($id_Rio);
        }

        public function getAll() {
             $dao = new Dao_Rio();
            return $dao->getAll();
        }

        public function getById($id) {
            $dao = new Dao_Rio();
            return $dao->getById($id);
        }
}
 ?>