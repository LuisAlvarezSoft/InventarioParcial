<!DOCTYPE html>
<html>
<head>
    <title>Lista de Productos</title>
</head>
<body>
    <h1>Productos</h1>

    <form method="GET" action="/products/filter">
        <select name="category_id">
            <option value="">Todas las categorías</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <button type="submit">Filtrar</button>
    </form>

    <ul>
        @foreach($products as $product)
            <li>{{ $product->name }} - ${{ $product->price }} - Cantidad: {{ $product->quantity }}</li>
        @endforeach
    </ul>
</body>
</html>
