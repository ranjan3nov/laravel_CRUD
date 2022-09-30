<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student list</title>
    {{-- bootstrap css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <div class="container" style="margin-top:20px;">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">Student List</h2>
                <div class="float-end">
                    <a href="{{url('add-student')}}" class="btn btn-success">Add Student</a>
                </div>
                @if(Session::has('success'))
                <div class="alert alert-danger" role="alert">
                    {{Session::get('success')}}
                </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i=1;
                        @endphp
                        @foreach($data as $stu)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$stu->name}}</td>
                            <td>{{$stu->email}}</td>
                            <td>{{$stu->phone}}</td>
                            <td>{{$stu->address}}</td>
                            <td><a href="{{url('edit-student/'.$stu->id)}}" class="btn btn-warning">Edit</a>
                                |
                                <a href="{{url('delete-student/'.$stu->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>