<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Product Store</title>
    
    </head>
    <body >
        <h1>product</h1>
            @if(session()->has('success'))
            <div>
                {{session('success')}}
        </div>
        @endif
      
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>QTY</th>
                    <th>price</th>
                    <th>description</th>
                    <th>Edit</th>
                    <th>delete</th>
                   
                </tr>
                @foreach ($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->qty}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->description}}</td>
                    <td>
                        <a href="{{route('products.edit',['product'=> $product])}}">Edit</a>
                    </td>
                   <td>
                        <form method="post" action="">
                            @csrf
                            @method('DELETE')

                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
              
                @endforeach
                
            </table>
           
    </body>
</html>
