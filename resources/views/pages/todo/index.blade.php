@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="page-title">My todo list</h1>





        </div>
    <div class="col-lg-12 mt-5">
        <form action="{{ route('todo.store') }}" method="post" enctype="multipart/form">
            @csrf
            <div class="row">
                <div class="col-lg-8">
                 <div class="form group">
                    <input class="form-control"  type="text" placeholder="enter task" name="title">
                  </div>
                </div>
                <div class="col-lg-4">
                 <button type="submit" class="btn btn-success">submit</button>

                 </div>






         </div>


        </form>

        <div class="class col-lg-12 mt-5">
            <div>
                <table class="table  table-success table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</Title></th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $key=>$task)
                        <tr>
                            <th scope="row">{{ $key++ }}</th>
                            <td>{{ $task->title }}</td>
                            <td>
                                @if ($task->done==0)
                                <span class="badge bg-warning">not completed</span>

                            @else
                            <span class="badge bg-success"> completed</span>
                            @endif
                        </td>
                            <td>
                               <a href="{{ route('todo.delete',$task->id) }}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                               <a href="{{ route('todo.done',$task->id) }}" class="btn btn-success"><i class="fas fa-check-circle"></i></a>
                               <a href="javascript:void(0)" class="btn btn-info"><i class="fas fa-check-circle"  onclick="taskEditModal({{  $task->id}})"></i></a>
                        </td>

                          </tr>

                        @endforeach

                    </tbody>

                  </table>

            </div>
        </div>




    </div>
    <div class="modal fade" id="taskedit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Main task edit</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="taskeditContent">

            </div>

          </div>
        </div>
      </div>




    </div>


@endsection

@push('css')
<style>
    .page-title{
        padding-top: 10vh;
        font-size:5rem;
        color: #4fbf44b;

    }

</style>
@endpush
<script>
    function taskEditModal(task_id){
        var data ={
            task_id: task_id,

        };
        $.ajax({
              url:"{{ route('todo.edit') }}",
              headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type:'GET',
              dataType:'',
              data:data,
              success: function (response){

                $('#taskedit').modal('show');

                $('#taskeditContent').html(response);
              }


        });
    }
</script>
