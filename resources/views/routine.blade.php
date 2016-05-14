@extends('layouts.master')
@section('scripts')
 <script type="text/javascript" src="{!! asset('js/status.min.js') !!}"></script>
 <script type="text/javascript" src="{!! asset('js/content-filter/jquery.mixitup.min.js') !!}"></script>
 <script type="text/javascript" src="{!! asset('js/content-filter/main.js') !!}"></script> 
 <script type="text/javascript" src="{!! asset('js/content-filter/modernizr.js') !!}"></script> 
 <script type="text/javascript" src="{!! asset('js/routine-create.js') !!}"></script>

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

{!! Form::open(['action' => 'RoutineController@create']) !!}
    
    <div class="form-group">

Pick your routine type: {!! Form::select('type', ['Aerobic' => 'Aerobic', 'Anaerobic' => 'Anaerobic']); !!} <br><br>

Give your routine a name:         {!!  Form:: text('routine_name', null, array('class' => 'form-control', 'required' => '')) !!}
</div>

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
				<li class="filter" data-filter=".Biceps"><a href="#0" data-type="biceps">Biceps</a></li>
				<li class="filter" data-filter=".Abdominals"><a href="#0" data-type="abdominals">Abdominals</a></li>
				<li class="filter" data-filter=".Back"><a href="#0" data-type="back">Back</a></li>
				<li class="filter" data-filter=".Chest"><a href="#0" data-type="chest">Chest</a></li>
				<li class="filter" data-filter=".Quads"><a href="#0" data-type="quads">Quads</a></li>
				<li class="filter" data-filter=".Shoulders"><a href="#0" data-type="shoulders">Shoulders</a></li>
				<li class="filter" data-filter=".Triceps"><a href="#0" data-type="triceps">Triceps</a></li>
				
			</ul> <!-- cd-filters -->
		</div> <!-- cd-tab-filter -->
	</div> <!-- cd-tab-filter-wrapper -->
 
	<section class="cd-gallery">
		<ul>
			<!--biceps exercises -->
			<div class="elements">

				{{-- Little bit of a start in showing exercises programatically --}}
				
				{{--
				// Visual representation of the variable
				$excercise = {
					'id' => 1,
					'category' => 'biceps',
					'image_path' => '...',
					'name' => 'Alternate Hammer Curl'
				}
				--}}

				<!-- Iterating over the array of JSON of exercises model. (Echo out all the exercises) -->

				@foreach ($exercises as $exercise)
					<li class="mix {{ $exercise['category'] }} check1 radio1 option1 ">
						<img 
							src="images/{{ $exercise['image_path'] }}" 
							alt="{{ $exercise['name'] }}" 
							data-text="{{ $exercise['name'] }}" 
							data-id="{{ $exercise['id'] }}" 
							data-state="false" 
							class="r{{ $exercise['id'] }}"
						>
					</li>

				@endforeach
				
			
			{{-- Hardcoded exercises --}}

			<!-- data-id - data from the database.
			
			data-state="false" means that, it is not added to sidebar yet.

			class="r1" 1 is again a id(same as data id) which will come from the database, and r is short term for routine
			 -->	

			 {{--
			<li class="mix biceps check1 radio1 option1"><img src="images/exercises/biceps/alternate_hammer_curl.jpg" alt="Alternate Hammer Curl" data-text="Alternate Hammer Curl"  data-id="1" data-state="false" class="r1"></li>
			
			<li class="mix biceps check1 radio1 option1"><img src="images/exercises/biceps/barbell_curl.jpg" alt="Barbell Curl" data-text="Barbell Curl"  data-id="2" data-state="false" class="r2"></li>
			
			
			<li class="mix biceps check1 radio1 option1"><img src="images/exercises/biceps/barbell_curls_lying_against_an_incline.jpg" alt="Barbell Curls Lying Against An Incline" data-text="Barbell Curls Lying Against An Incline" data-id="3" data-state="false" class="r3" ></li>

			<li class="mix biceps check1 radio1 option1"><img src="images/exercises/biceps/cable_hammer_curls_-_rope_attachment.jpg" alt="Cable Hammer Curls - Rope Attachment" data-text="Cable Hammer Curls - Rope Attachment" data-id="4" data-state="false" class="r4"></li>
			<li class="mix biceps check1 radio1 option1"><img src="images/exercises/biceps/close-grip_EZ-Bar_curl_with_band.jpg" alt="Close-Grip EZ-Bar Curl with Band" data-text="Close-Grip EZ-Bar Curl with Band" data-id="5" data-state="false" class="r5"></li>
			<!-- <li class="gap"></li> --> <!-- Creating a gap on abdominals section -->


			<!--abdominals exercises -->

			<li class="mix abdominals check1 radio1 option1"><img src="images/exercises/abdominals/bottoms_up.jpg" alt="Bottoms Up" data-text="Bottoms Up" data-id="6" data-state="false" class="r6"></li>
			<li class="mix abdominals check1 radio1 option1"><img src="images/exercises/abdominals/frog_sit-ups.jpg" alt="Frog Sit-Ups" data-text="Frog Sit-Ups" data-id="7" data-state="false" class="r7"></li>
			<li class="mix abdominals check1 radio1 option1"><img src="images/exercises/abdominals/hanging_oblique_knee_raise.jpg" alt="Hanging Oblique Knee Raise" data-text="Hanging Oblique Knee Raise" data-id="8" data-state="false" class="r8"></li>
			<li class="mix abdominals check1 radio1 option1"><img src="images/exercises/abdominals/plank.jpg" alt="plank" data-text="plank" data-id="9" data-state="false" class="r9"></li>
			<li class="mix abdominals check1 radio1 option1"><img src="images/exercises/abdominals/wind_sprints.jpg	" alt="Wind Sprints" data-text="Wind Sprints" data-id="10" data-state="false" class="r10"></li>

			<!--back exercises -->

			<li class="mix back check1 radio1 option1"><img src="images/exercises/back/alternating_renegade_row.jpg" alt="alternating_renegade_row" data-text="Alternating Renegade Row" data-id="11" data-state="false" class="r11" ></li>
			<li class="mix back check1 radio1 option1"><img src="images/exercises/back/bent_over_one-Arm_long_bar_row.jpg" alt="Bent Over One-Arm Long Bar Row" data-text="Bent Over One-Arm Long Bar Row" data-id="12" data-state="false" class="r12"></li>
			<li class="mix back check1 radio1 option1"><img src="images/exercises/back/bent_over_two-Dumbbell_row_with_palms_in.jpg" alt="Bent Over Two-Dumbbell Row With Palms In" data-text="Bent Over Two-Dumbbell Row With Palms In" data-id="13" data-state="false" class="r13"></li>
			<li class="mix back check1 radio1 option1"><img src="images/exercises/back/incline_bench_pull.jpg" alt="Incline Bench Pull" data-text="Incline Bench Pull" data-id="14" data-state="false" class="r14"></li>
			<li class="mix back check1 radio1 option1"><img src="images/exercises/back/mixed_grip_chin.jpg" alt="Mixed Grip Chin" data-text="Mixed Grip Chin" data-id="15" data-state="false" class="r15"></li>

			<!-- chest exercises -->

			<li class="mix chest check1 radio1 option1"><img src="images/exercises/chest/barbell_bench_press_-_medium_grip.jpg" alt="Barbell Bench Press - Medium Grip" data-text="Barbell Bench Press - Medium Grip" data-id="16" data-state="false" class="r16"></li>

			<li class="mix chest check1 radio1 option1"><img src="images/exercises/chest/cable_crossover.jpg" alt="Cable Crossover" data-text="Cable Crossover" data-id="17" data-state="false" class="r17"></li>

			<li class="mix chest check1 radio1 option1"><img src="images/exercises/chest/dips.jpg" alt="Dips" data-text="Dips" data-id="18" data-state="false" class="r18"></li>

			<li class="mix chest check1 radio1 option1"><img src="images/exercises/chest/dumbbell_bench_press.jpg" alt="Dumbbell Bench Press" data-text="Dumbbell Bench Press" data-id="19" data-state="false" class="r19"></li>

			<li class="mix chest check1 radio1 option1"><img src="images/exercises/chest/pushups.jpg" alt="Pushups" data-text="Pushups" data-id="20" data-state="false" class="r20"></li>

			<!--Quads exercises -->

			<li class="mix quads check1 radio1 option1"><img src="images/exercises/quads/barbell_full_squat.jpg" alt="Barbell Full Squat" data-text="Barbell Full Squat" data-id="21" data-state="false" class="r21"></li>

			<li class="mix quads check1 radio1 option1"><img src="images/exercises/quads/barbell_lunge.jpg" alt="Barbell Lunge" data-text="Barbell Lunge" data-id="22" data-state="false" class="r22"></li>

			<li class="mix quads check1 radio1 option1"><img src="images/exercises/quads/barbell_Walking_lung.jpg" alt="Barbell Walking Lung" data-text="Barbell Walking Lung" data-id="23" data-state="false" class="r23"></li>

			<li class="mix quads check1 radio1 option1"><img src="images/exercises/quads/front_squats_with_two_kettlebells.jpg" alt="Front Squats With Two Kettlebells" data-text="Front Squats With Two Kettlebells" data-id="24" data-state="false" class="r24"></li>

			<li class="mix quads check1 radio1 option1"><img src="images/exercises/quads/narrow_stance_leg_press.jpg" alt="Narrow Stance Leg Press" data-text="Narrow Stance Leg Press" data-id="25" data-state="false" class="r25"></li>

			<!--shoulders exercises -->

			<li class="mix shoulders check1 radio1 option1"><img src="images/exercises/shoulders/dumbbell_lying_one-Arm_rear_lateral_raise.jpg" alt="Dumbbell Lying One-Arm Rear Lateral Raise" data-text="Dumbbell Lying One-Arm Rear Lateral Raise" data-id="26" data-state="false" class="r26"></li>

			<li class="mix shoulders check1 radio1 option1"><img src="images/exercises/shoulders/reverse_flyes.jpg" alt="Reverse Flyes" data-text="Reverse Flyes" data-id="27" data-state="false" class="r27"></li>

			<li class="mix shoulders check1 radio1 option1"><img src="images/exercises/shoulders/side_laterals_to_front_raise.jpg" alt="Side Laterals to Front Raise" data-text="Side Laterals to Front Raise" data-id="28" data-state="false" class="r28"></li>

			<li class="mix shoulders check1 radio1 option1"><img src="images/exercises/shoulders/single-Arm_linear_jammer.jpg" alt="Single-Arm Linear Jammer" data-text="Single-Arm Linear Jammer" data-id="29" data-state="false" class="r29"></li>

			<li class="mix shoulders check1 radio1 option1"><img src="images/exercises/shoulders/standing_palm-In_one-Arm_dumbbell_press.jpg" alt="Standing Palm-In One-Arm Dumbbell Press" data-text="Standing Palm-In One-Arm Dumbbell Press" data-id="30" data-state="false" class="r30"></li>

			<!-- triceps exercises -->

			<li class="mix triceps check1 radio1 option1"><img src="images/exercises/triceps/decline_EZ_bar_triceps_extension.jpg" alt="Decline EZ Bar Triceps Extension" data-text="Decline EZ Bar Triceps Extension" data-id="31" data-state="false" class="r32"></li>

			<li class="mix triceps check1 radio1 option1"><img src="images/exercises/triceps/parallel_bar_dip.jpg" alt="Parallel Bar Dip" data-text="Parallel Bar Dip" data-id="32" data-state="false" class="r32"></li>

			<li class="mix triceps check1 radio1 option1"><img src="images/exercises/triceps/push-Ups_-_close_triceps_position.jpg" alt="Push-Ups - Close Triceps Position" data-text="Push-Ups - Close Triceps Position" data-id="33" data-state="false" class="r33"></li>

			<li class="mix triceps check1 radio1 option1"><img src="images/exercises/triceps/seated_triceps_press.jpg" alt="Seated Triceps Press" data-text="Seated Triceps Press" data-id="34" data-state="false" class="r34"></li>

			<li class="mix triceps check1 radio1 option1"><img src="images/exercises/triceps/weighted_bench_dip.jpg" alt="Weighted Bench Dip" data-text="Weighted Bench Dip" data-id="35" data-state="false" class="35"></li>

			--}}
		</div>
		</ul>
		<div class="cd-fail-message">No results found</div>
	</section> <!-- cd-gallery -->
 

 
	<a href="#0" class="cd-filter-trigger">Filters</a>

		<div id="toggle-button">
	<!-- <a href="javascript:;"> refers to a js code. the js code is the jquery at the bottom. The jquery gets the a href by the selector. I am using only empty ahref jquery (without <a href="javascript:;"> instead) -->
		<a href="">																
				View Routine Details
			</a>
		</div>

</main> <!-- cd-main-content -->

<!--hidden field for the images textbox. -->
<!-- $routine->id is later being used in the controller (foreach loop). -->

<!-- the hidden field beyond is unnneccesary since we're creating in the routine.create.js file.

<!-- <input type="hidden" name="routine[]" id="show_text_box" value="something"> --> 

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
		<ul> <!-- list items are injected here (from js). --> 
		<form action="{{ route('view_routine') }}" method="post"> 
		{!! csrf_field() !!} 

			<!-- content will come here from js as li elements -->

<div class="form-group">
	</ul>
            <button type="submit" name="submit" class="submit btn btn-primary">Submit</button>
    </div>
		 </form> 
	</div>								

<!-- end of html structure for sidebar routine. -->

{!! Form::close() !!}

<!-- Side Filter html -->

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
							<input class="filter" data-filter=".Biceps" type="checkbox" id="checkbox1">
			    			<label class="checkbox-label" for="checkbox1">Biceps</label>
						</li>

						<li>
							<input class="filter" data-filter=".Abdominals" type="checkbox" id="checkbox2">
							<label class="checkbox-label" for="checkbox2">Abdominals</label>
						</li>

						<li>
							<input class="filter" data-filter=".Back" type="checkbox" id="checkbox3">
							<label class="checkbox-label" for="checkbox3">Back</label>
						</li>

						<li>
							<input class="filter" data-filter=".Chest" type="checkbox" id="checkbox4">
							<label class="checkbox-label" for="checkbox4">Chest</label>
						</li>

						<li>
							<input class="filter" data-filter=".Quads" type="checkbox" id="checkbox5">
							<label class="checkbox-label" for="checkbox5">Quads</label>
						</li>

						<li>
							<input class="filter" data-filter=".Shoulders" type="checkbox" id="checkbox6">
							<label class="checkbox-label" for="checkbox6">Shoulders</label>
						</li>

						<li>
							<input class="filter" data-filter=".Triceps" type="checkbox" id="checkbox7">
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
							<input class="filter" data-filter=".Biceps" type="radio" name="radioButton" id="radio2">
							<label class="radio-label" for="radio2">Biceps</label>
						</li>

						<li>
							<input class="filter" data-filter=".Abdominals" type="radio" name="radioButton" id="radio3">
							<label class="radio-label" for="radio3">Abdominals</label>
						</li>

						<li>
							<input class="filter" data-filter=".Back" type="radio" name="radioButton" id="radio4">
							<label class="radio-label" for="radio4">Back</label>
						</li>

						<li>
							<input class="filter" data-filter=".Chest" type="radio" name="radioButton" id="radio5">
							<label class="radio-label" for="radio5">Chest</label>
						</li>

						<li>
							<input class="filter" data-filter=".Quads" type="radio" name="radioButton" id="radio6">
							<label class="radio-label" for="radio6">Quads</label>
						</li>

						<li>
							<input class="filter" data-filter=".Shoulders" type="radio" name="radioButton" id="radio7">
							<label class="radio-label" for="radio7">Shoulders</label>
						</li>

						<li>
							<input class="filter" data-filter=".Triceps" type="radio" name="radioButton" id="radio8">
							<label class="radio-label" for="radio8">Triceps</label>
						</li>
					</ul> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->
		</form>
 
		<a href="#0" class="cd-close">Close</a>


	</div> <!-- cd-filter -->


@stop {{-- ending the current section 'content' --}}