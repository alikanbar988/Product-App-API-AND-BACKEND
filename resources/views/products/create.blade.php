<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Product Store</title>
    </head>
    <body >
        <h1>Create a Product</h1>
        @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li> {{$error}} </li>
            @endforeach
            </ul>
            @endif
        <form method="post" action="{{route('products.store')}}">
            @csrf
            @method('post')
            <div>
                <label>Name</label>
                <input type="text" name="name"  placeholder="name" />
            </div>
           <div>
                <label>QTY</label>
                <input type="text" name="qty"  placeholder="qty" />
            </div>
            <div>
                <label>price</label>
                <input type="text" name="price"  placeholder="price" />
            </div>
            <div>
                <label>description</label>
                <input type="text" name="description"  placeholder="description" />
            </div>
            <div>
        
                <input type="submit" value="save a new product"/>

            </div>
        </form>
        
    </body>
</html>
