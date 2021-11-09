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
                            <h4 class="mb-sm-0 font-size-18">{{__('messages.Show Sales')}}</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('messages.Show Sales')}}</a></li>
                                    <li class="breadcrumb-item active">{{__('messages.Show Sales')}}</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-4 card text-center" style="width: 20rem;margin-left:15px;">
                                <div class="card-header">Featured 1</div>
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                </div>
                                <div class="card-footer text-muted"></div>
                            </div>
                            <div class="col-md-4 card text-center" style="width: 20rem;margin-left:15px;">
                                <div class="card-header">Featured 2</div>
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                </div>
                                <div class="card-footer text-muted"></div>
                            </div>
                            <div class="col-md-4 card text-center" style="width: 20rem;margin-left:15px;">
                                <div class="card-header">Featured 3</div>
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                </div>
                                <div class="card-footer text-muted"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form>
                                    <!-- <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Logo')}}</label>
                                        <div class="col-md-10">
                                            <img src="/assets/img/logos/stepsWhiteCopy.png" width="100px" height="100px" alt="">
                                        </div>
                                    </div> -->

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Orders')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="store_link" id="store_link" placeholder="Enter Store Link" value="1000" type="text" disabled style="background-color:#fff;">
                                        </div>
                                    </div>


                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Total')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="manager" id="manager" placeholder="Enter Manager" value="100000" type="text" disabled style="background-color:#fff;">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Steps Percentage')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="phone" id="phone" placeholder="Enter Phone" value="10%" type="text" disabled style="background-color:#fff;">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Price After Percentage')}}</label>
                                        <div class="col-md-10">
                                            <input class="form-control" name="email" id="email" placeholder="Enter E-mail" value="90000" type="text" disabled style="background-color:#fff;">
                                        </div>
                                    </div>
                                   
                                </form>
                            </div>
                        </div>
                    </div> 
                </div>

                <div class="row">
                    <h3>{{__('messages.Bank Information')}}</h3>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Bank Name')}}</label>
                                    <div class="col-md-10">
                                        <input class="form-control" name="store_link" id="store_link1" placeholder="Enter Store Link" value="Emarates Bank" type="text" disabled style="background-color:#fff;">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Account Number')}}</label>
                                    <div class="col-md-10">
                                        <input class="form-control" name="store_link" id="store_link2" placeholder="Enter Store Link" value="1213354464632367" type="text" disabled style="background-color:#fff;">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.IPAN')}}</label>
                                    <div class="col-md-10">
                                        <input class="form-control" name="store_link" id="store_link3" placeholder="Enter Store Link" value="12343434" type="text" disabled style="background-color:#fff;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <h3>{{__('messages.History')}}</h3>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Filtering Date')}}</label>
                                    <div class="col-md-10">
                                        <input class="form-control" name="store_link" id="store_link4" placeholder="Enter Store Link" value="2021-11-02" type="text" disabled style="background-color:#fff;">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Orders')}}</label>
                                    <div class="col-md-10">
                                        <input class="form-control" name="store_link" id="store_link5" placeholder="Enter Store Link" value="1000" type="text" disabled style="background-color:#fff;">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Price After Percentage')}}</label>
                                    <div class="col-md-10">
                                        <input class="form-control" name="store_link" id="store_link6" placeholder="Enter Store Link" value="90000" type="text" disabled style="background-color:#fff;">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">{{__('messages.Account Number')}}</label>
                                    <div class="col-md-10">
                                        <input class="form-control" name="store_link" id="store_link7" placeholder="Enter Store Link" value="xxxxxxxxxxxx2367" type="text" disabled style="background-color:#fff;">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-md-10">
                                        <button class="btn btn-success" id="filiterButton">{{__('messages.Filtering')}}</button>
                                    </div>
                                </div>
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
        $(document).ready(function(){
            $('#filiterButton').on('click' , function(){
                Swal.fire({
                    title: 'لقد تمت التصفية بنجاح !',
                    confirmButtonText: 'تم',
                    icon: 'success',
                    timer:2500
                });
            });
        });
    </script>
@endsection