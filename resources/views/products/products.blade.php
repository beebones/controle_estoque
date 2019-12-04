@extends('layouts.app')

@section('content')
    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Produtos</h1>
            </div>        
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nome Produto</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Criado em</th>
                            <th scope="col">Ultima Atualização</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($listProducts as $product)
                        <tr>
                            <th scope="row">{{$product->id}}</th>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>R${{$product->price}}</td>
                            <td>{{$product->user->name}}</td>
                            <td>{{$product->created_at}}</td>
                            <td>{{$product->updated_at}}</td>
                            <td>
                                <a class="btn btn-primary" href="/produtos/atualizar/{{$product->id}}">Atualizar</a>
                                <a class="btn btn-danger" href="/produtos/deletar/{{$product->id}}">Deletar</a>
                            </td>
                        </tr>
                    @empty
                        <p>Não há produtos cadastrados</p>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection