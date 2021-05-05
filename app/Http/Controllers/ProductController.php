<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;
use Symfony\Component\Console\Input\Input;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        /* ->only('index'); 
        ->exception(['index','create'])*/
    }

    public function index(){
        return view('products.index')->with([
            'products' => Product::all(),
        ]);
    }

    public function create(){
        return view('products.create');
        return 'This is the create from Controller';
    }

    public function store(ProductRequest $request){
       

        //dd(request()->all(),$request->all(),$request->validated());
        $product = Product::create($request->validated());
        
        return redirect() 
        ->route('products.index')
        ->withSuccess("The new product with id {$product->id} was created");
        //->with(['success => ("The new product with id {$product->id} was created"]);
    }

    public function show(Product $product){
         /* $product = Product::findOrFail($product);  */
        return view('products.show')->with([
            'product' => $product,
        ]);
    }
    public function edit(Product $product){
        return view('products.edit')->with([
            'product' => $product,
        ]);
    }
    public function update(ProductRequest $request,Product $product){
    

       /* $product = Product::findOrFail($product); */
       $product->update($request->validated());

       return redirect()
       ->route('products.index')
       ->withSuccess("The new product with id {$product->id} was updated");
    }
    public function destroy(Product $product){
        
        $product -> delete(); 

        return redirect()
        ->route('products.index')
        ->withSuccess("The product with id {$product->id} was deleted"); 
    }
}
