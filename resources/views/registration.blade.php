

<html>
    <head>
        <style>
form {
    text-align:center;
}
</style>
    </head>
    <body>
            
    <p> hello this is registration page!
    </p></body></html>

<p> please fill in the following form:</p><br><br>
        
<form method="get" id="form">
    First Name: <input type="text" name="fname"><br><br>
    Last Name: <input type="text" name="lname"><br>

    <p id="age"> Tell us your birth date please: </p>
    <input type="date" required> <br><br>
    
    Do you do any type of workout currently?  
    <br><br>
    <select>
        <option value="yes"> Yes</option><br>
        <option value="no"> No</option>

    <br><br> 
    </select>
    <br><br>
     <input type="button" value="sign up" label="register">
    

</form>
{!! Form::open(array('url' => 'foo/bar')) !!}
    //
{!! Form::close() !!}

</html>