<?php

namespace App\View\Components;

use Illuminate\Support\Facades\App;
use Illuminate\View\Component;
use NumberFormatter;

class Currancy extends Component 
{
    public $amount;
    public function __construct($amount)
    {
        $formtter = new NumberFormatter(App::currentLocale(), NumberFormatter::CURRENCY);
         $this->amount = $formtter->formatCurrency($amount , 'USD');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.currancy');
    }
}
