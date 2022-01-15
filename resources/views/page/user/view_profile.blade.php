@extends('page.layouts.master')
@section('content')
<div class="form-control">
    <div class="row"   style="margin-left: 25%; margin-top: 10%;">
        <div class="col-md-8">
            <div class="card-body" style="border: 2px solid #ddd;border-radius: 10px;">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-md-4">
                            <img  style="border-radius: 15px 50px;" src="{{(!empty($user->image))?url('public/assets/images/admin/'.$user->image):url('public/assets/images/admin/images.jpg')}}" class="avatar img-circle img-thumbnail" alt="avatar">
                        </div>
                        <div class="col-md-8">
                            <h3>{{$user->name}}</h3>
                            <p><i class="fas fa-map-marker-alt"></i>  {{$user->address}}</p>
                            <p><i class="fas fa-envelope"></i>  {{$user->email}}</p>
                            <p><i class="fas fa-phone"></i> {{$user->mobile}} </p>
                            <p><i class="fas fa-transgender-alt"></i> {{$user->gender}} </p>
                            
                        <!-- Split button -->
                        <div class="col-xs-12 text-right ">
                                <br>
                                <a style="border-radius:5px 5px" href="{{ route('profiles.edit', $user->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i>Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>   

@endsection