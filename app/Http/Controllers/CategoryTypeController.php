<?php

namespace App\Http\Controllers;

use App\Models\CategoryType;
use App\Http\Requests\StoreCategoryTypeRequest;
use App\Http\Requests\UpdateCategoryTypeRequest;

class CategoryTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoryType $categoryType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryTypeRequest $request, CategoryType $categoryType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryType $categoryType)
    {
        //
    }
}
