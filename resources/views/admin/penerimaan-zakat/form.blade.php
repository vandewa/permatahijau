{{ Form::hidden('stok', $beras) }}
<!-- Step 1 -->
<fieldset>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nama Penerima :</label>
                {{Form::text('nama', null, ['class' => 'form-control required', 'placeholder' => 'Nama Penerima'])}}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>RT :</label>
                {{Form::text('rt', null, ['class' => 'form-control required', 'placeholder' => 'RT'])}}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Blok :</label>
                {{Form::text('blok', null, ['class' => 'form-control required', 'placeholder' => 'blok'])}}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>No Rumah :</label>
                {{Form::text('no', null, ['class' => 'form-control required', 'placeholder' => 'No Rumah'])}}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Jumlah Beras (kg) :</label>
                <div class="input-group">
                    {{Form::text('jumlah_beras', null, ['class' => 'form-control required'])}}
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2">Kg</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Stok Beras Saat Ini (Kg)</label>
                {{Form::number('beras', $beras, ['class' => 'form-control required', 'placeholder' => 'kg', 'readonly'
                => 'true'])}}
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