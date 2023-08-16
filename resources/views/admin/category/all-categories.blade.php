
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
            e.preventDefault(); ////it have to stop doing
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
                        url: '/admin/delete-category/'+ delete_id,
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
                @foreach ( $categories as $category )
                <tr>
                    <input type="hidden" class="delete_val_id" value="{{$category->id}}">
                    <td> {{$category->id}} </td>
                    <td> {{$category->name}} </td>
                    <td>
                    <a href="{{ route('edit-category' , $category->id) }}" class="btn btn-sm btn-info">Edit</a>
                    <button type="submit" class="btn btn-sm btn-danger deletebtn">Delete</button>

                    {{-- <form method="POST" action="{{ route('delete-category', $category->id) }}" class="stylebtn">
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

{{-- @component('admin.master')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script>
    $(document).ready(function(){
        $('deletebtn').click(function(e){
            e.preventDefault();
            alert('hello eli');
        });
    });
  </script>
@endcomponent --}}
