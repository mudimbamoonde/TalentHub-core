$(document).ready(function () {
    //jobs view
    JobView();
    function  JobView() {
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{jobview:1},
            success:function (data) {
                $("#msg").html(data);
                // console.log(data);
            }

        });
    }

});