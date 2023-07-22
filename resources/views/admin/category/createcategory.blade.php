@component('admin.layouts.content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Create Category </h4>
        <form  class="form-inline" method="POST" name="name" action="{{ route('store-category') }}">
            @csrf
          <label class="sr-only" for="inlineFormInputName2">Name of Category</label>
          <input type="text" class="form-control mb-2 mr-sm-2 bg-white" id="inlineFormInputName2" placeholder="category name" name="name">
          <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </form>
      </div>
    </div>
  </div>
@endcomponent
