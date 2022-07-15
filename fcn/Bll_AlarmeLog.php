<?php
include(dirname(__FILE__) . '/../dao/Dao_AlarmeLog.php');

class Bll_Alarmelog {

    public function insert(VO_Alarmelog $vo) {
        $dao = new Dao_Alarmelog();
        return $dao->insert($vo);
    }

    public function update(VO_Alarmelog $vo) {
        $dao = new Dao_Alarmelog();
        return $dao->update($vo);
    }

    public function delete(VO_Alarmelog $vo) {
        $dao = new Dao_Alarmelog();
        return $dao->delete();
    }

    public function getAll() {
        $dao = new Dao_Alarmelog();
        return $dao->getAll();
    }

    public function getById($id) {
        $dao = new Dao_Alarmelog();
        return $dao->getById($id);
    }
     public function getBySucess($codigo) {
        $dao = new Dao_Alarmelog();
        return $dao->getBySucess($codigo);
    }
}
