<?PHP

include(dirname(__FILE__) . '/../dao/Dao_Dadosexibicao.php');

class Bll_Dadosexibicao {

    public function insert(VO_Dadosexibicao $vo) {
        $dao = new Dao_Dadosexibicao();
        return $dao->insert($vo);
    }

    public function update(VO_Dadosexibicao $vo) {
        //$vo->setSenha($vo->getSenha());
        $dao = new Dao_Dadosexibicao();
        return $dao->update($vo);
    }

    public function delete(VO_Dadosexibicao $vo) {
        $dao = new Dao_Dadosexibicao();
        return $dao->delete();
    }

    public function getAll() {
        $dao = new Dao_Dadosexibicao();
        return $dao->getAll();
    }

    public function getById($id) {
        $dao = new Dao_Dadosexibicao();
        return $dao->getById($id);
    }

    public function getByUltima($id) {
        $dao = new Dao_Dadosexibicao();
        return $dao->getByUltima($id);
    }
    
    public function getByUltimaSensor($id,$sensor) {
        $dao = new Dao_Dadosexibicao();
        return $dao->getByUltimaSensor($id,$sensor);
    }

    public function getByDadosGeracao($ids,$data) {
        $dao = new Dao_Dadosexibicao();
        return $dao->getByDadosGeracao($ids,$data);
    }

    public function getByGeracao($id,$sensor) {
        $dao = new Dao_Dadosexibicao();
        return $dao->getByGeracao($id,$sensor);
    }
    
    public function getByUltimaDetalhada($id, $estacaoNome) {
        $dao = new Dao_Dadosexibicao();
        return $dao->getByUltimaDetalhada($id, $estacaoNome);
    }

    public function getByChuvaHoraria($id) {
        $dao = new Dao_Dadosexibicao();
        return $dao->getByChuvaHoraria($id);
    }

    public function getByChuvaDiaria($id) {
        $dao = new Dao_Dadosexibicao();
        return $dao->getByChuvaDiaria($id);
    }

    public function getByDia($id, $data) {
        $dao = new Dao_Dadosexibicao();
        return $dao->getByDia($id, $data);
    }

    public function getByPeriod($id, $dataIni, $dataEnd, $tipo) {
        $dao = new Dao_Dadosexibicao();
        return $dao->getByPeriod($id, $dataIni, $dataEnd, $tipo);
    }

    public function getByPeriodSensor($ids, $dataIni, $dataEnd, $tipo, $sensor) {
        $dao = new Dao_Dadosexibicao();
        return $dao->getByPeriodSensor($ids, $dataIni, $dataEnd, $tipo, $sensor);
    }
    
    public function getByPeriodAverage($id, $dataIni, $dataEnd, $sensor) {
        $dao = new Dao_Dadosexibicao();
        return $dao->getByPeriodAverage($id, $dataIni, $dataEnd, $sensor);
    }
    
    public function getByPeriodChuva($idSensor, $dataIni, $dataEnd) {
        $dao = new Dao_Dadosexibicao();
        return $dao->getByPeriodChuva($idSensor, $dataIni, $dataEnd);
    }
     

    public function getCount($id) {
        $dao = new Dao_Dadosexibicao();
        return $dao->getCount($id);
    }

    public function getLastDate($id) {
        $dao = new Dao_Dadosexibicao();
        return $dao->getLastDate($id);
    }
    
    public function getLastRain() {
        $dao = new Dao_Dadosexibicao();
        return $dao->getLastRain();
    }

    public function getChuvaSuspeita($id) {
        $dao = new Dao_Dadosexibicao();
        return $dao->getChuvaSuspeita($id);
    }

    public function getNivelSuspeito($id) {
        $dao = new Dao_Dadosexibicao();
        return $dao->getNivelSuspeito($id);
    }
    
    public function getLastEvent($sensor, $dataIni, $dataEnd, $empresa) {
        $dao = new Dao_Dadosexibicao();
        return $dao->getLastEvent($sensor, $dataIni, $dataEnd, $empresa);
    }
    public function getSum($sensor, $dataIni, $dataEnd, $empresa) {
        $dao = new Dao_Dadosexibicao();
        return $dao->getSum($sensor, $dataIni, $dataEnd, $empresa);
    }
    public function getByCurvaPermanencia($id) {
        $dao = new Dao_Dadosexibicao();
        return $dao->getByCurvaPermanencia($id);
    }
    
    public function getByUltimaEstacaoSensor($id_estacao,$id_sensor) {
        $dao = new Dao_Dadosexibicao();
        return $dao->getByUltimaEstacaoSensor($id_estacao,$id_sensor);
    }
}
