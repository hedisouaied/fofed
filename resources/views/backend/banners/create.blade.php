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
                <h4 class="box-title">Ajouter banner</h4>
                <!-- /.box-title -->
                <div class="card-content">
                    <form action="{{route('banner.store')}}" method="POST" >
                    @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Titre <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="title" value="{{old('title')}}" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <textarea class="form-control" id="description" name="description" >{{old('description')}}</textarea>
                        </div>

                        <div class="input-group">

                            <span class="input-group-btn">
                              <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Choose
                              </a>
                            </span>
                            <input id="thumbnail" class="form-control" type="text" name="photo">
                          </div>
                          <div id="holder" style="margin-top:15px;max-height:100px;"></div>


                        <div class="form-group margin-bottom-20">
                            <label for="exampleInputPassword1">Condition</label>

							<select name="condition" class="form-control">
								<option value="">--Conditions--</option>
								<option value="banner" {{old('condition') == 'banner' ? 'selected' : ''}}>Banner</option>
								<option value="promo" {{old('condition') == 'promo' ? 'selected' : ''}}>Promo</option>
							</select>
						</div>

                        <div class="form-group margin-bottom-20">
                            <label for="exampleInputPassword1">Status : </label>

							<select name="status" class="form-control">
								<option value="">--Status--</option>
								<option value="active" {{old('status') == 'active' ? 'selected' : ''}}>Active</option>
								<option value="inactive" {{old('status') == 'inactive' ? 'selected' : ''}}>Inactive</option>
							</select>
						</div>

                        <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Submit</button>
                    </form>
                </div>
                <!-- /.card-content -->
            </div>
            <!-- /.box-content -->
        </div>
        <!-- /.col-lg-6 col-xs-12 -->

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
