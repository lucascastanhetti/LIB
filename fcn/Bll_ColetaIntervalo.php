<?php

include(dirname(__FILE__) . '/../dao/Dao_ColetaIntervalo.php');

class Bll_ColetaIntervalo {
        
        public function insert(VO_ColetaIntervalo $vo) {
            $dao = new Dao_ColetaIntervalo();                        
            return $dao->insert($vo);
        }

        public function update(VO_ColetaIntervalo $vo) {
            //$vo->setSenha($vo->getSenha());
            $dao = new Dao_ColetaIntervalo();
            return $dao->update($vo);
        }

            public function delete(VO_ColetaIntervalo $vo) {
            $dao = new Dao_ColetaIntervalo();
            return $dao->delete();
        }

        public function getAll() {
            $dao = new Dao_ColetaIntervalo();
            return $dao->getAll();
        }

        public function getById($id) {
            $dao = new Dao_ColetaIntervalo();
            return $dao->getById($id);
        }
}