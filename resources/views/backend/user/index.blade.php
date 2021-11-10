@extends('backend.layouts.master')

@section('content')
<div class="main-content">
    <div class="row row-inline-block small-spacing">
        <div class="col-lg-12 col-xs-12">
            @include('backend.layouts.notification')

        </div>
        <div class="col-lg-12 col-xs-12">
            <div class="box-content">
                <h4 class="box-title">Liste des utilisateurs</h4>
                <p class="box-title" style="text-align: right;">Total utilisateurs {{\App\Models\User::count()}}</p>
                <!-- /.box-title -->
                <h4 class="box-title"><a class="btn btn-secondary" href="{{route('user.create')}}" ><i class="fa fa-plus-circle"></i> Ajouter utilisateur</a></h4>


                <table id="example" class="table table-striped table-bordered display" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.n</th>
                            <th>Nom & prènom</th>
                            <th>Photo</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
@foreach ( $users as $item )

<tr>
    <td>{{$loop->iteration}}</td>
    <td>{{$item->full_name}}</td>
    <td><img src="{{$item->photo}}" style="height:60px;width:60px;max-height: 98px;max-width:124px;border-radius:50%;" alt="user image"></td>
    <td>{{$item->email}}</td>
    <td>{{$item->phone}}</td>
    <td>{{$item->role}}</td>


    <td>
        <input type="checkbox" name="toogle" value="{{$item->id}}" {{$item->status == 'active' ? 'checked' : ''}} data-toggle="toggle" data-on="Active" data-size="mini" data-off="Inactive" data-onstyle="success" data-offstyle="danger">
    </td>

    <td>

        <a href="javascript:void(0);" data-toggle="modal" data-target="#userID{{$item->id}}" class=" btn btn-sm btn-secondary" data-toggle="tooltip" title="voir" data-placement="bottom" >
            <i class="fa fa-eye" ></i>
        </a>

        <a href="{{route('user.edit',$item->id)}}" class=" btn btn-sm btn-warning" data-toggle="tooltip" title="modifier" data-placement="bottom" >
            <i class="fa fa-edit" ></i>
        </a>

        <form  action="{{route('user.destroy',$item->id)}}" method="post" >
            @csrf
            @method('delete')
                <a href=""  class="dltBtn btn btn-sm btn-danger" data-toggle="tooltip" data-id="{{$item->id}}" title="supprimer" data-placement="bottom" >
                    <i class="fa fa-trash" ></i>
                </a>
        </form>

    </td>
    <!-- Modal -->
<div class="modal fade" id="userID{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
            @php
            $user = \App\Models\User::where('id',$item->id)->first();
            @endphp

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">{{\Illuminate\Support\Str::upper($user->full_name)}} ({{\Illuminate\Support\Str::upper($user->username)}})</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <img src="{{$user->photo}}" style="border-radius: 50%;margin-bottom:20px;" >

            <div class="row">

                <div class="col-md-6">
                    <strong>Email :</strong>
                    <p>{{$user->email}}</p>
                </div>
                <div class="col-md-6">
                    <strong>Téléphone :</strong>
                    <p>{{$user->phone}}</p>
                </div>

                <div class="col-md-6">
                    <strong>Adresse :</strong>
                    <p>{{$user->address}}</p>
                </div>
                <div class="col-md-6">
                    <strong>Role :</strong>
                    <p>{{$user->role}}</p>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6">
                    <strong>Status :</strong>
                    <p>{{$user->status}}</p>
                </div>
            </div>




        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  </div>
</tr>
@endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-content -->
        </div>

    </div>

</div>
@endsection

@section('scripts')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.dltBtn').click(function(e){

var form = $(this).closest('form');
var dataID = $(this).data('id');
e.preventDefault();
        swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {

            form.submit();

            swal("Poof! Your imaginary file has been deleted!", {
            icon: "success",
            });
        } else {
            swal("Your imaginary file is safe!");
        }
        });

});
</script>

<script>
    $('input[name=toogle]').change(function(){
        var mode = $(this).prop('checked');
        var id=$(this).val();
        //alert(id);
        $.ajax({
            url : '{{route("user.status")}}',
            type : 'POST',
            data :{
                _token : '{{csrf_token()}}',
                mode : mode,
                id:id,
                    },
            success:function(responde){
                if(responde.status == true){
                alert(responde.msg);
                }else{
                    alert('please try again !!!');
                }
            }


        });
    });
</script>
@endsection
