@extends('layouts.app')

@section('content')
    <section class="container">
        <div class="row md-col-12">
            <h1>Cadastro de Produto</h1>
        </div>
        <form action="/produtos/cadastrar" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="nameProduct">Nome do Produto</label>
                <input class="form-control" type="text" name="nameProduct" id="nameProduct">
            </div>
            <div class="form-group">
                <label for="descriptionProduct">Descrição do Produto</label>
                <textarea name="descriptionProduct" id="descriptionProduct" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="quantityProduct">Quantidade do Produto</label>
                <input class="form-control" type="number" name="quantityProduct" id="quantityProduct">
            </div>
            <div class="form-group">
                <label for="priceProduct">Preço do Produto</label>
                <input class="form-control" type="number" name="priceProduct" id="priceProduct" step=".01">
            </div> 
            <div class="form-group">
                <label for="imgProduct">Imagem do Produto</label>
                <input class="form-control" type="file" name="imgProduct" id="imgProduct" step=".01">
            </div> 
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <div class="row">
            <div class="col-md-12">
                @if(isset($result))
                    @if($result)
                        <h1>Deu certo!</h1>
                    @else
                        <h1>Não deu certo!</h1>
                    @endif
                @endif
            </div>
        </div>
    </section>
@endsection