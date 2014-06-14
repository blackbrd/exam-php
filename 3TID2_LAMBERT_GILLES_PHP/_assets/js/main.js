
// DRAG COVER
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#photoFull-1').css({"background":"url("+e.target.result +") center center no-repeat","background-size":"cover"});
        }

        reader.readAsDataURL(input.files[0]);
    }
}


function readURLbis(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#photoFull-4')
                .attr('src', e.target.result); 
            };

        reader.readAsDataURL(input.files[0]);
    }
}











// LIKE
function doAction(postid,type) {
    $.post('doAjax.php', {postid:postid, type:type}, function(data){

        if(isNaN(parseFloat(data))) {
            alert(data);
        }else{
            $('#'+postid+'_'+type+'s').text(data);
        }
    });
}




// readingtime
$(function showReadingTime() {

    $('article').readingTime({
        wordCountTarget: '.words',
    });
    
});




// CONTENT EDITABLE
var editable = document.getElementById('editable');

    addEvent(editable, 'blur', function () {
      // lame that we're hooking the blur event
      localStorage.setItem('contenteditable', this.innerHTML);
      document.designMode = 'off';
    });

    addEvent(editable, 'focus', function () {
      document.designMode = 'on';
    });

    addEvent(document.getElementById('clear'), 'click', function () {
      localStorage.clear();
      window.location = window.location; // refresh
    });

    if (localStorage.getItem('contenteditable')) {
      editable.innerHTML = localStorage.getItem('contenteditable');
    }



// SAVE CONTENT EDITABLE
$('.editable').keyup(function() {
    delay(function(){
        var text= $('.editable').text();
        $.ajax({
            type:"post",
            url:"updateContentEditable.php",
            data:"text="+text,
            success:function(data){
            }
        });
    }, 500 );
});
 
var delay = (function(){
    var timer = 0;
    return function(callback, ms){
        clearTimeout (timer);
        timer = setTimeout(callback, ms);
    };
})();



        function checkWidth(init)
        {
            /*If browser resized, check width again */
            if ($(window).width() < 640) {
                $('#introContainer').addClass('fadeScrollIphone');
            }
            else {
                if (!init) {
                    $('#introContainer').removeClass('fadeScrollIphone');
                }
            }
        }

        $(document).ready(function() {
            checkWidth(true);

            $(window).resize(function() {
                checkWidth(false);
            });
        });



// WAYPOINTS - STICKY
$(document).ready(function wayPoints() {
            
            var theight = $(window).height();

            // masque info du header

            // $('#introContainer').waypoint(function(direction){
            //     if ( direction == "down") {
            //         $(".fadeScroll").css("opacity","0");
            //     } else {
            //         $(".fadeScroll").css("opacity","1");
            //     }
            // }, { offset: -300 });


            $('#introContainer').waypoint(function(direction){
                if ( direction == "down") {
                    $(".fade").css("opacity","0");
                } else {
                    $(".fade").css("opacity","1");
                }
            }, { offset: -250 });


            // masque info du header (iphone)
            $('#introContainer').waypoint(function(direction){
                if ( direction == "down") {
                    $(".fadeScrollIphone").css("opacity","0");
                } else {
                    $(".fadeScrollIphone").css("opacity","1");
                }
            }, { offset: -80 });



            $('.author-details').waypoint(function(direction){
                if ( direction == "down") {
                    $(".topBar").css("background","rgba(255,255,255,1)");
                    $(".topBar nav a").css("color","#b4b4b4");
                    // $(".topBar").css("opacity","0");

                } else {
                    $(".topBar").css("background","transparent");
                    $(".topBar nav a").css("color","#fff");
                }
            }, { offset: -10 });


            // footer
            $('section.footer').waypoint(function(direction){
                if ( direction == "up") {
                    $("footer.footerBottom").css("opacity","0");

                } else {
                    $("footer.footerBottom").css("opacity","1");
                }
            }, { offset: theight});




        });


// SEARCHBOX SINGLE PHOTO
$(function showInputGoogleMap() {
  $('#fw1 a.iconLocation').hover(function() {
    $('#pac-input1').css('display', 'block');
    }); 

  // function() {
  //   // on mouseout, reset the background colour
  //   $('#pac-input1').css('display', 'none');
  // });
});












// add CSS when PREVIEW MODE
var autoInc = 3;

$(function() {



    $('.previewMenu').click(function() {
        $('.previewHide').css('display','none');
        $('.editable').prop('contenteditable','false');
    });

});






$(document).ready(

    function showTextTools() {

    var i = null;
    $("section.wrap").mousemove(function() {
        clearTimeout(i);

        $(this).find("ul.textTools").removeClass('hideAll');

        i = setTimeout('$(this).find("ul.textTools").addClass("hideAll");',3000);

    }).mouseleave(function() {
        clearTimeout(i);
        $(this).find("ul.textTools").addClass('hideAll');
    });

    // showTextTools();












    // TEXT TOOLS

    $('.addColumn').click(function() {
        $(this).parent().parent().find('p.para').removeClass('t-center t-left');
        $(this).parent().parent().find('p.para').toggleClass('column');
    });


    $('.resetColumn').click(function() {
        $(this).parent().parent().find('p.para').removeClass('t-center t-justified column');
        $(this).parent().parent().find('p.para').addClass('t-left');
    });

    $('.addTextCenter').click(function() {
        $(this).parent().parent().find('p.para').removeClass('column t-justified t-left');
        $(this).parent().parent().find('p.para').addClass('t-center');
    });

    $('.addTextLeft').click(function() {
        $(this).parent().parent().find('p.para').removeClass('t-justified column t-center');
        $(this).parent().parent().find('p.para').addClass('t-left');
    });


    $('.addTextJustified').click(function() {

        $(this).parent().parent().find('p.para').removeClass('t-center t-left');
        $(this).parent().parent().find('p.para').addClass('t-justified');
    
    });



});






























// $(function() {
//     var i = null;
//     $("div.texte").mousemove(function() {
//         clearTimeout(i);
//         $("ul.textTools").removeClass('hideAll');
//         i = setTimeout('$("ul.textTools").addClass("hideAll");',3000);
//     }).mouseleave(function() {
//         clearTimeout(i);
//         $("ul.textTools").addClass('hideAll');
//     });

// });



// $(function(){

//     $(".spot").click(function () {
//         $(".infoSupp").fadeToggle();
//     });
// });



// dragTest Circle
$(function() {
    $(".spotDiv").draggable();
});


// add new content


// $(function addNewContent() {

//     var i = 0;
//     var remove = true; // added this 

//     $('#button').click(function(e) {
//         $('<div/>').attr({
//             'id' : i
//         })
//         .appendTo('#area'); // append to new container
//         i++;
//     });

//     // $('#area').on('click','.circle',function (){ 
//     //     if(remove){ 
//     //         $(this).remove();
//     //     } else {
//     //         //just to see if it was clicked
//     //         $(this).css({'background-color': 'red'});
//     //     }
//     // });

//     $('#btn').toggle(function() {
//         $('#btn').val('add');
//         remove = true;
//     }, function() {
//         $('#btn').val('remove');
//         remove = false;
//     });

// });







// old







// contentEditable

// var editable = document.getElementById('editable');

//     addEvent(editable, 'blur', function () {
//       // lame that we're hooking the blur event
//       localStorage.setItem('contenteditable', this.innerHTML);
//       document.designMode = 'off';
//     });

//     addEvent(editable, 'focus', function () {
//       document.designMode = 'on';
//     });

//     addEvent(document.getElementById('clear'), 'click', function () {
//       localStorage.clear();
//       window.location = window.location; // refresh
//     });

//     if (localStorage.getItem('contenteditable')) {
//       editable.innerHTML = localStorage.getItem('contenteditable');
//     }



// AUTOPLAY VIDEO

// $(function(){
//   $("#doubleExposure").hover(

//   	function(){
//     // $(this).css("opacity","1");
//     this.play();
//     },

//     function(){
//     // $(this).css("opacity",".3");
//    this.pause()
//   });
// });


// AUTOPLAY VIDEO : EMBED VIMEO


// $(document).ready(function(){
//     var player = $("#player_7256322");
//         froogaloop = $f(player[0].id);
    
//     player.mouseclick(function(){
//         froogaloop.api('play');
//     })

//     .mouseclick(function(){
//         froogaloop.api('pause');
//     });
// });


// popup message

$(window).ready(updateHeight);
$(window).resize(updateHeight);

function updateHeight()
{
    var div = $('#popup');
    var width = div.width();
    
    div.css('height', width);
}

