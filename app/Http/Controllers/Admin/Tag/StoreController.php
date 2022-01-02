<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Tag;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $req)
    {
        $data = $req->validated();
        Tag::firstOrCreate($data);
        return redirect()->route('admin.tag.index');
    }
}
