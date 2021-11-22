<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::query()->orderBy('created_at')->paginate(10);

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $inputs = $request->all();

        User::create($inputs);

        return redirect(route('admin.users.index'))->with('swal-success', 'کاربر جدید ساخته شد');
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
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {

        $inputs = $request->all();

        $user->update($inputs);

       return redirect(route('admin.users.index'))->with('swal-success', 'ویرایش کاربر با موفقیت انجام شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect(route('admin.users.index'))->with('swal-success', 'کاربر مورد نظر با موفقیت حذف شد');
    }


    public function status(User $user)
    {
        $user->status = $user->status == 0 ? 1 : 0;

        $result = $user->save();

        if($result)
        {

            if($user->status == 0)
            {
                return response()->json([

                    'status' => true,
                    'checked' => false

                ]);

            } else {

                return response()->json([

                    'status' => true,
                    'checked' => true

                ]);

            }

        } else {

            return response()->json([

                'status' => false

            ]);

        }

    }
}
