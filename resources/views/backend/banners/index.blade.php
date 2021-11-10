@extends('backend.layouts.master')

@section('content')
<div class="main-content">
    <div class="row row-inline-block small-spacing">
        <div class="col-lg-12 col-xs-12">
            @include('backend.layouts.notification')

        </div>
        <div class="col-lg-12 col-xs-12">
            <div class="box-content">
                <h4 class="box-title">Liste des banners</h4>
                <p class="box-title" style="text-align: right;">Total banners {{\App\Models\Banner::count()}}</p>
                <!-- /.box-title -->
                <h4 class="box-title"><a class="btn btn-secondary" href="{{route('banner.create')}}" ><i class="fa fa-plus-circle"></i> Ajouter banner</a></h4>


                <table id="example" class="table table-striped table-bordered display" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.n</th>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Photo</th>
                            <th>Condition</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
@foreach ( $banners as $item )

<tr>
    <td>{{$loop->iteration}}</td>
    <td>{{$item->title}}</td>
    <td>{!! html_entity_decode($item->description) !!}</td>
    <td><img src="{{$item->photo}}" style="max-height: 98px;max-width:124px;" alt="banner image"></td>
    <td>
@if (($item->condition) == 'banner')

<span class="badge bg-success" >{{$item->condition}}</span>
    @else
    <span class="badge bg-primary" >{{$item->condition}}</span>
@endif

    </td>

    <td>
        <input type="checkbox" name="toogle" value="{{$item->id}}" {{$item->status == 'active' ? 'checked' : ''}} data-toggle="toggle" data-on="Active" data-size="mini" data-off="Inactive" data-onstyle="success" data-offstyle="danger">
</td>

    <td>
        <a href="{{route('banner.edit',$item->id)}}" class=" btn btn-sm btn-warning" data-toggle="tooltip" title="modifier" data-placement="bottom" >
            <i class="fa fa-edit" ></i>
        </a>

        <form  action="{{route('banner.destroy',$item->id)}}" method="post" >
            @csrf
            @method('delete')
                <a href=""  class="dltBtn btn btn-sm btn-danger" data-toggle="tooltip" data-id="{{$item->id}}" title="supprimer" data-placement="bottom" >
                    <i class="fa fa-trash" ></i>
                </a>
        </form>

    </td>
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
            url : '{{route("banner.status")}}',
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
