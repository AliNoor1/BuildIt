$( document ).ready(function() {
    console.log( "ready!" );
});

$("#bio-submit").click(function(){
    var newBio = $("#bio").text();
    console.log(newBio);
    $.ajax({
        type: "POST",
        url: '/scripts/update_bio.php',
        data: {'bio': newBio},
        success: function(data){
            alert(data);
        }
    });
    $("#bio-submit").css('visibility', 'hidden');
});

$("#bio").click(function(){
    $("#bio-submit").css('visibility', 'visible');
});