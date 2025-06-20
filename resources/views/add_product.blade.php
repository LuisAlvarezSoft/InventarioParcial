<!DOCTYPE html>
<html>
<head>
    <title>Agregar Producto</title>
</head>
<body>
    <h1>Agregar Producto</h1>

    <form method="POST" action="/products">
        @csrf
        <input type="text" name="name" placeholder="Nombre" required>
        <input type="number" name="price" placeholder="Precio" required>
        <input type="number" name="quantity" placeholder="Cantidad" required>
        <select name="category_id" required>
            <option value="">Selecciona Categoría</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
