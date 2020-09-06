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
  <table id="commentData" class="table table-bordered table-hover bg-white ml-2 Text">
     <thead>
         <tr>
             <th>id</th>
             <th>user_id</th>
             <th>product_id</th>
             <th>body</th>
             <th>confirmation</th>
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
        url: '{{route('admin.product.comment.data')}}',
        mimeType: 'json',
        success: function(data) {
            var size = Object.size(data.data);
            for(var i=0;i<size;i++){
                var str = data.data[i].body;
                var body = "<tr>";
                body    += "<td>" + data.data[i].id + "</td>";
                body    += "<td>" + data.data[i].user_id+ "</td>";
                body    += "<td>" + data.data[i].product_id+ "</td>";
                body    += "<td>" + str.slice(0,20)+"..."+ "</td>";
                body    += "<td>" + data.data[i].confirmation+ "</td>";
                body    += "<td>" + data.data[i].action + "</td>";
                body    += "</tr>";
                $( "#commentData tbody" ).append(body);
               // if(data.data[i].confirmation == 0){
                    var x=$('tbody').find('td:nth-child(5)');
                    console.log(x);
               // }
            }
            {{--  var x=$('tbody').find('tr:nth-child(1)').find('td:first').text();
            console.log(x);
            //if(x==1){
                $('tbody').find('tr:nth-child(1)').find('td').css("background-color", "yellow")  --}}
            //}

            $( "#commentData" ).DataTable();
        },
        error: function(data) {
          console.log('error')
        }
    });
    });
</script>
@endpush
