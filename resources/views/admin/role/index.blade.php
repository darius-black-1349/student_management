@extends('admin.layouts.master')

@section('head-tag')
<title>کاربران</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item font-size-12"> <a href="{{ route('admin.home') }}">خانه</a></li>
        <li class="breadcrumb-item font-size-12 active" aria-current="page"> کاربران</li>
    </ol>
</nav>


<section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                کاربران
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.users.create') }}" class="btn btn-info btn-sm">ایجاد کاربر</a>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نام کاربر</th>
                            <th>ایمیل</th>
                            <th>اسلاگ</th>
                            <th>وضعیت</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)

                        <tr>
                            <th>{{ $key += 1 }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->slug }}</td>
                            <td>
                                <label for="">
                                    <input data-url="{{ route('admin.users.status', $user->id) }}" type="checkbox" id="{{ $user->id }}" onchange="changeStatus( {{ $user->id }} )" @if($user->status == 1) checked @endif>
                                </label>
                            </td>
                            <td class="width-16-rem text-left">
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>

                                <form class="d-inline" action="{{ route('admin.users.destroy', $user->id) }}" method="post">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm delete" type="submit"><i class="fa fa-trash-alt"></i> حذف</button>

                                </form>

                                <a href="" class="btn btn-warning btn-sm"><i class="fa fa-ban"></i> سطوح دسترسی</a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </section>

        </section>
    </section>
</section>

@endsection

@section('script')
<script type="text/javascript">
    function changeStatus(id) {

        var element = $("#" + id);
        var url = element.attr('data-url');
        var elementValue = !element.prop('checked')

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({

            url: url,
            type: 'GET',

            success: function(response) {

                if (response.status) {

                    if (response.checked) {
                        element.prop('checked', true)

                        successToast('عملیات با موفقیت فعال شد')

                    } else {

                        element.prop('checked', false)
                        successToast('عملیات با موفقیت غیرفعال شد')

                    }

                } else {

                    element.prop('checked', elementValue)
                    errorToast('هنگام ویرایش مشکلی بوجود آمده است!')

                }

            },

            error: function() {
                element.prop('checked', elementValue)
                errorToast('ارتباط برقرار نشد!')
            }

        });


        function successToast(message) {

            var successToastTag = '<section class="toast" data-delay="5000">\n' +
                '<section class="toast-body py-3 d-flex bg-success text-white">\n' +
                '<strong class="ml-auto">' + message + '</strong>\n' +
                '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                '<span aria-hidden="true">&times;</span>\n' +
                '</button>\n' +
                '</section>\n' +
                '</section>';

            $(".toast-wrapper").append(successToastTag);
            $(".toast").toast('show').delay(5500).queue(function() {
                $(this).remove();
            })

        }


        function errorToast(message) {

            var errorToastTag = '<section class="toast" data-delay="5000">\n' +
                '<section class="toast-body py-3 d-flex bg-danger text-white">\n' +
                '<strong class="ml-auto">' + message + '</strong>\n' +
                '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                '<span aria-hidden="true">&times;</span>\n' +
                '</button>\n' +
                '</section>\n' +
                '</section>';

            $(".toast-wrapper").append(errorToastTag);
            $(".toast").toast('show').delay(5500).queue(function() {
                $(this).remove();
            })

        }


    }
</script>


@include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])

@endsection
