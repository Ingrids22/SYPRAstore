@extends('/admin/plantilla/app_admin')

@section('Titulo', 'products')

@section('contenido')
<div class="table-container mt-4">
    <h1 class="text-2xl font-bold mb-4">Products</h1>
    <a href="/products/create" class="btn btn-primary mb-4">Nuevo Registro</a>
    <div class="overflow-x-auto bg-white p-4 rounded-lg shadow">
        <form action="{{ route('products.index') }}" method="GET">
            <select name="status" onchange="this.form.submit()">
                <option value="activo" {{ request('status') == 'activo' ? 'selected' : '' }}>Activo</option>
                <option value="inactivo" {{ request('status') == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
            </select>
        </form>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id producto</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id categoria</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id proveedor</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descripción</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Existencias</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock max</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock min</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Imagénes</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($products as $product)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                                <p class="text-sm font-medium text-gray-900">{{$product->id}}</p>
                            </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                                <p class="text-sm font-medium text-gray-900">{{$product->name}}</p>
                            </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                                <p class="text-sm font-medium text-gray-900">{{$product->category_id}}</p>
                            </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                                <p class="text-sm font-medium text-gray-900">{{$product->supplier_id}}</p>
                            </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                                <p class="text-sm font-medium text-gray-900">{{$product->description}}</p>
                            </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <p class="text-sm font-medium text-gray-900">{{$product->existence}}</p>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <p class="text-sm font-medium text-gray-900">{{$product->price}}</p>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$product->stock_max}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$product->stock_min}}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{$product->status}}</span>
                    </td>
                    <td>
                    @foreach($product->images as $image)
                    <img src="{{ asset('storage/' . $image->route) }}" alt="Imagen del producto">
                    @endforeach
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="/products/{{$product->id}}/edit" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <a href="/products/{{$product->id}}" class="text-red-600 hover:text-red-900 ml-4">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
