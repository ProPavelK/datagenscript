<!DOCTYPE html>
<html>
<head>
	 <title>Delete all the fake coronavirus info :)</title>
	 <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	 <link rel="stylesheet" href="css/app_styles.css">
</head>
<body>

<div class="form-style-5">
<div class="container-5">
    
  <p>Fill the info and press the button to delete all the db data</p>
  <form method="post" name="postForm">
    <fieldset>    
    <ul>
        <li>        
            <legend><span class="number">1</span> User Info</legend>
            <label>Name</label>
            <input type="text" name="name" id="name" placeholder="Donald Duck">
            <legend><span class="number">2</span> Additional Info</legend>
            <textarea name="field3" id="place_id" rows="1" cols="35" placeholder="Your Info"></textarea>
            <span class="throw_error"></span>
            <span id="success"></span>
       </li>
   </ul> 
   <input type="reset" value="Reset" />
   <input type="submit" value="Delete everything now" />
   </fieldset>
</form>
</div>
</div>

</body>

<script type="text/javascript">
  $(document).ready(function() {
    $('form').submit(function(event) { //Trigger on form submit
        $('#name + .throw_error').empty(); //Clear the messages first
        $('#success').empty();

        //Validate fields if required using jQuery

        var postForm = { //Fetch form data
            'name'     : $('input[name=name]').val(), //Store name fields value
            'place'    : $("#place_id").val()
        };

        $.ajax({ //Process the form using $.ajax()
            type      : 'POST', //Method type
            url       : 'app__delete_dbtbl_process.php', //Your form processing file URL
            data      : postForm, //Forms name
            dataType  : 'json',
            success   : function(data) {
                            if (!data.success) { //If fails
                                if (data.errors.name) { //Returned if any error from app__delete_dbtbl_process.php
                                    $('.throw_error').fadeIn(1000).html(data.errors.name); //Throw relevant error
                                }
                            }
                            else {
                                    $('#success').fadeIn(1000).append('<p>' + data.name + '</p>' + '<p>' + data.posted + '</p>' + '<p>' + data.place + ' </p>'); //If successful, than throw a success message
                                }
                            }
        });
        event.preventDefault(); //Prevent the default submit
    });
});
</script>
</html>