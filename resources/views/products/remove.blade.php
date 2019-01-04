@extends('shared.base')
@section('content')

<div class="panel panel-default">
    <div class=" panel-heading">Products Remove
    </div>
        <div class="panel-body">
            <form method="post" action="{{route ('products.destroy', $products->id)}}">
            <input type="hidden" name="_method" value="DELETE">
                {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Tem Certeza que deseja remover o Product?</h4>
                            <hr>
                            <h4>About the Product</h4>
                            <p>Name: {{$products->name}}</p>
                            <p>Sub Name: {{$products->sudName}}</p>
                            <p>Price: {{number_format($products->price, 2, ',','.')}}</p>
                            <p>Description: {{$products->description}}</p>
                        </div>    
                    </div>
                <button type="submit" class="btn btn-danger">Remove</button>
                <a href="{{ url()->previous()}}" class="btn btn-default">Cancel</a>
            </form>
        </div>
</div>
@endsection