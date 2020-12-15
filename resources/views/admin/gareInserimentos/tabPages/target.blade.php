<div class="tab-pane fade" id="nav-target" role="tabpanel" aria-labelledby="nav-target-tab">
    <p></p>
    <div class="col-md-12">
        <nav class="row">
            <div class="nav nav-tabs nav-fill col-lg-6 col-md-8 col-sm-12" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-target-pdv-tab" data-toggle="tab" href="#nav-target-pdv" role="tab" aria-controls="nav-target-pdv" aria-selected="true">PDV</a>
                <a class="nav-item nav-link" id="nav-target-agenti-tab" data-toggle="tab" href="#nav-target-agenti" role="tab" aria-controls="nav-target-agenti" aria-selected="false">Agenti</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            @include('admin.gareInserimentos.tabPages.target.point')
            @include('admin.gareInserimentos.tabPages.target.agenti')
        </div>
    </div>
</div>