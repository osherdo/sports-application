    
    /* script for showing the images in a personal exercise image an description. */

    $(function(){
    	/* elements is a name that preceding the selectors.
			get all img tags found inside li tags and fire the function.
			
		*/
 	$('.elements li img').click(function(){
 		$('.body-inactive').show();
 		elemSrc = $(this).attr('src');  //Getting the current img's src (to be viewed in the info_box).

 		// Parameters associated with the routines (used to interact with the database):

		elemId = $(this).attr('data-id');
		elemText = $(this).attr('data-text'); //get data text attribute from the image clicked.
		elemState = $(this).attr('data-state'); // You get the idea.

 		 $('.info_box').fadeIn(2000); // The info_box hidden using the css, this line of js is telling that, if the img is being clicked, the info_box should be visible(fadeIn) with a transition of 2000ms.

 		 // Next the two lines beyond says:

 		 $('.info_box .info_content').attr('id',elemId); // Refer to the div info_content inside the div info_box -then fill its attribute called id with the value of elemId variable.
 		 //Same thing for the two lines beyond as well.

				$('.info_box .info_content').attr('data-state',elemState);
				$('.info_box .info_content .exercise_img').attr('src',elemSrc);

				// Bind to the elem-msg div (which is inside the info_box) the elemText value.
				$('.info_box .info_content .elem-msg').html(elemText); 

				if(elemState == 'false'){
					//accesses the ahref and changes it.add the content of class add_to_routine . also clear out previous data of text,id.state and others.also clear out the text if it's writing: "already added".
					$('.info_box .info_content a').addClass('add_to_routine').html('ADD TO ROUTINE ');
				}

/* script for copying the exercises images to the sidebar */


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
					// adding the exercises to an array ( [] ). should ask Ankit about this (what's the difference between this and data-id attribute).
					elem+= '<input type="hidden" name="routine[]" value='+findId+'>';
					// Now it equals to this:
					//<li>  < input type="hidden" name="routine[]" value='+findId+'>
					elem+= '<img src='+findImg+'>';
					elem+= '<span>' + findText + '</span>';
					elem+= '</li>';
					$('#sidebar-nav ul form button').before(elem);
					$('#sidebar-nav ul form button[type="submit"]').show();

			// acknowledge this routine has been added.
			$('.elements li img.r'+findId).attr('data-state','true');
			// if routine is added, then add to button is of no need
			$(this).removeClass('add_to_routine').html('Exercise Added');
		}
		e.preventDefault();
	});
		});

/* script for closing the info_box */

  $(function(){
    $('a#closeIt, .body-inactive').click(function(){
      $('.info_box,.body-inactive').fadeOut(350);
    });
  })

		$(function(){
   $('#toggle-button a').click(function(e){
    $('#sidebar-nav').toggleClass('showSidebar'); // Shows the side bar (from the right, when clicking on the button, with the help of css).
    $('main').toggleClass('pushWrapper'); // This makes the transition for the sidebar in the css file.
e.preventDefault(); // Prevent the anchor tag to refresh the page or taking it to other page , with e.preventDefault(), same as the javascript:; did. 
   });
  })
