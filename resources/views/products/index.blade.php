@extends('shared.base')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">List of Products</div>
        <form method="GET" action="{{route('products.index', 'buscar')}}">
            <div class="row">
                <div class="col-md-12">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search..." name="buscar">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">Search</button>
                        </span>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Sub Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->name}}</td>
                                <td>{{$product->subName}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->description}}</td>
                                <td>
                                    <a href="{{route('products.edit', $product->id)}}"><i class="glyphicon glyphicon-pencil"></i></a>
                                    <a href="{{route('products.remove', $product->id)}}"><i class="glyphicon glyphicon-trash"></i></a>
                                    <a href="{{route('products.show', $product->id)}}"><i class="glyphicon glyphicon-zoom-in"></i></a>                            
                                </td>                        
                            </tr>
                       @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
        <div align="center" class="row">
            {{ $products->Links() }}
        </div>
    </div>
    <a href="{{route('products.create')}}"><button class="btn btn-primary">Adicionar</button></a>
@endsection
