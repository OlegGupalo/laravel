<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Category;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $req)
    {
        $data = $req->validated();
        Category::firstOrCreate($data);
        return redirect()->route('admin.category.index');
    }
}
