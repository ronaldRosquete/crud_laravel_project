<?php

namespace App\Http\Controllers\Api;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductoResource;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $productos = Producto::paginate();

        return ProductoResource::collection($productos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductoRequest $request): Producto
    {
        return Producto::create($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto): Producto
    {
        return $producto;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductoRequest $request, Producto $producto): Producto
    {
        $producto->update($request->validated());

        return $producto;
    }

    public function destroy(Producto $producto): Response
    {
        $producto->delete();

        return response()->noContent();
    }
}
