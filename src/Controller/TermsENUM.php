<?php

namespace App\Controller;

class TermsENUM {
    const CHECKED = 1;
    const UNCKECKED = 2;

    public static function findConstants($value = NULL) {
        $values = array(
            self::CHECKED => "Aceito",
            self::UNCKECKED => "Não aceito"
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
