<div class="tab-pane fade" id="nav-beneficiari" role="tabpanel" aria-labelledby="nav-beneficiari-tab">
    <div class="col-md-12">
        <p></p>
    
        <nav class="col-md-6">
            <div class="nav nav-tabs nav-fill" id="beneficiari-nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-pdv-tab" data-toggle="tab" href="#nav-pdv" role="tab" aria-controls="nav-pdv" aria-selected="true">PDV</a>
                <a class="nav-item nav-link" id="nav-agenti-tab" data-toggle="tab" href="#nav-agenti" role="tab" aria-controls="nav-agenti" aria-selected="false">Agenti</a>
                <a class="nav-item nav-link" id="nav-dealer-tab" data-toggle="tab" href="#nav-dealer" role="tab" aria-controls="nav-dealer" aria-selected="false">Dealers</a>
            </div>
        </nav>
        <div class="tab-content" id="beneficiari-nav-tabContent">
            
            @include('admin.gareInserimentos.tabPages.beneficiari.point')
            @include('admin.gareInserimentos.tabPages.beneficiari.agentia')
            @include('admin.gareInserimentos.tabPages.beneficiari.dealer')

            <div class="mt-5 row">
                <div class="col-lg-4 col-md-8 col-sm-12">
                    <button class="btn btn-info go-back">
                        Brand
                    </button>
                    <button class="btn btn-danger pull-right go-next">
                        Concorrenti
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>