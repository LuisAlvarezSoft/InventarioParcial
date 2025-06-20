<!DOCTYPE html>
<html>
<head>
    <title>Productos con Bajo Stock</title>
</head>
<body>
    <h1>Productos con Bajo Stock</h1>

    <ul>
        @forelse($products as $product)
            <li>{{ $product->name }} - Stock: {{ $product->quantity }}</li>
        @empty
            <li>No hay productos con bajo stock.</li>
        @endforelse
    </ul>
</body>
</html>
