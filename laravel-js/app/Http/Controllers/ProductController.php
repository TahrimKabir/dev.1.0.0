<?php

namespace App\Http\Controllers;

use App\Models\Product;

use App\Models\Variant;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index(Request $req)
    {
        $variant = Variant::all();
        $pf = $req->price_from;
        $pt = $req->price_to;
        $date = date('Y-m-d');
        if(($req->title ==NULL && $req->date!=NULL)||($req->title !=NULL && $req->date==NULL)){
            $var = $req->variant;
           $product = Product::where('title',  $req->title )->orwhereDate('created_at',date('Y-m-d',strtotime($req->date)))->paginate(10);
    
    //         $product = Product::where('title',$req->title)->paginate(10);
            // return view('products.index',compact('product','variant'));
        }else if($req->title!=NULL && $req->date!=NULL){
            $var = $req->variant;
            $product = Product::where('title',  $req->title )->whereDate('created_at',date('Y-m-d',strtotime($req->date)))->paginate(10);
        }
        else{
            
            $product = Product::paginate(10);
           
        }
        if($req->variant!=NULL){
            $var = $req->variant;
        }else{
            $var = NULL;
        }
        
        return view('products.index',compact('product','variant','var','pf','pt'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $variants = Variant::all();
        return view('products.create', compact('variants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
      
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show($product)
    {
        
    }

    public function search(Request $req)
    {
        dd($req->variant);
        $product = Product::paginate(10);
        $variant = Variant::all();
        // return view('products.show',compact('product'));
        return view('products.index',compact('product','variant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id',$id)->first();
        $variants = Variant::all();
        return view('products.edit', compact('variants','product','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        // dd($request->product_name);
        return view('show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
