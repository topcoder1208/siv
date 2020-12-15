<div class="tab-pane fade" id="nav-visibilita" role="tabpanel" aria-labelledby="nav-visibilita-tab">
    <form method="POST" action="">
        @method('POST')
        @csrf
        <div>
            @foreach($visibilitas as $id => $name)
            <p>
                <div class="form-check" style="padding-left: 30px">
                    <input class="form-check-input visibillita" type="checkbox" name="visibillita" id="visibillita_{{$id}}">
                    <label class="form-check-label" for="visibillita_{{$id}}">{{$name}}</label>
                </div>
            </p>
            @endforeach
        </div>
    </form>
</div>