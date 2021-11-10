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
                <h4 class="box-title">Modifier produit</h4>
                <!-- /.box-title -->
                <div class="card-content">
                    <form action="{{route('product.update',$product->id)}}" method="POST" >
                    @csrf
                    @method('patch')
                        <div class="form-group">
                            <label for="exampleInputEmail1">Titre <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="title" value="{{$product->title}}" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Summary</label>
                            <textarea class="form-control" id="summary" name="summary" >{{$product->summary}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <textarea class="form-control" id="description" name="description" >{{$product->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Stock <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="exampleInputEmail1" name="stock" value="{{$product->stock}}" >
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Prix <span class="text-danger">*</span></label>
                            <input type="number" step="any" class="form-control" id="exampleInputEmail1" name="price" value="{{$product->price}}" >
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Remise </label>
                            <input type="number" step="any" min="0" max="100" class="form-control" id="exampleInputEmail1" name="discount" value="{{$product->discount}}" >
                        </div>



                        <label for="exampleInputPassword1">Image</label>
                             <div class="input-group">

                            <span class="input-group-btn">
                              <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Choose
                              </a>
                            </span>
                            <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$product->photo}}">
                          </div>
                          <div id="holder" style="margin-top:15px;max-height:100px;"></div>


                        <div class="form-group margin-bottom-20">
                            <label for="exampleInputPassword1">Brand</label>

							<select name="brand_id" class="form-control">
								<option value="">--Brands--</option>

                                    @foreach ( \App\Models\Brand::get() as $brand )
                                    <option value="{{$brand->id}}" {{$product->brand_id == $brand->id ? 'selected' : ''}}>{{$brand->title}}</option>
                                    @endforeach

							</select>
						</div>

                        <div class="form-group margin-bottom-20">
                            <label for="exampleInputPassword1">Catégorie</label>

							<select id="cat_id" name="cat_id" class="form-control">
								<option value="">--Catégories--</option>

                                    @foreach ( \App\Models\Category::where('is_parent',1)->get() as $cat )
                                    <option value="{{$cat->id}}" {{$product->cat_id == $cat->id ? 'selected' : ''}} >{{$cat->title}}</option>
                                    @endforeach

							</select>
						</div>

                        <div class="form-group margin-bottom-20 d-none" id="child_cat_div">
                            <label for="exampleInputPassword1">Sous Catégorie</label>

							<select id="child_cat_id" name="child_cat_id" class="form-control">

							</select>
						</div>


                        <div class="form-group margin-bottom-20">
                            <label for="exampleInputPassword1">Taille</label>

							<select name="size" class="form-control">
								<option value="">--Tailles--</option>
								<option value="S" {{$product->size == 'S' ? 'selected' : ''}}>S</option>
								<option value="M" {{$product->size == 'M' ? 'selected' : ''}}>M</option>
								<option value="L" {{$product->size == 'L' ? 'selected' : ''}}>L</option>
							</select>
						</div>

                        <div class="form-group margin-bottom-20">
                            <label for="exampleInputPassword1">Condition</label>

							<select name="conditions" class="form-control">
								<option value="">--Conditions--</option>
								<option value="new" {{$product->conditions == 'new' ? 'selected' : ''}}>New</option>
								<option value="popular" {{$product->conditions == 'popular' ? 'selected' : ''}}>Popular</option>
								<option value="winter" {{$product->conditions == 'winter' ? 'selected' : ''}}>Winter</option>
							</select>
						</div>

                        <div class="form-group margin-bottom-20">
                            <label for="exampleInputPassword1">Vendor</label>

							<select name="vendor_id" class="form-control">
								<option value="">--Vendors--</option>

                                    @foreach ( \App\Models\User::where('role','vendor')->get() as $vendor )
                                    <option value="{{$vendor->id}}" {{$product->vendor_id == $vendor->id ? 'selected' : ''}}>{{$vendor->full_name}}</option>
                                    @endforeach

							</select>
						</div>

                        <div class="form-group margin-bottom-20">
                            <label for="exampleInputPassword1">Status : </label>

							<select name="status" class="form-control">
								<option value="">--Status--</option>
								<option value="active" {{$product->status == 'active' ? 'selected' : ''}}>Active</option>
								<option value="inactive" {{$product->status == 'inactive' ? 'selected' : ''}}>Inactive</option>
							</select>
						</div>

                        <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Modifier</button>
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
<script>
    $(document).ready(function() {
        $('#summary').summernote();
    });
  </script>

<script>
var child_cat_id = {{$product->child_cat_id}};

    $("#cat_id").change(function(){


            var cat_id=$(this).val();


            if(cat_id != null){
                //alert(cat_id);
                $.ajax({
                    url:"/admin/category/"+cat_id+"/child",
                    type:"POST",
                    data:{
                        _token:"{{csrf_token()}}",
                        cat_id:cat_id
                    },
                    success:function(response){
                        var html_option = "<option value=''>--Sous Catégories--</option>";
                        if(response.status){
                       //alert(cat_id);
                          $('#child_cat_div').removeClass('d-none');
                          $.each(response.data,function(id,title){
                            html_option += "<option value='"+id+"' "+(child_cat_id == id ? 'selected' : '')+">"+title+"</option>";
                          });
                        }else{
                            $('#child_cat_div').addClass('d-none');

                        }
                        $('#child_cat_id').html(html_option);

                    }
                });
            }
    });
if(child_cat_id != null){
    $('#cat_id').change();
}
    </script>

@endsection
