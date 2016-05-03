function confdel(item) {
	// Je nach System müssen Umlaute maskiert werden oder nicht
//    answer=confirm(unescape("M%F6chten Sie " + item + " wirklich l%F6schen?"));
    answer=confirm("Möchten Sie " + item + " wirklich löschen?");
    return answer;
}

// 
// Javascript for login form
$(function(){
var textfield = $("input[name=user]");
            $('button[type="submit"]').click(function(e) {
                e.preventDefault();
                //little validation just to check username
                if (textfield.val() != "") {
                    //$("body").scrollTo("#output");
                    $("#output").addClass("alert alert-success animated fadeInUp").html("Welcome back " + "<span style='text-transform:uppercase'>" + textfield.val() + "</span>");
                    $("#output").removeClass(' alert-danger');
                    $("input").css({
                    "height":"0",
                    "padding":"0",
                    "margin":"0",
                    "opacity":"0"
                    });
                    //change button text 
                    $('button[type="submit"]').html("continue")
                    .removeClass("btn-info")
                    .addClass("btn-default").click(function(){
                    $("input").css({
                    "height":"auto",
                    "padding":"10px",
                    "opacity":"1"
                    }).val("");
                    });
                    
                    //show avatar
                    $(".avatar").css({
                        "background-image": "url('https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRL1uzmgyrfPwUC7UwnOFHFtkAhQrAUYufbLzWvOt9N8pRt1zlV')"
                    });
                } else {
                    //remove success mesage replaced with error message
                    $("#output").removeClass(' alert alert-success');
                    $("#output").addClass("alert alert-danger animated fadeInUp").html("sorry enter a username ");
                }
                //console.log(textfield.val());

            });
});