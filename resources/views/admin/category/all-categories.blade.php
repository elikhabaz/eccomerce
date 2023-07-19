
@component('admin.layouts.content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">

        <div class="d-flex justify-content-between">
            <h4 class="card-title">Category table</h4>
            <a class=" btn btn-sm btn-success mb-2 mt-2"  href="{{ route('create-category') }}">+ Create New Category</a>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> #id </th>
                <th> category name </th>
                <th> action </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td> 1 </td>
                <td> Herman Beck </td>

                <td>
                <a href="#" class="btn btn-sm btn-info">Edit</a>
                <a href="#" class="btn btn-sm btn-danger">Delete</a>

                </td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@endcomponent
