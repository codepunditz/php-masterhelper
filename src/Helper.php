<?php

namespace MasterHelper;

use MasterHelper\String;
use MasterHelper\Date;

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
