@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">Test Page</div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.upload", ['tipologia' => 1, 'gare_inserimento_id' => 1])}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="file" name="file">
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection