@component('mail::message')
# Detalles del Pedido

Gracias por realizar tu pedido. Aquí tienes los detalles:

**ID del Pedido:** {{ $pedido->id }}

**Usuario:** {{ $pedido->usuario->name }}

**Productos en el Pedido:**
@foreach ($pedido->productos as $producto)
- {{ $producto->nombre }} (Cantidad: {{ $producto->pivot->cantidad }})
@endforeach

**Total:** ${{ $pedido->total }}

Gracias,
{{ config('app.name') }}
@endcomponent