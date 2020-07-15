$(document).ready(function(){
    //ready message
    console.log("JavaScript Stared!!");

    //Companies
    $("#signup").click(function (event) {
        event.preventDefault();
        var cname = $("#cname").val();
        var regnum = $("#regnum").val();
        var email = $("#email").val();
        var contactNumber = $("#contactNumber").val();
        console.log(cname +" \n" + regnum +" \n" + email+" \n" + contactNumber);
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {employer: 1,cname:cname,regnum:regnum,email:email,contactNumber:contactNumber},
            success: function (data) {
                $("#msg").html(data);
                console.log(data);
            }

        });

    });
    
    //Job Seekers
    $("#signemp").click(function (event) {
        event.preventDefault();
        var fname = $("#fname").val();
        var lname = $("#surname").val();
        var gender = $("#gender").val();
        var dob = $("#dob").val();
        var industry = $("#industry").val();
        var careerlevel = $("#careerlevel").val();
        var level = $("#level").val();
        var from = $("#from").val();
        var to = $("#to").val();
        var nature = $("#nature").val();
        var email = $("#email").val();
        var phoneNumber = $("#phoneNumber").val();
        // var nature = $("#nature").val();
        var cv = "upload";

        $.ajax({
            url:"action.php",
            method:"POST",
            data:{jobseeker:1,fname:fname,lname:lname,level:level,gender:gender,dob:dob,
                industry:industry,careerlevel:careerlevel,from:from,to:to,nature:nature,
                email:email,phoneNumber:phoneNumber,cv:cv},
            success:function (data) {
                $("#msgem").html(data);
            }

        });

    });

});