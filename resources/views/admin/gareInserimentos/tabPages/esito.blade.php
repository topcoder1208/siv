<div class="tab-pane fade" id="nav-esito" role="tabpanel" aria-labelledby="nav-esito-tab">
    <form method="POST" action="{{route('admin.gare-inserimento-dettaglis.saveEsito')}}" id="esito_form">
        @method('POST')
        @csrf
        <div class="card" style="background: transparent;">
            <div class="card-header" style="background: transparent;">
                L'esito della gara determinerà un impatto su altre gare?
            </div>

            <div class="card-body">
                <div class="container">
                    
                    <div>
                        <p>
                            <div class="form-check" style="padding-left: 30px">
                                <input class="form-check-input" type="radio" name="esito" id="esito_yes" value="1" {{(isset($gare->esito) && $gare->esito == 1) ? "checked" : ""}}>
                                <label class="form-check-label" for="esito_yes">
                                    SI'
                                </label>
                            </div>
                        </p>
                        <p>
                            <div class="form-check" style="padding-left: 30px">
                                <label class="form-check-label" for="esito_incremento">aumentare i compensi con un incremento percentuale</label>
                                <input type="text" name="esito_incremento" id="esito_incremento" value="{{(isset($gare->esito) && $gare->esito == 1) ? $gare->esito_incremento : ""}}">
                                <label class="form-check-label" for="esito_incremento">al raggiungimento dell'obiettivo fissato in gara</label>
                            </div>
                        </p>
                        <p>
                            <div class="form-check" style="padding-left: 30px; margin-top:5px">
                                <label class="form-check-label" for="esito_decremento">ridurre i compensi con un decremento percentuale</label>
                                <input type="text" name="esito_decremento" id="esito_decremento" value="{{(isset($gare->esito) && $gare->esito == 1) ? $gare->esito_decremento : ""}}">
                                <label class="form-check-label" for="esito_decremento">al mancato raggiungimento dell'obiettivo fissato in gara</label>
                            </div>
                        </p>
                        <p>
                            <div class="form-check" style="padding-left: 30px">
                                <input class="form-check-input" type="radio" name="esito" id="esito_no" value="0" {{(isset($gare->esito) && $gare->esito == 0) ? "checked" : ""}}>
                                <label class="form-check-label" for="esito_no">
                                    NO
                                </label>
                            </div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card" style="background: transparent;">
            <div class="card-header" style="background: transparent;">
                Selezionare le gare di seguito elencate (attive ed escluse nello stesso arco intervallo temporale) che subiranno l'impatto sulla base della presente gara
            </div>

            <div class="card-body">
                <div class="container">
                    <div>
                        <p>
                            <button class="btn btn-primary" id="btn_esito_open_modal" type="button">Seleziona le categorie</button>
                        </p>
                    </div>
                    <div style="margin-top: 30px" id="esito_checked_wrapper">
                        @foreach($gares as $gare_id => $gare_titolo)
                        @if(isset($esito_gares[$gare_id]))
                        <p>
                            <div class="form-check" style="padding-left: 30px">
                                <input class="form-check-input" type="checkbox" name="esito_gare[]" id="esito_{{$gare_id}}" value="{{$gare_id}}" checked>
                                <label class="form-check-label" for="esito_{{$gare_id}}">{{$gare_titolo}}</label>
                            </div>
                        </p>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
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
                <button class="btn btn-success pull-left save" type="submit">
                    Crea
                </button>  
            </div>
        </div>

    </form>
    <div class="modal fade" id="esito_modal" tabindex="-1" role="dialog" aria-labelledby="esito_modal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" style="max-width: 1020px;">
            <div class="modal-content">
                <section class="contact-form">
                    <div class="modal-header">
                        <h5 class="modal-title" id="esito_modal_label">Seleziona le Gareinserimentos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table id="esito_lists" url="{{route('admin.gare-inserimento-dettaglis.getEsito', ['gare_inserimento_id' => 0])}}">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nome</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($gares as $gare_id => $gare_titolo)
                                <tr>
                                    <td>{{$gare_id}}</td>
                                    <td>{{$gare_titolo}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <fieldset class="form-group position-relative has-icon-left mb-0">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
                            <button type="button" class="btn btn-info" id="esito_modal_save_button">Inserisci</button>
                        </fieldset>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>