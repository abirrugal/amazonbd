@extends('backend.layouts.admin_layouts')
@section('title')
    Customer's List
@endsection

@section('main')
    @foreach ($customers as $customer)
    <div class="card">
        <ul class="list-group list-group-flush d-flex flex-row flex-wrap">
          <li class="list-group-item"><span class="h6">Name : </span> {{$customer->id}}</li>
          <li class="list-group-item"><span class="h6">Name : </span> {{$customer->name}}</li>
          <li class="list-group-item"><span class="h6">Email : </span>{{$customer->email}}</li>
          <li class="list-group-item"><span class="h6">Phone number : </span>{{$customer->phone_number}}</li>
          <li class="list-group-item"><span class="h6">Status : </span>{{$customer->role_as}}</li>
          <li class="list-group-item"><button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$customer->id}}">
            Change status
          </button></li>
    
         <!-- Modal -->
<div class="modal fade" id="exampleModal{{$customer->id}}" tabindex="-1" aria-labelledby="{{'same'.$customer->id}}" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="{{'same'.$customer->id}}">Change User Role</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
    <form action="{{route('admin.customers.role',$customer->id)}}" method="POST" >
      @csrf
      @method('PUT')

        <div class="modal-body">
          <select class="form-select" name="user_role" id="">
            <option value='user'>User</option>
            <option value='admin'>admin</option>
          </select>
        </div>

  
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>
       
        </ul>
      </div>
      @endforeach
   
@endsection