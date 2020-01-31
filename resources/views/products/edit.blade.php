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
                        Edit Products
                        {{-- <a href="#" class="btn btn-success btn-sm float-right">New Product</a> --}}
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.update', $product->id) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="description">description</label>
                                <input type="text" class="form-control"  value="{{$product->description}}" name="description" required>
                            </div>
                            <div class="form-group">
                                <label for="description">price</label>
                                <input type="number" class="form-control" name="price" value="{{$product->price}}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{route('products.index')}}" class="btn btn-danger">Cancel</a>
                        </form>
                    </div>
                    </div>

                </div>

            </div>
        </div>

    </body>

</html>