<style type="text/css">
    #nav-premio input{
        background-color: #ebedef;
    }
    #nav-premio table td.tal {
        text-align: left;
        vertical-align: middle;
    }
    #nav-premio table td.tar {
        text-align: right;
        vertical-align: middle;
    }
</style>
<div class="tab-pane fade" id="nav-premio" role="tabpanel" aria-labelledby="nav-premio-tab">
    <p></p>
    <p></p>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-12">
            <p>
                <div class="form-check">
                    <input class="form-check-input" id="premio_money" name="premio-radio" type="radio" value="0" {{((isset($gare->premiotipo) && $gare->premiotipo == 0) ? "checked" : "")}}>
                    <label class="form-check-label" for="premio_money">Premio economico in €</label>
                </div>
            </p>
            <p>
                <div class="form-check">
                    <input class="form-check-input" id="premio_subject" name="premio-radio" type="radio" value="1" {{((isset($gare->premiotipo) && $gare->premiotipo == 1) ? "checked" : "")}}>
                    <label class="form-check-label" for="premio_subject">Premio espresso in quantità</label>
                </div>
            </p>
            <p>
                <div class="form-check">
                    <input type="text" class="form-control" id="premio_value" value="{{((isset($gare->premiotipo) && $gare->premiotipo == 1) ? $gare->premio_quantita : "")}}">
                </div>
            </p>
        </div>
    </div>
    <p></p>
    <p></p>  
    <table id="premio_table" url="{{route('admin.gare-inserimento-dettaglis.getPremio', ['gare_inserimento_id' => 0])}}"></table> 
    <p></p>
    <p></p>
    <div class="mt-5 row">
        <div class="col-lg-3 col-md-6 col-sm-9">
            <button class="btn btn-info go-back">
                @if(request()->is("admin/gare-inserimentos/fascia") || request()->is("admin/gare-inserimentos/fascia*"))
                    Fasce
                @else
                    Target
                @endif
            </button>
            <button class="btn btn-danger pull-right go-next">
                Dipendenze
            </button>
        </div>
        <div class="col-lg-9 col-md-6 col-sm-3">
            <button class="btn btn-success pull-left save" action="{{route('admin.gare-inserimento-dettaglis.savePremio')}}">
                Save
            </button>  
        </div>
    </div>
</div>