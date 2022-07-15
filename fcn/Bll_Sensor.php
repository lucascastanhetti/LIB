<?PHP

include(dirname(__FILE__) . '/../dao/Dao_Sensor.php');

class Bll_Sensor {

    public function insert(VO_Sensor $vo) {
        $dao = new Dao_Sensor();
        return $dao->insert($vo);
    }

    public function update(VO_Sensor $vo) {
        $dao = new Dao_Sensor();
        return $dao->update($vo);
    }

    public function delete(VO_Sensor $vo) {
        $dao = new Dao_Sensor();
        return $dao->delete();
    }

    public function getAll() {
        $dao = new Dao_Sensor();
        return $dao->getAll();
    }

    public function getById($id) {
        $dao = new Dao_Sensor();
        return $dao->getById($id);
    }

    public function getRoundNivel($empresa) {
        $dao = new Dao_Sensor();
        return $dao->getRoundNivel($empresa);
    }
    
    public function hasSensor($estacaoId, $sensorNome) {
        $dao = new Dao_Sensor();
        return $dao->hasSensor($estacaoId, $sensorNome);
    }
}
