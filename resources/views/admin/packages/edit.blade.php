@extends('admin.index')
@section('main')
<link href="/assetsAdmin/libs/dropify/dist/css/dropify.min.css" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<style>
    .swal2-shown {
        overflow: unset !important;
        padding-right: 0px !important;
    }
</style>
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
                                    <li class="breadcrumb-item active">{{__('messages.Edit Packages')}}</li>
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
                                <form id="submitForm" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Name_ar')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="name_ar" id="name_ar" placeholder="Enter Name" value="{{$packages->name_ar}}" type="text">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Name_en')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="name_en" id="name_en" placeholder="Enter Name" value="{{$packages->name_en}}" type="text">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Price')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="price" id="price" placeholder="Enter Price" value="{{$packages->price}}" type="text">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.User_en')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="user_en" id="user_en" placeholder="User/Month" value="{{$packages->user_en}}" type="text">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.User_ar')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="user_ar" id="user_ar" placeholder="مستخدم/شهر" value="{{$packages->user_ar}}" type="text">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-md-10">
                                            <button class="btn btn-success" type="submit">{{__('messages.Update')}}</button>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
    <script src="/assetsAdmin/libs/dropify/dropify.min.js"></script>
    <script>
        $('.dropify').dropify();
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#submitForm').submit(function(e){
                e.preventDefault();
                var name_ar = $('#name_ar').val();
                var name_en = $('#name_en').val();
                var price = $('#price').val();
                var user_ar = $('#user_ar').val();
                var user_en = $('#user_en').val();

                var formData = new FormData();
                formData.append('name_ar' , name_ar);
                formData.append('name_en' , name_en);
                formData.append('price' , price);
                formData.append('user_ar' , user_ar);
                formData.append('user_en' , user_en);

                $.ajax({
                    url:"{{route('packages.update' , ['language' => app()->getLocale() , 'id' => request()->id])}}",
                    type:"POST",
                    data:formData,
                    processData: false,
                    contentType: false,
                    success:function(data){
                        Swal.fire({
                            title: 'لقد تم تعديل هذه الباقة بنجاح !',
                            confirmButtonText: 'تم',
                            icon: 'success'
                        }).then(function() {
                            window.location = "{{route('packages.index' , app()->getLocale())}}";
                        });
                        
                        
                    },error:function(error){
                        console.log(error.responseText);
                        $.each(error.responseJSON.errors, function(key,value) {
                            Swal.fire({
                                title: 'هناك خطأ ما عند التعديل ! <br><br> <div style="color:red;">'+value+'</div>',
                                confirmButtonText: 'تم',
                                icon: 'error'
                            })
                        });
                    }
                });
            });
        });
    </script>
@endsection