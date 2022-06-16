@extends('master')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blank Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
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
          <h3 class="card-title">Title</h3>

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
            <div class="container">
            <style>
                #preview img{
                margin: 10px;
                }
        </style>
        <form method='post' action="{{ route('image.store') }}" enctype="multipart/form-data">
            @csrf
           <input type="file" id='files' name="files[]" multiple accept=".png,.jpeg,.jpg"><br><br>
           <input type="button" id="submit" value='Upload'>
        </form>
        
        <div id='preview'></div>
            </div>
        
           
          <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>  
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>  
          
        <script>
        
          $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
            $('#submit').click(function(){
           var form_data = new FormData();
           var totalfiles = document.getElementById('files').files.length;
           for (var index = 0; index < totalfiles; index++) {
              form_data.append("files[]", document.getElementById('files').files[index]);
           }

              $.ajax({
             url: "{{ url('/ajax-image') }}", 
             type: "post",
             data: form_data,
             dataType: 'json',
             contentType: false,
             processData: false,
             success: function (response) {
               for(var index = 0; index < response.length; index++) {
                 var src = response[index];
                 $('#preview').append('<img src="'+src+'" width="200px;" height="200px">');
                }
                alert('images uploaded');
 
              }
           });
        
        });
        
        });
            </script>
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