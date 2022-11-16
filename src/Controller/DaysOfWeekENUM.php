<?php

namespace App\Controller;

class DaysOfWeekENUM {
    const SUNDAY = 1;
    const MONDAY = 2;
    const TUESDAY = 3;
    const WEDNESDAY = 4;
    const THURDAY = 5;
    const FRIDAY = 6;
    const SATURDAY = 7;

    public static function findConstants($value = NULL) {
        $values = array(
            self::SUNDAY => "Domingo",
            self::MONDAY => "Segunda-feira",
            self::TUESDAY => "Terça-feira",
            self::WEDNESDAY => "Quarta-feira",
            self::THURDAY => "Quinta-feira",
            self::FRIDAY => "Sexta-feira",
            self::SATURDAY => "Sábado"
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
