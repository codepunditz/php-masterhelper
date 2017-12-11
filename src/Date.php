<?php

namespace CodePunditz\MasterHelper;

class Date
{

    /**
     * Return the Time elapsed in Twitter like format
     * @param string $date d-m-Y H:i:s
     * @param int $granularity Range 1 to 5.
     * Granularity 1: Weeks/Years
     * Granularity 2: Weeks/Days
     * Granularity 3: Hours
     * Granularity 4: Minutes
     * Granularity 5: Seconds
     * @author Team CodePunditz <codepunditz@gmail.com>
     * @return string
     */
    function time_elapsed($date = '', $granularity = 5)
    {
        $date = !empty($date) ? strtotime($date) : strtotime(date('d-m-Y H:i:s', time()));

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
        if ($difference > 0) {
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
        } else {
            $retval = 'just now';
        }
        return $retval;
    }

}
