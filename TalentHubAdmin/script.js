$(document).ready(function () {
   console.log("Loaded");

   $("#submit").click(function (event) {
       event.preventDefault();
       var fname = $("#fname").val();
       var lname = $("#lname").val();
       var username = $("#username").val();
       var gender = $("#gender").val();
       var nrc = $("#nrc").val();
       var nrc1 = $("#nrc1").val();
       var nrc2 = $("#nrc2").val();
       var accesslevel = $("#accesslevel").val();
       var address = $("#address").val();
       var email = $("#email").val();
       var phone = $("#phone").val();

       var nrccom = nrc+"/"+nrc1+"/"+nrc2;
       // console.log(nrccom);
       $.ajax({
           url:"action.php",
           method:"POST",
           data:{sys:1,fname:fname,lname:lname,username:username,gender:gender,
               nrc:nrccom,accesslevel:accesslevel,address:address,email:email,phone:phone},
           success:function (data) {
               $("#msg").html(data);
               // console.log(data);
           }
       });


   });

   //System Admin
    sysAdmin();
    function sysAdmin(){
        // alert("hello");
       $.ajax({
           url:"action.php",
           method:"POST",
           data:{sysadmin:1},
           success:function (data) {
               $("#sysAdmin").html(data);

           }
       });
    }

    //More details
    $("body").delegate("#detailemp","click",function (event) {
        event.preventDefault();
       var details = $(this).attr("deepemp");
       // alert(details);
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{getEmployee:1,userID:details},
            success:function (data) {
                $("#empdata").html(data);
                // alert(data);
                sysAdmin();
            }

        });
    });

    //Create Account
    $("body").delegate("#createAccount","click",function (event) {
        event.preventDefault();
       var account = $(this).attr("account");
       // alert(details);
       //  $("#msg").html(account);
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{setEmployee:1,userID:account},
            success:function (data) {
                $("#msg").html(data);
                // alert(data);
                sysAdmin();
            }

        });
    });


    //Unlock Account
    $("body").delegate("#unlockaccount","click",function (event) {
        event.preventDefault();
       var unlock = $(this).attr("unlock");
       // alert(details);
       //  $("#msg").html(unlock);
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{Unlock:1,userID:unlock},
            success:function (data) {
                $("#msg").html(data);
                // alert(data);
                sysAdmin();
            }

        });
    });

    $("#eventLog").click(function (event) {
        event.preventDefault();
        var ename = $("#ename").val();
        var Eventdate = $("#date").val();
        var venue = $("#venue").val();
        var from= $("#from").val();
        var to = $("#to").val();
        var details = $("#details").val();
        // alert("alert working");
        // console.log(ename);
        alert(details);
        // $.ajax({
        //     url:"action.php",
        //     method:"POST",
        //     data:{eventLog:1,ename:ename,Eventdate:Eventdate,venue:venue,from:from,to:to,details:details},
        //     success:function (data) {
        //         $("#msg").html(data);
        //         // console.log(data);
        //     }
        //
        //     });

    });
    
    
    //Jobs
    fetchJobs();
    function fetchJobs() {
        console.log("jobs");
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{fetchjob:1},
            success:function (data) {
                var obj = JSON.parse(data);
                console.log(obj);
                $("#jobs").html(data);

                // $("#jobs").html("  <th>1</th>\n" +
                //     "                                    <th>obj</th>\n" +
                //     "                                    <th>Summary</th>\n" +
                //     "                                    <th>Company</th>\n" +
                //     "                                    <th>Due</th>\n" +
                //     "                                    <th>Action</th>");

            }
        });
    }




});