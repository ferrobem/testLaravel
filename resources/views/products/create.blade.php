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
 
    <form method="post" action="{{route ('products.store')}}">
        {{ csrf_field() }}
        <h4>Dados do Produto</h4>
        <hr>
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" placeholder="Product Name" name="name" required>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="subName">Product Sub Name</label>
                    <input type="text" class="form-control" placeholder="Product Sub Name" name="subName" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" placeholder="Price" required name="price">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="textArea" class="form-control" placeholder="Description" required name="description">
                </div>
            </div>
        </div>
       
        <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
        </div>
    </div>
 
@endsection
