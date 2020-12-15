<style type="text/css">
    #nav-brand img{
        width: 30px;
    }
</style>
<div class="tab-pane fade" id="nav-brand" role="tabpanel" aria-labelledby="nav-brand-tab">
    <form method="POST" action="{{ route("admin.gare-inserimento-dettaglis.insertBrandCategoriesDetails") }}" id="form-gareInserimentos-brand">
        @csrf
        <div class="row">
            <div class="form-group col-lg-3 col-md-6 col-sm-12">
                <p></p>
                @foreach($brands as $brand)
                <p>
                    {{$brand->logo}}
                    {{$brand->name}}
                </p>
                <div class="form-check">
                    @foreach($brand_categories as $brand_category)
                    @if($brand_category->brand_id == $brand->id)
                        <p>
                            <input class="brand-check" name="brand_category" type="checkbox" value="{{$brand_category->id}}" id="brand_category_{{$brand_category->id}}" {{((isset($dettaglis[$brand_category->id]) && $dettaglis[$brand_category->id] == 1) ? "checked" : "")}}>
                            <label for="brand_category_{{$brand_category->id}}">{{$modalita[$brand_category->tecnologia_modalita_id]}}</label>
                        </p>
                    @endif
                    @endforeach
                </div>
                @endforeach
                
                <button class="btn btn-info go-back">
                    Titolo della gara
                </button>
                <button class="btn btn-danger pull-right go-next" type="submit">
                    Beneficiari
                </button>
            </div>
        </div>
    </form>
</div>