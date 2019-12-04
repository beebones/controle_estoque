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
        return view('products.formRegister', ["result"=>$result]);
    }

    public function viewFormRegister(Request $request) {
        return view('products.formRegister');
    }

    public function viewFormUpdate(Request $request, $id=0){
        $product = Product::find($id);
        if($product){
            return view('products.formUpdate', ["product"=>$product]);
        }else {
            return view('products.formUpdate');
        }        
    }

    public function update(Request $request) {
        //para atualizar, devemos buscar um objeto ao invés de criar
        //usando Product::find($idProduct)
        //vai ser necessario usar rotas com parametro

        $product = Product::find($request->idProduct);
        $product->name = $request->nameProduct;
        $product->description = $request->descriptionProduct;
        $product->quantity = $request->quantityProduct;
        $product->price = $request->priceProduct;
        $result = $product->save();
        return view('products.formUpdate', ["result"=>$result]);
    }

    public function delete(Request $request, $id=0) {
        //para deletar vc vai usar Product::destroy($id)
        $result = Product::destroy($id);
        if($result) {
            return redirect('/produtos');
        }
    }

    public function viewAllProducts(Request $request) {
        //vai precisar do Product::All()
        $listProducts = Product::all();
        return view('products.products', ['listProducts'=>$listProducts]);
    }

    public function viewOneProduct(Request $request) {
        //vai precisar do Product::find($idProduct)
    }
}
