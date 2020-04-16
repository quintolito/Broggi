@extends('templates.main')

@section('titol')
    Register
@endsection

@section('main')

  <img src="{{ asset('assets/images/adults.png')}}" usemap="#planetmap">
  <map name="planetmap">
    <area  id="1" shape="rect" data-src="https://www.youtube.com/embed/Jfrjeg26Cwk"  coords="0,0,82,126" alt="Sun" >
    <area shape="circle" coords="90,58,3" alt="Mercury" href="mercur.htm">
    <area shape="circle" coords="124,58,8" alt="Venus" href="venus.htm">
  </map>






{{--  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary video-btn" data-toggle="modal" data-src="https://www.youtube.com/embed/Jfrjeg26Cwk" data-target="#myModal">
  Play Video 1 - autoplay
</button>

   <!-- Button trigger modal -->
<button type="button" class="btn btn-primary video-btn" data-toggle="modal" data-src="https://www.youtube.com/embed/IP7uGKgJL8U" data-target="#myModal">
  Play Video 2
</button>


   <!-- Button trigger modal -->
<button type="button" class="btn btn-primary video-btn" data-toggle="modal" data-src="https://www.youtube.com/embed/A-twOC3W558" data-target="#myModal">
  Play Video 3
</button>


     <!-- Button trigger modal -->
<button type="button" class="btn btn-primary video-btn" data-toggle="modal" data-src="https://player.vimeo.com/video/58385453?badge=0" data-target="#myModal">
  Play Vimeo Video
</button>
 --}}
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">


      <div class="modal-body">

       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <!-- 16:9 aspect ratio -->
<div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
</div>


      </div>

    </div>
  </div>
</div>





@endsection


<script>
document.addEventListener("DOMContentLoaded", function(event) {


$(document).ready(function() {

// Gets the video src from the data-src on each button

var $videoSrc;
$('.video-btn').click(function() {
    $videoSrc = $(this).data( "src" );
});
console.log($videoSrc);



// when the modal is opened autoplay it
$('#myModal').on('shown.bs.modal', function (e) {

// set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
$("#video").attr('src',$videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0" );
})



// stop playing the youtube video when I close the modal
$('#myModal').on('hide.bs.modal', function (e) {
    // a poor man's stop video
    $("#video").attr('src',$videoSrc);
})






// document ready
});

});



</script>
<style type="text/css">

     </style>
