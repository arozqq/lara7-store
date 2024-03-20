<?php

namespace App\Http\Controllers;

use App\Brand;
use App\User;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Validation\Rule;


class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::where('role', 'user')->get();
        $product = Product::get();
        $brand = Brand::get();
        return view('admin.admin-dashboard', compact('users', 'product', 'brand'));
    }

    public function user()
    {
        $users = User::whereIn('role', ['admin', 'user'])->get();
        if (request()->ajax()) {
            return DataTables::of($users)
                ->addColumn('action', function ($data) {
                    $action = '<a href="javascript:void(0)" class="btn btn-warning text-white mx-3" id="edit-user" data-toggle="modal" data-id=' . $data->id . '>Edit</a> <a href="javascript:void(0)" id="delete-user" data-id=' . $data->id . ' class="btn btn-danger text-white delete-user">Delete</a></div>';

                    return $action;
                })
                ->addColumn('checkbox', function ($data) {
                    $checkbox = '<td class="text-center"><div class="custom-checkbox custom-control"><input type="checkbox" class="custom-control-input checkbox-select" id="' . $data->id . '" name="ids" value="' . $data->id . '"><label for="' . $data->id . '" class="custom-control-label"></label></div></td>';
                    return $checkbox;
                })
                ->rawColumns(['action', 'checkbox'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.user');
    }

    // create and update user
    public function storeUser(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:100'],
            'role' => ['required', 'string'],
            'password' => ['required', 'string', 'min:7'],
        ]);

        if (empty($request->id)) {
            $request->validate([
                'email' => 'required|unique:users,email', Rule::unique('users')->ignore($user)
            ]);
        } else {
            $request->validate([
                'email' => 'required'
            ]);
        }
        $id = $request->id;

        $user = User::updateOrCreate(
            ['id' => $id],
            [
                'name' => $request->name,
                'username' => $request->username,
                'role' => $request->role,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]
        );

        $user->profile()->updateOrCreate([
            'user_id' => $user->id
        ]);

        if (empty($request->id)) {
            $msg = 'User created successfully.';
        } else {
            $msg = 'User data is updated.';
        }
        return redirect()->back()->with('success', $msg);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function editUser($id)
    {
        $where = array('id' => $id);
        $user = User::where($where)->first();
        return response()->json($user);
    }

    // delete user
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return response()->json([
            'success' => 'User has been deleted!'
        ]);
    }

    // delete selected
    public function deleteSelected()
    {
        $ids = request()->input('id');
        User::whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success' => "Users have been deleted"]);
    }
}
