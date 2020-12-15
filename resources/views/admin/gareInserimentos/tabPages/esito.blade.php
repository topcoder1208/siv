<div class="tab-pane fade" id="nav-esito" role="tabpanel" aria-labelledby="nav-esito-tab">
    <form method="POST" action="">
        @method('POST')
        @csrf
        <div class="card">
            <div class="card-header">
                L'esito della gara determinerà un impatto su altre gare?
            </div>

            <div class="card-body">
                <div class="container">
                    
                    <div>
                        <p>
                            <div class="form-check" style="padding-left: 30px">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                <label class="form-check-label" for="exampleRadios1">
                                    SI'
                                </label>
                            </div>
                        </p>
                        <p>
                            <div class="form-check" style="padding-left: 30px">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                <label class="form-check-label" for="exampleRadios1">aumentare i compensi con un incremento percentuale</label>
                                <input type="text">
                                <label class="form-check-label" for="exampleRadios1">al raggiungimento dell'obiettivo fissato in gara</label>
                            </div>
                        </p>
                        <p>
                            <div class="form-check" style="padding-left: 30px; margin-top:5px">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                <label class="form-check-label" for="exampleRadios1">ridurre i compensi con un decremento percentuale</label>
                                <input type="text">
                                <label class="form-check-label" for="exampleRadios1">al mancato raggiungimento dell'obiettivo fissato in gara</label>
                            </div>
                        </p>
                        <p>
                            <div class="form-check" style="padding-left: 30px">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                                <label class="form-check-label" for="exampleRadios1">
                                    NO
                                </label>
                            </div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                Selezionare le gare di seguito elencate (attive ed escluse nello stesso arco intervallo temporale) che subiranno l'impatto sulla base della presente gara
            </div>

            <div class="card-body">
                <div class="container">
                    <div style="margin-top: 30px">
                        <p>
                            <div class="form-check" style="padding-left: 30px">
                                <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1">
                                <label class="form-check-label" for="exampleRadios1">Gara 1</label>
                            </div>
                        </p>
                        <p>
                            <div class="form-check" style="padding-left: 30px">
                                <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1">
                                <label class="form-check-label" for="exampleRadios1">Gara 2</label>
                            </div>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>