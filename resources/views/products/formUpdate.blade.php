@extends('layouts.app')

@section('content')
    <section class="container">
        <div class="row md-col-12">
            <h1>Atualização do Produto</h1>
        </div>
        @if(isset($product))
        <form action="/produtos/atualizar" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="idProduct" value="{{$product->id}}" hidden>
            <div class="form-group">
                <label for="nameProduct">Nome do Produto</label>
                <input class="form-control" type="text" name="nameProduct" id="nameProduct" value="{{$product->name}}">
            </div>
            <div class="form-group">
                <label for="descriptionProduct">Descrição do Produto</label>
                <textarea name="descriptionProduct" id="descriptionProduct" class="form-control">{{$product->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="quantityProduct">Quantidade do Produto</label>
                <input class="form-control" type="number" name="quantityProduct" id="quantityProduct" value="{{$product->quantity}}">
            </div>
            <div class="form-group">
                <label for="priceProduct">Preço do Produto</label>
                <input class="form-control" type="number" name="priceProduct" id="priceProduct" step=".01" value="{{$product->price}}">
            </div> 
            <div class="form-group">
                <label for="imgProduct">Imagem do Produto</label>
                <input class="form-control" type="file" name="imgProduct" id="imgProduct" step=".01">
            </div> 
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Atualizar Produto</button>
            </div>
        </form>
        @elseif(isset($result))
        @else
            <h1>Você não passou um id ou o produto não existe!</h1>
        @endif
        <div class="row">
            <div class="col-md-12">
                @if(isset($result))
                    @if($result)
                        <h1>Deu certo!</h1>
                    @else
                        <h1>Não deu certo sua atualização!</h1>
                    @endif
                @endif
            </div>
        </div>
    </section>
@endsection