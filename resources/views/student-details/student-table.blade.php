@extends('master')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

          	<a href="{{route('add-form')}}"><button class="btn btn-primary">Add New Students</button></a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Students Table List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

 <!-- Main content -->
    <section class="content">
         @if (session('success'))
		        <div class="alert alert-success">
		        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('success') }}
		        </div>
		    @endif
            @if (session('error'))
            <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('error') }}
            </div>
        @endif
        @if (session('message'))
        <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('message') }}
        </div>
    @endif
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Subject</th>
                    <th>Roll No</th>
                    <th>Class</th>
                    <th>Gender</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
              	@foreach($student_table as $student)
                  <tr>
                    <td>{{$student->name}}</td>
                    <td>{{$student->subject}}</td>
                    <td>{{$student->roll_no}}</td>
                    <td>{{$student->class}}</td>
                    <td>{{$student->gender}}</td>
                    <td><a href="{{ route('student-edit-form', [$student->id]) }}"
                     id="edit" class="btn btn-primary">Edit</a></td>
                   <td><a href="{{ route('student-delete-form', [$student->id]) }}" id="delete"class="btn btn-danger delete">Delete</a></td>
                  </tr>
                  </tbody>
                  @endforeach
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>    
@endsection