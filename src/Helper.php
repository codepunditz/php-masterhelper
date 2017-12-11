<?php

namespace CodePunditz\MasterHelper;

use CodePunditz\MasterHelper\String;
use CodePunditz\MasterHelper\Date;

class Helper
{

    public $string;
    public $date;

    public function __construct()
    {
        $this->date = new Date();
        $this->string = new String();
    }

}
