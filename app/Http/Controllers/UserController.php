<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // $usuarios = User::all();
        // $usuarios = User::where('id', '>', 0)->simplePaginate(2);
        $usuarios = User::where('id', '>', 0)->paginate(2);

        return view('admin.users.index')
            ->with('users', $usuarios);
    }

    public function create(Request $r)
    {
        $errors = [];
        if ($r->session()->has('errors')) {
            $errors = $r->session()->get('errors')->all();
        }

        return view('admin.users.edit')
            ->with('user', new User($r->old()))
            ->with('errors', $errors)
            ->with('method', 'post');
    }

    public function store(Request $r)
    {
        $this->validate($r, [
            'name' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'password' => 'required'
        ]);
        // if ($validator->fails()) {
        //     return redirect('admin/users/create')
        //         ->withInput()
        //         ->with('errors', $validator->errors());
        // }
        $data = $r->except(['password']);
        $user = new User($data);
        // el metodo bcrypt calcula el hash del valor dado
        $user->password = bcrypt($r->input('password'));
        $user->save();

        return redirect('admin/users');
    }

    public function edit(Request $r, $id)

    {
        $user = User::findOrFail($id);
        $errors = [];
        if ($r->session()->has('errors')) {
            $errors = $r->session()->get('errors')->all();
        }

        return view('admin.users.edit')
            ->with('user', $user->fill($r->old()))
            ->with('errors', $errors)
            ->with('method', 'put');
    }

    public function update(Request $r, $id)
    {
        $validator = \Validator::make($r->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect("admin/users/$id/edit")
                ->withInput()
                ->with('errors', $validator->errors());
        }

        $user = User::findOrFail($id);
        $user->fill($r->except(['password']));
        // el metodo bcrypt calcula el hash del valor dado
        $user->password = bcrypt($r->input('password'));
        $user->save();

        return redirect('admin/users');
    }

    public function destroy(Request $r, $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['status' => 'ok']);
    }

}
