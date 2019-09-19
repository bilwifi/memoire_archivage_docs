<!-- Modal -->
                <div class="modal fade text-white" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content bg-dark">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajouter un agent</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body ">
                        @include('partials._msgFlash')
                           <form  method="POST" id="myForm" action="{{ route('admin.add_agent') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                              <label for="nom">Nom</label>
                              <input type="text" class="form-control" id="nom" placeholder="" name="nom" value="{{ old('nom') }}" required="">
                            </div>
                            <div class="form-group">
                              <label for="postnom">Postnom</label>
                              <input type="text" class="form-control" id="postnom" placeholder="" name="postnom" value="{{ old('postnom') }}" required="">
                            </div>
                            <div class="form-group">
                              <label for="prenom">Prenom</label>
                              <input type="text" class="form-control" id="prenom" placeholder="" name="prenom" value="{{ old('prenom') }}" required="">
                            </div>

                            <div class="form-group">
                            <label for="iddepartement">Departement</label>
                            <select class="form-control" id="iddepartements" required="" name="iddepartements" required="">
                              @foreach(App\Models\Departement::get() as $d)
                              <option value="{{ $d->iddepartements }}">{{ $d->lib }}</option>
                              @endforeach
                            </select>
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

@push('scripts')
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