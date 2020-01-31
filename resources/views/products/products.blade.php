<!DOCTYPE>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Products</title>
    </head>
    <body>
        <div class="container">

            <h1>Products</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                        Products List
                        <a href="{{route('products.create')}}" class="btn btn-success btn-sm float-right">New Product</a>
                    </div>
                    <div class="card-body">
                        @if(session('info'))
                            <div class="alert alert-success"> 
                                 {{session('info')}}
                            </div>
                        @endif
                        <table class="table table-hover table-sm">
                            <thead>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>
                                        {{$product->description}}

                                    </td>
                                    <td>
                                        {{$product->price}}
                                    </td>
                                    <td>
                                        <a href="{{route('products-edit', $product->id)}}" class="btn btn-warning btn-sm">Editar</a>
                                        <a onclick="javastript: document.getElementById('delete-{{$product->id}}').submit()" class="btn btn-danger btn-sm">Eliminar</a>
                                        <form id="delete-{{$product->id}}" action="{{route('product-destroy', $product->id)}}" method="POST">
                                            @method('delete')
                                            @csrf
                                        </form>
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                           
                       
                    </div>
                    </div>

                </div>

            </div>
        </div>

    </body>

</html>