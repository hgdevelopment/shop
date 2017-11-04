@extends('layout')

@section('content')
<style>
label{
  cursor: pointer;
}
</style>
                <form action="{{URL::to('store')}}" method="post">
                  {{csrf_field()}}
                <div class="col-md-4">

                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">{{$product->product_name}}</h3>
                  </div>

                  <div class="panel-body" style="font-size: 16px;">
                  Basic Price   : {{$product->basic_cost}}<br>
                  <strong>Selling Price : {{$product->billing_price}}</strong><br>
                  Discount : {{$product->product_discount}}<br>
                  GST : {{$product->product_gst}}<br>
                  Branch : {{$product->branch->branch_name}}<br>
                  </div>
                </div>
                <input type="hidden" name="id" value="{{$product->id}}">
                <div class="form-group">
                  <label class="control-label" for="inputLarge">PRODUCT DESCRIPTION (SHORT)</label>
                  <textarea class="form-control" name="shortdescription" >@if(isset($product->description)) {{$product->description}}  @endif</textarea>
                </div>

                <div class="form-group">
                  <label class="control-label" for="inputLarge">PRODUCT DESCRIPTION (LARGE)</label>
                  <textarea class="form-control" name="largedescription" rows="5">@if(isset($product->largedescription)) {{$product->largedescription}}  @endif</textarea>
                </div>

                <button type="submit" class="btn btn-primary" style="float: right;margin-bottom: 120px;">ADD PRODUCT</button>

                </div>
                  </form>

                <div class="col-lg-8 col-md-8 col-sm-4">
                  <h2 class="roboto">{{$product->product_name}}</h2><br>
                  <div class="list-group table-of-contents">



                     <div class="col-lg-6 col-md-6 col-sm-12">
                       @if($product->primary != '')
                            <img src="{!!URL::asset("/products/$product->primary")!!}" class='img-responsive'><br>
                       @else
                            <img src="http://via.placeholder.com/300x300"><br>
                       @endif


                      {{ Form::open(['url' => 'product/img', 'files' => true])}}
                      <label for='primary' style="color: green;">change</label>
                      {{Form::file('primary', ['onchange' => 'this.form.submit()','style'=>'display:none','id'=>'primary'])}}
                      {{Form::hidden('type', 'primary')}}
                      {{Form::hidden('code', $product->id)}}
                      {!! Form::close() !!}

                     </div>

                     <div class="col-lg-6 col-md-6 col-sm-12">
                       <div class="col-lg-4 col-md-4 col-sm-12" style="margin-bottom: 10px;">
                         @if($product->other != '' )
                              @php $gallery = json_decode($product->other); @endphp
                              @if(isset($gallery->one))
                              <img src="{!!URL::asset("/products/$gallery->one")!!}" class='img-responsive'><br>
                              @else
                              <img src="http://via.placeholder.com/300x300" class='img-responsive'><br>
                              @endif
                         @else
                              <img src="http://via.placeholder.com/300x300" class='img-responsive'><br>
                         @endif
                          {{ Form::open(['url' => 'product/img', 'files' => true])}}
                          <label for='one' style="color: green;">change</label>
                          {{Form::file('primary', ['onchange' => 'this.form.submit()','style'=>'display:none','id'=>'one'])}}
                          {{Form::hidden('type', 'other')}}
                          {{Form::hidden('typeid', 'one')}}
                          {{Form::hidden('code', $product->id)}}
                          {!! Form::close() !!}
                       </div>
                      <!-- To create new subimage just change thr 'one' into any number (5 Places) -->
                       <div class="col-lg-4 col-md-4 col-sm-12" style="margin-bottom: 10px;">
                         @if($product->other != '' )
                              @php $gallery = json_decode($product->other); @endphp
                              @if(isset($gallery->two))
                              <img src="{!!URL::asset("/products/$gallery->two")!!}" class='img-responsive'><br>
                              @else
                              <img src="http://via.placeholder.com/300x300" class='img-responsive'><br>
                              @endif
                         @else
                              <img src="http://via.placeholder.com/300x300" class='img-responsive'><br>
                         @endif
                          {{ Form::open(['url' => 'product/img', 'files' => true])}}
                          <label for='two' style="color: green;">change</label>
                          {{Form::file('primary', ['onchange' => 'this.form.submit()','style'=>'display:none','id'=>'two'])}}
                          {{Form::hidden('type', 'other')}}
                          {{Form::hidden('typeid', 'two')}}
                          {{Form::hidden('code', $product->id)}}
                          {!! Form::close() !!}
                       </div>

                        <div class="col-lg-4 col-md-4 col-sm-12" style="margin-bottom: 10px;">
                          @if($product->other != '' )
                               @php $gallery = json_decode($product->other); @endphp
                               @if(isset($gallery->three))
                               <img src="{!!URL::asset("/products/$gallery->three")!!}" class='img-responsive'><br>
                               @else
                               <img src="http://via.placeholder.com/300x300" class='img-responsive'><br>
                               @endif
                          @else
                               <img src="http://via.placeholder.com/300x300" class='img-responsive'><br>
                          @endif
                           {{ Form::open(['url' => 'product/img', 'files' => true])}}
                           <label for='three' style="color: green;">change</label>
                           {{Form::file('primary', ['onchange' => 'this.form.submit()','style'=>'display:none','id'=>'three'])}}
                           {{Form::hidden('type', 'other')}}
                           {{Form::hidden('typeid', 'three')}}
                           {{Form::hidden('code', $product->id)}}
                           {!! Form::close() !!}
                        </div>
                        <div class="row"><br></div>

                        <div class="col-lg-4 col-md-4 col-sm-12" style="margin-bottom: 10px;">
                          @if($product->other != '' )
                               @php $gallery = json_decode($product->other); @endphp
                               @if(isset($gallery->four))
                               <img src="{!!URL::asset("/products/$gallery->four")!!}" class='img-responsive'><br>
                               @else
                               <img src="http://via.placeholder.com/300x300" class='img-responsive'><br>
                               @endif
                          @else
                               <img src="http://via.placeholder.com/300x300" class='img-responsive'><br>
                          @endif
                           {{ Form::open(['url' => 'product/img', 'files' => true])}}
                           <label for='four' style="color: green;">change</label>
                           {{Form::file('primary', ['onchange' => 'this.form.submit()','style'=>'display:none','id'=>'four'])}}
                           {{Form::hidden('type', 'other')}}
                           {{Form::hidden('typeid', 'four')}}
                           {{Form::hidden('code', $product->id)}}
                           {!! Form::close() !!}
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12" style="margin-bottom: 10px;">
                          @if($product->other != '' )
                               @php $gallery = json_decode($product->other); @endphp
                               @if(isset($gallery->five))
                               <img src="{!!URL::asset("/products/$gallery->five")!!}" class='img-responsive'><br>
                               @else
                               <img src="http://via.placeholder.com/300x300" class='img-responsive'><br>
                               @endif
                          @else
                               <img src="http://via.placeholder.com/300x300" class='img-responsive'><br>
                          @endif
                           {{ Form::open(['url' => 'product/img', 'files' => true])}}
                           <label for='five' style="color: green;">change</label>
                           {{Form::file('primary', ['onchange' => 'this.form.submit()','style'=>'display:none','id'=>'five'])}}
                           {{Form::hidden('type', 'other')}}
                           {{Form::hidden('typeid', 'five')}}
                           {{Form::hidden('code', $product->id)}}
                           {!! Form::close() !!}
                        </div>

                         <div class="col-lg-4 col-md-4 col-sm-12" style="margin-bottom: 10px;">
                           @if($product->other != '' )
                                @php $gallery = json_decode($product->other); @endphp
                                @if(isset($gallery->six))
                                <img src="{!!URL::asset("/products/$gallery->six")!!}" class='img-responsive'><br>
                                @else
                                <img src="http://via.placeholder.com/300x300" class='img-responsive'><br>
                                @endif
                           @else
                                <img src="http://via.placeholder.com/300x300" class='img-responsive'><br>
                           @endif
                            {{ Form::open(['url' => 'product/img', 'files' => true])}}
                            <label for='six' style="color: green;">change</label>
                            {{Form::file('primary', ['onchange' => 'this.form.submit()','style'=>'display:none','id'=>'six'])}}
                            {{Form::hidden('type', 'other')}}
                            {{Form::hidden('typeid', 'six')}}
                            {{Form::hidden('code', $product->id)}}
                            {!! Form::close() !!}
                         </div>
                         <div class="row"><br></div>

                     </div>

                     <div class="col-md-12">

                       @if(isset($product->description))
                        <h2>Product short description</h2>
                        <p>{{$product->description}}</p>
                       @endif

                       @if(isset($product->largedescription))
                        <h2>Product large description</h2>
                        <p>{{$product->largedescription}}</p>
                       @endif



                     </div>

                </div>



@endsection

@section('script')

@endsection
