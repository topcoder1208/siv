<style type="text/css">
    #target_dettaglis_point_lists_wrapper .dt-buttons {
        display: none;
    }
</style>
<div class="tab-pane fade show active" id="nav-target-pdv" role="tabpanel" aria-labelledby="nav-target-pdv-tab" url="{{ route('admin.gare-inserimento-dettaglis.insertFrom', ['gare_inserimento_id' => 0, 'tipologia_id' => 15]) }}" style="padding-left: 30px;">
    <div class="form-group">
        <p>
            <div class="row">
                <div class="form-check col-3">
                    <input class="form-check-input" name="target-point-radio" id="target_point_tutti" type="radio" checked>
                    <label class="form-check-label" for="target_point_tutti">Tutti i PDV</label>
                </div>
            </div>
        </p>
        <p>
            <div class="row">
                <div class="form-check col-3">
                    <input class="form-check-input" id="target_pdv_tutti" type="radio" name="target-point-radio">
                    <label class="form-check-label" for="target_pdv_tutti">Solo alcuni pdv</label>
                </div>
            </div>
        </p>
        <p>
            <div class="row">
                <div class="form-check col-3">
                    <div class="custom-file">
                        <div id="target-point-file" class="file-uploader" url="{{ route('admin.gare-inserimento-dettaglis.insertFromFileUpload', ['tipologia_id' => 15, 'gare_inserimento_id' => 0]) }}">Scegli il file di elenco</div>
                    </div>
                </div>
            </div>
        </p>
        <p>
            <div class="row">
                <div class="form-check col-3">
                    <input class="form-check-input" name="target-point-radio" id="target_point_pdv_seleziona" type="radio">
                    <label class="form-check-label" for="target_point_pdv_seleziona">Seleziona i PDV da elenco</label>
                </div>
            </div>
        </p>
        <p>
            <button id="btn_target_point" class="btn btn-primary">Seleziona</button>
            <div class="modal fade" id="target_point_modal" tabindex="-1" role="dialog" aria-labelledby="target_point_modal" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document" style="max-width: 1020px;">
                    <div class="modal-content">
                        <section class="contact-form">
                            <form id="form_target_point" class="contact-input" method="POST" action="{{route('admin.gare-inserimento-dettaglis.insertFromSelected')}}">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="target_point_modal_label">Seleziona i PDV</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table id="target_point_lists" url="{{route('admin.gare-inserimento-dettaglis.getDettaglisSrc', ['tipologia_id' => 15, 'gare_inserimento_id' => 0])}}">
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
        </p>
    </div>
    <div class="row">
        <div id="target_dettaglis_point_lists_wrapper" class="target-table  col-lg-4 col-md-6 col-sm-12">
            <table id="target_dettaglis_point_lists" class="col-lg-4 col-md-6 col-sm-12" style="width: 100%;" url="{{route('admin.gare-inserimento-dettaglis.getDettaglis', ['tipologia_id' => 15, 'gare_inserimento_id' => 0])}}">
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