<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Admin\Category\StoreRequest;

class UpdateController extends Controller
{
    public function __invoke(StoreRequest $req, Category $category)
    {
        $data = $req->validated();
        $category->update($data);
        return view('admin.categories.show', compact('category'));
    }
}
