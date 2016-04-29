@extends('layouts.master')
@section('scripts')
 <script type="text/javascript" src="{!! asset('js/status.min.js') !!}"></script>
 <script type="text/javascript" src="{!! asset('js/content-filter/jquery.mixitup.min.js') !!}"></script>
 <script type="text/javascript" src="{!! asset('js/content-filter/main.js') !!}"></script> 
 <script type="text/javascript" src="{!! asset('js/content-filter/modernizr.js') !!}"></script> 

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
					<!-- Filter through the various exercises types (not the sidebar). -->
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
				
			</ul> <!-- cd-filters -->
		</div> <!-- cd-tab-filter -->
	</div> <!-- cd-tab-filter-wrapper -->
 
	<section class="cd-gallery">
		<ul>
			<!--biceps exercises -->
			<div class="elements">
			<!-- data-id - data from the database.

			data-state="false" means that, it is not added to sidebar yet.

			class="r1" 1 is again a id(same as data id) which will come from the database, and r is short term for routine
			 -->	
			<li class="mix biceps check1 radio1 option1"><img src="images/exercises/biceps/alternate_hammer_curl.jpg" alt="Alternate Hammer Curl" data-text="Alternate Hammer Curl"  data-id="1" data-state="false" class="r1" name="alternate_hammer_curl"></li>
			<li class="mix biceps check2 radio2 option2"><img src="images/exercises/biceps/barbell_curl.jpg" alt="Barbell Curl" data-text="Barbell Curl"  data-id="2" data-state="false" class="r2" name="barbell_curl"></li>
			<li class="mix biceps check3 radio3 option3"><img src="images/exercises/biceps/barbell_curls_lying_against_an_incline.jpg" alt="Barbell Curls Lying Against An Incline" data-text="Barbell Curls Lying Against An Incline" data-id="3" data-state="false" class="r3" name="barbell_curls_lying_against_an_incline"></li>
			<li class="mix biceps check4 radio4 option4"><img src="images/exercises/biceps/cable_hammer_curls_-_rope_attachment.jpg" alt="Cable Hammer Curls - Rope Attachment" data-text="Cable Hammer Curls - Rope Attachment" name="able_hammer_curls_-_rope_attachment"></li>
			<li class="mix biceps check5 radio5 option5"><img src="images/exercises/biceps/close-grip_EZ-Bar_curl_with_band.jpg" alt="Close-Grip EZ-Bar Curl with Band" data-text="Close-Grip EZ-Bar Curl with Band" name="close-grip_EZ-Bar_curl_with_band"></li>
			<!-- <li class="gap"></li> --> <!-- Creating a gap on abdominals section -->

			<!-- Continue adding name attributes from here -->

			<!--abdominals exercises -->

			<li class="mix abdominals check1 radio1 option1"><img src="images/exercises/abdominals/bottoms_up.jpg" alt="Bottoms Up" data-text="Bottoms Up"></li>
			<li class="mix abdominals check1 radio1 option1"><img src="images/exercises/abdominals/frog_sit-ups.jpg" alt="Frog Sit-Ups" data-text="Frog Sit-Ups"></li>
			<li class="mix abdominals check1 radio1 option1"><img src="images/exercises/abdominals/hanging_oblique_knee_raise.jpg" alt="Hanging Oblique Knee Raise" data-text="Hanging Oblique Knee Raise"></li>
			<li class="mix abdominals check1 radio1 option1"><img src="images/exercises/abdominals/plank.jpg" alt="plank" data-text="plank"></li>
			<li class="mix abdominals check1 radio1 option1"><img src="images/exercises/abdominals/wind_sprints.jpg	" alt="Wind Sprints" data-text="Wind Sprints"></li>

			<!--back exercises -->

			<li class="mix back check1 radio1 option1"><img src="images/exercises/back/alternating_renegade_row.jpg" alt="alternating_renegade_row" data-text="Alternating Renegade Row"></li>
			<li class="mix back check1 radio1 option1"><img src="images/exercises/back/bent_over_one-Arm_long_bar_row.jpg" alt="Bent Over One-Arm Long Bar Row" data-text="Bent Over One-Arm Long Bar Row"></li>
			<li class="mix back check1 radio1 option1"><img src="images/exercises/back/bent_over_two-Dumbbell_row_with_palms_in.jpg" alt="Bent Over Two-Dumbbell Row With Palms In" data-text="Bent Over Two-Dumbbell Row With Palms In"></li>
			<li class="mix back check1 radio1 option1"><img src="images/exercises/back/incline_bench_pull.jpg" alt="Incline Bench Pull" data-text="Incline Bench Pull"></li>
			<li class="mix back check1 radio1 option1"><img src="images/exercises/back/mixed_grip_chin.jpg" alt="Mixed Grip Chin" data-text="Mixed Grip Chin"></li>

			<!-- chest exercises -->

			<li class="mix chest check1 radio1 option1"><img src="images/exercises/chest/barbell_bench_press_-_medium_grip.jpg" alt="Barbell Bench Press - Medium Grip" data-text="Barbell Bench Press - Medium Grip"></li>
			<li class="mix chest check1 radio1 option1"><img src="images/exercises/chest/cable_crossover.jpg" alt="Cable Crossover" data-text="Cable Crossover"></li>

			<li class="mix chest check1 radio1 option1"><img src="images/exercises/chest/dips.jpg" alt="Dips" data-text="Dips"></li>

			<li class="mix chest check1 radio1 option1"><img src="images/exercises/chest/dumbbell_bench_press.jpg" alt="Dumbbell Bench Press" data-text="Dumbbell Bench Press"></li>

			<li class="mix chest check1 radio1 option1"><img src="images/exercises/chest/pushups.jpg" alt="Pushups" data-text="Pushups"></li>

			<!--legs exercises -->

			<li class="mix legs check1 radio1 option1"><img src="images/exercises/legs/barbell_full_squat.jpg" alt="Barbell Full Squat" data-text="Barbell Full Squat"></li>

			<li class="mix legs check1 radio1 option1"><img src="images/exercises/legs/barbell_lunge.jpg" alt="Barbell Lunge" data-text="Barbell Lunge"></li>

			<li class="mix legs check1 radio1 option1"><img src="images/exercises/legs/barbell_Walking_lung.jpg" alt="Barbell Walking Lung" data-text="Barbell Walking Lung"></li>

			<li class="mix legs check1 radio1 option1"><img src="images/exercises/legs/front_squats_with_two_kettlebells.jpg" alt="Front Squats With Two Kettlebells" data-text="Front Squats With Two Kettlebells"></li>

			<li class="mix legs check1 radio1 option1"><img src="images/exercises/legs/narrow_stance_leg_press.jpg" alt="Narrow Stance Leg Press" data-text="Narrow Stance Leg Press"></li>

			<!--shoulders exercises -->

			<li class="mix shoulders check1 radio1 option1"><img src="images/exercises/shoulders/dumbbell_lying_one-Arm_rear_lateral_raise.jpg" alt="Dumbbell Lying One-Arm Rear Lateral Raise" data-text="Dumbbell Lying One-Arm Rear Lateral Raise"></li>

			<li class="mix shoulders check1 radio1 option1"><img src="images/exercises/shoulders/reverse_flyes.jpg" alt="Reverse Flyes" data-text="Reverse Flyes"></li>

			<li class="mix shoulders check1 radio1 option1"><img src="images/exercises/shoulders/side_laterals_to_front_raise.jpg" alt="Side Laterals to Front Raise" data-text="Side Laterals to Front Raise"></li>

			<li class="mix shoulders check1 radio1 option1"><img src="images/exercises/shoulders/single-Arm_linear_jammer.jpg" alt="Single-Arm Linear Jammer" data-text="Single-Arm Linear Jammer"></li>

			<li class="mix shoulders check1 radio1 option1"><img src="images/exercises/shoulders/standing_palm-In_one-Arm_dumbbell_press.jpg" alt="Standing Palm-In One-Arm Dumbbell Press" data-text="Standing Palm-In One-Arm Dumbbell Press"></li>

			<!-- triceps exercises -->

			<li class="mix triceps check1 radio1 option1"><img src="images/exercises/triceps/decline_EZ_bar_triceps_extension.jpg" alt="Decline EZ Bar Triceps Extension" data-text="Decline EZ Bar Triceps Extension"></li>

			<li class="mix triceps check1 radio1 option1"><img src="images/exercises/triceps/parallel_bar_dip.jpg" alt="Parallel Bar Dip" data-text="Parallel Bar Dip"></li>

			<li class="mix triceps check1 radio1 option1"><img src="images/exercises/triceps/push-Ups_-_close_triceps_position.jpg" alt="Push-Ups - Close Triceps Position" data-text="Push-Ups - Close Triceps Position"></li>

			<li class="mix triceps check1 radio1 option1"><img src="images/exercises/triceps/seated_triceps_press.jpg" alt="Seated Triceps Press" data-text="Seated Triceps Press"></li>

			<li class="mix triceps check1 radio1 option1"><img src="images/exercises/triceps/weighted_bench_dip.jpg" alt="Weighted Bench Dip" data-text="Weighted Bench Dip"></li>
		</div>
		</ul>
		<div class="cd-fail-message">No results found</div>
	</section> <!-- cd-gallery -->
 
	<div class="cd-filter">
		<form>
			<div class="cd-filter-block">
				<h4>Search</h4>
					
					<div class="cd-filter-content">
						<input type="search" placeholder="Search">
					</div> <!-- cd-filter-content -->
			</div> <!-- cd-filter-block -->
			<!-- checkboxes -side filter. -->
			<div class="cd-filter-block">
					<h4>Check boxes</h4>

					<ul class="cd-filter-content cd-filters list">
						<li>
							<input class="filter" data-filter=".biceps" type="checkbox" id="checkbox1">
			    			<label class="checkbox-label" for="checkbox1">Biceps</label>
						</li>

						<li>
							<input class="filter" data-filter=".abdominals" type="checkbox" id="checkbox2">
							<label class="checkbox-label" for="checkbox2">Abdominals</label>
						</li>

						<li>
							<input class="filter" data-filter=".back" type="checkbox" id="checkbox3">
							<label class="checkbox-label" for="checkbox3">Back</label>
						</li>

						<li>
							<input class="filter" data-filter=".chest" type="checkbox" id="checkbox4">
							<label class="checkbox-label" for="checkbox4">Chest</label>
						</li>

						<li>
							<input class="filter" data-filter=".legs" type="checkbox" id="checkbox5">
							<label class="checkbox-label" for="checkbox5">Legs</label>
						</li>

						<li>
							<input class="filter" data-filter=".shoulders" type="checkbox" id="checkbox6">
							<label class="checkbox-label" for="checkbox6">Shoulders</label>
						</li>

						<li>
							<input class="filter" data-filter=".triceps" type="checkbox" id="checkbox7">
							<label class="checkbox-label" for="checkbox7">Triceps</label>
						</li>
					</ul> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->

				<div class="cd-filter-block">
					<h4>Singular Muscle Group:</h4>

					<ul class="cd-filter-content cd-filters list">
						<li>
							<input class="filter" data-filter="" type="radio" name="radioButton" id="radio1" checked>
							<label class="radio-label" for="radio1">All</label>
						</li>

						<li>
							<input class="filter" data-filter=".biceps" type="radio" name="radioButton" id="radio2">
							<label class="radio-label" for="radio2">Biceps</label>
						</li>

						<li>
							<input class="filter" data-filter=".abdominals" type="radio" name="radioButton" id="radio3">
							<label class="radio-label" for="radio3">Abdominals</label>
						</li>

						<li>
							<input class="filter" data-filter=".back" type="radio" name="radioButton" id="radio4">
							<label class="radio-label" for="radio4">Back</label>
						</li>

						<li>
							<input class="filter" data-filter=".chest" type="radio" name="radioButton" id="radio5">
							<label class="radio-label" for="radio5">Chest</label>
						</li>

						<li>
							<input class="filter" data-filter=".legs" type="radio" name="radioButton" id="radio6">
							<label class="radio-label" for="radio6">Legs</label>
						</li>

						<li>
							<input class="filter" data-filter=".shoulders" type="radio" name="radioButton" id="radio7">
							<label class="radio-label" for="radio7">Shoulders</label>
						</li>

						<li>
							<input class="filter" data-filter=".triceps" type="radio" name="radioButton" id="radio8">
							<label class="radio-label" for="radio8">Triceps</label>
						</li>
					</ul> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->
		</form>
 
		<a href="#0" class="cd-close">Close</a>
	</div> <!-- cd-filter -->
 
	<a href="#0" class="cd-filter-trigger">Filters</a>

		<div id="toggle-button">
	<!-- <a href="javascript:;"> refers to a js code. the js code is the jquery at the bottom. The jquery gets the a href by the selector. I am using only empty ahref jquery (without <a href="javascript:;"> instead) -->
		<a href="">																			
				Toggle Offcanvas(click to see what happens next)
			</a>
		</div>

</main> <!-- cd-main-content -->

<!--hidden field for the images textbox. -->

 <input type="hidden" id="show_text_box">

<!-- div for the text box and submit of each image. -->

<div class="body-inactive"></div>

<div class="info_box" >
		<a href="javascript:;" id="closeIt">X</a> <!-- the x for closing the info_box -->
		<div class="info_content"  id="" data-state=""> 
			
			<img class="exercise_img img-responsive">
			<div class="elem-msg clear">
				<!-- now the different text will reside here -->
			</div>
			<a href="" class="add_to_routine"> <!-- will submit the form -->
				ADD TO ROUTINE 
			</a>
		</div>
	</div>

   <script>
    $(function(){
    	/* elements is a name that preceding the selectors.
			get all img tags found inside li tags and fire the function.
			
		*/
 	$('.elements li img').click(function(){
 		$('.body-inactive').show();
 		elemSrc = $(this).attr('src');  //Getting the img src (to be viewed in the info_box).

 		// Parameters associated with the routines (used to interact with the database):

		elemId = $(this).attr('data-id');
		elemText = $(this).attr('data-text'); //get data text attribute from the image clicked.
		elemState = $(this).attr('data-state');
 		 $('.info_box').fadeIn(2000); // The info_box hidden using the css, this line of js is telling that, if the img is being clicked, the info_box should be visible(fadeIn) with a transition of 2000ms.

 		 // Next the two lines beyond says:

 		 $('.info_box .info_content').attr('id',elemId); //refer to the div info_content inside the div info_box -then fill its attribute called id witht eh value of elemId variable.
 		 //Same thing for the two lines beyond as well. as well.

				$('.info_box .info_content').attr('data-state',elemState);
				$('.info_box .info_content .exercise_img').attr('src',elemSrc);

				// Bind to the elem-msg div (which is inside the info_box) the elemText value.
				$('.info_box .info_content .elem-msg').html(elemText); 

				if(elemState == 'false'){
					//accesses the ahref and changes it.add the content of class add_to_routine . also clear out previous data of text,id.state and others.also clear out the text if it's writing: "already added".
					$('.info_box .info_content a').addClass('add_to_routine').html('ADD TO ROUTINE ');
				}


			});

			$('.add_to_routine').click(function(e){
				// this function will only be for those who have data-state as false.
				findId = $(this).parent('').attr('id'); // Refer to the parent div which is info_content and access its id attribute. Accessing the parent will give us access to attributes of id and state.
				findImg = $(this).parent('').children('img').attr('src');
				findText = $(this).parent('').children('.elem-msg').html();

				findIfAlreadyChecked = $('.elements li img.r'+findId).attr('data-state');
				if(findIfAlreadyChecked == 'true'){
				}
				else{
					elem= '<li>';
					elem+= '<input type="hidden" value='+findId+'>';
					elem+= '<img src='+findImg+'>';
					elem+= '<span>' + findText + '</span>';
					elem+= '</li>';
					$('#sidebar-nav ul form button').before(elem);
					$('#sidebar-nav ul form button[type="submit"]').show();

			// acknowledging that this routine has been added.
			$('.elements li img.r'+findId).attr('data-state','true');
			// if routine is added, then add to button is of no need
			$(this).removeClass('add_to_routine').html('Exercise Added');
		}
		e.preventDefault();
	});
		});
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

<div id="sidebar-nav">
		<ul>
		<form>
			<!-- content will come here from js as li elements -->

			<button type="submit">Submit</button>
			</form>
		</ul>
	</div>								

	
	<script>
		$(function(){
   $('#toggle-button a').click(function(e){
    $('#sidebar-nav').toggleClass('showSidebar'); // Shows the side bar (from the right, when clicking on the button, with the help of css).
    $('main').toggleClass('pushWrapper'); // This makes the transition for the sidebar in the css file.
e.preventDefault(); // Prevent the anchor tag to refresh the page or taking it to other page , with e.preventDefault(), same as the javascript:; did. 
   });
  })
	</script>
<!-- end of html structure for sidebar routine. -->

<!-- Script for adding exercises to sidebar 
<script>
$(function(){
	$('#')
})
--> 

{!! Form::close() !!}

@stop {{-- ending the current section 'content' --}}