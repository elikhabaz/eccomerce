
@component('admin.layouts.content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-header">
            @if (session('status'))
            <div class="alert alert-dark" role="alert">
                Category Saved!
            </div>

            @endif

            @if (session('upd'))
            <div class="alert alert-dark" role="alert">
                Category Update!
            </div>
        @endif

            @if (session('del'))
                <div class="alert alert-dark" role="alert">
                    Category deleted!
                </div>
            @endif

        </div>
      <div class="card-body">
        <div class="d-flex justify-content-between">
            <h4 class="card-title">User table</h4>
            <a class=" btn btn-sm btn-success mb-2 mt-2"  href="{{ route('create-user') }}">+ Create New User</a>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th> #id </th>
                <th> name </th>
                <th> email </th>
                <th> phone</th>
                <th> address</th>
                <th> email status </th>
                <th> action </th>
              </tr>
            </thead>
            <tbody>
                @foreach ( $users as $user )
                <tr>
                    <td> {{$user->id}} </td>
                    <td> {{$user->name}} </td>
                    <td> {{$user->email}} </td>
                    <td> {{$user->phone}} </td>
                    <td> {{$user->address}} </td>

                    <td>
                    <a href="#" class="btn btn-sm btn-info">Edit</a>
                    {{-- <form method="POST" action="{{ route('delete-category', $category->id) }}">
                        @csrf
                        @method('delete')

                        <button class="btn btn-sm btn-danger" type='submit' class="text-inverse" data-toggle="tooltip" onclick="return confirm(' you want to delete?');">
                         Delete
                        </button>

                        </form> --}}

                        {{-- <a class="btn btn-sm btn-danger" href="{{ route('delete-category', $category->id) }}" onclick="return confirm(' you want to delete?');">Delete</a> --}}
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@endcomponent
