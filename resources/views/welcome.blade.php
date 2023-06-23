
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="col-md-4 mt-4">
    <div class="card box-shadow">
        <ul class="list-group list-group-flush">
        <li class="list-group-item"><b>Name: {{ $product->name }}</li>
        <li class="list-group-item"><b>Description: {{ $product->description }}</li>
        <li class="list-group-item"><b>img</li>
        <li class="list-group-item"><b>Slug: </b>{{ $product->slug }}</li>
        <li class="list-group-item"><b>Cost: </b>{{ $product->cost }}$</li>
        <li class="list-group-item"><b>Count: </b>{{ $product->count }}</li>
        <li class="list-group-item"><b>Category: </b>{{ $product->category }}</li>
        <li class="list-group-item"><b>Create dateTime </b><br>{{ $product->created_at }}</li>
        </ul>
    </div>
</div>

    
</body>
</html>
