<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\CategoryApiResource;

class CategoryApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::all();
        $result = CategoryApiResource::collection($data);
        return $this->sendResponse($result, 'Success get all data category.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = new CategoryApiResource(Category::create($request->validated()));
        return $this->sendResponse($data, 'Saved new category successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $check = Category::find($category->id);
        if (!$category) {
            abort(404, 'Data category not found.');
        }
        $result = new CategoryApiResource($check);
        return $this->sendResponse($result, 'Successfully! Data found here.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        $result = new CategoryApiResource($category);
        return $this->sendResponse($result, 'Update data category successfully!');
    }   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $result = $category->delete();

        return $this->sendResponse($result, 'Delete data category successfully!');
    }
}
