<?php

namespace App\Console\Commands;

use App\Models\Income;
use App\Models\Order;
use App\Models\Sale;
use Illuminate\Console\Command;
use App\Models\Stock;
use Illuminate\Support\Facades\Config;

class StartParser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parser:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Stock::getInstance()->getAllTodayStocks();
        Income::getInstance()->getAllIncomes();
        Sale::getInstance()->getAllSales();
        Order::getInstance()->getAllOrders();
    }
}
