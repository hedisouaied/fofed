@extends('backend.layouts.master')

@section('content')
<div class="main-content">
    <div class="row row-inline-block small-spacing">
        <div class="col-lg-12 col-xs-12">
            @include('backend.layouts.notification')

        </div>
        <div class="col-lg-12 col-xs-12">
            <div class="box-content">
                <h4 class="box-title">Liste des produits</h4>
                <p class="box-title" style="text-align: right;">Total produits {{\App\Models\Product::count()}}</p>
                <!-- /.box-title -->
                <h4 class="box-title"><a class="btn btn-secondary" href="{{route('product.create')}}" ><i class="fa fa-plus-circle"></i> Ajouter Produit</a></h4>


                <table id="example" class="table table-striped table-bordered display" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.n</th>
                            <th>Titre</th>
                            <th>Photo</th>
                            <th>Prix</th>
                            <th>Remise</th>
                            <th>Condition</th>
                            <th>Taille</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
@foreach ( $products as $item )

@php
    $photo = explode(',',$item->photo);
@endphp
<tr>
    <td>{{$loop->iteration}}</td>
    <td>{{$item->title}}</td>
    <td><img src="{{$photo[0]}}" style="max-height: 98px;max-width:124px;" alt="product image"></td>
    <td>${{number_format($item->price,2)}}</td>
    <td>{{$item->discount}}%</td>
    <td>
@if (($item->conditions) == 'new')

<span class="badge bg-success" >{{$item->conditions}}</span>
    @elseif(($item->conditions) == 'popular')
    <span class="badge bg-primary" >{{$item->conditions}}</span>
@else
<span class="badge bg-warning" >{{$item->conditions}}</span>

@endif

    </td>
    <td>{{$item->size}}</td>
    <td>
        <input type="checkbox" name="toogle" value="{{$item->id}}" {{$item->status == 'active' ? 'checked' : ''}} data-toggle="toggle" data-on="Active" data-size="mini" data-off="Inactive" data-onstyle="success" data-offstyle="danger">
</td>

    <td>
        <a href="javascript:void(0);" data-toggle="modal" data-target="#productID{{$item->id}}" class=" btn btn-sm btn-secondary" data-toggle="tooltip" title="voir" data-placement="bottom" >
            <i class="fa fa-eye" ></i>
        </a>

        <a href="{{route('product.edit',$item->id)}}" class=" btn btn-sm btn-warning" data-toggle="tooltip" title="modifier" data-placement="bottom" >
            <i class="fa fa-edit" ></i>
        </a>

        <form  action="{{route('product.destroy',$item->id)}}" method="post" >
            @csrf
            @method('delete')
                <a href=""  class="dltBtn btn btn-sm btn-danger" data-toggle="tooltip" data-id="{{$item->id}}" title="supprimer" data-placement="bottom" >
                    <i class="fa fa-trash" ></i>
                </a>
        </form>

    </td>

<!-- Modal -->
<div class="modal fade" id="productID{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
            @php
            $product = \App\Models\Product::where('id',$item->id)->first();
            @endphp

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">{{\Illuminate\Support\Str::upper($product->title)}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <strong>Summary :</strong>
          <p>{!! html_entity_decode($product->summary) !!}</p>

            <strong>Description :</strong>
          <p>{!! html_entity_decode($product->description) !!}</p>

            <div class="row">

                <div class="col-md-6">
                    <strong>Prix :</strong>
                    <p>${{number_format($product->price,2) }}</p>
                </div>
                <div class="col-md-6">
                    <strong>Prix offre :</strong>
                    <p>${{number_format($product->offer_price,2) }}</p>
                </div>

                <div class="col-md-6">
                    <strong>Remise :</strong>
                    <p>{{$product->discount}}%</p>
                </div>
            </div>
            <div class="row">


                <div class="col-md-6">
                    <strong>Catégorie :</strong>
                    <p>{{\App\Models\Category::where('id',$product->cat_id)->value('title')}}</p>
                </div>
                <div class="col-md-6">
                    <strong>Sous Catégorie :</strong>
                    <p>{{\App\Models\Category::where('id',$product->child_cat_id)->value('title')}}</p>
                </div>
                <div class="col-md-6">
                    <strong>Brand :</strong>
                    <p>{{\App\Models\Brand::where('id',$product->brand_id)->value('title')}}</p>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <strong>Taille :</strong>
                    <p>{{$product->size}}</p>
                </div>
                <div class="col-md-6">
                    <strong>Stock :</strong>
                    <p>{{$product->stock}}</p>
                </div>
                <div class="col-md-6">
                    <strong>Condition :</strong>
                    <p>{{$product->conditions}}</p>
                </div>
                <div class="col-md-6">
                    <strong>Status :</strong>
                    <p>{{$product->status}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <strong>Vendor :</strong>
                    <p>{{\App\Models\User::where('id',$product->vendor_id)->value('full_name')}}</p>
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
            url : '{{route("product.status")}}',
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
