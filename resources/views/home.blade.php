@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#follow">Follow Up</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#outfollow">Out of Followup</a>
            </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content mt-3">
            <div class="tab-pane container active" id="follow">
                <div class="container">
                        <!-- Button to Open the Modal -->
                    <a href="{{route('students')}}" data-toggle="modal" data-target="#myModal"> Add Student</a>
                    <!-- The Modal -->
                    <div class="modal" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Add Student</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="{{route('students.store')}}" enctype="multipart/form-data" method="post">
                                @csrf
                                @method('POST')
                                <div class="row mt-3">
                                <div class="col">
                                    <input type="text" class="form-control" id="firstname" placeholder="Enter firstname" name="firstname">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Enter lastname" name="lastname">
                                </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col">
                                        <select class="custom-select custom-select-sm" name="class">
                                            <option selected>Class</option>
                                            <option value="SNA">SNA</option>
                                            <option value="WEBA">WEB A</option>
                                            <option value="WEBB">WEB B</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <input type="file" id="picture" name="picture">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col">
                                        <textarea class="form-control" name="description" aria-label="With textarea"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                        <a href="{{route('home')}}" class="btn btn-primary" data-toggle="modal" data-target="#myModal"> Add</a>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                        
                        </div>
                    </div>
                    </div>
                </div>
                  
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>Picture</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Class</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach ($students as $student)
                    <tbody>
                        <tr>
                            <td><img src="{{$student->picture}}" width="40px" height="40px"></td>
                            <td>{{$student->firstname}}</td>
                            <td>{{$student->lastname}}</td>
                            <td>{{$student->class}}</td>
                            <td>
                                <a href="">out</a> |
                                <a href=""><span class="material-icons">edit</span></a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
            <div class="tab-pane container fade" id="outfollow">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Picture</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Class</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach ($students as $student)
                    <tbody>
                        <tr>
                            <td><img src="{{$student->picture}}" width="40px" height="40px"></td>
                            <td>{{$student->firstname}}</td>
                            <td>{{$student->lastname}}</td>
                            <td>{{$student->class}}</td>
                            <td>
                                <a href="">Edit</a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
            </div>
            
        </div>    
    </div>
</div>
@endsection
