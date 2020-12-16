<div class="tab-pane fade" id="nav-dipendenze" role="tabpanel" aria-labelledby="nav-dipendenze-tab">
    <form method="POST" action="{{route('admin.gare-inserimentos.update', ['gare_inserimento' => 0])}}" id="form_dipendenze">
        @method('PUT')
        @csrf
        <div style="padding: 20px;">
            <p>
                <div class="form-check row" style="padding-left: 30px">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <input class="form-check-input" type="radio" name="dipendenza" id="radio-dependense1" value="0" {{((isset($gare->dipendenza) && $gare->dipendenza == 0) ? "checked" : "")}}>
                        <label class="form-check-label" for="radio-dependense1">
                            Principale: Gara che si sviluppa su un arco di tempo temporale mensile
                        </label>
                    </div>
                </div>
            </p>
            <p>
                <div class="form-check row" style="padding-left: 30px">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <input class="form-check-input" type="radio" name="dipendenza" id="radio-dependense2" value="1" {{((isset($gare->dipendenza) && $gare->dipendenza == 1) ? "checked" : "")}}>
                        <label class="form-check-label" for="radio-dependense2">
                            Secondaria: Gara che si sviluppa su un arco di tempo contenuto nel mese
                        </label>
                    </div>
                </div>
            </p>
            <p>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <label for="list_gares" style="text-align: center">Seleziona la gara Principale di riferimento</label>
                        <select class="form-control" id="list_gares" name="dipendenza_gara_id" required="">
                            <option value=""></option>
                            @foreach($gares as $id => $titolo)
                            <option value="{{$id}}" {{((isset($gare->dipendenza_gara_id) && $gare->dipendenza_gara_id == $id) ? "selected" : "")}}>{{$titolo}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </p>
        </div>
        <p>
            
        </p>
        <div class="mt-5 row">
            <div class="col-lg-4 col-md-8 col-sm-12">
                <button type="button" class="btn btn-info go-back">
                    Target
                </button>
                <button type="submit" class="btn btn-danger pull-right go-next">
                    Metodo attribuzione
                </button>
            </div>
        </div>
    </form>
</div>