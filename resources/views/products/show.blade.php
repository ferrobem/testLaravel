@extends('shared.base')
@section('content')
    <div class="panel panel-default">
     <div class="panel-heading">Detalhes do Produto</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <h4>Sobre o Produto</h4>
                    <p>Name: {{$products->name}}</p>
                    <p>Sub Name: {{$products->SubName}}</p>
                    <p>Price: R$ {{number_format($products->price, 2, ',', '.' )}}</p>
                    <p>Description: {{$products->description}}</p>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
@endsection    