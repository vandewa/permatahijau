@section('title', 'Data Warga')
@extends('layout.main')
@section('content')
  <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Data Warga</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Data Warga</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-6 col-12">
                    <div class="form-group">
                       <a href="{{ route('admin:kegiatan-ormas.create') }}" class="btn btn-lg round mr-1 mb-1" style="color: rgb(255, 255, 255);
                       box-shadow: none;
                       background-color: rgb(51, 88, 244) !important;
                       background-image: linear-gradient(to left bottom, rgb(29, 140, 248), rgb(51, 88, 244), rgb(29, 140, 248)) !important;">
                       <i class="fa fa-plus-circle"></i>
                        Tambah Data Penerimaan
                    </a>
                    </div>
                </div>
            </div>

            @if(session('status'))
            <div class="alert bg-success text-white alert-styled-left alert-dismissible mt-1" >
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                {{ session('status') }}
            </div>
            @endif
            
            <div class="content-body">
            <!-- File export table -->
            <section id="file-export">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <form action="">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="" class="col-md-3">
                                                        RT
                                                    </label>
                                                    <div class="col-md-9">
                                                        {{Form::text('rt',null,['class' => 'name form-control', 'placeholder' => 'Nomor RT'])}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                    <table class="table table-striped table-bordered devan">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>RT</th>
                                                <th>Blok</th>
                                                <th>Nomor</th>
                                                <th>Jumlah Muzaki</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- File export table -->
        </div>
    </div>
</div>
@endsection

@push('js')
<script type="text/javascript">			
			var table = $('.devan').DataTable({
				processing: true,
				serverSide: true,
                ajax: window.location.href,
                dom: 'Blfrtip',
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "order": [[ 1, "asc" ]],
				columns: [
					{ data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false, className: "text-left"},
					{data: 'kepala_kk',},
					{data: 'rt', defaultContent: "-"},
					{data: 'blok', defaultContent: "-"},
					{data: 'nomor', defaultContent: "-"},
					{data: 'jumlah_muzaki', defaultContent: "-"},
                    // {data: 'created_by', },
					{
						data: 'action', 
						name: 'action', 
						orderable: false, 
						searchable: false
					},
				],
                buttons: [
                    {
                        text: 'Export',
                        extend: 'collection',
                        className: 'custom-html-collection',
                        buttons: [
                            {
                                        extend: 'pdfHtml5',
                                        title : 'Data Warga Permata Hijau',
                                        exportOptions: {
                                            columns: [ 0,1,2 ]
                                        }
                                    },
                                    {
                                        extend: 'excelHtml5',
                                        exportOptions: {
                                            columns: [ 0, 1, 2, 5 ]
                                        }
                                    },
                        ]
                    }
                    ],
			});

            $('input[name=rt]').on( 'keyup', function () {
                table
                    .column( 2)
                    .search( this.value )
                    .draw();
            } );
            
</script>

@endpush