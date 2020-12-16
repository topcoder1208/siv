<div class="tab-pane fade" id="nav-visibilita" role="tabpanel" aria-labelledby="nav-visibilita-tab">
    <form method="POST" action="{{route('admin.gare-inserimento-dettaglis.saveVisibilita')}}" id="form_visibilitas" url="{{route('admin.gare-inserimento-dettaglis.getVisibilita', ['gare_inserimento_id' => 0])}}">
        @method('POST')
        @csrf
        <div>
            @foreach($visibilitas as $id => $name)
            <p>
                <div class="form-check" style="padding-left: 30px">
                    <input class="form-check-input visibillita" type="checkbox" name="data[]" value="{{$id}}" id="visibillita_{{$id}}">
                    <label class="form-check-label" for="visibillita_{{$id}}">{{$name}}</label>
                </div>
            </p>
            @endforeach
        </div>
        <div class="mt-5 row">
            <div class="col-lg-4 col-md-8 col-sm-12">
                <button class="btn btn-info go-back">
                    Concorrenti
                </button>
                <button type="submit" class="btn btn-danger pull-right go-next">
                    Esito
                </button>
            </div>
        </div>
    </form>
</div>