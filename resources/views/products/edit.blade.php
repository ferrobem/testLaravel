@extends('shared.base')
 
@section('content')
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif
    <div class="panel panel-default"> 
        <div class="panel-heading"><h3>Cadastro de Produtos</h3></div>
        <div class="panel-body">
 
    <form method="post" action="{{route ('products.update', $products->id)}}">
    <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <h4>Dados do Produto</h4>
        <hr>
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" placeholder="Product Name" name="name" required value="{{$products->name}}">
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="subName">Product Sub Name</label>
                    <input type="text" class="form-control" placeholder="Product Sub Name" name="subName" required value="{{$products->subName}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" placeholder="Price" required name="price" value="{{$products->price}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="textArea" class="form-control" placeholder="Description" name="description" value="{{$products->description}}">
                </div>
            </div>
        </div>
         <button type="submit" class="btn btn-primary">Update</button>
    </form>
        </div>
    </div>
 
@endsection
