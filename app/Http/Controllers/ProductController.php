<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
#use Illuminate\Http\Request;
use App\Http\Requests\StoreProduct;
use App\Product;
use App\Service\Repository;

class ProductController extends Controller
{
    protected $prodRepository;

    public function __construct(Repository $prodRepository)
    {
        $this->prodRepository = $prodRepository;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        return $this->prodRepository->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $product = Product::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProduct $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->fill($request);
        $product->save();
        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StoreProduct $request, $id)
    {
        return $this->prodRepository->destroy($id);
    }
}
