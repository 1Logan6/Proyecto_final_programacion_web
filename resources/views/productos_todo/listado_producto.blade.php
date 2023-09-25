<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado</title>
</head>

<body>

    @include('partials.navigation')

    <h1> Estos son los productos que tenemos: </h1><br>

    <ul>
        @foreach ($productos as $producto)
            <li>
                
                <a href="{{ route('producto.show', $producto) }}">
                    {{ $producto -> nombre }}
                </a>
            </li>
            {{-- <li>{{$producto -> precio}}</li> --}}
        @endforeach
    </ul>



</body>

</html>