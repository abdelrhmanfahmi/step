@extends('admin.index')
@section('main')
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
                            <h4 class="mb-sm-0 font-size-18">{{__('messages.Extra Packages')}}</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('messages.Home')}}</a></li>
                                    <li class="breadcrumb-item active">{{__('messages.Extra Packages')}}</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="table-rep-plugin">
                                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-striped">
                                            <thead>
                                                @if( Config::get('app.locale') == 'en' )
                                                    <tr>                                                
                                                        <th data-priority="2">{{__('messages.Name_en')}}</th>
                                                        <th data-priority="2">{{__('messages.Price')}}</th>
                                                        <th data-priority="2">{{__('messages.Actions')}}</th>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <th data-priority="2">{{__('messages.Name_ar')}}</th>                                                
                                                        <th data-priority="2">{{__('messages.Price')}}</th>
                                                        <th data-priority="2">{{__('messages.Actions')}}</th>
                                                    </tr>
                                                @endif
                                            </thead>
                                            <tbody>
                                            @if(count($extra_packages) > 0)
                                                @foreach($extra_packages as $extra_package)
                                                    @if( Config::get('app.locale') == 'en' )
                                                        <tr>                                                
                                                            <td>{{$extra_package->name_en}}</td>
                                                            <td>{{$extra_package->price}}</td>
                                                            <td>
                                                                <a href="edit/extra_packages/{{$extra_package->id}}" class="btn btn-success">{{__('messages.Edit')}}</a>
                                                                <a data-swal-template="#my-templateEn{{$extra_package->id}}" class="btn btn-danger">{{__('messages.Delete')}}</a>
                                                            </td>
                                                        </tr>
                                                        <template id="my-templateEn{{$extra_package->id}}">
                                                            <swal-title>
                                                                Do You Want To Delete This Extra Package?
                                                            </swal-title>
                                                            <swal-icon type="warning" color="red"></swal-icon>
                                                            <swal-button type="confirm">
                                                                <a href="{{route('extra_packages.delete' , ['language' => app()->getLocale() , 'id' => $extra_package->id])}}" style="color:white;">{{__('messages.Delete')}}</a>
                                                            </swal-button>
                                                            <swal-button type="cancel">
                                                                cancel
                                                            </swal-button>
                                                            <swal-param name="allowEscapeKey" value="false" />
                                                            <swal-param
                                                                name="customClass"
                                                                value='{ "popup": "my-popup" }' />
                                                        </template>
                                                    @else
                                                        <tr>
                                                            <td>{{$extra_package->name_ar}}</td>                                                           
                                                            <td>{{$extra_package->price}}</td>
                                                            <td>
                                                                <a href="edit/extra_packages/{{$extra_package->id}}" class="btn btn-success">{{__('messages.Edit')}}</a>
                                                                <a data-swal-template="#my-templateAr{{$extra_package->id}}" class="btn btn-danger">{{__('messages.Delete')}}</a>
                                                            </td>
                                                        </tr>
                                                        <template id="my-templateAr{{$extra_package->id}}">
                                                            <swal-title>
                                                                هل تريد مسح  هذه الباقة الإضافية؟
                                                            </swal-title>
                                                            <swal-icon type="warning" color="red"></swal-icon>
                                                            <swal-button type="confirm">
                                                                <a href="{{route('extra_packages.delete' , ['language' => app()->getLocale() , 'id' => $extra_package->id])}}" style="color:white;">{{__('messages.Delete')}}</a>                                                              
                                                            </swal-button>
                                                            <swal-button type="cancel">
                                                                إلغاء
                                                            </swal-button>
                                                            <swal-param name="allowEscapeKey" value="false" />
                                                            <swal-param
                                                                name="customClass"
                                                                value='{ "popup": "my-popup" }' />
                                                        </template>
                                                    @endif
                                                @endforeach
                                            @else
                                                    <tr><td colspan="5" class="text-center">{{__('messages.No Data Yet')}}</td></tr>
                                            @endif
                                            </tbody>
                                        </table>
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
    <script>
        Swal.bindClickHandler()
    
        Swal.mixin({
        modal: true,
        }).bindClickHandler('data-swal-template')
    </script>
@endsection