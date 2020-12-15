<div class="tab-pane fade" id="nav-metodo-attribuzione" role="tabpanel" aria-labelledby="nav-metodo-attribuzione-tab">
    <form method="POST" action="{{route('admin.gare-inserimento-dettaglis.saveMetodo')}}" id="form_metodo">
        @method('POST')
        @csrf
        <div class="card" style="background-color: transparent;">
            <div class="card-header" style="background-color: transparent;">
                In che modo dovranno essere attribuiti i premi della gara?
            </div>

            <div class="card-body">
                <div class="container">
                    <div>
                        <p>
                            <div class="form-check" style="padding-left: 30px">
                                <input class="form-check-input" type="radio" required name="metodo_attribuzione" id="metodo_attribuzione1" value="1" {{((isset($gare->metodo_attribuzione) && $gare->metodo_attribuzione == 1) ? "checked" : "")}}>
                                <label class="form-check-label" for="metodo_attribuzione1">
                                    Cumulabili: i premi calcolati in questa gara si aggiungono a quelli calcolati in altre gare attive nello stesso intervallo temporale
                                </label>
                            </div>
                        </p>
                        <p>
                            <div class="form-check" style="padding-left: 30px">
                                <input class="form-check-input" type="radio" required name="metodo_attribuzione" id="metodo_attribuzione2" value="0" {{((isset($gare->metodo_attribuzione) && $gare->metodo_attribuzione == 0) ? "checked" : "")}}>
                                <label class="form-check-label" for="metodo_attribuzione2">
                                    Solo nella gara Secondaria: i premi calcolati in questa gara erodono quelli calcolati nella gara principale
                                </label>
                            </div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card" style="background-color: transparent;">
            <div class="card-header" style="background-color: transparent;">
                I premi calcolati in questa gara vengono condizionati (incrementati o ridotti) dalla vendita di un determinato servizio (target soglia)?
            </div>

            <div class="card-body">
                <div class="container">
                    <p>
                        <div class="form-check" style="padding-left: 30px">
                            <input class="form-check-input" required type="radio" name="metodo_calcolo" id="metodo_calcolo1" value="0" {{((isset($gare->metodo_calcolo) && $gare->metodo_calcolo == 0) ? "checked" : "")}}>
                            <label class="form-check-label" for="metodo_calcolo1">
                                NO
                            </label>
                        </div>
                    </p>
                    <p>
                        <div class="form-check" style="padding-left: 30px">
                            <input class="form-check-input" required type="radio" name="metodo_calcolo" id="metodo_calcolo2" value="1" {{((isset($gare->metodo_calcolo) && $gare->metodo_calcolo == 1) ? "checked" : "")}}>
                            <label class="form-check-label" for="metodo_calcolo2">
                                SI'
                            </label>
                        </div>
                    </p>
                </div>
            </div>
        </div>
        <div class="card" style="background-color: transparent;">
            <div class="card-header" style="background-color: transparent;">
                Seleziona la famiglia di prodotto
            </div>

            <div class="card-body">
                <div class="container">
                    <!-- <div class="form-check">
                        <p>
                            <input class="form-check-input" type="radio" name="metodo_famiglia" id="metodo_famiglia1" value="1" />
                            <label class="form-check-label" for="metodo_famiglia1">
                                Accesso TIM
                            </label>
                        </p>
                    </div>
                    <div class="form-check">
                        <p>
                            <input class="form-check-input" type="radio" name="metodo_famiglia" id="metodo_famiglia2" value="0">
                            <label class="form-check-label" for="metodo_famiglia2">
                                Rete fissa
                            </label>
                        </p>
                    </div>
 -->
                    <div>
                        <p>
                            <button class="btn btn-primary" id="btn_metodo_open_modal" type="button">Seleziona le categorie</button>
                        </p>
                    </div>
                    <div id="metodo_checked_catatories_wrapper"></div>
                </div>
            </div>
        </div>
        <p></p>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-9">
                <button class="btn btn-info go-back">
                    Titolo della gara
                </button>
            </div>
            <div class="col-lg-9 col-md-6 col-sm-3">
                <button class="btn btn-success pull-left save" type="submit">
                    Save
                </button>  
            </div>
        </div>
    </form>

    <div class="modal fade" id="metodo_modal" tabindex="-1" role="dialog" aria-labelledby="metodo_modal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document" style="max-width: 1020px;">
            <div class="modal-content">
                <section class="contact-form">
                    <div class="modal-header">
                        <h5 class="modal-title" id="metodo_modal_label">Seleziona le categorie</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table id="metodo_categories_lists" url="{{route('admin.gare-inserimento-dettaglis.getMetodo', ['gare_inserimento_id' => 0])}}">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nome</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($brand_tipologias as $id => $brand_tipologia)
                                <tr>
                                    <td>{{$id}}</td>
                                    <td>{{$brand_tipologia[0]}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <fieldset class="form-group position-relative has-icon-left mb-0">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
                            <button type="button" class="btn btn-info" id="modal_save_button">Inserisci</button>
                        </fieldset>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>