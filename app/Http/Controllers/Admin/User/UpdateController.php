<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Admin\User\UpdateRequest;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $req, User $user)
    {
        $data = $req->validated();
        $user->update($data);
        return view('admin.users.show', compact('user'));
    }
}
