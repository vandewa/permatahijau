<fieldset>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nama Kepala Keluarga :</label>
                {{Form::text('nama', null, ['class' => 'form-control required'])}}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>RT :</label>
                {{Form::text('rt', null, ['class' => 'form-control required'])}}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Blok :</label>
                {{Form::text('blok', null, ['class' => 'form-control required'])}}
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Nomor Rumah :</label>
                {{Form::text('nomor', null, ['class' => 'form-control required'])}}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Jumlah Muzaki :</label>
                {{Form::number('jumlah_muzaki', null, ['class' => 'form-control required'])}}
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