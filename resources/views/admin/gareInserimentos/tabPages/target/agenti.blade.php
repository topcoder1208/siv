<div class="tab-pane fade" id="nav-target-agenti" role="tabpanel" aria-labelledby="nav-target-agenti-tab" url="{{ route('admin.gare-inserimento-dettaglis.insertFrom', ['gare_inserimento_id' => 0, 'tipologia_id' => 16]) }}" style="padding-left: 30px;">
    <div class="form-group">
        <p>
            <div class="row">
                <div class="form-check col-3">
                    <input class="form-check-input" name="target-agenti-radio" id="target_agenti_tutti" type="radio" checked>
                    <label class="form-check-label" for="target_agenti_tutti">Tutti i PDV</label>
                </div>
            </div>
        </p>
        <p>
            <div class="row">
                <div class="form-check col-3">
                    <input class="form-check-input" id="upload_target_agenti_from_file" type="radio" name="target-agenti-radio">
                    <label class="form-check-label" for="upload_target_agenti_from_file">Solo alcuni pdv</label>
                </div>
            </div>
        </p>
        <p>
            <div class="row">
                <div class="form-check col-3">
                    <div class="custom-file">
                        <div id="target-agenti-file" class="file-uploader" url="{{ route('admin.gare-inserimento-dettaglis.insertFromFileUpload', ['tipologia_id' => 16, 'gare_inserimento_id' => 0]) }}">Scelgi il file di elenco</div>
                    </div>
                </div>
            </div>
        </p>
        <p>
            <div class="row">
                <div class="form-check col-3">
                    <input class="form-check-input" name="target-agenti-radio" id="target_agenti_pdv_seleziona" type="radio">
                    <label class="form-check-label" for="target_agenti_pdv_seleziona">Seleziona i PDV da elenco</label>
                </div>
            </div>
        </p>
        <p>
            <button id="btn_target_agenti" class="btn btn-primary">Seleziona</button>
            <div class="modal fade" id="target_agenti_modal" tabindex="-1" role="dialog" aria-labelledby="target_agenti_modal" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document" style="max-width: 1020px;">
                    <div class="modal-content">
                        <section class="contact-form">
                            <form id="form_target_agenti" class="contact-input" method="POST" action="{{route('admin.gare-inserimento-dettaglis.insertFromSelected')}}">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="target_agenti_modal_label">Seleziona gli agenti</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table id="target_agenti_lists" url="{{route('admin.gare-inserimento-dettaglis.getDettaglisSrc', ['tipologia_id' => 16, 'gare_inserimento_id' => 0])}}">
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
        </p>
    </div>
    <div id="target_dettaglis_agenti_lists_wrapper" class="target-table">
        <table id="target_dettaglis_agenti_lists" style="width: 100%;" url="{{route('admin.gare-inserimento-dettaglis.getDettaglis', ['tipologia_id' => 16, 'gare_inserimento_id' => 0])}}">
            <thead>
                <tr>
                    <th></th>
                    <th>Codice</th>
                    <th>Name</th>
                </tr>
            </thead>
        </table>
    </div>
</div>