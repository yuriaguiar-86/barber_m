<?php

namespace App\Controller;

class FinishedENUM {
    const PROGRESS = 1;
    const FINISHED = 2;
    const PENDING = 3;

    public static function findConstants($value = NULL) {
        $values = array(
            self::PROGRESS => "Em andamento",
            self::FINISHED => "Finalizado",
            self::PENDING => "Pendente"
        );

        if ($value != NULL) {
            if (is_numeric($value))
                return isset($values[$value]) ? $values[$value] : NULL;
            else
                return array_search($value, $values);
        } else {
            foreach ($values as $id => $cVal) {
                $ret[$id] = $cVal;
            }
            return $ret;
        }
    }
}

?>
