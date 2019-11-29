<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use Auth;


class ProductController extends Controller
{
    public $nome;

    public function create(Request $request){
        $newProduct = new Product();
        $newProduct->name = $request->nameProduct;
        $newProduct->description = $request->descriptionProduct;
        $newProduct->quantity = $request->quantityProduct;
        $newProduct->price = $request->priceProduct;
        $newProduct->user_id = Auth::user()->id;
        $result = $newProduct->save();
        return view('products.form', ["result"=>$result]);
    }

    public function viewForm(Request $request) {
        return view('products.form');
    }

    public function update(Request $request) {
        //para atualizar, devemos buscar um objeto ao invés de criar
        //usando Product::find($idProduct)
        //vai ser necessario usar rotas com parametro

        $newProduct = Product::find(idProduct);
        $newProduct->name = $request->nameProduct;
        $newProduct->description = $request->descriptionProduct;
        $newProduct->quantity = $request->quantityProduct;
        $newProduct->price = $request->priceProduct;
        $newProduct->user_id = Auth::user()->id;
    }

    public function delete(Request $request) {
        //para deletar vc vai usar Product::destroy($id)
    }

    public function viewAllProducts(Request $request) {
        //vai precisar do Product::All
    }

    public function viewOneProduct(Request $request) {
        //vai precisar do Product::find($idProduct)
    }
}
