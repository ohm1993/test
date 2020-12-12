@extends('layouts.app')
@section('content')
<div class="container">
   @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
  <div class="header_wrap mb-2">
    <div class="tb_search form-group has-search">
      <input type="text" id="search_input_all" onkeyup="FilterkeyWord_all_table()" placeholder="Search User.." class="form-control">
    </div>
  </div>

  <div class="table-responsive table-bordered table-striped" id="table-id">

    <table class="table text-center">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Email</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $key => $user)
        <tr>
          <td>{{ $key + 1 }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->status == 0 ? 'Disabled' : 'Enabled' }}
          <td>
            <form action="{{ route('admin.destroy', $user->id)}}" method="post">
              @csrf
              @method('DELETE')
              <a href="{{ route('admin.edit',$user->id)}}" class="btn btn-dark"><i class="fas fa-edit"></i></a>
              <button class="btn btn-danger btn" type='submit'><i class="fas fa-trash-alt"></i></button>
            </form>
          </td>
        </tr>
        @endforeach
      <tbody>
    </table>
    {{ $users->links() }}
  </div> <!--     End of Container -->
</div>

<!--  Developed By Yasser Mas -->
<script>
  // All Table search script
  function FilterkeyWord_all_table() {

    // Count td if you want to search on all table instead of specific column

    var count = $('.table').children('tbody').children('tr:first-child').children('td').length;

    // Declare variables
    var input, filter, table, tr, td, i;
    input = document.getElementById("search_input_all");
    var input_value = document.getElementById("search_input_all").value;
    filter = input.value.toLowerCase();
    if (input_value != '') {
      table = document.getElementById("table-id");
      tr = table.getElementsByTagName("tr");

      // Loop through all table rows, and hide those who don't match the search query
      for (i = 1; i < tr.length; i++) {

        var flag = 0;

        for (j = 0; j < count; j++) {
          td = tr[i].getElementsByTagName("td")[j];
          if (td) {

            var td_text = td.innerHTML;
            if (td.innerHTML.toLowerCase().indexOf(filter) > -1) {
              flag = 1;
            } else {
              //DO NOTHING
            }
          }
        }
        if (flag == 1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    } else {
      //RESET TABLE
      $('#maxRows').trigger('change');
    }
  }
</script>
@endsection
