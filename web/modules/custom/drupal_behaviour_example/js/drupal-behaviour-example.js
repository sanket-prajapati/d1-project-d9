(function ($, Drupal) {
  Drupal.behaviors.drupal_behaviour_example = {
    attach:function(context, settings){
        $("#edit-keys").val(Math.random());//Works
        // $("#edit-keys", context).val(Math.random());//Works

        //jQuery set
        // $("#btn1").click(function(){
        //     $("#test1").text("Hello world!");
        // });
        // $("#btn2").click(function(){
        //     $("#test2").html("<b>Hello world!</b>");
        // });
        // $("#btn3").click(function(){
        //     $("#test3").val("Dolly Duck");
        // });


        //jQuery get
        // $("#btn1").click(function(){
        //     alert("Text: " + $("#test").text());
        // });
        // $("#btn2").click(function(){
        //     alert("HTML: " + $("#test").html());
        // });

        $('.site-branding__logo', context).addClass('fancy-pants');//works

        // alert("Let's Understand drupal behaviour");//It is repeated 5 times

        $(".region-header", context).once('region-header').on({
            mouseenter: function(){
                $(this).css('background-color',"green");
            },
            mouseleave: function(){
                $(this).css('background-color',"red");
            },
            dblclick: function(){
                $(this).css('background-color',"Yellow");
                alert("Let's Understand drupal behaviour");
                alert("Background color is: "+ $('.region-header').css('background-color'));
            }
        });
    }
  }
})(jQuery, Drupal);



// here jQuery take alias as $, we can use any works instead of that like sanket 
//below code is works absolutely fine
// (function (sanket, Drupal) {
//     Drupal.behaviors.drupal_behaviour_example = {
//       attach:function(context, settings){
//           sanket("#edit-keys").val(Math.random());
  
//         //   $('.site-branding__logo', context).addClass('fancy-pants');
//       }
//     }
// })(jQuery, Drupal);






// Drupal.behaviors.drupal_behaviour_example = {  
//     attach: function (context, settings) {  
//     // using this code we are just for learning proposed we just add class on site logo you can write code of js below the comment.  
//     jQuery('.site-branding__logo' , context).addClass('fancy-pants');  
//   }  
// } //not works but if you put this inside above function than its works