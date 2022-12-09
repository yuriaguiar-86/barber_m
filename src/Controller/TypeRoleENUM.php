<?php

namespace App\Controller;

class TypeRoleENUM {
    const ADMIN = 1;
    const CLIENT = 2;
    const EMPLOYEE = 3;
    const OTHERS = 4;

    public static function findConstants($value = NULL) {
        $values = array(
            self::CLIENT => "Cliente",
            self::ADMIN => "Administrador",
            self::EMPLOYEE => "Funcionário",
            self::OTHERS => "Outros"
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
