<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateCartListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Registered $event)
    {
        $user = $event->user;
        
        // Obtén el ID del usuario recién registrado
        $userId = $user->id;

        // Inicializa el carrito con algunos valores predeterminados
        $user->cart()->create([
            'user_id' => $userId,
        ]);
    }
}
