<?php
namespace src;

class Aula {
    public function buscarTiposDaAula() {
        $valor = substr(file_get_contents("aula.js"), 20);
        $valor = json_decode($valor);
        $import = $valor->imports;
        $aulas = array('aulas' => array());
        
        foreach ($import as $import) {
            $num = substr(file_get_contents($import), 14, -1);
            $num = json_decode($num);
            $id = $num->id;
            $tipo = $num->tipo;
            var_dump($id, $tipo);
            echo "<br><br>";
            
            $aulas['aulas'][] = array(
                'id' => $id,
                'tipo' => $tipo
            );
        }
        
        $aulas = json_encode($aulas);
        $arquivo_json = 'aulas.json';
        file_put_contents($arquivo_json, $aulas);
    }
}
?>
