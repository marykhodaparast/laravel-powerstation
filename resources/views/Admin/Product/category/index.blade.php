@extends('admin.layouts.master')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('/css/createNews.css')}}">
@endsection
@section('content')
@if(Session::has('message'))
<div class="alert alert-success alert-block ml-2 Text">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ Session::get('message') }}</strong>
</div>
@endif
  <table id="categoryData" class="table table-bordered table-hover bg-white ml-2 Text">
     <thead>
         <tr>
             <th>id</th>
             <th>name</th>
             <th>action</th>
         </tr>
     </thead>
     <tbody>

     </tbody>
  </table>

@endsection

@push('scripts')
<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
<script src="{{asset('bower_components//datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.7.1.min.js"></script>
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/jquery.dataTables.min.js"></script>

{{--Start:function for size of object(data)--}}
<script>
    Object.size = function(obj) {
    var size = 0, key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) size++;
    }
    return size;
};
</script>
{{--End:function for size of object(data)--}}

<script>
$ ( document ).ready(function() {
    $.ajax({
        type: 'GET',
        url: '{{route('category.data')}}',
        mimeType: 'json',
        success: function(data) {
            var size = Object.size(data.data);
            for(var i=0;i<size;i++){
                var body = "<tr>";
                body    += "<td>" + data.data[i].id + "</td>";
                body    += "<td>" + data.data[i].name + "</td>";
                body    += "<td>" + data.data[i].action + "</td>";
                body    += "</tr>";
                $( "#categoryData tbody" ).append(body);


            }
            var x=$('tbody').find('tr:nth-child(6)').find('td:first').text();
            if(x==9){
                $('tbody').find('tr:nth-child(6)').find('td').css("background-color", "yellow")
            }

            $( "categoryData" ).DataTable();
        },
        error: function(data) {
            
        }
    });
    });
</script>
@endpush
