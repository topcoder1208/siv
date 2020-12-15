<div class="tab-pane fade" id="nav-agenti" role="tabpanel" aria-labelledby="nav-agenti-tab" url="{{ route('admin.gare-inserimento-dettaglis.insertFrom', ['gare_inserimento_id' => 0, 'tipologia_id' => 12]) }}" style="padding-left: 30px;">
    <div class="form-group">
        <p>
            <div class="row">
                <div class="form-check col-3">
                    <input class="form-check-input" name="beneficiari-agenti" id="benficiari_agneti_tutti" type="radio" checked>
                    <label class="form-check-label" for="benficiari_agneti_tutti">Tutti gli agenti</label>
                </div>
            </div>
        </p>
        <p>
            <div class="row">
                <div class="form-check col-3">
                    <input class="form-check-input" name="beneficiari-agenti" id="benficiari_agneti_pdv_solo" type="radio">
                    <label class="form-check-label" for="benficiari_agneti_pdv_solo">Solo alcuni agenti</label>
                </div>
            </div>
        </p>
        <p>
            <div class="row">
                <div class="form-check col-3">
                    <div class="custom-file">
                        <div id="beneficiari-agentia-file" class="file-uploader" url="{{ route('admin.gare-inserimento-dettaglis.insertFromFileUpload', ['tipologia_id' => 12, 'gare_inserimento_id' => 0]) }}">Scelgi il file di elenco</div>
                    </div>
                </div>
            </div>
        </p>
        <p>
            <div class="row">
                <div class="form-check col-3">
                    <input class="form-check-input" name="beneficiari-agenti" id="benficiari_agneti_pdv_seleziona" type="radio">
                    <label class="form-check-label" for="benficiari_agneti_pdv_seleziona">Seleziona gli agenti da elenco</label>
                </div>
            </div>
        </p>
        <p>
            <button id="btn_insert_agenti_modal" class="btn btn-primary">Seleziona</button>
            <div class="modal fade" id="insert_agenti_modal" tabindex="-1" role="dialog" aria-labelledby="insert_agenti_modal" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document" style="max-width: 1020px;">
                    <div class="modal-content">
                        <section class="contact-form">
                            <form id="form-select-agenti" class="contact-input" method="POST" action="{{route('admin.gare-inserimento-dettaglis.insertFromSelected')}}">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="insert_agenti_modal_label">Seleziona gli agenti</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table id="agenti_lists" url="{{route('admin.gare-inserimento-dettaglis.getDettaglisSrc', ['tipologia_id' => 12, 'gare_inserimento_id' => 0])}}">
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
    <div id="beneficiar_dealer_lists_wrapper" class="beneficiar-table">
        <table id="beneficiar_agentia_lists" style="width: 100%;" url="{{route('admin.gare-inserimento-dettaglis.getDettaglis', ['tipologia_id' => 12, 'gare_inserimento_id' => 0])}}">
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