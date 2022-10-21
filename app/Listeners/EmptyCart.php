<?php

namespace App\Listeners;

use App\Repositories\Interfaces\ICartRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EmptyCart
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(private ICartRepository $cartRepo)
    {
        $this->cartRepo = $cartRepo;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $this->cartRepo->emptyCart();
    }
}
