<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    {{-- bootstrap css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <h2 class="text-center">Edit Student Data </h2>
            @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
            @endif
            <form action="{{url('update-student')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$data->id}}">
                <div class="input-group m-3 md-3">
                    <label class="input-group-text">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter your name"
                        value="{{$data->name}}">
                    @error('name')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="input-group m-3 md-3 ">
                    <label class="input-group-text">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter your email"
                        value="{{$data->email}}">
                    @error('email')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="input-group m-3 md-3 ">
                    <label class="input-group-text">Contact Number</label>
                    <input type="number" class="form-control" name="number" placeholder="Enter your Phone"
                        value="{{$data->phone}}">
                    @error('number')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="input-group m-3 ">
                    <label class="input-group-text">Address</label>
                    <textarea class="form-control" name="address">{{$data->address}}</textarea>
                    @error('address')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{url('student-list')}}" class="btn btn-danger m-3" type="submit">Back</a>
            </form>
        </div>

    </div>

</body>

</html>