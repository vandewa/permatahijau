<!-- Step 1 -->
{{ Form::hidden('jumlah_muzaki',$data->warga->jumlah_muzaki ) }}
{{ Form::hidden('warga_id',$data->warga->id ) }}
<fieldset>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nama Kepala Keluarga :</label>
                {{Form::text('nama', $data->warga->nama, ['class' => 'form-control required', 'readonly' => true])}}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>RT :</label>
                {{Form::text('rt', $data->warga->rt, ['class' => 'form-control required', 'readonly' => true])}}
            </div>
        </div>
    </div>

    @if($data->jumlah_uang != 0)
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Pilih Uang :</label>
                <!-- Select -->
                <select name="uang" class="form-control">
                    <option value="">--Pilih--</option>
                    <option value="12000" {{ $data->uang == 12000 ? 'selected' : '' }}>Uang Rp 12.000,- / Kg</option>
                    <option value="13000" {{ $data->uang == 13000 ? 'selected' : '' }}>Uang Rp 13.000,- / Kg</option>
                </select>
            </div>
        </div>
    </div>
    @endif

    <hr>
    <h3>Ganti Jenis Zakat</h3>

    @if($data->jumlah_uang != 0)
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Pilih Jenis Zakat :</label>
                <!-- Select -->
                <select name="jenis_zakat" class="form-control">
                    <option value="">--Pilih--</option>
                    <option value="1">Beras( 2,5 Kg) </option>
                </select>
            </div>
        </div>
    </div>
    @else
    {{ Form::hidden('jenis_zakat',2 ) }}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Pilih Uang :</label>
                <!-- Select -->
                <select name="uang" class="form-control">
                    <option value="">--Pilih--</option>
                    <option value="12000">Uang Rp 12.000,- / Kg</option>
                    <option value="13000">Uang Rp 13.000,- / Kg</option>
                </select>
            </div>
        </div>
    </div>
    @endif

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