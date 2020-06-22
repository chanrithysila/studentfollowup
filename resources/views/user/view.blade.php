<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

</head>
<body>
   <div class="container mt-4">
      
       <div class="row">
           <div class="card">
               <div class="card-header">User Information</div>
               <a href="{{route('addform')}}" class="ml-3 mt-3" >Add New User</a>
               <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Position</th>
                    </tr>
                    @foreach ($users as $item)
                     <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->firstName}}</td>
                        <td>{{$item->lastName}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->password}}</td>
                        <td>{{$item->role}}</td>
                        <td>{{$item->position}}</td>
                    </tr>
                    @endforeach
                </table>
               </div>
           </div>
       </div>
   </div>
</body>
</html>