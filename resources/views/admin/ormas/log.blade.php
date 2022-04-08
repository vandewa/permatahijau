@section('title', 'Edit Data User')
@extends('layout.main')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Edit Data User</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Data User</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Data User
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Form wizard with icon tabs section start -->
                <section id="icon-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Data User</h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-h font-medium-3"></i></a>
                                </div>
                                <div class="block-content">
                                    <table class="table table-borderless table-striped table-vcenter font-size-sm">
                                        <tbody>
                                            @foreach ($activity_log as $item)
                                                <tr>
                                                    <td class="font w-600 text-center" style="width: 100px;">
                                                        <span class="badge badge-success">{{ $item->user->name }}</span>
                                                    </td>
                                                    <td class="d-none d-sm-table-cell ">
                                                        <span class="badge badge-success">{{ $item->description }}</span>
                                                    </td>
                                                    
                                                    <td>
                                                        @php
                                                            $datanyadevan = $item->properties;
                                                            $datanyadamar = json_decode($datanyadevan);

                                                        @endphp
                                                        @if($item->description == 'updated')
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <p class="text-center text-info">Data Lama</p>
                                                                
                                                                    <p>id: {{ $datanyadamar->old->id??'' }}</p>
                                                                    <p>asas: {{ $datanyadamar->old->asas??'' }}</p>

                                                                    
                                                                
                                                                

                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p class="text-center text-danger">Data Baru</p>
                                                                    <p>id: {{ $datanyadamar->attributes->id??'' }}</p>
                                                                    <p>asas: {{ $datanyadamar->attributes->asas??'' }}</p>

                                                                    
                                                                
                                                            

                                                                </div>
                                                            </div>
                                                        @endif
                                                
                                                    </td>
                                                    
                                                    
                                                    <td>
                                                        <span class="badge badge-danger">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Form wizard with icon tabs section end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection

@push('js')
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\UpdatePasswordRequest') !!}

<script>
    function change()
     {
        var x = document.getElementById('pass').type;

        if (x == 'password')
        {
           document.getElementById('pass').type = 'text';
           document.getElementById('mybutton').innerHTML = '<i class="feather icon-eye-off"></i>';
        }
        else
        {
           document.getElementById('pass').type = 'password';
           document.getElementById('mybutton').innerHTML = '<i class="feather icon-eye"></i>';
        }
     }
</script>

<script>
    function change2()
     {
        var x = document.getElementById('passs').type;

        if (x == 'password')
        {
           document.getElementById('passs').type = 'text';
           document.getElementById('mybutton2').innerHTML = '<i class="feather icon-eye-off"></i>';
        }
        else
        {
           document.getElementById('passs').type = 'password';
           document.getElementById('mybutton2').innerHTML = '<i class="feather icon-eye"></i>';
        }
     }
</script>
     
@endpush
