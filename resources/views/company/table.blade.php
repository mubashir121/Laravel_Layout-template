@extends('master')
@section('content')
  
<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Compnay & Employees Page</h1>
                <br>
                <a href="{{route('company-form-create')}}"><button class="btn btn-primary">Add New Form</button></a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Company & Employees Table Page</li>
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
          <h3 class="card-title">Company & Employees Table Page</h3>
          
          @if (session('message'))
          <div class="alert alert-danger">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('message') }}
          </div>
      @endif
      @if (session('error'))
      <div class="alert alert-danger">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('message') }}
      </div>
    @endif
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
            <br>
            <div class="card bg-primary text-center">
              <h2>Company & Employees Data Table</h2>
            </div>
            <br>
            <table id=" yajra-datatable">
              <thead class="table-dark">
                <tr>
                  <th>S.No</th>
                  <th>Company Name</th>
                  <th>Company Email</th>
                  <th>Company Phone No</th>
                  <th>Company Address</th>
                  <th>Employees Count</th>
                  <th>Employees Gender</th>
                  <th>Action</th>
               
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
  <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  @endpush


  @push('script')
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.js"></script>   --}}

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript">
  $(function () {
    
    var table = $('#yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('company-table') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'comp_name', name: 'comp_name'},
            {data: 'comp_email', name: 'comp_email'},
            {data: 'comp_phone', name: 'comp_phone'},
            {data: 'comp_address', name: 'comp_address'},
            {data: 'employ_count', name: 'employ_count '},
            {data: 'employ_count', name: 'employ_count '},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });
    
  });
</script>
  @endpush