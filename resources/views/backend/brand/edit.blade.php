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
                <h4 class="box-title">Modifier brand</h4>
                <!-- /.box-title -->
                <div class="card-content">
                    <form action="{{route('brand.update',$brand->id)}}" method="POST" >
                    @csrf
                    @method('patch')
                        <div class="form-group">
                            <label for="exampleInputEmail1">Titre</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="title" value="{{$brand->title}}" >
                        </div>
                       
                            <label for="exampleInputEmail1">Image <span class="text-danger">*</span></label>

                        <div class="input-group">
                            <span class="input-group-btn">
                              <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Choose
                              </a>
                            </span>
                            <input id="thumbnail" class="form-control" type="text" value="{{$brand->photo}}" name="photo">
                          </div>

                          <div id="holder" style="margin-top:15px;max-height:150px;"></div>


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
@endsection
