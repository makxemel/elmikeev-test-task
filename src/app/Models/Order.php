<?php

namespace App\Models;

use App\Service\CommonService;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $guarded = [];
    protected $apiLink = 'api/orders';

    public static function getInstance()
    {
        return new static();
    }

    public function getAllOrders()
    {
        $commonService = new CommonService(self::getInstance());
        $commonService->getDataFromApiAndSaveToDb($this->apiLink);
    }
}
