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
                            <h4 class="mb-sm-0 font-size-18">{{__('messages.Subscriptions')}}</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('messages.Subscriptions')}}</a></li>
                                    <li class="breadcrumb-item active">{{__('messages.Edit Subscriptions')}}</li>
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
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Name')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="name" id="name" placeholder="Enter Name" value="{{$subscripes->name}}" type="text">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.E-mail')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="email" id="email" placeholder="Enter E-mail" value="{{$subscripes->email}}" type="email">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">{{__('messages.Company_Size')}}</label>
                                        <div class="col-md-10">
                                        <select class="form-control" id="company_size" name="company_size">
                                            <option disabled>Select_Option</option>
                                            <option value="1-50" @if($subscripes->company_size == '1-50') selected @endif>1-50</option>
                                            <option value="50-500" @if($subscripes->company_size == '50-500') selected @endif>50-500</option>
                                            <option value="500+" @if($subscripes->company_size == '500+') selected @endif>500+</option>
                                        </select>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">{{__('messages.Packages')}}</label>
                                        <div class="col-md-10">
                                            <select name="package_id" id="package_id" class="form-control">
                                                <option disabled>-- Choose --</option>
                                                @foreach($packages as $package)
                                                    <option @if($subscripes->package_id == $package->id) selected  @endif value="{{$package->id}}">{{$package->name_ar}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">{{__('messages.Extra Packages')}}</label>
                                        <div class="col-md-10">
                                            @foreach($extraPackages as $e)
                                                <input type="checkbox" name="extra_package_id[]" class="extra_package_id" value="{{ $e->id }}" 
                                                @foreach($extra as $ext)
                                                    @if($ext->extra_package_id == $e->id)
                                                        checked
                                                    @endif
                                                @endforeach
                                                /> {{$e->name_ar}}
                                                <br>
                                            @endforeach
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
                var name = $('#name').val();
                var email = $('#email').val();
                var company_size = $('#company_size').val();
                var package_id = $('#package_id').val();
                
                var ids = [];
                $('.extra_package_id:checked').each(function(i, e) {
                    ids.push($(this).val());
                });

                var formData = new FormData();
                formData.append('name' , name);
                formData.append('email' , email);
                formData.append('company_size' , company_size);
                formData.append('package_id' , package_id);
                for(var i = 0 ; i<ids.length ; i++){
                    formData.append('extra_package_id[]' , ids[i]);
                }

                $.ajax({
                    url:"{{route('subscripes.update' , ['language' => app()->getLocale() , 'id' => request()->id])}}",
                    type:"POST",
                    data:formData,
                    processData: false,
                    contentType: false,
                    success:function(data){
                        Swal.fire(
                            'لقد تم تعديل هذا الاشتراك بنجاح !',
                            'أضغط علي الزر للمتابعة !',
                            'success'
                        ).then(function() {
                            window.location = "{{route('subscripes.index' , app()->getLocale())}}";
                        });
                        
                        
                    },error:function(error){
                        console.log(error.responseText);
                        $.each(error.responseJSON.errors, function(key,value) {
                            Swal.fire(
                                'هناك خطأ ما عند التسجيل !',
                                '<div style="color:red;">'+value+'</div>',
                                'error'
                            )
                        });
                    }
                });
            });
        });
    </script>
@endsection