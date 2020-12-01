@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.notizie.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.notizies.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="titolo">{{ trans('cruds.notizie.fields.titolo') }}</label>
                <input class="form-control {{ $errors->has('titolo') ? 'is-invalid' : '' }}" type="text" name="titolo" id="titolo" value="{{ old('titolo', '') }}">
                @if($errors->has('titolo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('titolo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.notizie.fields.titolo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="brand_id">{{ trans('cruds.notizie.fields.brand') }}</label>
                <select class="form-control select2 {{ $errors->has('brand') ? 'is-invalid' : '' }}" name="brand_id" id="brand_id" required>
                    @foreach($brands as $id => $brand)
                        <option value="{{ $id }}" {{ old('brand_id') == $id ? 'selected' : '' }}>{{ $brand }}</option>
                    @endforeach
                </select>
                @if($errors->has('brand'))
                    <div class="invalid-feedback">
                        {{ $errors->first('brand') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.notizie.fields.brand_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="descrizione_breve">{{ trans('cruds.notizie.fields.descrizione_breve') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('descrizione_breve') ? 'is-invalid' : '' }}" name="descrizione_breve" id="descrizione_breve">{!! old('descrizione_breve') !!}</textarea>
                @if($errors->has('descrizione_breve'))
                    <div class="invalid-feedback">
                        {{ $errors->first('descrizione_breve') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.notizie.fields.descrizione_breve_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="inizio_visualizzazione">{{ trans('cruds.notizie.fields.inizio_visualizzazione') }}</label>
                <input class="form-control date {{ $errors->has('inizio_visualizzazione') ? 'is-invalid' : '' }}" type="text" name="inizio_visualizzazione" id="inizio_visualizzazione" value="{{ old('inizio_visualizzazione') }}" required>
                @if($errors->has('inizio_visualizzazione'))
                    <div class="invalid-feedback">
                        {{ $errors->first('inizio_visualizzazione') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.notizie.fields.inizio_visualizzazione_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fine_visualizzazione">{{ trans('cruds.notizie.fields.fine_visualizzazione') }}</label>
                <input class="form-control date {{ $errors->has('fine_visualizzazione') ? 'is-invalid' : '' }}" type="text" name="fine_visualizzazione" id="fine_visualizzazione" value="{{ old('fine_visualizzazione') }}">
                @if($errors->has('fine_visualizzazione'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fine_visualizzazione') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.notizie.fields.fine_visualizzazione_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="visualizza_primapagina">{{ trans('cruds.notizie.fields.visualizza_primapagina') }}</label>
                <input class="form-control date {{ $errors->has('visualizza_primapagina') ? 'is-invalid' : '' }}" type="text" name="visualizza_primapagina" id="visualizza_primapagina" value="{{ old('visualizza_primapagina') }}">
                @if($errors->has('visualizza_primapagina'))
                    <div class="invalid-feedback">
                        {{ $errors->first('visualizza_primapagina') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.notizie.fields.visualizza_primapagina_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="file_pdf">{{ trans('cruds.notizie.fields.file_pdf') }}</label>
                <div class="needsclick dropzone {{ $errors->has('file_pdf') ? 'is-invalid' : '' }}" id="file_pdf-dropzone">
                </div>
                @if($errors->has('file_pdf'))
                    <div class="invalid-feedback">
                        {{ $errors->first('file_pdf') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.notizie.fields.file_pdf_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="link">{{ trans('cruds.notizie.fields.link') }}</label>
                <input class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" type="text" name="link" id="link" value="{{ old('link', '') }}">
                @if($errors->has('link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('link') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.notizie.fields.link_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.notizie.fields.autorizzati') }}</label>
                <select class="form-control {{ $errors->has('autorizzati') ? 'is-invalid' : '' }}" name="autorizzati" id="autorizzati">
                    <option value disabled {{ old('autorizzati', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Notizie::AUTORIZZATI_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('autorizzati', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('autorizzati'))
                    <div class="invalid-feedback">
                        {{ $errors->first('autorizzati') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.notizie.fields.autorizzati_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/admin/notizies/ckmedia', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $notizie->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

<script>
    var uploadedFilePdfMap = {}
Dropzone.options.filePdfDropzone = {
    url: '{{ route('admin.notizies.storeMedia') }}',
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="file_pdf[]" value="' + response.name + '">')
      uploadedFilePdfMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedFilePdfMap[file.name]
      }
      $('form').find('input[name="file_pdf[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($notizie) && $notizie->file_pdf)
          var files =
            {!! json_encode($notizie->file_pdf) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="file_pdf[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection