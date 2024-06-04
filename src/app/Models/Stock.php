<?php

namespace App\Models;

use App\Service\CommonService;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stocks';
    protected $guarded = [];
    protected $apiLink = 'api/stocks';

    public static function getInstance()
    {
        return new static();
    }

    public function getAllTodayStocks()
    {
        $commonService = new CommonService(self::getInstance());
        $commonService->getDataFromApiAndSaveToDb($this->apiLink);
    }
}
