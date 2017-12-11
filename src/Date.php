<?php

namespace MasterHelper;

class Date
{

    /**
     * Time ago
     * @param string $date d-m-Y H:i:s
     * @param int $granularity Range 1 to 5
     * @return type
     */
    function time_ago($date, $granularity = 5)
    {
        $date = strtotime($date);
        $difference = time() - $date;
        $periods = array('decade' => 315360000,
            'year' => 31536000,
            'month' => 2628000,
            'week' => 604800,
            'day' => 86400,
            'hour' => 3600,
            'minute' => 60,
            'second' => 1);
        $retval = '';
        foreach ($periods as $key => $value) {
            if ($difference >= $value) {
                $time = floor($difference / $value);
                $difference %= $value;
                $retval .= ($retval ? ' ' : '') . $time . ' ';
                $retval .= (($time > 1) ? $key . 's' : $key);
                $granularity--;
            }
            if ($granularity == '0') {
                break;
            }
        }
        return ' posted ' . $retval . ' ago';
    }

}
