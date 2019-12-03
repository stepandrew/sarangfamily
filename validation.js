$(document).ready(function(){
    $("#login").click(function(){
        alert("you are validating");
    })
});


$(document).ready(function(){
    $("#email").focus(function(){
       $(this).css("background-color", "greenyellow");
    });
    $("#email").blur(function(){
        $(this).css("background-color", "plum");
     });
     $("#password").focus(function(){
        $(this).css("background-color", "greenyellow");
     });
     $("#password").blur(function(){
         $(this).css("background-color", "plum");
      });
      $("#firstname").focus(function(){
        $(this).css("background-color", "greenyellow");
     });
     $("#firstname").blur(function(){
         $(this).css("background-color", "plum");
      });
      $("#lastname").focus(function(){
        $(this).css("background-color", "greenyellow");
     });
     $("#lastname").blur(function(){
         $(this).css("background-color", "plum");
      });
      $("#password").focus(function(){
        $(this).css("background-color", "greenyellow");
     });
     $("#password").blur(function(){
         $(this).css("background-color", "plum");
      }); 
      $("#password_match").focus(function(){
        $(this).css("background-color", "greenyellow");
     });
     $("#password_match").blur(function(){
         $(this).css("background-color", "plum");
      });
});

//$(document).ready(function(){
 //   $("#logo").tooltip();

   // $("#title").
//});



$(document).ready(function(){
    $("#fadeoutbutton").click(function(){
        $("#errorwarn").fadeOut();
        $("#fadeoutbutton").fadeOut();
        $(".message").fadeOut();
    

    });

});
$(document).ready(function(){
    $("#fadebutton").click(function(){
        $("#errorwarn").fadeOut();
        $("#fadebutton").fadeOut();
        $(".message").fadeOut();
    });
});


$(document).ready(function(){
    $("#hide").click(function(){
      $(".threecousin").hide();
    });
    $("#show").click(function(){
      $(".threecousin").show();
    });
  });
  
// $(document).ready(function(){
//     $("#fadebutton").click(function(){
//         $(".erroroccur").fadeOut();
//         $("#fadebutton").fadeOut();
       
//     });

// });
//$(document).reay(function(){
//    $("#linklogout"). make promptbox for confirm("are you sure?")
//})

$(document).ready(function(){
    $("#loginform").validate({
        rules:{
            email:{
                required:true,
                email:true
            },
            password:{
                required:true,
                minlength:3
            }        
        },
        messages:{
            password:{
                required:"Please provide a password",
                minlength:"Your password must be at least 3 characters long"
            },
            email:"Please enter a valid email address"
        }
    });
});


