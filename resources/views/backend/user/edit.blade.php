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
                <h4 class="box-title">Modifier utilisateur</h4>
                <!-- /.box-title -->
                <div class="card-content">
                    <form action="{{route('user.update',$user->id)}}" method="POST" >
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nom & prènom <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="full_name" value="{{$user->full_name}}" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Identifiant</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="username" value="{{$user->username}}" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{$user->email}}" >
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">Téléphone <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="phone" value="{{$user->phone}}" >
                    </div>


                    <div class="form-group">
                        <label for="exampleInputPassword1">Adresse <span class="text-danger">*</span></label>
                        <textarea class="form-control"  name="address" >{{$user->address}}</textarea>
                    </div>

                    <div class="input-group">

                        <span class="input-group-btn">
                          <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> Choose
                          </a>
                        </span>
                        <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$user->photo}}" >
                      </div>
                      <div id="holder" style="margin-top:15px;max-height:100px;"></div>


                    <div class="form-group margin-bottom-20">
                        <label for="exampleInputPassword1">Role <span class="text-danger">*</span></label>

                        <select name="role" class="form-control">
                            <option value="">--Roles--</option>
                            <option value="admin" {{$user->role == 'admin' ? 'selected' : ''}}>Admin</option>
                            <option value="customer" {{$user->role == 'customer' ? 'selected' : ''}}>Customer</option>
                            <option value="vendor" {{$user->role == 'vendor' ? 'selected' : ''}}>Vendor</option>
                        </select>
                    </div>

                    <div class="form-group margin-bottom-20">
                        <label for="exampleInputPassword1">Status : </label>

                        <select name="status" class="form-control">
                            <option value="">--Status--</option>
                            <option value="active" {{$user->status == 'active' ? 'selected' : ''}}>Active</option>
                            <option value="inactive" {{$user->status == 'inactive' ? 'selected' : ''}}>Inactive</option>
                        </select>
                    </div>



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
