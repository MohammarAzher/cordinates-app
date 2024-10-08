@extends('dashboard.layouts.app')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap4.min.css">
<style>

.pagination{
    margin-top: 10px;
    float: right;
}


table {
  border-top: #cdd6dc !important;
}
table.dataTable {
  border-collapse: collapse !important;

}

  tr{
      border-collapse: collapse !important;
      border-color: inherit !important;
      border-style: solid !important;
      border-width: 1px !important;
  }

  label {
      margin-bottom: 2%; text-transform: uppercase; font-weight: 500; margin-left: 1%;
  }
 .dataTables_length {
      float: left !important;
      width: 150px !important;
      padding-top: .85em !important;
  }
  .dataTables_info{
      float: left !important;
      width: 200px !important;
      padding-top: 1.1em !important;
      margin-left: 5%;

  }
  .dataTables_paginate{
      padding-top: .85em !important;
  }
  .dt-buttons
  {
      width: 460px !important;
      float: left !important;
      padding-bottom: .85em !important;
  }
  .dataTables_processing{
      z-index: 99 !important;
  }

  .select2-container .select2-search--inline .select2-search__field
  {
      height: 22px !important;
  }
</style>
@endsection
@section('content')

  <!-- Breadcrumb-->
  <div class="row pt-2 pb-2">
    <div class="col-sm-12">


        <div class="float-sm-left">
           <h3>Coordinates</h3>
           </div>
   {{-- <div class="btn-group float-sm-right">
   <a href="{{route('user.create')}}"> <button type="button" class="btn btn-primary"> Create User </button></a>
   </div> --}}
 </div>
 </div>
<!-- End Breadcrumb-->


<div class="row pt-2 pb-2">
<div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Coordinates</h5>
        <div class="table-responsive">
        <table id="datatable" class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">S#</th>
              <th scope="col">Username</th>
              <th scope="col">Address</th>
              <th scope="col">Phone No</th>
              <th scope="col">Coordinates</th>
              {{-- <th scope="col">Action</th> --}}
            </tr>
          </thead>
          <tbody>
            {{-- @foreach ($data as $user)
            <tr>
              <th scope="row">{{$loop->index+1}}</th>
              <td>{{$user->name}}</td>
              <td>{{$user->address}}</td>
              <td>{{$user->phone}}</td>
              <td>{{$user->lat}},{{$user->lng}}</td>

            </tr>
            @endforeach --}}


          </tbody>
        </table>
        {{$data->links() }}
      </div>
      </div>
    </div>
  </div>

</div><!--End Row-->
</div>
@endsection

 {{-- javascript work here --}}
 @section('JScript')

 <!-- Data Tables -->
 <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.bootstrap4.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>


<script>


$(document).ready(function() {

var table = $('#datatable').DataTable({
    processing: true,
    serverSide: true,
    scrollCollapse: true,
    orderable: false,  autoWidth: true,
    scrollY: 300,
    ajax: {
        url: "{{ route('get_cordinates') }}",
    },
    columns: [
        { data: null, render: function(data, type, row, meta) {
            return meta.row + 1; // or use index + 1
        }},
        { data: 'username', name: 'username' },
        { data: 'address', name: 'address' },
        { data: 'phone', name: 'phone' },
        { data: null, render: function(data, type, row) {
            return `${row.lat} , ${row.lng}`; // Combine lat and lng
        }, name: 'coordinates' },
        ],
    order: [], // Reset initial sorting
    dom: 'Bfrtlip',

    lengthMenu: [
        [50, 250, 500, -1],
        [50, 250, 500, 'All'] // Labels corresponding to the values
    ],

    buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print','colvis'
    ],
      responsive: true,

});
});
</script>

@endsection
