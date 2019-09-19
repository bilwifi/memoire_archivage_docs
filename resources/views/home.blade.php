@extends('layouts.master')
@include('partials.includes.dataTables.dataTables')
@include('partials.includes.dataTables.buttons')
@section('content')

<div class="row d-flex justify-content-center">
    <div class="col-10">
        <div class="card">

            {{-- <div class="card-header">DDDDD</div> --}}
            <div class="card-body bg-dark text-white">
                @auth('admin')
                <div class="row">
                    <div class="col">
                        <!-- Button trigger modal -->
                        <button href="{{ route('admin.add_doc') }}" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >
                          <i class="fa fa-plus"></i> Nouveau document
                        </button>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content bg-dark">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajouter un doucument</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body ">
                        @include('partials._msgFlash')
                           <form  method="POST" id="myForm" action="{{ route('admin.add_doc') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                              <label for="titre">Titre</label>
                              <input type="text" class="form-control" id="titre" placeholder="" name="titre" value="{{ old('titre') }}" required="">
                            </div>
                            <div class="form-group">
                              <label for="description">Description</label>
                              <input type="text" class="form-control" id="description" placeholder="" name="description" value="{{ old('description') }}" required="">
                            </div>
                            <div class="form-group">
                            <label for="iddepartement">Departement</label>
                            <select class="form-control" id="iddepartements" required="" name="iddepartements" required="">
                              @foreach(App\Models\Departement::get() as $d)
                              <option value="{{ $d->iddepartements }}">{{ $d->lib }}</option>
                              @endforeach
                            </select>
                          </div>
                          <label for="description">Importer le fichier</label>
                          <div class="custom-file">
                              <input type="file" class="custom-file-input" id="doc-file" name="document"required>
                              <label class="custom-file-label" for="doc-file">Choisir un fichier pdf</label>
                            </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                      </div>
                       </form>
                      {{-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div> --}}
                    </div>
                  </div>
                </div>








                @endauth
                 {!!$dataTable->table() !!}
            </div>
        </div>
    </div>
</div>
    

@endsection
@push('scripts')
  {!!$dataTable->scripts() !!}
  <script type="text/javascript">
   
    // $(document).on('submit', '#myForm', function(e) {
    //     e.preventDefault();
    //     alert($('#doc-file').val());
    //     $('#msgErrors').attr('hidden',true);
    //     // var myForm = new FormData();
    //     // myForm.append($(this).serialize());
    //     // myForm.append("document", $('#doc-file').val());
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });
    //     $.ajax({
    //             method: 'POST',
    //             url: $(this).attr('action'),
    //             data: {
    //                 '_token': $('input[name=_token]').val(),
    //                 'titre': $("#titre").val(),
    //                 'description': $("#description").val(),
    //                 'iddepartements': $('#iddepartements').val(),
    //                 'document': $('#doc-file').val(),
    //                 },
    //             // processData: false,
    //             // contentType: false,
    //             success: function(data) {
    //                 if (data == "uploaded") {
    //                    alert('OOOOOOOOOOOOOOOOOOOOO');
    //                    $('#dataTableBuilder').DataTable().draw(false);
    //                    $('.modal').modal('hide');
    //                 } else {
    //                     var errors = data.responseJSON.errors;
    //                     $.each(errors, function (key, value) {
    //                       document.getElementById('msgErrors').innerHTML += "<li>"+value+"</li>"
    //                       $('#msgErrors').attr('hidden',false);
    //                   });
    //                 }
    //             },
    //             error: function(error) {
    //                 console.log(error);
    //                 var errors = error.responseJSON.errors;
    //                     $.each(errors, function (key, value) {
    //                       document.getElementById('msgErrors').innerHTML += "<li>"+value+"</li>"
    //                       $('#msgErrors').attr('hidden',false);
    //                   });
    //             }
    //         });
    // });
  </script>
@endpush