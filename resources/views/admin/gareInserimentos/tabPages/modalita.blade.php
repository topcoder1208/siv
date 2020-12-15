<div class="tab-pane fade" id="nav-modalita" role="tabpanel" aria-labelledby="nav-modalita-tab">
    <div class="card">
        <div class="card-header">
            Quante fasce prevedi di utilizzare?
        </div>

        <div class="card-body">
            <div class="container">
                <form method="POST" action="{{route('admin.gare-inserimento-dettaglis.save')}}">
                    @method('POST')
                    @csrf
                    <p>
                        <div class="col-lg-5 col-md-7">
                            <input type="number" class="form-control" placeholder="Inserisci il numero di fasce da autilizzare">
                        </div>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>