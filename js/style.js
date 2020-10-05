// $("#clockdiv").countdown("2020/05/31",function(event){

//   $(this).text(

//        event.strftime('%D days %H:%M:%S')
//     );

// });

 $('#msg').hide();

$("#clockdiv").countdown("2020/06/1",function(event){

  $('#days').text(

       event.strftime('%D')
    );

  $('#days').append(" Days left")


  $('#hours').text(

       event.strftime('%H')
    );

  $('#hours').append(" H")


   $('#minutes').text(

       event.strftime('%M')
    );

   $('#minutes').append(" M")


    $('#seconds').text(

       event.strftime('%S')
    );

     $('#seconds').append(" S")

  

});

$('#msg').text("ended")




