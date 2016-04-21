@extends('layouts.master')
@section('scripts')
 <script type="text/javascript" src="{!! asset('js/status.min.js') !!}"></script>
 <script type="text/javascript" src="{!! asset('js/content-filter/jquery.mixitup.min.js') !!}"></script>
 <script type="text/javascript" src="{!! asset('js/content-filter/main.js') !!}"></script> 
 <script type="text/javascript" src="{!! asset('js/content-filter/modernizr.js') !!}"></script> 
<link rel="stylesheet" href="{{ URL::asset('css/simple-sidebar.css') }}" />

@stop

@section('content')

@if (count($errors) > 0)
  <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

 {!! csrf_field() !!}
<!-- $username is passed from the controller. -->
<p> {{ $user->name }}, here you can create your first workout routine!<br><br>
 Let's get started: </p>

{!! Form::open(['route' => 'view_routine']) !!}

Pick your routine type: {!! Form::select('type', ['Aerobic' => 'Aerobic', 'Anaerobic' => 'Anaerobic']); !!} <br><br>

Give your routine a name: {!! Form::text('username'); !!}

<header class="cd-header">
	<h1>Now pick your routine exercises:</h1>
</header>
 
<main class="cd-main-content" >
	<div class="cd-tab-filter-wrapper">
		<div class="cd-tab-filter">
			<ul class="cd-filters">
				<li class="placeholder"> 
					<a data-type="all" href="#0">All</a> <!-- selected option on mobile -->
				</li> 
				<li class="filter"><a class="selected" href="#0" data-type="all">All</a></li>
				<li class="filter" data-filter=".biceps"><a href="#0" data-type="biceps">Biceps</a></li>
				<li class="filter" data-filter=".abdominals"><a href="#0" data-type="abdominals">Abdominals</a></li>
				<li class="filter" data-filter=".back"><a href="#0" data-type="back">Back</a></li>
				<li class="filter" data-filter=".chest"><a href="#0" data-type="chest">Chest</a></li>
				<li class="filter" data-filter=".legs"><a href="#0" data-type="legs">Legs</a></li>
				<li class="filter" data-filter=".shoulders"><a href="#0" data-type="shoulders">Shoulders</a></li>
				<li class="filter" data-filter=".triceps"><a href="#0" data-type="triceps">Triceps</a></li>
				<li class="filter" data-filter=".test"><a href="#0" data-type="test">Test</a></li>
			</ul> <!-- cd-filters -->
		</div> <!-- cd-tab-filter -->
	</div> <!-- cd-tab-filter-wrapper -->
 
	<section class="cd-gallery">
		<ul>
			<!--biceps exercises -->
			<div class="elements">
			<li class="mix biceps check1 radio1 option1"><img src="images/exercises/biceps/Alternate Hammer Curl.jpg" alt="Image 1" data-text="first image"></li>
			<li class="mix biceps check2 radio2 option2"><img src="images/exercises/biceps/Barbell Curl.jpg" alt="Image 2" data-text="second image"></li>
			<li class="mix biceps check3 radio3 option3"><img src="images/exercises/biceps/Barbell Curls Lying Against An Incline.jpg" alt="Image 3" data-text="third image"></li>
			<li class="mix biceps check4 radio4 option4"><img src="images/exercises/biceps/Cable Hammer Curls - Rope Attachment.jpg" alt="Image 4" data-text="fourth image"></li>
			<li class="mix biceps check5 radio5 option5"><img src="images/exercises/biceps/Close-Grip EZ-Bar Curl with Band.jpg" alt="Image 5" data-text="fifth image"></li>
			<!-- <li class="gap"></li> --> <!-- Creating a gap on abdominals section -->

			<!--abdominals exercises -->

			<li class="mix abdominals check1 radio1 option1"><img src="images/exercises/abdominals/bottoms up.jpg" alt="Image 1" data-text="sixth image"></li>
			<li class="mix abdominals check1 radio1 option1"><img src="images/exercises/abdominals/Frog Sit-Ups.jpg" alt="Image 1" data-text="seventh image"></li>
			<li class="mix abdominals check1 radio1 option1"><img src="images/exercises/abdominals/Hanging Oblique Knee Raise.jpg" alt="Image 1" data-text="eight image"></li>
			<li class="mix abdominals check1 radio1 option1"><img src="images/exercises/abdominals/plank.jpg" alt="Image 1" data-text="ninth image"></li>
			<li class="mix abdominals check1 radio1 option1"><img src="images/exercises/abdominals/Wind Sprints.jpg	" alt="Image 1" data-text="tenth image"></li>

			<!--back exercises -->

			<li class="mix back check1 radio1 option1"><img src="images/exercises/back/alternating renegade row.jpg" alt="Image 1"></li>
			<li class="mix back check1 radio1 option1"><img src="images/exercises/back/Bent Over One-Arm Long Bar Row.jpg" alt="Image 1"></li>
			<li class="mix back check1 radio1 option1"><img src="images/exercises/back/Bent Over Two-Dumbbell Row With Palms In.jpg" alt="Image 1"></li>
			<li class="mix back check1 radio1 option1"><img src="images/exercises/back/Incline Bench Pull.jpg" alt="Image 1"></li>
			<li class="mix back check1 radio1 option1"><img src="images/exercises/back/Mixed Grip Chin.jpg" alt="Image 1"></li>

			<!-- chest exercises -->

			<li class="mix chest check1 radio1 option1"><img src="images/exercises/chest/Barbell Bench Press - Medium Grip.jpg" alt="Image 1"></li>
			<li class="mix chest check1 radio1 option1"><img src="images/exercises/chest/Cable Crossover.jpg" alt="Image 1"></li>

			<li class="mix chest check1 radio1 option1"><img src="images/exercises/chest/Dips.jpg" alt="Image 1"></li>

			<li class="mix chest check1 radio1 option1"><img src="images/exercises/chest/Dumbbell Bench Press.jpg" alt="Image 1"></li>

			<li class="mix chest check1 radio1 option1"><img src="images/exercises/chest/Pushups.jpg" alt="Image 1"></li>

			<!--legs exercises -->

			<li class="mix legs check1 radio1 option1"><img src="images/exercises/legs/Barbell Full Squat.jpg" alt="Image 1"></li>
			<li class="mix legs check1 radio1 option1"><img src="images/exercises/legs/Barbell Lunge.jpg" alt="Image 1"></li>

			<li class="mix legs check1 radio1 option1"><img src="images/exercises/legs/Barbell Walking Lung.jpg" alt="Image 1"></li>

			<li class="mix legs check1 radio1 option1"><img src="images/exercises/legs/Front Squats With Two Kettlebells.jpg" alt="Image 1"></li>

			<li class="mix legs check1 radio1 option1"><img src="images/exercises/legs/Narrow Stance Leg Press.jpg" alt="Image 1"></li>

			<!--shoulders exercises -->

			<li class="mix shoulders check1 radio1 option1"><img src="images/exercises/shoulders/Dumbbell Lying One-Arm Rear Lateral Raise.jpg" alt="Image 1"></li>
			<li class="mix shoulders check1 radio1 option1"><img src="images/exercises/shoulders/Reverse Flyes.jpg" alt="Image 1"></li>

			<li class="mix shoulders check1 radio1 option1"><img src="images/exercises/shoulders/Side Laterals to Front Raise.jpg" alt="Image 1"></li>

			<li class="mix shoulders check1 radio1 option1"><img src="images/exercises/shoulders/Single-Arm Linear Jammer.jpg" alt="Image 1"></li>

			<li class="mix shoulders check1 radio1 option1"><img src="images/exercises/shoulders/Standing Palm-In One-Arm Dumbbell Press.jpg" alt="Image 1"></li>

			<!-- triceps exercises -->

			<li class="mix triceps check1 radio1 option1"><img src="images/exercises/triceps/Decline EZ Bar Triceps Extension.jpg" alt="Image 1"></li>
			<li class="mix triceps check1 radio1 option1"><img src="images/exercises/triceps/Parallel Bar Dip.jpg" alt="Image 1"></li>

			<li class="mix triceps check1 radio1 option1"><img src="images/exercises/triceps/Push-Ups - Close Triceps Position.jpg" alt="Image 1"></li>

			<li class="mix triceps check1 radio1 option1"><img src="images/exercises/triceps/Seated Triceps Press.jpg" alt="Image 1"></li>

			<li class="mix triceps check1 radio1 option1"><img src="images/exercises/triceps/Weighted Bench Dip.jpg" alt="Image 1"></li>
		</div>
		</ul>
		<div class="cd-fail-message">No results found</div>
	</section> <!-- cd-gallery -->
 
	<div class="cd-filter">
		<form>
			<div class="cd-filter-block">
				<h4>Block title</h4>
				
				<div class="cd-filter-content">
					<!-- filter content -->
				</div> <!-- cd-filter-content -->
			</div> <!-- cd-filter-block -->
		</form>
 
		<a href="#0" class="cd-close">Close</a>
	</div> <!-- cd-filter -->
 
	<a href="#0" class="cd-filter-trigger">Filters</a>
</main> <!-- cd-main-content -->

<!--hidden field for the images textbox. -->

 <input type="hidden" id="show_text_box">

<!-- div for the text box and submit of each image. -->
<div class="body-inactive"></div>
 <div class="info_box" >
 	<a href="javascript:;" id="closeIt">X</a> <!-- the x for closing the info_box -->
 	<img class="exercise_img img-responsive">
      <div class="elem-msg clear">
        <!-- now the different text will reside here -->
      </div>
      <form action="">
        <input type="hidden" id="ID will come from js"><!-- this(hidden input) will be used to pass the parameter -->
        <button type="submit">
          ADD TO ROUTINE <!-- will submit the form -->
        </button>
      </form>
    </div>

   <script>
    $(function(){
    	/* elems is a name that preceding the selectors.
			get all img tags found inside li tags and fire the function.
			Then bind to the elem-msg div (which is inside the info_box) the elemText value.
		*/
 	$('.elements li img').click(function(){
 		$('.body-inactive').show();
 		 $('.info_box').fadeIn(2000); // The info_box hidden using the css, this line of js is telling that, if the img is being clicked, the info_box should be visible(fadeIn) with a transition of 2000ms.
        elemText = $(this).attr('data-text');
        elemSrc = $(this).attr('src'); //Getting the img src (to be viewed in the info_box).
        $('.info_box .exercise_img').attr('src',elemSrc); // get the value (image) of the src tag that the function gets from the html code.
        //elemId = $(this).attr('id');
        $('.info_box .elem-msg').html(elemText); 
        //$('.info_box input[type="hidden"]').attr('id',elemId);
      })
    })
    </script>

<!-- script for closing the info_box -->

    <script>
  $(function(){
    $('a#closeIt, .body-inactive').click(function(){
      $('.info_box,.body-inactive').fadeOut(350);
    });
  })
</script>

<!--sidebar code. -->

 	<style>
		*,
		*:before,
		*:after{
			padding:0;
			margin:0;
		}

		body{
			font-size:20px;
		}
	</style>

	<div id="sidebar-nav" data-spy="affix" data-offset-top="197">
		<ul>
			<li>
				<a href="">Item One</a>
			</li>
			<li>
				<a href="">Item One</a>
			</li>
			<li>
				<a href="">Item One</a>
			</li>
			<li>
				<a href="">Item One</a>
			</li>
			<li>
				<a href="">Item One</a>
			</li>
		</ul>
	</div>

	<div id="wrapper">
		<div id="toggle-button">
			<a href="javascript:;">
				Toggle Offcanvas(click to see what happens next)
			</a>
		</div>
		<br>
		<br>

		Hi Osher,

		<br>
		<br>
		
		<b>NOTE:</b> Probably you have had your pc off, so I was unable to download the files, But seeing your rush, I here write the code of pushing menu, without waiting you till evening.
		
		<br>
		<br>
		
		<strong>OUTPUT: Click on toggle Canvas button to see the result. </strong>
		<br>
		<br>

		Here you will find a very easy way to do the pushing menu.

		<br>
		<br>

		First find the siderbar-nav elements,
		<br>
		<br>

		Second Find the wrapper elements,
		<br>
		<br>

		Third find that the toggle button resides within the wrapper.
		<br>
		<br>

		Use only style.css file, the css from the html page is not required.
		<br>
		<br>

		You don't need the CDN file for jquery, you have that already.
		<br>
		<br>
		Find 3 line of code for jquery doing all the things for moving the wrapper and revealing the side menu.
		<br>
		<br>
		NOTE: Styling is not done for the sidebar, but that will be peice of cake, I guess.
		<br>
		<br>
		Also, note how the markups been written, WHILE DOING THE OFFCANVAS PUSH MENUS, you need to be extra sensitive about the markups.

		<br>
		<br>
		Try this out when you get back to your pc, I hope you'll get it as expected. First run this file in your browser, and take pieces of code out of it. So that the original is preserved and you can do back and forth to make your code working.

		<br>
		<br>
		And ofcousrse feel free to ask me whenever you find yourself in a difficult position.
		<br>
		<br>
		HAPPY CODING.
	</div>

	

	<script>
		$(function(){
			$('#toggle-button a').click(function(){
				$('#sidebar-nav').toggleClass('showSidebar');
				$('#wrapper').toggleClass('pushWrapper');
			});
		})
	</script>
<!-- end of html structure for sidebar routine. -->



{!! Form::close() !!}

@stop {{-- ending the current section 'content' --}}