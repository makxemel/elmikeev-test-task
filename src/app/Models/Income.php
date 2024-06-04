<?php

namespace App\Models;

use App\Service\CommonService;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $table = 'incomes';
    protected $guarded = [];
    protected $apiLink = 'api/incomes';

    public static function getInstance()
    {
        return new static();
    }

    public function getAllIncomes()
    {
        $commonService = new CommonService(self::getInstance());
        $commonService->getDataFromApiAndSaveToDb($this->apiLink);
    }
}
