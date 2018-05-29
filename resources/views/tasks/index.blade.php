<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To Do</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="style/style.css"> -->
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <h1>Your ToDo App</h1>
                <!-- <a class="btn btn-primary" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form> -->
            </div>

             @if (Session::has('succsess'))
             <div class="col-md-offset-2 col-md-8">
                 <div class="alert alert-success">
                     <strong>Succsess:</strong>{{Session::get('succsess')}}

                 </div>
             </div>


             @endif
              @if (count($errors) > 0)
               <div class="alert alert-danger">
                 <strong>Error:</strong>
                 <ul>
                     @foreach($errors->all() as $errors)
                       <li>{{$errors}}</li>
                     @endforeach
                 </ul>
               </div>
               @endif

            <div class="col-md-12">
                <form action="{{route('tasks.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="row">
                        <input class="form-control col-md-8" style="margin-bottom:20px" type="text" name="newTask" placeholder="Enter your mession">
                        <input class="btn btn-primary col-md-1" style="margin-left:90px;margin-bottom:20px" type="submit" name="button" value="Add Task">
                    </div>
                    <!-- <div class="row">
                        <div class="col-md-3">
                            <input class="btn btn-primary btn-block" type="submit" name="button" value="Add Task">
                        </div>
                    </div> -->


                </form>

            </div>
            @if (count($storedTasks) > 0)
               <table class="table">
                 <thead>
                     <th>Task No.</th>
                     <th>Task Name</th>
                     <th>Edit</th>
                     <th>Delete</th>
                 </thead>
                 <tbody>
                     @foreach ($storedTasks as $storedTask)
                      <tr>
                        <th>{{$storedTask->id}}</th>
                        <td>{{$storedTask->name}}</td>
                        <td><a href="{{route('tasks.edit', ['tasks' =>$storedTask->id])}}" class="btn btn-default">Edit</a></td>
                        <td>
                            <form action="{{route('tasks.destroy', ['tasks' =>$storedTask->id])}}" method="POST">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="DELETE">
                                <input class="btn btn-danger" type="submit" name="delete" value="Delete">
                            </form>
                        </td>
                      </tr>
                     @endforeach
                 </tbody>
               </table>
            @endif
            <div class="row">
              {{$storedTasks->links()}}
            </div>
            <div>
                <a class="btn btn-default" style="margin-left: 770px" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Log out') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>

        </div>
    </div>
    <!-- <script src="script/script.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
