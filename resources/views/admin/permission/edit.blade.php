@extends('admin.layouts.master')

@section('head-tag')
<title>ویرایش دسترسی</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item font-size-12"> <a href="{{ route('admin.home') }}">خانه</a></li>
        <li class="breadcrumb-item font-size-12"> <a href="{{ route('admin.users.index') }}">اجلزه دسترسی</a></li>
        <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش دسترسی</li>
    </ol>
</nav>


<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    ویرایش دسترسی
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.permissions.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="{{ route('admin.permissions.update', $permission->id) }}" method="post" enctype="multipart/form-data" id="form">

                    @csrf

                    @method('PUT')


                    <section class="row">

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="name">نام دسترسی</label>
                                <input type="text" name="name" id="name" class="form-control form-control-sm" value="{{ old('name', $permission->name) }}">
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
                                <label for="label">توضیحات دسترسی</label>
                                <input type="text" name="label" id="label" class="form-control form-control-sm" value="{{ old('label', $permission->label) }}">
                            </div>

                            @error('label')
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
