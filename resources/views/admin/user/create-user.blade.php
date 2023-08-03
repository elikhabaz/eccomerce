@component('admin.layouts.content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        @include('admin.layouts.errors')

        <h4 class="card-title">Create User </h4>
        <form  class="form-inline" method="POST" name="name" action="{{ route('store-user') }}">
            @csrf
        <div style="width: 30%;">

        <label  for="name">Name of User</label>
          <input type="text" class="text-black form-control mb-2 mr-sm-2 bg-white" id="name"
           placeholder="User name" name="name">

        <label  for="email">email</label>
          <input type="email" class="text-black form-control mb-2 mr-sm-2 bg-white" id="email"
           placeholder="email address" name="email">

        <label  for="phone">phone number</label>
          <input type="text" class="text-black form-control mb-2 mr-sm-2 bg-white" id="phone"
           placeholder="User phone" name="phone">

        <label  for="address">address</label>
          <input type="text" class="text-black form-control mb-2 mr-sm-2 bg-white" id="address"
           placeholder="User address" name="address">

           <label  for="password">password</label>
          <input type="password" class="text-black form-control mb-2 mr-sm-2 bg-white" id="password"
           placeholder="User pasword" name="password">

           <label  for="password_confrmation">password confrmation</label>
           <input type="password" class="text-black form-control mb-2 mr-sm-2 bg-white" id="password_confrmation"
            placeholder="User pasword_confrmation" name="password_confrmation">

        <label  for="verify">user verification</label>
        <br>
          <input type="checkbox" class="form-check-input" id="verify"
           name="verify">

          <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </form>
      </div>
    </div>
  </div>
@endcomponent
