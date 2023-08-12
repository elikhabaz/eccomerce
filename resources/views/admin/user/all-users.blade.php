@component('admin.layouts.content')
@section('scripts')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.deletebtn').click(function(e){
            e.preventDefault();
            var delete_id = $(this).closest("tr").find('.delete_val_id').val();
            // console.log('Delete button clicked'); // Add this line


            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    var data = {
                        "_token": $('input[name=_token]').val(),
                        "id": delete_id,
                    };

                    $.ajax({
                        type: "DELETE",
                        url: '/admin/delete-user/'+ delete_id,
                        data: data,
                        success:function(response){
                            swal(response.status , {
                                icon: "success",
                            }).then((result) => {
                                location.reload();
                            });
                        }
                    });
                }
            });
        });
    });
    </script>
@endsection

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-header">
            @if (session('status'))
            <div class="alert alert-dark" role="alert">
                User Saved!
            </div>

            @endif

            @if (session('upd'))
            <div class="alert alert-dark" role="alert">
                User Update!
            </div>
        @endif

            @if (session('del'))
                <div class="alert alert-dark" role="alert">
                    User deleted!
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
                  <input type="hidden" class="delete_val_id" value="{{$user->id}}">
                    <td> {{$user->id}} </td>
                    <td> {{$user->name}} </td>
                    <td> {{$user->email}} </td>
                    <td> {{$user->phone}} </td>
                    <td> {{$user->address}} </td>
                    <td>
                        @if($user->email_verified_at)
                            <span class="badge badge-success">Active</span>
                        @else
                        <span class="badge badge-danger">InActive</span>
                        @endif
                    </td>
                    <td>
                   <div class="inline-flex">

                    <a href="{{ route('edit-user', $user->id) }}" class=" btn btn-sm btn-info " style="margin-right: 10px;">Edit</a>

                    <button type="submit" class="btn btn-sm btn-danger deletebtn">Delete</button>
                    {{-- <form method="POST" action="{{ route('delete-user', $user->id) }}">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm btn-danger" type='submit' class="text-inverse " data-toggle="tooltip" onclick="return confirm(' you want to delete?');">
                         Delete
                        </button>

                        </form> --}}
                    </div>
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
