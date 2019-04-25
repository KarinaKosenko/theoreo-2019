<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\{
    AddBrand, EditBrand
};
use App\Models\{Brand,Category};
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Redirect,Session};

class BrandController extends Controller
{
    protected $name = 'brands.';
    protected $folderPath = 'admin.pages.brands.';
    const QUERY_EXCEPTION_READABLE_MESSAGE = 2;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('name', 'asc')->get();
        //dump($brands);
        return view($this->folderPath . 'index', [
            'brands' => $brands,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view($this->folderPath . 'create', ['categories' => $categories]);
    }

    public function store(AddBrand $request)
    {
        $brand_data = [
            'name' => $request->name,
            'code' => $request->name,
            'img' => $request->img,
            'site_url' => $request->site_url,
            'vk_url' => $request->vk_url,
            'phone' => $request->phone,
            'sell_address' => $request->sell_address,
        ];
        $categories = $request->categories;

        /**
         * @param \App\Models\Brand $brand
         */
        try {
            $brand = Brand::create($brand_data);
            $brand->categories()->attach($categories);
            $message = 'Добавление выполнено успешно!';
        } catch (QueryException $exception) {
            $message = $exception->errorInfo[self::QUERY_EXCEPTION_READABLE_MESSAGE];
        }
        $request->session()->flash('message', $message);

        return Redirect::to(route($this->name . 'index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }


    public function edit($id)
    {
        try {
            $brand = Brand::findOrFail($id);
            $brand_catId = $brand->categories()->allRelatedIds()->toArray();
            $categories = Category::all();
            return view($this->folderPath . 'edit', [
                'brand' => $brand,
                'categories' => $categories,
                'brand_catId' => $brand_catId,
            ]);
        } catch (ModelNotFoundException $e) {

            return false;
        }

    }

    public function update(EditBrand $request, $id)
    {
        $brand_data = [
            'name' => $request->name,
            'code' => $request->name,
            'img' => $request->img,
            'site_url' => $request->site_url,
            'vk_url' => $request->vk_url,
            'phone' => $request->phone,
            'sell_address' => $request->sell_address,
        ];
        $categories = $request->categories;
        try {
            /** @var Brand $brand */
            $brand = Brand::findOrFail($id);
            $brand->update($brand_data);
            $brand->categories()->sync($categories);
            $message = 'Обновление выполнено успешно!';
        } catch (ModelNotFoundException $e) {
            $message = $e->getMessage();
        }
        $request->session()->flash('message', $message);
        return Redirect::to(route($this->name . 'index'));
    }


    public function destroy($id)
    {
        try {
            $brand = Brand::findOrFail( $id );
            $brand->categories()->detach();
            $brand->delete();
            $message = 'Удаление выполнено успешно!';
        } catch ( QueryException $exception ) {
            $message = $exception->errorInfo[ self::QUERY_EXCEPTION_READABLE_MESSAGE ];
        }

        Session::flash( 'message', $message );

        return Redirect::to( route( $this->name . 'index' ) );

    }
}
