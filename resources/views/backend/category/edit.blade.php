@extends('backend.layouts.master')

@section('content')
<div class="main-content">
    <div class="row small-spacing">
      <div class="col-lg-12 col-xs-12">
      @if($errors->any())


    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
      <li>  {{$error}}</li>
@endforeach
        </ul>
</div>
      @endif
      </div>
        <div class="col-lg-12 col-xs-12">
            <div class="box-content card white">
                <h4 class="box-title">Modifier categorie</h4>
                <!-- /.box-title -->
                <div class="card-content">
                    <form action="{{route('category.update',$categorie->id)}}" method="POST" >
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Titre <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="title" value="{{$categorie->title}}" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Summary</label>
                        <textarea class="form-control" id="description" name="summary" >{{$categorie->summary}}</textarea>
                    </div>



                      <div class="form-group">
                        <label for="exampleInputPassword1">Parent ? : </label>


                        <input type="checkbox" name="is_parent"  value="{{$categorie->is_parent}}" {{$categorie->is_parent == 1 ? 'checked' : ''}} id="is_parent" > Oui


                    </div>

                    <div class="form-group margin-bottom-20 {{$categorie->is_parent == 1 ? 'd-none' : ''}}" id="parent_cat_div">
                        <label for="exampleInputPassword1">Categorie parent : </label>

                        <select name="parent_id" class="form-control">
                            <option value="">--Categorie parent--</option>
@foreach ($parent_cats as $pcats )
<option value="{{$pcats->id}}" {{$categorie->parent_id == $pcats->id ? 'selected' : ''}}>{{$pcats->title}}</option>

@endforeach
                        </select>
                    </div>

                    <label for="exampleInputPassword1">Image : </label>

                    <div class="input-group">

                        <span class="input-group-btn">
                          <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> Choose
                          </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$categorie->photo}}">
                      </div>
                      <div id="holder" style="margin-top:15px;max-height:100px;"></div>




                        <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Modifier</button>
                    </form>
                </div>
                <!-- /.card-content -->
            </div>
            <!-- /.box-content -->
        </div>

    </div>

</div>
@endsection

@section('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>

$('#lfm').filemanager('image');
</script>
<script>
    $(document).ready(function() {
        $('#description').summernote();
    });
  </script>
    <script>

$("#is_parent").change(function(e){
e.preventDefault();
var is_checked = $("#is_parent").prop('checked');
if(is_checked){
    $('#parent_cat_div').addClass('d-none');
    $('#parent_cat_div').val('');
    $(this).val('1');
}else{
    $('#parent_cat_div').removeClass('d-none');
    $(this).val('0');
}
});

          </script>
@endsection
