@extends('master')
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>HR Department Form Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">HR Department Form Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
          <div class="card-header">
             <h3 class="card-title">Company & Employees Form</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <span id="msgError"></span>
        <div class="card-body">
          @if (session('success'))
          <div class="alert alert-success">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('success') }}
          </div>
            @endif
            <form action="{{ route('company-form-data-store') }}" id="myform" method="POST">
             @csrf
             <input type="hidden" name="_token" value="{{ csrf_token() }}" />
             <table id="comp_table" class="table table-bordered border-success">
              <thead class="table-dark text-center">
                <tr>
                  <th>Company Name</th>
                  <th>Company Email</th>
                  <th>Company Phone No</th>
                  <th>Company Address</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td id="col0"><input type="text" class="form-control" value="{{ old('comp_name') }}" name="comp_name" placeholder="Enter Company Name">{{ $errors->first('comp_name') }}</td>
                  <td id="col1"><input type="text" class="form-control" value="{{ old('comp_email') }}" name="comp_email" placeholder="Enter Company Email">{{ $errors->first('comp_email') }}</td>
                  <td id="col2"><input type="text" class="form-control" value="{{ old('comp_phone') }}" name="comp_phone" placeholder="Enter Company Phone No">{{ $errors->first('comp_phone') }}</small></td>
                  <td id="col3"><input type="text" class="form-control" value="{{ old('comp_address') }}" name="comp_address" placeholder="Enter Company Address">{{ $errors->first('comp_name') }}</td>
                </tr>
              </tbody>
             </table>
                 <td><button type="submit" class="btn btn-success col-md-2 form-control">Submit Form</button></td>
               <table id="emptable" class="table table-bordered border-primary"> 
                 <button type="button" class="btn btn-info float-right" id="add_btn">Add Employees</button>
                  <br><br>
                 @if($errors->any())
                 @foreach (old('emp_name') as $key =>$val)
                 {{-- @dd($errors) --}}
                 
                 <tr>  
                   <td><input type="text" value="{{ old('emp_name')[$key] }}" class="form-control" name="emp_name[]" placeholder="Enter Employ Name">{!! $errors->has('emp_name.'.$key) ? ' Employ Name field is Required ' : '' !!}</td>
                   <td><input type="email" value="{{ old('email')[$key] }}" class="form-control" name="email[]" placeholder="Enter Employ Email">{!! $errors->has('email.'.$key) ? ' Employ Email field is Required ' : '' !!}</td>
                   <td><input type="text" value="{{ old('phone')[$key] }}" class="form-control" name="phone[]" placeholder="Enter Employ phone">{!! $errors->has('phone.'.$key) ? ' Employ Phone No field is Required ' : '' !!}</td>
                   <td><input type="text" value="{{ old('address')[$key] }}" class="form-control" name="address[]" placeholder="Enter Employ address">{!! $errors->has('address.'.$key) ? ' Employ Address field is Required ' : '' !!}</td>
                   <td><select name="gender[]" class="form-control"><option selected disabled>--Select Gender--</option><option {{ old('gender')[$key] == 'male' ? 'selected' : '' }} value="male">Male</option><option {{ old('gender')[$key] == 'female' ? 'selected' : '' }} value="female">Female</option></select>{!! $errors->has('gender.'.$key) ? ' Employ gender field is Required ' : '' !!}</td>
                   <td><button type="button" class="btn btn-sm btn-danger" id="remove">Remove</button></td>
                  </tr>

                  @endforeach
              @endif
              </tr>                
              </tbody>
             </table>
               <br>
            </form>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
  @push('link')
  <link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>   
  @endpush

  @push('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <script>

        </script>
  <script>
    $(document).ready(function (){
      $('#add_btn').on('click', function (){
        var html= '';
        html+='<tr>'; 
        html+='<td id="col1"><input type="text" class="form-control" name="emp_name[]" placeholder="Enter Employ Name"></td>';
        html+='<td id="col1"><input type="email" class="form-control" name="email[]" placeholder="Enter Employ Email"></td>';
        html+='<td id="col2"><input type="text" class="form-control" name="phone[]" placeholder="Enter Employ Phone No"</td>';
        html+='<td id="col3"><input type="text" class="form-control" name="address[]" placeholder="Enter Employ Address"</td>';
        html+='<td id="col5"><select name="gender[]" id="gend" class="form-control"><option selected disabled>--Select Gender--</option><option value="male">Male</option><option value="female">Female</option></select></td>';
        //html+='<td><button type="button" class="btn btn-sm btn-info" id="add_btn">Add</button></td>';
        html+='<td><button type="button" class="btn btn-sm btn-danger" id="remove">Remove</button></td>';
        html+='</tr>';
        $('#emptable').append(html);
       });
      });
    $(document).on('click','#remove',function (){
      $(this).closest('tr').remove();
    });

  </script>
@endpush
