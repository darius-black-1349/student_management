@extends('admin.layouts.master')

@section('head-tag')
<title>اجازه دسترسی</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item font-size-12"> <a href="{{ route('admin.home') }}">خانه</a></li>
        <li class="breadcrumb-item font-size-12 active" aria-current="page"> اجازه دسترسی</li>
    </ol>
</nav>


<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                اجازه دسترسی
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.permissions.create') }}" class="btn btn-info btn-sm">ایجاد دسترسی</a>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نام دسترسی</th>
                            <th>توضیحات</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $key => $permission)

                        <tr>
                            <th>{{ $key += 1 }}</th>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->label }}</td>

                            <td class="width-16-rem text-left">
                                <a href="{{ route('admin.permissions.edit', $permission->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>

                                <form class="d-inline" action="{{ route('admin.permissions.destroy', $permission->id) }}" method="post">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm delete" type="submit"><i class="fa fa-trash-alt"></i> حذف</button>

                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </section>

            {{ $permissions->links() }}
        </section>
    </section>
</section>

@endsection

@section('script')

@include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])

@endsection


