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
 
<main class="cd-main-content">
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

			<li class="mix biceps check1 radio1 option1"><img src="images/exercises/biceps/Alternate Hammer Curl.jpg" alt="Image 1"></li>
			<li class="mix biceps check2 radio2 option2"><img src="images/exercises/biceps/Barbell Curl.jpg" alt="Image 2"></li>
			<li class="mix biceps check3 radio3 option3"><img src="images/exercises/biceps/Barbell Curls Lying Against An Incline.jpg" alt="Image 3"></li>
			<li class="mix biceps check4 radio4 option4"><img src="images/exercises/biceps/Cable Hammer Curls - Rope Attachment.jpg" alt="Image 4"></li>
			<li class="mix biceps check5 radio5 option5"><img src="images/exercises/biceps/Close-Grip EZ-Bar Curl with Band.jpg" alt="Image 5"></li>
			<!-- <li class="gap"></li> --> <!-- Creating a gap on abdominals section -->

			<!--abdominals exercises -->

			<li class="mix abdominals check1 radio1 option1"><img src="images/exercises/abdominals/bottoms up.jpg" alt="Image 1"></li>
			<li class="mix abdominals check1 radio1 option1"><img src="images/exercises/abdominals/Frog Sit-Ups.jpg" alt="Image 1"></li>
			<li class="mix abdominals check1 radio1 option1"><img src="images/exercises/abdominals/Hanging Oblique Knee Raise.jpg" alt="Image 1"></li>
			<li class="mix abdominals check1 radio1 option1"><img src="images/exercises/abdominals/plank.jpg" alt="Image 1"></li>
			<li class="mix abdominals check1 radio1 option1"><img src="images/exercises/abdominals/Wind Sprints.jpg	" alt="Image 1"></li>

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

    
{!! Form::close() !!}

@stop {{-- ending the current section 'content' --}}