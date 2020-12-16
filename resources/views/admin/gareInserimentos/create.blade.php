@extends('layouts.admin')
@section('content')

<section id="tabs" class="project-tab">
    <div class="container" style="max-width: 100%;">
        <div class="row">
            <div class="col-md-12">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-gara-tab" data-toggle="tab" href="#nav-gara" role="tab" aria-controls="nav-gara" aria-selected="true">Gara</a>
                        <a class="nav-item nav-link" id="nav-brand-tab" data-toggle="tab" href="#nav-brand" role="tab" aria-controls="nav-brand" aria-selected="false">Brand</a>
                        <a class="nav-item nav-link" id="nav-beneficiari-tab" data-toggle="tab" href="#nav-beneficiari" role="tab" aria-controls="nav-beneficiari" aria-selected="false">Beneficiari</a>
                        <a class="nav-item nav-link" id="nav-concorrenti-tab" data-toggle="tab" href="#nav-concorrenti" role="tab" aria-controls="nav-concorrenti" aria-selected="false">Concorrenti</a>
                        <a class="nav-item nav-link" id="nav-visibilita-tab" data-toggle="tab" href="#nav-visibilita" role="tab" aria-controls="nav-visibilita" aria-selected="false">Visibilità</a>
                        <a class="nav-item nav-link" id="nav-esito-tab" data-toggle="tab" href="#nav-esito" role="tab" aria-controls="nav-esito" aria-selected="false">Esito</a>

                        @if(request()->is("admin/gare-inserimentos/fascia") || request()->is("admin/gare-inserimentos/fascia*"))
                            <a class="nav-item nav-link" id="nav-fasce-tab" data-toggle="tab" href="#nav-fasce" role="tab" aria-controls="nav-fasce" aria-selected="false">Fasce</a>
                        @endif

                        @if(request()->is("admin/gare-inserimentos/target") || request()->is("admin/gare-inserimentos/target*"))
                            <a class="nav-item nav-link" id="nav-target-tab" data-toggle="tab" href="#nav-target" role="tab" aria-controls="nav-target" aria-selected="false">Target</a>
                        @endif
                        <a class="nav-item nav-link" id="nav-premio-tab" data-toggle="tab" href="#nav-premio" role="tab" aria-controls="nav-premio" aria-selected="false">Premio</a>
                        
                        <a class="nav-item nav-link" id="nav-dipendenze-tab" data-toggle="tab" href="#nav-dipendenze" role="tab" aria-controls="nav-dipendenze" aria-selected="false">Dipendenze</a>
                        <a class="nav-item nav-link" id="nav-metodo-attribuzione-tab" data-toggle="tab" href="#nav-metodo-attribuzione" role="tab" aria-controls="nav-metodo-attribuzione" aria-selected="false">Metodo attribuzione</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    
                    @include('admin.gareInserimentos.tabPages.gara')
                    @include('admin.gareInserimentos.tabPages.brand')
                    @include('admin.gareInserimentos.tabPages.beneficiari')
                    @include('admin.gareInserimentos.tabPages.consorrenti')
                    @include('admin.gareInserimentos.tabPages.visibilita')
                    @include('admin.gareInserimentos.tabPages.esito')
                    
                    @if(request()->is("admin/gare-inserimentos/fascia") || request()->is("admin/gare-inserimentos/fascia*"))
                        @include('admin.gareInserimentos.tabPages.fasce')
                    @endif

                    @if(request()->is("admin/gare-inserimentos/target") || request()->is("admin/gare-inserimentos/target*"))
                        @include('admin.gareInserimentos.tabPages.target')
                    @endif
                    
                    @include('admin.gareInserimentos.tabPages.premio')

                    @include('admin.gareInserimentos.tabPages.dipendenze')
                    @include('admin.gareInserimentos.tabPages.metodo_attribuzione')
                    <!-- Modal -->
                    <div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Seleziona punti vendita</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <table class="table table-fluid" id="myTable">
                                        <thead>
                                            <tr><th>Name</th><th>Email</th><th>Password</th></tr>
                                        </thead>
                                        <tbody>
                                            <tr><td>Daniel Danny</td><td>danny.daniel@gmail.com</td><td>Pass1234</td></tr>
                                            <tr><td>Samuel</td><td>samuel@gmail.com</td><td>Pass1234</td></tr>
                                            <tr><td>Jack</td><td>jack@gmail.com</td><td>Pass1234</td></tr>
                                            <tr><td>Eureka</td><td>eureka@gmail.com</td><td>Pass1234</td></tr>
                                            <tr><td>Pinky</td><td>pinky@gmail.com</td><td>Pass1234</td></tr>
                                            <tr><td>Mishti</td><td>mishti@gmail.com</td><td>Pass1234</td></tr>
                                            <tr><td>Puneet</td><td>puneet@gmail.com</td><td>Pass1234</td></tr>
                                            <tr><td>Nick</td><td>nick@gmail.com</td><td>Pass1234</td></tr>
                                            <tr><td>Danika</td><td>danika@gmail.com</td><td>Pass1234</td></tr>
                                            <tr><td>Vishakha</td><td>vishakha@gmail.com</td><td>Pass1234</td></tr>
                                            <tr><td>Nitin</td><td>ni3@gmail.com</td><td>Pass1234</td></tr>
                                            <tr><td>Latika</td><td>latika@gmail.com</td><td>Pass1234</td></tr>
                                            <tr><td>Kaavya</td><td>kaavya@gmail.com</td><td>Pass1234</td></tr>
                                            <tr><td>Ishika</td><td>ishika@gmail.com</td><td>Pass1234</td></tr>
                                            <tr><td>Veronika</td><td>veronika@gmail.com</td><td>Pass1234</td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                                <button type="button" class="btn btn-primary">Inserisci</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection