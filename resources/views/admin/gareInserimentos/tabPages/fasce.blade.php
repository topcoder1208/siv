<div class="tab-pane fade" id="nav-fasce" role="tabpanel" aria-labelledby="nav-fasce-tab">
    <p></p>
    <p></p>
    <p>Quante fasce precedi di utilizzare?</p>
    <ul class="list-group list-group-flush">
        @foreach($brand_tipologias as $id => $data)
        <li class="list-group-item">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" value="{{$id}}" name="brand-tiplogias" class="custom-control-input" id="check_{{$id}}" {{$data[1] == 1 ? "checked" : ""}}>
                <label class="custom-control-label" for="check_{{$id}}">{{$data[0]}}</label>
            </div>
        </li>
        @endforeach
    </ul>
    <p>
        <div class="col-lg-5 col-md-7">
            <input type="number" class="form-control" id="inp_fasce" placeholder="Inserisci il numero di fasce da autilizzare" value="{{$fasce_val}}">
        </div>
    </p>
    <p></p>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-9">
            <button class="btn btn-info go-back">
                Titolo della gara
            </button>
            <button class="btn btn-danger pull-right go-next">
                Beneficiari
            </button>
        </div>
        <div class="col-lg-9 col-md-6 col-sm-3">
            <button class="btn btn-success pull-left save" action="{{route('admin.gare-inserimento-dettaglis.saveFasce')}}">
                Crea
            </button>  
        </div>
    </div>
</div>