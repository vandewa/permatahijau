<fieldset>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Saldo Keuangan :</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2">Rp.</span>
                    </div>
                    <input type="text" class="form-control" value="{{ number_format($saldo) }}" required readonly>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Pilih Jenis :</label>
                <select name="jenis" class="form-control">
                    <option value="">--Pilih--</option>
                    <option value="belanja">Belanja Beras</option>
                    <option value="donasi">Donasi</option>
                </select>

            </div>
        </div>
    </div>

    <div class="row dewa" style="display: none;">
        <div class="col-md-6">
            <div class="form-group">
                <label>Belanja Beras :</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2">Rp.</span>
                    </div>
                    {{Form::number('total_belanja', null, ['class' => 'form-control required'])}}
                </div>

            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Jumlah Beras :</label>
                <div class="input-group">
                    {{Form::text('beras', null, ['class' => 'form-control required'])}}
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2">Kg</span>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 dewananta" style="display: none;">
            <div class="form-group">
                <label>Jumlah Donasi :</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2">Rp.</span>
                    </div>
                    {{Form::number('donasi', null, ['class' => 'form-control required'])}}

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Keterangan :</label>
                {{Form::textarea('keterangan', null, ['class' => 'form-control', 'rows' => 2])}}
            </div>
        </div>
    </div>

</fieldset>

<div class="form-actions right">
    <a href="{{ redirect()->getUrlGenerator()->previous() }}">
        <button type="button" class="btn btn-warning mr-1">
            <i class="feather icon-x"></i> Cancel
        </button>
    </a>
    <button type="submit" class="btn btn-primary">
        <i class="fa fa-check-square-o"></i> Save
    </button>
</div>

@push('js')
<script>
    $(document).ready(function () {
        $('select[name=jenis]').change(function () {
            let isi = $(this).val();

            if (isi == 'belanja') {
                $('.dewa').show('slow');
            } else {
                $('.dewa').hide('slow');
            }

            if (isi == 'donasi') {
                $('.dewananta').show('slow');
            } else {
                $('.dewananta').hide('slow');
            }
        });
    });
</script>
@endpush