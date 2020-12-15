<div class="tab-pane fade" id="nav-concorrenti" role="tabpanel" aria-labelledby="nav-concorrenti-tab">
    <form id="form_consorrenti" method="POST" action="{{route('admin.gare-inserimento-dettaglis.insertFrom', ['gare_inserimento_id' => 0, 'tipologia_id' => 14])}}">
        @method('POST')
        @csrf
        
        <div>
            <p>
                <div class="form-check" style="padding-left: 30px">
                    <input class="form-check-input" type="radio" name="consorrenti-radio" id="consorrenti-radio1" checked>
                    <label class="form-check-label" for="consorrenti-radio1">Tutti i PDV</label>
                </div>
            </p>
            <p>
                <div class="form-check" style="padding-left: 30px">
                    <input class="form-check-input" type="radio" name="consorrenti-radio" id="consorrenti-radio2">
                    <label class="form-check-label" for="consorrenti-radio2">Solo alcuni pdv</label>
                </div>
            </p>
            <p>
                <div class="form-group" style="margin: 3px 0px 3px 25px">
                    <div class="custom-file">
                        <div id="consorrenti-file" class="file-uploader" url="{{ route('admin.gare-inserimento-dettaglis.insertFromFileUpload', ['tipologia_id' => 14, 'gare_inserimento_id' => 0]) }}">Scelgi il file di elenco</div>
                    </div>
                </div>
            </p>
            <p>
                <div class="form-check" style="padding-left: 30px">
                    <input class="form-check-input" type="radio" name="consorrenti-radio" id="consorrenti-radio3">
                    <label class="form-check-label" for="consorrenti-radio3">Seleziona i PDV da elenco</label>
                </div>
            </p>
            <p>
                <button type="button" class="btn btn-success" id="btn_insert_consorrenti" style="margin-left: 23px">
                    Seleziona
                </button>
            </p>
            <div class="form-button" style="margin: 20px 0px 0px 13px">
                <button type="button" id="btn_copy_points" class="btn btn-outline-primary" url="{{ route('admin.gare-inserimento-dettaglis.insertFrom', ['tipologia_id' => 13, 'gare_inserimento_id' => 0])}}"> Copia PDV da punto precedente</button>
            </div>
        </div>
    </form>
    <div id="consorrenti_lists_wrapper" class="consorrenti-table">
        <table id="consorrenti_lists" style="width: 100%;" url="{{route('admin.gare-inserimento-dettaglis.getDettaglis', ['tipologia_id' => 14, 'gare_inserimento_id' => 0])}}">
            <thead>
                <tr>
                    <th></th>
                    <th>Codice</th>
                    <th>Name</th>
                </tr>
            </thead>
        </table>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-12">
            <button class="btn btn-info go-back">
                Titolo della gara
            </button>
            <button class="btn btn-danger pull-right go-next">
                Beneficiari
            </button>
        </div>
    </div>

    <div class="modal fade" id="insert_consorrenti_modal" tabindex="-1" role="dialog" aria-labelledby="insert_consorrenti_modal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" style="max-width: 1020px;">
            <div class="modal-content">
                <section class="contact-form">
                    <form id="form-select-inserted-dettaglis" class="contact-input" method="POST" action="{{route('admin.gare-inserimento-dettaglis.insertFromSelected')}}">
                        <div class="modal-header">
                            <h5 class="modal-title" id="insert_consorrenti_modal_label">Seleziona punti vendita</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table id="inserted_point_lists" url="{{route('admin.gare-inserimento-dettaglis.getDettaglisSrc', ['tipologia_id' => 14, 'gare_inserimento_id' => 0])}}">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Codice</th>
                                        <th>Agente</th>
                                        <th>Indirizzo</th>
                                        <th>Cap</th>
                                        <th>Provincia</th>
                                        <th>Citta</th>
                                        <th>Regione</th>
                                        <th></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <fieldset class="form-group position-relative has-icon-left mb-0">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
                                <button type="submit" class="btn btn-info">Inserisci</button>
                            </fieldset>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</div>