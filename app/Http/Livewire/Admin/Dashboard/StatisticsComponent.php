<?php

namespace App\Http\Livewire\Admin\Dashboard;

use Livewire\Component;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\Order;

class StatisticsComponent extends Component
{

    public $userMonth = 0;
    public $productMonth = 0;
    public $reviewsMonth = 0;
    public $er = 0;

    public $currentMonthEarning = 0;
    public $currentAnnualEarning = 0;
    public $currentMonthOrderNew = 0;
    public $currentMonthOrderFinished = 0;

    public function mount()
    {
    
        $this->userMonth    = User::whereMonth('created_at', date('m'))->count();
        $this->productMonth = Product::whereMonth('created_at', date('m'))->count();
        $this->reviewsMonth = ProductReview::whereMonth('created_at', date('m'))->count();
        $this->currentMonthOrderFinished = Order::whereOrderStatus(Order::FINISHED)->whereMonth('created_at', date('m'))->count();
    
        $this->currentMonthEarning       = Order::whereOrderStatus(Order::FINISHED)->whereMonth('created_at', date('m'))->sum('total');
        $this->currentAnnualEarning      = Order::whereOrderStatus(Order::FINISHED)->whereYear('created_at', date('Y'))->sum('total');
        $this->currentMonthOrderNew      = Order::whereOrderStatus(Order::NEW_ORDER)->whereMonth('created_at', date('m'))->count();
        $this->currentMonthOrderFinished = Order::whereOrderStatus(Order::FINISHED)->whereMonth('created_at', date('m'))->count();
    
        // $this->er = Order::products()->count();
    }

    public function render()
    {
        dd( $this->currentAnnualEarning);
        return view('livewire.admin.dashboard.statistics-component');
    }
}
