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
                        <a href="{{route('students.create')}}" data-toggle="modal" data-target="#myModal"> Add Student</a>
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
                            <form action="{{route('students.store')}}" enctype="multipart/form-data" method="post">
                                <div class="modal-body">
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
                                </div>
                                
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                            
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
                                <td><img src="img/{{$student['picture']}}" height="100px" width="100px">
                                </td>
                                <td>{{$student->firstname}}</td>
                                <td>{{$student->lastname}}</td>
                                <td>{{$student->class}}</td>
                                <td>
                                    <a href="">out</a> |
                                    <div class="container">
                                            <!-- Button to Open the Modal -->
                                        <a href="{{route('students.edit',$student->id)}}"  data-toggle="modal" data-target="#Modal">Edit</a>
                                        <!-- The Modal -->
                                        <div class="modal" id="Modal">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Student</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            
                                            <!-- Modal body -->
                                            <form action="{{route('students.update',$student->id)}}" method="post" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="row mt-3">
                                                    <div class="col">
                                                        <input type="text" class="form-control" id="firstname" placeholder="Enter firstname" value="{{$student->firstname}}" name="firstname">
                                                    </div>
                                                    <div class="col">
                                                        <input type="text" class="form-control" placeholder="Enter lastname" value="{{$student->lastname}}" name="lastname">
                                                    </div>
                                                    </div>
                    
                                                    <div class="row mt-3">
                                                        <div class="col">
                                                            <select class="custom-select custom-select-sm" name="class">
                                                                <option selected>Class</option>
                                                                <option @if($student->class==='SNA') selected='selected' @endif value="SNA">SNA</option>
                                                                <option @if($student->class==='WEB A') selected='selected' @endif value="WEB A">WEB A</option>
                                                                <option @if($student->class==='WEB B') selected='selected' @endif value="WEB B">WEB B</option>
                                                            </select>
                                                        </div>
                                                        <div class="col">
                                                            <input type="file" value="{{$student->picture}}" id="picture" name="picture" >
                                                        </div>
                                                    </div>
                    
                                                    <div class="row mt-3">
                                                        <div class="col">
                                                            <textarea name="description" value="{{$student->description}}" class="form-control">{{ $student->description ? : old('description') }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Edit</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                            
                                            </div>
                                        </div>
                                        </div>
                                    </div>
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
                    {{-- @foreach ($students as $student)
                    <tbody>
                        <tr>
                            <td><img src="{{$student->picture}}" width="40px" height="40px"></td>
                            <td>{{$student->firstname}}</td>
                            <td>{{$student->lastname}}</td>
                            <td>{{$student->class}}</td>
                            <td>
                                <a href="">In</a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach --}}
                </table>
            </div>
            </div>
            
        </div>    
    </div>
</div>
@endsection
