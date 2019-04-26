<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\{
    AddBrand, EditBrand
};
use App\Models\{
    Brand, Category
};
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    Redirect, Session
};

class BrandController extends Controller
{
    protected $name = 'brands.';
    protected $folderPath = 'admin.pages.brands.';
    const QUERY_EXCEPTION_READABLE_MESSAGE = 2;


    public function index()
    {
        $brands = Brand::orderBy('name', 'asc')->get();
        //dump($brands);
        return view($this->folderPath . 'index', [
            'brands' => $brands,
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view($this->folderPath . 'create', ['categories' => $categories]);
    }

    public function store(AddBrand $request)
    {
        $request->merge(['code' => $request->name]);
        $categories = $request->categories;
        /**
         * @var Brand $brand
         */
        try {
            $brand = Brand::create($request->except('categories'));
            $brand->categories()->attach($categories);
            $message = 'Добавление выполнено успешно!';
        } catch (QueryException $exception) {
            $message = $exception->errorInfo[self::QUERY_EXCEPTION_READABLE_MESSAGE];
        }
        $request->session()->flash('message', $message);

        return Redirect::to(route($this->name . 'index'));
    }


    public function show($id)
    {
        $brand = Brand::with(['categories'])->findOrFail($id);
        return view($this->folderPath . 'show', ['brand' => $brand]);
    }


    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        $brand_catId = $brand->categories()->allRelatedIds()->toArray();
        $categories = Category::all();
        return view($this->folderPath . 'edit', [
            'brand' => $brand,
            'categories' => $categories,
            'brand_catId' => $brand_catId,
        ]);
    }

    public function update(EditBrand $request, $id)
    {
        $request->merge(['code' => $request->name]);
        $categories = $request->categories;
        /** @var Brand $brand */
        $brand = Brand::findOrFail($id);
        try {
            $brand->update($request->except(['categories', 'current_id']));
            $brand->categories()->sync($categories);
            $message = 'Обновление выполнено успешно!';
            $request->session()->flash('message', $message);
        } catch (QueryException $exception) {
            $message = $exception->errorInfo[self::QUERY_EXCEPTION_READABLE_MESSAGE];
        }
        return Redirect::to(route($this->name . 'index'));
    }


    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        try {
            $brand->categories()->detach();
            $brand->delete();
            $message = 'Удаление выполнено успешно!';
        } catch (QueryException $exception) {
            $message = $exception->errorInfo[self::QUERY_EXCEPTION_READABLE_MESSAGE];
        }

        Session::flash('message', $message);

        return Redirect::to(route($this->name . 'index'));
    }
}
