@extends('admin.index')
@section('main')

    <div class="main-content" id="result">
        <div class="page-content">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">{{__('messages.Packages')}}</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('messages.Packages')}}</a></li>
                                    <li class="breadcrumb-item active">{{__('messages.Create Packages')}}</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('packages.store' , app()->getLocale()) }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Name_ar')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="name_ar" placeholder="Enter Name" type="text">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Name_en')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="name_en" placeholder="Enter Name" type="text">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Price')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="price" placeholder="Enter Price" type="text">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.User_en')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="user_en" placeholder="User/Month" type="text">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.User_ar')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="user_ar" placeholder="مستخدم/شهر" type="text">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-md-10">
                                            <button class="btn btn-success" type="submit">{{__('messages.Save')}}</button>
                                        </div>
                                    </div>
                                   
                                </form>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
@endsection