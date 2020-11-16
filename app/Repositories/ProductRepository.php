<?php

namespace App\Repositories;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    private $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->with(['group'])->get();
    }

    public function getById(int $id)
    {
        return $this->model->find($id);
    }

    public function store(ProductRequest $request)
    {
        $product = $this->model->fill($request->all());
        $product->save();

        return $this->model::find($product->id);
    }

    public function update(ProductRequest $request, int $id)
    {
        $product = $this->model->find($id);

        if (empty($product)) {
            return null;
        }

        $product->fill($request->all());
        $product->save();

        return $product;
    }

    public function destroy(int $id)
    {
        $product = $this->model->find($id);

        if (empty($product)) {
            return null;
        }

        return $product->delete();
    }

}
