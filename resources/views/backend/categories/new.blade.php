@extends('backend.layouts.admin_layouts')
@section('sidenav')
@include('backend.layouts.partials.side_menu')
@endsection
@section('main')
@if($errors->any())
@foreach($errors->all() as $error)
 <div class="alert alert-danger m-4">
 {{$error}}
 </div>
@endforeach
@endif
<ul class="nav nav-tabs my-4"> 
    <li class="nav-item">
      <a class="nav-link" href="{{route('admin.categories')}}">Categories List</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="#">Add Category</a>
    </li>
  </ul>
<h3 class="my-3">Add New Category</h3>
<form action="{{route("admin.categories")}}" method="post" enctype="multipart/form-data">
@csrf
  <div class="form-group">
    <label for="category">Category Name</label>
    <input type="text" class="form-control mt-3" name="category" id="category" value="{{old('category')}}">
  </div>
  <div class="mb-3">
    <label for="image" class="form-label text-black h6">Banner image for category</label>
    <input type="file" name="image"  class="form-control" id="image" aria-describedby="PriceHelp">
    <div id="emailHelp" class="form-text">Upload Banner image..</div>
  </div>
  <button type="submit" class="btn btn-primary btn-block mt-3">Add Category</button>
</form>
<p class=" mt-3"> <a href="{{route('admin.categories')}}" >Go back to categories</a>  </p>
@endsection