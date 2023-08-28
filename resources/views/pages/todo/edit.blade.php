<form action="{{ route('todo.update'),$task->id }}" method="post" enctype="multipart/form">
    @csrf
    <div class="row">
        <div class="col-lg-8">
         <div class="form group">
            <input class="form-control"  type="text" placeholder="enter task" name="title" value="{{ $task->title }}">
          </div>
        </div>
        <div class="col-lg-4">
         <button type="submit" class="btn btn-success">Update</button>

         </div>






 </div>


</form>
