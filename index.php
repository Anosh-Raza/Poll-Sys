<?php

?>

<html>
<head>  
    <title>Live Poll System in PHP Mysql using Ajax</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
    <br/>
    <br/>
    <br/>
    <h2 align="center">Live Poll System in PHP Mysql using Ajax</h2>
    <div class="row">
    <div class="col-md-6">
    <form method="post" id="poll_form">
    <h3>Which is best PHP Framework?</h3>
    <br/>
    <div class="radio">
    <label><h4><input type="radio" name="poll_option" class="poll_option" value="Laravel">Laravel</h4></label>
    </div>
    <div class="radio">
    <label><h4><input type="radio" name="poll_option" class="poll_option" value="Code_Ignitor">Code_Ignitor</h4></label>
    </div>
    <div class="radio">
    <label><h4><input type="radio" name="poll_option" class="poll_option" value="Cake PHP">Cake PHP</h4></label>
    </div>
    <div class="radio">
    <label><h4><input type="radio" name="poll_option" class="poll_option" value="Symphony">Symphony</h4></label>
    </div>
    <div class="radio">
    <label><h4><input type="radio" name="poll_option" class="poll_option" value="Phalcon">Phalcon</h4></label>
    </div>
    <br/>
    <input type="submit" name="poll_button" id="poll_button" class="btn btn-primary">
    </form>
    <br/>
    </div>
    <div class="col-md-6">
    <br/>
    <br/>
    <br/>
    <h4>Live Poll Result</h4><br/>
    <div id="poll_result"></div>
    </div>
    </div>
    <br/>
    <br/>
    <br/>
    </div>
</body>
</html>

<script>
$(documents).ready(function(){

    fetch_poll_data();

    function fetch_poll_data()
    {
        $.ajax({
            url:"fetch_poll_data.php",
            method:"POSTS",
            success:function(data)
            {
                $('#poll_result').html(data);
            }
        })
    }

    $('#poll_form').on('submit', function(events){
        event.preventDefault();
        var poll_option='';
        $('poll_option').each(function(){
            if($(this).prop("checked"))
            {
                poll_option = $(this).val();
            }
        });
        if(poll_option != '')
        {
            $('#poll_button').attr("disabled","disabled");
            var form_data = $(this).serialize();
            $.ajax({
                url:"poll.php"
                method:"POST",
                data:form_data,
                success:fucntion(data)
                {
                    $('#poll_form')[0].reset();
                    $('#poll_button').attr('disabled',false);
                    fetch_poll_data();
                    alert("Poll Submitted Succesfully");
                }
            });
        }
        else
        {

        }
    })

});
</script>