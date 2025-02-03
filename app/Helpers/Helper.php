<?php

namespace App\Helpers;

class Helper
{
    function result($base_year): int
    {
        $current_year = (int) date('Y');
        $result = $current_year-$base_year;
        return $result;
    }
    function year($year): string
    {
        if($this->result($year) == 1){
            return " ".$this->result($year)." year";
        }else{
            return  " ".$this->result($year)." years";
        }
    }


}
