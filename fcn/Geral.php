<?php

class Geral {

    public function uploadSimples($imagem, $local) {

        $diretorio = "../uploads/";
        $diretoriosmall = "../uploads/small/";

        $novonome = $diretorio . $local . '_' . date('Hmsu') . '-' . $imagem['name'];
        $novonomesmall = $diretoriosmall . $local . '_' . date('Hmsu') . '_small_' . $imagem['name'];

        if (move_uploaded_file($imagem['tmp_name'], $novonome)) {


            $image = WideImage::load($novonome);
            $resized = $image->resize(160, 120);
            $resized->saveToFile($novonomesmall);
        }
        return array($novonome, $novonomesmall);
    }

    public function uploadRezise($imagem, $local, $altura, $largura) {

        $diretorio = "../uploads/";
        $diretoriosmall = "../uploads/small/";

        $novonome = $diretorio . $local . '_' . date('Hmsu') . '-' . $imagem['name'];
        $novonomesmall = $diretoriosmall . $local . '_' . date('Hmsu') . '_small_' . $imagem['name'];

        if (move_uploaded_file($imagem['tmp_name'], $novonome)) {

            $image = WideImage::load($novonome);
            $resized = $image->resize(80, 60);
            $resized->saveToFile($novonomesmall);



            $imagee = WideImage::load($novonome);
            $resizedd = $imagee->resize($altura, $largura, 'inside', 'down');
            $resizedd->saveToFile($novonome);

            $imageee = WideImage::load($novonome);
            $white = $imageee->allocateColor(255, 255, 255);
            $resizeddd = $imageee->resizeCanvas($altura, $largura, 'center', 'center', $white);
            $resizeddd->saveToFile($novonome);
        }
        return array($novonome, $novonomesmall);
    }

    public function redireciona($pagina) {
        echo "<script>";
        echo "window.location.href='" . $pagina . "';";
        echo "</script>";
    }

    public function logout() {
        //session_destroy();
    }

    public function validaEmpresa($userEmpresa, $idEmpresa) {
        $userEmpresa = explode(',', $userEmpresa);
        $j = count($userEmpresa);
        for ($i = 0; $i < $j; $i++) {
            if ($userEmpresa[$i] == $idEmpresa) {
                return true;
            }
        }
        return false;
    }

    public function buscaGrupoPai($lsGrupo) {

        $ls_return;
        foreach ($lsGrupo as $grupos) {
            if ($grupos == null) {
                continue;
            }
            $grupo = new VO_Grupo();
            $grupo = $grupos;
            if ($grupo->getGrupopai_id() == '') {
                @$ls_return[$i] = $grupo;
                @$i++;
            } else {
                continue;
            }
        }
        return $ls_return;
    }

    public function buscaGrupoFilho($lsGrupo, $idgrupo) {

        $ls_return;
        $i = 1;
        foreach ($lsGrupo as $grupos) {
            if ($grupos == null) {
                continue;
            }
            $grupo = new VO_Grupo();
            $grupo = $grupos;
            if ($grupo->getGrupopai_id() == $idgrupo) {
                @$ls_return[$i] = $grupo;
                @$i++;
            } else {
                continue;
            }
        }
        return @$ls_return;
    }

    //function to encrypt the string
    function encode($str) {
        for ($i = 0; $i < 5; $i++) {
            $str = strrev(base64_encode($str)); //apply base64 first and then reverse the string
        }
        return $str;
    }

    //function to decrypt the string
    function decode($str) {
        for ($i = 0; $i < 5; $i++) {
            $str = base64_decode(strrev($str)); //apply base64 first and then reverse the string}
        }
        return $str;
    }

    //função para arrumar as URLS amigaveis
    public static function formatURL($str) {
        //Remove acentos
        $str = Geral::removeAcentos($str);
        //Maiusculas para minusculas
        $str = strtolower($str);
        //Muda espaço para -
        $str = preg_replace('/\s+/', '-', $str);
        return $str;
    }

    //String a ser formatada, caracter a ser utilizado na 
    public static function removeAcentos($texto) {
        $array1 = array("á", "à", "â", "ã", "ä", "é", "è", "ê", "ë", "í", "ì", "î", "ï", "ó", "ò", "ô", "õ", "ö", "ú", "ù", "û", "ü", "ç"
            , "Á", "À", "Â", "Ã", "Ä", "É", "È", "Ê", "Ë", "Í", "Ì", "Î", "Ï", "Ó", "Ò", "Ô", "Õ", "Ö", "Ú", "Ù", "Û", "Ü", "Ç");
        $array2 = array("a", "a", "a", "a", "a", "e", "e", "e", "e", "i", "i", "i", "i", "o", "o", "o", "o", "o", "u", "u", "u", "u", "c"
            , "A", "A", "A", "A", "A", "E", "E", "E", "E", "I", "I", "I", "I", "O", "O", "O", "O", "O", "U", "U", "U", "U", "C");
        return str_replace($array1, $array2, $texto);
    }

    function formata_data_br($data) {
        $data = explode('-', $data);
        $data = $data[2] . '/' . $data[1] . '/' . $data[0];
        return $data;
    }

    function formata_data_Ms($data) {
        $data = explode('/', $data);
        $data = $data[2] . '-' . $data[1] . '-' . $data[0];
        return $data;
    }

    function formata_data_shora_br($data) {
        $dt = explode(' ', $data);
        $data = explode('-', $dt[0]);
        $data = $data[2] . '/' . $data[1] . '/' . $data[0];
        return $data;
    }

    function formata_data_hora_br($data) {
        $dt = explode(' ', $data);
        $data = explode('-', $dt[0]);
        $data = $data[2] . '/' . $data[1] . '/' . $data[0];
        return $data . ' ' . $dt[1];
    }

    function startsWith($haystack, $needle) {
        return $needle === "" || strpos($haystack, $needle) === 0;
    }

    function endsWith($haystack, $needle) {
        return $needle === "" || substr($haystack, -strlen($needle)) === $needle;
    }

    function validaDia($data) {
        $hoje = Geral::converter(date("Y-m-d H:i:s"));
        $data = Geral::converter($data);
        $intervalo = $hoje - $data;

        //Se maior que 24 horas, retorna true.                
        if ($intervalo > 86400) {
            return FALSE;
        }
        return TRUE;
    }

    // comverte a hora em milisegundos
    function converter($datahora) {
        @list($data, $hora) = explode(' ', $datahora);
        @list($ano, $mes, $dia) = explode('-', $data);
        @list($hora, $minuto, $segundo) = explode(':', $hora);
        @$timestamp = mktime((int) $hora, (int) $minuto, (int) $segundo, (int) $mes, (int) $dia, (int) $ano);
        return $timestamp;
    }

    function testaPrimeiaHora($datahora) {
        list($data, $horas) = explode(' ', $datahora);
        list($hora, $minuto, $segundo) = explode(':', $horas);
        if (($hora !== 00) and ( $minuto !== 00)) {
            $retorno = $data . " 00:00:00";
        } else {
            $retorno = $datahora;
        }
        return $retorno;
    }

    function validaHora($data) {
        $hoje = Geral::converter(date("Y-m-d H:i:s"));
        $data = Geral::converter($data);
        $intervalo = $hoje - $data;
        //Se maior que 6 horas, retorna true.
        if ($intervalo > 21600) {
            return TRUE;
        }
        return FALSE;
    }

    function insertUserInicial(VO_Usuario $vo) {
        $db = pg_connect("host=192.168.0.100 dbname=smatd.frontend port=5432 user=postgres password=1234");
        $server = $_SESSION['ip'];
        $dbName = $_SESSION['banco'];
        $insert = ("insert into usuario (estacao,nome,usuario,senha,nivel,empresa_id,status,ip,banco) values ('" . $vo->getEstacao() . "','" . $vo->getNome() . "','" . $vo->getUsuario() . "','" . $vo->getSenha() . "','" . $vo->getNivel() . "', '" . $vo->getEmpresa_id() . "','" . $vo->getStatus() . "','" . $server . "','" . $dbName . "')");

        //echo $insert;
        $teste = pg_query($insert);
        pg_close($db);
        return(@$teste);
    }

    function dellUserInicial($id) {
        $db = pg_connect("host=192.168.0.100 dbname=smatd.frontend port=5432 user=postgres password=1234");
        $insert = ("DELETE FROM usuario WHERE id = " . $id);

        //echo $insert;
        $teste = pg_query($insert);
        pg_close($db);
        return($insert);
    }

    function updateUserInicial(VO_Usuario $vo, $id) {
        $db = pg_connect("host=192.168.0.100 dbname=smatd.frontend port=5432 user=postgres password=1234");
        $server = $_SESSION['ip'];
        $dbName = $_SESSION['banco'];
        $insert = ("UPDATE usuario SET estacao = '" . $vo->getEstacao() . "',nivel = " . $vo->getNivel() . ",nome = '" . $vo->getNome() . "',senha = '" . $vo->getSenha() . "',usuario = '" . $vo->getUsuario() . "',empresa_id = " . $vo->getEmpresa_id() . ",status = " . $vo->getStatus() . ",ip = '" . $server . "',banco = '" . $dbName . "'   WHERE id = " . $id);


        //echo $insert;
        $teste = pg_query($insert);

        pg_close($db);
        return($insert);
    }

    function getUserInicial(VO_Usuario $vo) {
        $db = pg_connect("host=192.168.0.100 dbname=smatd.frontend port=5432 user=postgres password=1234");
        $select = ("SELECT * FROM usuario WHERE usuario = '" . $vo->getUsuario() . "'and senha = '" . $vo->getSenha() . "'and empresa_id = '" . $vo->getEmpresa_id() . "'");
        //echo $insert;
        $query_select = pg_query($select);
        $userinicial = pg_fetch_array($query_select);
        pg_close($db);
        return($userinicial['id']);
    }

    //Avalia o status de acordo com o horario da ultima transmissão
    public function getStatusByDate($dataTransmissao) {
        $dataAtual = new DateTime();
        $dataParada = $dataAtual->sub(new DateInterval('P1D'));
        $dataSuspeita = $dataAtual->sub(new DateInterval('PT12H'));

        if ($dataTransmissao > $dataSuspeita) {
            return "img/icons/status/atualizado.png";
        }
        if (($dataTransmissao < $dataSuspeita) AND ( $dataTransmissao > $dataParada)) {
            return "img/icons/status/atrasado.png";
        }
        if ($dataTransmissao < $dataParada) {
            return "img/icons/status/parada.png";
        }
    }

    public function formatDateTime($data, $format) {
        return $data->format($format);
    }

    public function createTD($ls_dados, $horario, $sensor, $estacao) {
        $achouHorario = false;
        foreach ($ls_dados as $d) {
            if ($d == null) {
                continue;
            }
            $dado = new VO_dadoUnitario();
            $dado = $d;

            if ($dado->getEstacaoNome() === $estacao) {
                if ($dado->getHorario() === $horario) {
                    $achouHorario = true;
                    if ($sensor === "ChuvaIntervalo") {
                        if ($dado->getChuvaIntevalo() === '') {
                            return "<td>-</td>";
                        } else {
                            return '<td>' . $dado->getChuvaIntevalo() . ' mm</td>';
                        }
                    } else if ($sensor === "ChuvaHoraria") {
                        if ($dado->getChuvaHoraria() === '') {
                            return "<td>-</td>";
                        } else {
                            return '<td>' . $dado->getChuvaHoraria() . ' mm</td>';
                        }
                    } else if ($sensor === "ChuvaDiaria") {
                        if ($dado->getChuvaDiaria() === '') {
                            return "<td>-</td>";
                        } else {
                            return '<td>' . $dado->getChuvaDiaria() . ' mm</td>';
                        }
                    } else if ($sensor === "Nivel") {
                        if ($dado->getNivel() === '') {
                            return "<td>-</td>";
                        } else {
                            return '<td>' . $dado->getNivel() . ' m</td>';
                        }
                    } else if ($sensor === "Vazao") {
                        if ($dado->getVazao() === '') {
                            return "<td>-</td>";
                        } else {
                            return '<td>' . $dado->getVazao() . ' m³/s</td>';
                        }
                    }
                }
            }
        }
        if (!$achouHorario) {
            return "<td>-</td>";
        }
    }

    function floatToMinute($num) {
        $num = number_format($num, 2);
        $num_temp = explode('.', $num);
        $num_temp[1] = $num - (number_format($num_temp[0], 2));
        $saida = number_format(((($num_temp[1]) * 60 / 100) + $num_temp[0]), 2);
        $saida = strtr($saida, '.', ':');
        return $saida;
    }

    function convertToHoursMins($time, $format = '%02d:%02d') {
        if ($time < 1) {
            return;
        }
        $hours = floor($time / 60);
        $minutes = ($time % 60);
        return sprintf($format, $hours, $minutes);
    }

    function printToConsole($message) {
        echo "<script>";
        echo 'console.log("' . $message . '")';
        echo "</script>";
    }

    public function logRound($sensor, $estacao, $roundANT, $roundNV, $usuario, $nome_USER, $empresa) {
        $db = pg_connect("host=192.168.0.104 dbname=over.LOG port=5432 user=postgres password=1234");
        try {
            $SQL = "INSERT INTO alteraround(sensor_id,estacao_id,round_antigo,round_nova,data,usuario_id,nome_usuario,origem, empresa_sigla)";
            $SQL .= " VALUES(" . $sensor . "," . $estacao . "," . $roundANT . "," . $roundNV . ",'" . date("Y-m-d H:i:s") . "'," . $usuario . ",'" . $nome_USER . "','Interno',' ".$empresa." ' );";
            //return $SQL;
            $teste = pg_query($SQL);
            pg_close($db);
            return('ok');
        } catch (Exception $exc) {
            return$exc;
        }
    }

    public function countRound($sensor,  $empresa) {
        $db = pg_connect("host=192.168.0.104 dbname=over.LOG port=5432 user=postgres password=1234");
        try {
            $SQL = "select data,(select   COUNT(*) from alteraround where sensor_id = " . $sensor . " and empresa_sigla ilike  '%".$empresa."%' ) AS \"COF\" from alteraround where sensor_id = " . $sensor . "  and empresa_sigla ilike '%".$empresa."%' order by data desc limit 1";

            @$query_select = pg_query($SQL);
            @$round = pg_fetch_array($query_select);
            pg_close($db);
            $array[1] = $round['data'];
            $array[2] = $round['COF'];
            return($array);
        } catch (Exception $exc) {
            return$exc;
        }
    }

    public function listRound($sensor, $empresa) {
        $db = pg_connect("host=192.168.0.104 dbname=over.LOG port=5432 user=postgres password=1234");
        try {
            $SQL = "select * from alteraround where sensor_id  =". $sensor . " and empresa_sigla ilike '%".$empresa."%' order by data desc";

            @$query_select = pg_query($SQL);

            while (@$row = pg_fetch_array( @$query_select)) {
                //print_r($row);
                
               @$html .= '<div class="teste"><p>Data: &nbsp'.date("d-m-Y H:i:s",strtotime( $row["data"])).'</p>&nbsp&nbsp <p>Round Antigo: '. $row['round_antigo'].'</p>&nbsp&nbsp <p>Round Novo: '.$row['round_nova'].'</p> &nbsp&nbsp <p>Usuario: '.$row['nome_usuario'].'</p></div>'; 

            }



            return(@$html);
        } catch (Exception $exc) {
            return$exc;
        }
    }
    public function getColaborador($idcolaborador) {
        $db = pg_connect("host=192.168.0.100 dbname=smatd.frontend port=5432 user=postgres password=1234");
        try {
            $SQL = ("SELECT * FROM colaborador where id = ".$idcolaborador);

            @$query_select = pg_query($SQL);

            while (@$row = pg_fetch_array( @$query_select)) {
                //print_r($row);
                
               @$html .= $row["nome"]; 

            }



            return(@$html);
        } catch (Exception $exc) {
            return$exc;
        }
    }
    
    public function logMsg($msg, $level = 'info', $file = 'cofema.log') {
        // variável que vai armazenar o nível do log (INFO, WARNING ou ERROR)
        $levelStr = '';

        // verifica o nível do log
        switch ($level) {
            case 'info':
                // nível de informação
                $levelStr = 'INFO';
                break;

            case 'warning':
                // nível de aviso
                $levelStr = 'WARNING';
                break;

            case 'error':
                // nível de erro
                $levelStr = 'ERROR';
                break;
        }

        // data atual
        $date = date('Y-m-d H:i:s');

        // formata a mensagem do log
        // 1o: data atual
        // 2o: nível da mensagem (INFO, WARNING ou ERROR)
        // 3o: a mensagem propriamente dita
        // 4o: uma quebra de linha
        $msg = sprintf("[%s] [%s]: %s%s", $date, $levelStr, $msg, PHP_EOL);

        // escreve o log no arquivo
        // é necessário usar FILE_APPEND para que a mensagem seja escrita no final do arquivo, preservando o conteúdo antigo do arquivo
        file_put_contents($file, $msg, FILE_APPEND);
    }

}

?>