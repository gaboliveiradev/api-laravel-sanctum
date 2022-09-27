<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // -> Lista todos os nossos registros
    public function index()
    {
        return ProductModel::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // -> Insere um registro no banco de dados
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'inventory' => 'required',
            'cost' => 'required',
            'sale' => 'required'
        ]);

        return ProductModel::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // -> Lista um registro específico
    public function show($id)
    {
        // Find = Buscar
        // FindOrFail = Vai buscar por algo e caso não encontre irá falhar e exibir que a rota não existe, muito
        // usado para previnir futuros ataques ao SGBD.
        return ProductModel::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // -> Atualiza um registro já existente
    public function update(Request $request, $id)
    {
        $product = ProductModel::findOrFail($id);
        $product->update($request->all());

        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // -> Deleta um registro no banco de dados
    public function destroy($id)
    {
        return ProductModel::destroy($id);
    }
}
