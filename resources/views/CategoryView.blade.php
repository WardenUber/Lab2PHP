
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container d-flex justify-content-center my-4">
    <div class="row">
        <form class="form-inline mt-4 mt-md-0" method="get">
            <div class="col">
                <label for="max" class="sr-only">Минимальная цена</label>
                <input type="text" class="form-control" name="min" id="min" value="{{ request()->input('min') }}"
                       placeholder="Минимальная цена">
            </div>
            <div class="col">
                <label for="min" class="sr-only">Максимальная цена</label>
                <input type="text" class="form-control" name="max" id="max" value="{{ request()->input('max') }}"
                       placeholder="Максимальная цена">
            </div>
            <div class="col">
                <button class="btn btn-primary" type="submit">Искать</button>
            </div>
        </form>
    </div>
</div>
<hr class="m-0" style="border-color: lightgray;">

        <div class="container mb-4">
            <div class="row">
            @foreach($products as $product)
                <div class="card box-shadow">
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Name: {{ $product->name }}</li>
                    <li class="list-group-item"><b>Description: {{ $product->description }}</li>
                    <li class="list-group-item"><b>img</li>
                    <li class="list-group-item"><b>Slug: </b>{{ $product->slug }}</li>
                    <li class="list-group-item"><b>Cost: </b>{{ $product->cost }}</li>
                    <li class="list-group-item"><b>Count: </b>{{ $product->count }}</li>
                    <li class="list-group-item"><b>Category: </b>{{ $product->category }}</li>
                    <li class="list-group-item"><b>Create dateTime </b><br>{{ $product->created_at }}</li>
                    </ul>
                </div>
            @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{ $products->appends(request()->input())->links() }}
        </div>
        <div class="d-flex align-items-center justify-content-center vh-100">
        </div>
</body>
</html>
