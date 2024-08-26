<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        return view('users.index', [
            'users' => DB::table( 'users')->orderBy('name')->paginate(perPage: '5'),
            // 'users' => User::all()
        ]);
    }

    public function edit($id) {
        return view('users.edit', [
            'user' => User::findOrFail($id)
        ]);
    }

    public function update(Request $req) {
        User::findOrFail($req->id)->update($req->all());
        return redirect()->route('users.index');
    }
}
