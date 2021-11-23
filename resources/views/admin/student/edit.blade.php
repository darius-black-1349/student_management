@extends('admin.layouts.master')

@section('head-tag')
<title>ویرایش کاربر</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item font-size-12"> <a href="{{ route('admin.home') }}">خانه</a></li>
        <li class="breadcrumb-item font-size-12"> <a href="{{ route('admin.users.index') }}">کاربران</a></li>
        <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش کاربر</li>
    </ol>
</nav>


<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    ویرایش کاربر
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.users.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="{{ route('admin.users.update', $user->id) }}" method="post" enctype="multipart/form-data" id="form">

                    @csrf

                    @method('PUT')


                    <section class="row">

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="name">نام کاربر</label>
                                <input type="text" name="name" id="name" class="form-control form-control-sm" value="{{ old('name', $user->name) }}">
                            </div>

                            @error('name')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="email">ایمیل کاربر</label>
                                <input type="text" name="email" id="email" class="form-control form-control-sm" value="{{ old('email', $user->email) }}">
                            </div>

                            @error('email')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>



                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="password">رمز کاربر</label>
                                <input type="password" name="password" id="password" class="form-control form-control-sm" value="{{ old('password') }}">
                            </div>

                            @error('password')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>



                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="password_confirmation">تکرار رمز کاربر</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-sm">
                            </div>

                            @error('password_confirmation')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>


                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="status">وضعیت</label>
                                <select name="status" id="status" class="form-control form-control-sm">
                                    <option value="0" @if (old('status', $user->status)==0) selected @endif>غیر فعال</option>
                                    <option value="1" @if (old('status', $user->status)==1) selected @endif>فعال</option>
                                </select>
                            </div>
                            @error('status')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>


                        <section class="col-12 my-3">
                            <button class="btn btn-primary btn-sm">ثبت</button>
                        </section>
                    </section>
                </form>
            </section>

        </section>
    </section>
</section>

@endsection
