<?php

include(dirname(__FILE__) . '/../dao/Dao_Alarme.php');

class Bll_Alarme {
    public function insert(VO_Alarme $vo) {
        $dao = new Dao_Alarme();
        return $dao->insert($vo);
    }

    public function update(VO_Alarme $vo) {
        //$vo->setSenha($vo->getSenha());
        $dao = new Dao_Alarme();
        return $dao->update($vo);
    }

    public function delete(VO_Alarme $vo) {
        $dao = new Dao_Alarme();
        return $dao->delete();
    }

    public function getAll() {
        $dao = new Dao_Alarme();
        return $dao->getAll();
    }
    
    public function getByEmpresaId($id) {
        $dao = new Dao_Alarme();
        return $dao->getByEmpresaId($id);
    }

    public function getById($id) {
        $dao = new Dao_Alarme();
        return $dao->getById($id);
    }

}
