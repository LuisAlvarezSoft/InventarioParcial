<!DOCTYPE html>
<html>
<head>
    <title>Actualizar Stock</title>
</head>
<body>
    <h1>Actualizar Stock</h1>

    <form method="POST" action="/products/update-stock">
        @csrf
        <select name="product_id" required>
            @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }} (Stock actual: {{ $product->quantity }})</option>
            @endforeach
        </select>

        <input type="number" name="amount" placeholder="Cantidad" required>
        <select name="type" required>
            <option value="add">Entrada</option>
            <option value="remove">Salida</option>
        </select>

        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
