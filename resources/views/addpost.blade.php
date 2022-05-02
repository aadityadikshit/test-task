@extends('main')
@section('title', 'Home')
@section('content')


<div class="tab-content">
  <div class="tab-pane fade show active" id="pills-addpost" role="tabpanel" aria-labelledby="tab-addpost">
    @if($type=='edit')
      <form method="POST" action="{{url('/updatepost')}}" class="edit-post-frm" id="edit-post-frm" method="POST">
        @csrf

        <div class="form-outline mb-4">
          <input type="text" id="editposttitle" name="editposttitle" class="form-control" value="{{$postdata[0]['post_title']}}"/>
          <label class="form-label" for="editposttitle">Title</label>
        </div>


        <div class="form-outline mb-4">
          <input type="text" id="editpostbody" name="editpostbody" class="form-control" value="{{$postdata[0]['post_body']}}"/>
          <label class="form-label" for="editpostbody">Body</label>
        </div>
        <input type="hidden" id="editpostbodyid" name="editpostbodyid" class="form-control" value="{{$contentid}}"/>

        <!-- Submit button -->
        <button type="submit" id="editpost-btn" class="btn btn-primary btn-block mb-4">Submit</button>

        <div class="message" id="messages"></div>

      </form>

    @else
    <form class="add-post-frm" id="add-post-frm" method="POST">
      @csrf

      <div class="form-outline mb-4">
        <input type="text" id="posttitle" name="posttitle" class="form-control" />
        <label class="form-label" for="posttitle">Title</label>
      </div>


      <div class="form-outline mb-4">
        <input type="text" id="postbody" name="postbody" class="form-control" />
        <label class="form-label" for="postbody">Body</label>
      </div>

      <!-- Submit button -->
      <button type="button" id="addpost-btn" class="btn btn-primary btn-block mb-4">Submit</button>

      <div class="message" id="messages"></div>

    </form>
    @endif
  </div>
</div>
@endsection