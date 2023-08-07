@component('admin.layouts.content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        @include('admin.layouts.errors')

        <h4 class="card-title">Edit User </h4>
        <form  class="form-inline" method="POST" name="name" action="{{ route('update-user' , $user->id) }}">
            @csrf
            @method('put')

        <label  for="name">Name of User</label>
          <input type="text" class="text-black form-control mb-2 mr-sm-2 bg-white" id="name"
           placeholder="User name" name="name" value="{{old('name' , $user->name)}}">

        <label  for="email">email</label>
          <input type="email" class="text-black form-control mb-2 mr-sm-2 bg-white" id="email"
           placeholder="email address" name="email" value="{{old('email' , $user->email)}}">

        <label  for="phone">phone number</label>
          <input type="text" class="text-black form-control mb-2 mr-sm-2 bg-white" id="phone"
           placeholder="User phone" name="phone" value="{{old('phone' , $user->phone)}}">

        <label  for="address">address</label>
          <input type="text" class="text-black form-control mb-2 mr-sm-2 bg-white" id="address"
           placeholder="User address" name="address" value="{{old('address' , $user->address)}}">

        <label  for="password">password</label>
          <input type="password" class="text-black form-control mb-2 mr-sm-2 bg-white" id="password"
           placeholder="User pasword" name="password" >

        <label  for="password_confrmation">password confrmation</label>
           <input type="password" class="text-black form-control mb-2 mr-sm-2 bg-white" id="password_confrmation"
            placeholder="User pasword_confrmation" name="password_confrmation" >

         @if (! $user->hasVerifiedEmail())
          <label  for="verify">user verification</label>
          <input type="checkbox" class="form-check-input" id="verify"
            name="verify" >
         @endif
            <br>

          <button type="submit" class="btn btn-primary mb-2">Edit</button>
        </form>
    </div>
  </div>
@endcomponent
