<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;

class Parser extends Model
{
    protected $site = '89.108.115.241:6969';

    public function getSiteUrl()
    {
        return $this->site;
    }


}
