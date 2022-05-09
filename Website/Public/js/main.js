$(document).ready(function(){
    $("#username").keyup(function(){
        var user=  $(this).val();
        $.post("./Ajax/CheckUser",{un:user}, function(data){
            $("#messageUn").html(data);
        });
    });
});
$(document).ready(function(){
    $("#email").keyup(function(){
        var email=  $(this).val();
        $.post("./Ajax/CheckEmail",{email:email}, function(data){
            $("#messageEmail").html(data);
        });
    });
});
