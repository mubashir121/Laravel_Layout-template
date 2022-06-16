@extends('master')
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>HR Department update Form Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">HR Department update Form Page</li>
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
             <h3 class="card-title">Company & Employees update Form</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
          @if (session('success'))
          <div class="alert alert-success">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('success') }}
          </div>
           @endif
             <form action="{{ route('company-form-data-update', [$company_update->id]) }}" method="POST">
              @method("PUT")
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
                  <td id="col0"><input type="text" class="form-control" name="comp_name" value="{{$company_update->comp_name}}" placeholder="Enter Company Name">@error('comp_name')<span>{{ $message }}</span>@enderror</td>
                  <td id="col1"><input type="text" class="form-control" name="comp_email" value="{{$company_update->comp_email}}" placeholder="Enter Company Email">@error('comp_email')<span>{{ $message }}</span>@enderror</td>
                  <td id="col2"><input type="text" class="form-control" name="comp_phone" value="{{$company_update->comp_phone}}" placeholder="Enter Company Phone No">@error('comp_phone')<span>{{ $message }}</span>@enderror</small></td>
                  <td id="col3"><input type="text" class="form-control" name="comp_address" value="{{$company_update->comp_address}}" placeholder="Enter Company Address">@error('comp_address')<span>{{ $message }}</span>@enderror</td>
                </tr>
              </tbody>
             </table>
                 <td><button type="submit" class="btn btn-success col-md-2 form-control">Update Form</button></td>
                 <table id="emptable" class="table table-bordered border-success">
                  <button type="button" class="btn btn-info float-right" id="add_btn">Add Employees</button>
                  <thead class="">
                  <tr>
                  <br>
                  </tr>
                </thead>     
                <tbody>
                  <br><br>
                  @foreach($company_update->employ as $employee)
                 
                  <tr>
                    <input type="hidden" name="id[]" value="{{ $employee->id }}">
                    <td id="col1"><input type="text" class="form-control" value="{{ $employee->emp_name}}" name="emp_name[]">@error('emp_name')<span>{{ $message }}</span>@enderror</td>
                    <td id="col1"><input type="email" class="form-control"  name="email[]" value="{{ $employee->email }}">@error('email')<span>{{ $message }}</span>@enderror</td>
                    <td id="col2"><input type="text" class="form-control"  name="phone[]" value="{{ $employee->phone }}">@error('phone')<span>{{ $message }}</span>@enderror</td>
                    <td id="col3"><input type="text" class="form-control" name="address[]" value="{{ $employee->address }}">@error('address')<span>{{ $message }}</span>@enderror</td>
                    <td id="col5"><select name="gender[]" id="gend" class="form-control"><option {{ $employee->gender == 'male' ? 'selected' : '' }}value="male">Male</option><option {{ $employee->gender == 'female' ? 'selected' : '' }} value="female">Female</option></select>@error('gender')<span>{{ $message }}</span>@enderror</td>
                    <td><button type="button" class="btn btn-sm btn-danger" id="remove">Remove</button></td>
                  </tr>
                  @endforeach
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
