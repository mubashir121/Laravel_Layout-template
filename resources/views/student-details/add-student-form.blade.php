@extends('master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Students Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Add New Students</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row" style="display: flex;justify-content: center;align-items: center;">
          <!-- left column -->
         
          <div class="col-md-6">
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
          	 <!-- Horizontal Form -->
            <div class="card card-info">
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('add-form')}}" method="POST">
                  @csrf
              <div class="form-horizontal">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter Student Name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="subject" class="col-sm-2 col-form-label">Subject</label>
                    <div class="col-sm-10">
                      <div class="form-group">
                        <div class="form-check-inline">
                          <input class="form-check-input" type="checkbox" name="subject[]" value="Computer">
                          <label class="form-check-label">Computer</label>
                        </div>
                        <div class="form-check-inline">
                          <input class="form-check-input" type="checkbox" name="subject[]" value="Chemistry">
                          <label class="form-check-label">Chemistry</label>
                        </div>
                        <div class="form-check-inline">
                          <input class="form-check-input" type="checkbox" name="subject[]" value="Physics">
                          <label class="form-check-label">Physics</label>
                        </div>
                        <div class="form-check-inline">
                          <input class="form-check-input" type="checkbox" name="subject[]" value="GK">
                          <label class="form-check-label">GK</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="roll_no" class="col-sm-2 col-form-label">Roll NO</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="roll_no" id="roll_no" placeholder="Enter Student Roll Number">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="class" class="col-sm-2 col-form-label">Class</label>
                    <div class="col-sm-10">
                     <select class="custom-select form-control-border" id="class" name="class">
		                    <option selected disabled>--- Select Option ---</option>
		                    <option value="grade1">Grade 1</option>
		                    <option value="grade2">Grade 2</option>
		                    <option value="grade3">Grade 3</option>
		                    <option value="grade4">Grade 4</option>
		                  </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="class" class="col-sm-2 col-form-label">Gender</label>
                     <div class="col-sm-10">
	                    <div class="form-group">
	                        <div class="form-check-inline">
	                          <input class="form-check-input" type="radio" name="gender" value="male">
	                          <label class="form-check-label">Male</label>
	                        </div>
	                        <div class="form-check-inline">
	                          <input class="form-check-input" type="radio" name="gender" value="female">
	                          <label class="form-check-label">Female</label>
	                        </div>
	                      </div>
	                   </div>
                     </div>
                  </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-info">Submit</button>
                </div>
                <!-- /.card-footer -->
              </div>
            </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection