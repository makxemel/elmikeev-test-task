<?php

namespace App\Models;

use App\Service\CommonService;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';
    protected $guarded = [];
    protected $apiLink = 'api/sales';

    public static function getInstance()
    {
        return new static();
    }

    public function getAllSales()
    {
        $commonService = new CommonService(self::getInstance());
        $commonService->getDataFromApiAndSaveToDb($this->apiLink);
    }
}
