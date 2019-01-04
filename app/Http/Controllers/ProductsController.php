<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class ProductsController extends Controller
{
    protected function validarProducts($request){
        $validator = Validator::make($request-> all(), [
            "name" => "required",
            "subName" => "required",
            "price" => "required | numeric"

        ]);
        return $validator;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $qtd = $request['qtd'] ?:2;
        $page = $request['page'] ?:1;
        $buscar = $request['buscar'];

        Paginator:: currentPageResolver(function () use ($page){
            return $page;
        });

        if($buscar){
            $products = DB::table('products')->where('name', '=', $buscar)->paginate($qtd);
        }else{
            $products = DB::table('products')->paginate($qtd);
        }
        
        $products = $products->appends(Request::capture()->except('page'));

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this-> validarProducts($request);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }
        $dados = $request->all();
        Products::create($dados);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Products::find($id);

        return view('products.show', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Products::find($id);

        return view('products.edit', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = $this-> validarProducts($request);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }

        $products = Products::find($id);
        $dados = $request->all();
        $products->update($dados);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Products::find($id)->delete();
        return redirect()->route('products.index');
    }

    public function remover($id)
    {
        $products = Products::find($id);

        return view('products.remove', compact('products'));
    }
}
