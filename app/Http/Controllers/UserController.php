<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = DB::table('users')
            ->leftJoin('roles', 'users.role_id', "=", 'roles.id')
            ->get(['users.*', 'roles.role_name']);
        return view('/home', compact('user'));
    }

    public function author()
    {
        $user = DB::table('users')
            ->leftJoin('roles', 'users.role_id', "=", 'roles.id')
            ->where('role_id', '=', '2')
            ->get(['users.*', 'roles.role_name']);
        return view('author.index', compact('user'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = DB::table('users')
            ->leftJoin('roles', 'users.role_id', "=", 'roles.id')
            ->where('users.id', $id)
            ->select('users.*', 'roles.role_name')
            ->first();
        return view('user.index', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'role_id' => ['required']
        ]);
        // dd($request);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        if ($request->hasFile('user_img')) {
            $this->validate(
                $request,
                [
                    'user_img' => 'mimes:jpg,jpeg,png,gif|max:2048',
                ],
                [
                    'user_img.mimes' => 'Chỉ chấp nhận ảnh với đuôi .jpg .jpeg .png .gif',
                    'user_img.max' => 'Ảnh giới hạn dung lượng không quá 2M',
                ]
            );

            //Xóa file hình thẻ cũ
            // if (file_exists(public_path('storage/profile/' . $user->user_img))) {
            //     unlink(public_path('storage/profile/' . $user->user_img));
            // }

            //Lưu file hình thẻ mới
            $user_img = $request->file('user_img');
            $getimg = $user_img->getClientOriginalName();
            $destinationPath = public_path('storage/profile');
            $user_img->move($destinationPath, $getimg);
            $updateimg = DB::table('users')->where('id', $request->id)->update([
                'user_img' => $getimg
            ]);
        }
        $user->save();

        return redirect('/home')->with('success', 'User Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
