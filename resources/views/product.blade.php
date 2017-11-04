@extends('layout')

@section('content')

                <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label">Search by product name/code</label>
                  <div class="input-group">
                    <span class="input-group-addon"><img src="{{ URL::asset('icons/24.png') }}"  title="Search" width="20" height="20"></span>
                    <input type="text" class="form-control" id="keyword"  onkeyup="search()" >
                  </div>
                </div>
                </div>

       
          <div class="col-lg-12 col-md-12 col-sm-4">
                  <h4 style="text-decoration: underline;">Results</h4><br>
                  <div class="list-group table-of-contents" id="results">
                  
                  </div>

                </div>
@endsection

@section('script')
<script>
function search() {
            var keyword =  $("#keyword").val();
            $.ajax({
               type:'GET',
               url:'{{ URL::to('/ajax/search') }}',
                data: {
                 keyword: keyword
                },
               success:function(data){
                $('#results').html(data); 
               }
            });
}
</script>
@endsection