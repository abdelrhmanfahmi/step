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
                            <h4 class="mb-sm-0 font-size-18">{{__('messages.Packages')}}</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('messages.Home')}}</a></li>
                                    <li class="breadcrumb-item active">{{__('messages.Packages')}}</li>
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
                                            @if(count($packages) > 0)
                                                @foreach($packages as $package)
                                                    @if( Config::get('app.locale') == 'en' )
                                                        <tr>                                        
                                                            <td>{{$package->name_en}}</td>
                                                            <td>{{$package->price}}</td>
                                                            <td>
                                                                <a href="edit/packages/{{$package->id}}" class="btn btn-success">{{__('messages.Edit')}}</a>
                                                                <a data-swal-template="#my-templateEn{{$package->id}}" class="btn btn-danger">{{__('messages.Delete')}}</a>
                                                            </td>
                                                        </tr>
                                                        <template id="my-templateEn{{$package->id}}">
                                                            <swal-title>
                                                                Do You Want To Delete This Package?
                                                            </swal-title>
                                                            <swal-icon type="warning" color="red"></swal-icon>
                                                            <swal-button type="confirm">
                                                                <a href="{{route('packages.delete' , ['language' => app()->getLocale() , 'id' => $package->id])}}" style="color:white;">{{__('messages.Delete')}}</a>
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
                                                            <td>{{$package->name_ar}}</td>                                                         
                                                            <td>{{$package->price}}</td>
                                                            <td>
                                                                <a href="edit/packages/{{$package->id}}" class="btn btn-success">{{__('messages.Edit')}}</a>                                                            
                                                                <a data-swal-template="#my-templateAr{{$package->id}}" class="btn btn-danger">{{__('messages.Delete')}}</a>
                                                            </td>
                                                        </tr>
                                                        <template id="my-templateAr{{$package->id}}">
                                                            <swal-title>
                                                                هل تريد مسح  هذه الباقة؟
                                                            </swal-title>
                                                            <swal-icon type="warning" color="red"></swal-icon>
                                                            <swal-button type="confirm">
                                                                <a href="{{route('packages.delete' , ['language' => app()->getLocale() , 'id' => $package->id])}}" style="color:white;">{{__('messages.Delete')}}</a>
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