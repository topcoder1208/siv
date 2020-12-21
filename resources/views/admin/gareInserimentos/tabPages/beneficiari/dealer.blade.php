<style type="text/css">
    #beneficiar_dealer_lists_wrapper .dt-buttons {
        display: none;
    }
</style>
<div class="tab-pane fade" id="nav-dealer" role="tabpanel" aria-labelledby="nav-dealer-tab" url="{{ route('admin.gare-inserimento-dettaglis.insertFrom', ['gare_inserimento_id' => 0, 'tipologia_id' => 11]) }}" style="padding-left: 30px;">
    <div class="form-group">
        <p>
            <div class="row">
                <div class="form-check col-3">
                    <input class="form-check-input" name="beneficiari-dealer" id="benficiari_dealer_tutti" type="radio" checked>
                    <label class="form-check-label" for="benficiari_dealer_tutti">Tutti gli dealer</label>
                </div>
            </div>
        </p>
        <p>
            <div class="row">
                <div class="form-check col-3">
                    <input class="form-check-input" name="beneficiari-dealer" id="benficiari_dealer_pdv_solo" type="radio">
                    <label class="form-check-label" for="benficiari_dealer_pdv_solo">Solo alcuni dealer</label>
                </div>
            </div>
        </p>
        <p>
            <div class="row">
                <div class="form-check col-3">
                    <div class="custom-file">
                        <div id="beneficiari-dealer-file" class="file-uploader" url="{{ route('admin.gare-inserimento-dettaglis.insertFromFileUpload', ['tipologia_id' => 11, 'gare_inserimento_id' => 0]) }}">Scegli il file di elenco</div>
                    </div>
                </div>
            </div>
        </p>
        <p>
            <div class="row">
                <div class="form-check col-3">
                    <input class="form-check-input" name="beneficiari-dealer" id="benficiari_dealer_pdv_seleziona" type="radio">
                    <label class="form-check-label" for="benficiari_dealer_pdv_seleziona">Seleziona gli dealer da elenco</label>
                </div>
            </div>
        </p>
        <p>
            <button id="btn_insert_dealer_modal" class="btn btn-primary">Seleziona</button>
            <div class="modal fade" id="insert_dealer_modal" tabindex="-1" role="dialog" aria-labelledby="insert_dealer_modal" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document" style="max-width: 1020px;">
                    <div class="modal-content">
                        <section class="contact-form">
                            <form id="form-select-dealers" class="contact-input" method="POST" action="{{route('admin.gare-inserimento-dettaglis.insertFromSelected')}}">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="insert_dealer_modal_label">Seleziona gli dealer</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table id="dealer_lists" url="{{route('admin.gare-inserimento-dettaglis.getDettaglisSrc', ['tipologia_id' => 11, 'gare_inserimento_id' => 0])}}">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Codice</th>
                                                <th>Dealer</th>
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
    <div class="row">
        <div id="beneficiar_dealer_lists_wrapper" class="beneficiar-table  col-lg-4 col-md-6 col-sm-12">
            <table id="beneficiar_dealer_lists" class="col-lg-4 col-md-6 col-sm-12" style="width: 100%;" url="{{route('admin.gare-inserimento-dettaglis.getDettaglis', ['tipologia_id' => 11, 'gare_inserimento_id' => 0])}}">
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
</div>