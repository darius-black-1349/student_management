@extends('layouts.master')


@section('content')

@if (session('admin_access'))
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="alert alert-warning alert-dismissible fade show d-flex" role="alert">
                {{ session('admin_access') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>
@endif


@endsection


@section('script')


<script>
    $('.alert').alert()
</script>

@endsection
