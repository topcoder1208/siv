<style type="text/css">
    #beneficiar_point_lists_wrapper .dt-buttons {
        display: none;
    }
</style>
<div class="tab-pane fade show active" id="nav-pdv" role="tabpanel" aria-labelledby="nav-pdv-tab" url="{{ route('admin.gare-inserimento-dettaglis.insertFrom', ['gare_inserimento_id' => 0, 'tipologia_id' => 10]) }}" style="padding-left: 30px;">
    <p>
        <div class="row">
            <div class="form-check col-3">
                <input class="form-check-input beneficiari-radio" id="benficiari_pdv_tutti" type="radio" name="beneficiari" checked>
                <label class="form-check-label" for="benficiari_pdv_tutti">Tutti i PDV</label>
            </div>
        </div>
    </p>
    <p>
        <div class="row">
            <div class="form-check col-3">
                <input class="form-check-input beneficiari-radio" id="benficiari_pdv_solo" type="radio" name="beneficiari">
                <label class="form-check-label" for="benficiari_pdv_solo">Solo alcuni pdv</label>
            </div>
        </div>
    </p>
    <p>
        <div class="row">
            <div class="form-check col-3">
                <div id="beneficiari-pdv-file" class="file-uploader" url="{{ route('admin.gare-inserimento-dettaglis.insertFromFileUpload', ['tipologia_id' => 10, 'gare_inserimento_id' => 0]) }}">Scegli il file di elenco</div>
            </div>
        </div>
    </p>
    <p>
        <div class="row">
            <div class="form-check col-3">
                <input class="form-check-input beneficiari-radio" id="benficiari_pdv_seleziona" type="radio" name="beneficiari">
                <label class="form-check-label" for="benficiari_pdv_seleziona">Seleziona i PDV da elenco</label>
            </div>
        </div>
    </p>
    <p>
        <div class="row">
            <button id="btn-beneficiari-pdv-seleziona" class="btn btn-primary">Seleziona</button>
            <div class="modal fade" id="insert_pdv_modal" tabindex="-1" role="dialog" aria-labelledby="insert_pdv_modal" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document" style="max-width: 1020px;">
                    <div class="modal-content">
                        <section class="contact-form">
                            <form id="form-select-dealer-points" class="contact-input" method="POST" action="{{route('admin.gare-inserimento-dettaglis.insertFromSelected')}}">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="insert_pdv_modal_label">Seleziona punti vendita</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table id="pdv_lists" url="{{route('admin.gare-inserimento-dettaglis.getDettaglisSrc', ['tipologia_id' => 10, 'gare_inserimento_id' => 0])}}">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Codice</th>
                                                <th>Point</th>
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
    </p>
    <div class="row">
        <div id="beneficiar_point_lists_wrapper" class="beneficiar-table col-lg-4 col-md-6 col-sm-12">
            <table id="beneficiar_point_lists" style="width: 100%;" url="{{route('admin.gare-inserimento-dettaglis.getDettaglis', ['tipologia_id' => 10, 'gare_inserimento_id' => 0])}}">
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