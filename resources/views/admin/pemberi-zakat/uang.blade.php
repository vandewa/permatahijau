@section('title', 'Data Pemberi Zakat')
@extends('layout.main')
@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title mb-0">Data Pemberi</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Data Pemberi</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-6 col-12">
                <div class="form-group">
                    <a href="{{ route('admin:cetak.zakat.uang') }}" class="btn btn-lg round mr-1 mb-1"
                        style="color: rgb(255, 255, 255);
                       box-shadow: none;
                       background-color: rgb(51, 88, 244) !important;
                       background-image: linear-gradient(to left bottom, rgb(29, 140, 248), rgb(51, 88, 244), rgb(29, 140, 248)) !important;">
                        <i class="fa fa-download"></i>
                        Cetak PDF
                    </a>
                </div>
            </div>
        </div>

        @if(session('status'))
        <div class="alert bg-success text-white alert-styled-left alert-dismissible mt-1">
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
                                    <!-- <form action="">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="" class="col-md-3">
                                                        RT
                                                    </label>
                                                    <div class="col-md-9">
                                                        {{Form::text('rt',null,['class' => 'name form-control',
                                                        'placeholder' => 'Nomor RT'])}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <hr> -->
                                    <table class="table table-striped table-bordered devan">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No</th>
                                                <th>Nama Kepala Keluarga</th>
                                                <th>Jumlah Muzaki</th>
                                                <th>RT</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="5">Total Uang (Rupiah)</td>
                                                <th>Uang</th>
                                            </tr>
                                        </tfoot>
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
        dom: 'Bfrtip',
        "order": [[2, "asc"]],
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, className: "text-left" },
            { data: 'id', visible: false },
            { data: 'warga.kepala_kk' },
            { data: 'warga.jumlah_muzaki' },
            { data: 'warga.rt', },
            { data: 'jumlah_uang', },
            // {data: 'created_by', },
            // {
            // 	data: 'action', 
            // 	name: 'action', 
            // 	orderable: true, 
            // 	searchable: true
            // },
        ],
        "footerCallback": function (row, data) {
            var api = this.api(), data;
            var intVal = function (i) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '') * 1 :
                    typeof i === 'number' ?
                        i : 0;
            };
            pQty = api.column(5, { page: 'current' })
                .data().reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0)
            $(api.column(5).footer()).html(
                pQty
            )

        },
        buttons: [
            // 'copy', 'csv', 'excel', 'pdf', 'print',
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [0, 2, 3, 4, 5]
                }
            },
        ],

    });

    $('input[name=rt]').on('keyup', function () {
        table
            .column(4)
            .search(this.value)
            .draw();
    });



</script>
@endpush