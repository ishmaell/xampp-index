<?php

class Library{

    public function textTrunc($string, $limit, $more='') {
        $break = ' ';
        $break .= '-';
        $break .= '_';
        
        $replace = '...';
        $stringLength = strlen($string);
        if($stringLength <= $limit) {
            return $string;
        }
        $breakPoint = strpos($string, $break, $limit);
        if($breakPoint == true) {
            if($breakPoint < $stringLength - 1) {
                $string = substr($string, 0, $breakPoint) . ' ' . $replace;
            }
        }
        return $string . $more;
    }

}

?>