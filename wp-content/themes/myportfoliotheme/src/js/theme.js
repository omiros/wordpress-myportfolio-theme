jQuery(document).ready(function ( $ ) {

        $("#element").introLoader({
            animation: {
                name: 'lettersLoader',
                options: {
                    ease: "easeInOutCirc",
                    style: 'light',
                    delayBefore: 500,
                    delayAfter: 0, 
                    exitTime: 300,
                    loaderText: '', 
                    lettersDelayTime: 0
                }
            }
        });

        $('#about-me .about-me-text').addClass("visible").viewportChecker({
        classToAdd: 'animated bounceInDown', 
        offset: 300, 
        repeat: true, 
        callbackFunction: function(elem, action){},
        scrollHorizontal: false
       });

        $('#about-me figure img').addClass("visible").viewportChecker({
        classToAdd: 'animated bounceInRight', 
        offset: 300, 
        repeat: true, 
        callbackFunction: function(elem, action){},
        scrollHorizontal: false
       });

        $('#portfolio').addClass("visible").viewportChecker({
        classToAdd: 'animated zoomIn', 
        offset: 100, 
        repeat: true, 
        callbackFunction: function(elem, action){},
        scrollHorizontal: false
       });

       //  $('.contactform .fadeInSkills').addClass("visible").viewportChecker({
       //  classToAdd: 'zoomIn', 
       //  offset: 100, 
       //  repeat: true, 
       //  callbackFunction: function(elem, action){},
       //  scrollHorizontal: false
       // });


    // function fadeInSkills() {
    //     $('.fadeInSkills').each(function() {
    //         /* Check the location of each desired element */
    //         var objectBottom = $(this).offset().top + $(this).outerHeight();
    //         var windowBottom = $(window).scrollTop() + $(window).innerHeight();
            
    //         /* If the object is completely visible in the window, fade it in */
    //         if (objectBottom < windowBottom) { //object comes into view (scrolling down)
    //     //  if ( $(window).scrollTop() > 100 ) {
    //             $('.fadeInSkills').addClass('animated left-to-right');
   
    //         }
    //     });
    // }

    // fadeInSkills(); //Fade in completely visible elements during page-load
    // $(window).scroll(function() {fadeInSkills();}); //Fade in elements during scroll




    /* Instagram API bildspel  */
	getInstaPics();

    $('.mySkills').circliful();
    showGoogleMaps();

    /* Show number on hover over an icon */
    $("#contactform .mobile").hover(function(){
      $('#contactform').find(".number-overlay").fadeIn();
    },function(){
        $('#contactform').find(".number-overlay").fadeOut();
        }
    );
    

    $('[data-toggle="offcanvas"]').click(function () {
        $('.row-offcanvas').toggleClass('active')
    });
  
	/* Smooth scroll beetween the pages */
	$("nav .na-menu a").click(function() {
	//Give us the link for each a tag
	var link = $(this).attr('href');
	$('html, body').animate({
	    scrollTop: $(link).offset().top -50
	}, 1000);

	});

    /* Scroll to the top of the page */
    $('.bt-up').click(function(){
        $('html , body').animate({ scrollTop: 0 },2000);
    })

    /* Slide in div #about on scroll */
    // if ($(window).width() > 800) {
    //     $(window).scroll(function() {

    //     if ($(this).scrollTop() > 250) {
    //         $('.about-me-text').stop().animate({ left: '0px'},500);
    //         $('figure img').stop().animate({ right: '30px'}, 500);
    //     } else {
    //         $('.about-me-text').stop().animate({ left: '-725px' });
    //         $('figure img').stop().animate({ right: '-725px' }, 500);
    //     }
    //     });
    // };
    
    /* Knob.js Charts animation */
    
    $(function($) {

        $(".knob").knob({
            change : function (value) {
                //console.log("change : " + value);
            },
            release : function (value) {
                //console.log(this.$.attr('value'));
                console.log("release : " + value);
            },
            cancel : function () {
                console.log("cancel : ", this);
            },
            /*format : function (value) {
                return value + '%';
            },*/
            draw : function () {

                // "tron" case
                if(this.$.data('skin') == 'tron') {

                    this.cursorExt = 0.3;

                    var a = this.arc(this.cv)  // Arc
                        , pa                   // Previous arc
                        , r = 1;

                    this.g.lineWidth = this.lineWidth;

                    if (this.o.displayPrevious) {
                        pa = this.arc(this.v);
                        this.g.beginPath();
                        this.g.strokeStyle = this.pColor;
                        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, pa.s, pa.e, pa.d);
                        this.g.stroke();
                    }

                    this.g.beginPath();
                    this.g.strokeStyle = r ? this.o.fgColor : this.fgColor ;
                    this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, a.s, a.e, a.d);
                    this.g.stroke();

                    this.g.lineWidth = 2;
                    this.g.beginPath();
                    this.g.strokeStyle = this.o.fgColor;
                    this.g.arc( this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
                    this.g.stroke();

                    return false;
                }
            }
        });

        /* Change the Value of the Charts */
            var dial = $('.knob');
                dial.knob({
                    readOnly: true
                });
                $('.buttons li').on('click', function () {
                    var button = $(this);
                    var myVal = button.data('value');
                    dial.stop().animate({
                        value: myVal
                    }, {
                        duration: 200,
                        easing: 'swing',
                        step: function () {
                            dial.val(Math.ceil(this.value)).trigger('change');
                        },
                        complete: function () {
                            dial.val(myVal + '%');
                        }
                    });
                });

        // Example of infinite knob, iPod click wheel
        var v, up=0,down=0,i=0
            ,$idir = $("div.idir")
            ,$ival = $("div.ival")
            ,incr = function() { i++; $idir.show().html("+").fadeOut(); $ival.html(i); }
            ,decr = function() { i--; $idir.show().html("-").fadeOut(); $ival.html(i); };
        $("input.infinite").knob(
            {
            min : 0
            , max : 20
            , stopper : false
            , change : function () {
                            if(v > this.cv){
                                if(up){
                                    decr();
                                    up=0;
                                }else{up=1;down=0;}
                            } else {
                                if(v < this.cv){
                                    if(down){
                                        incr();
                                        down=0;
                                    }else{down=1;up=0;}
                                }
                            }
                            v = this.cv;
                        }
            });
    });


});

/* Instagram API / Gallery by Elias Tahmazidis*/
var showingImg = [];
var instaList = [];
var imgList = [];
function getInstaPics(){

var insta_url = 'https://api.instagram.com/v1/users/1308630413/media/recent/';

    jQuery.ajax({
        type: 'GET',
        url: insta_url,
        dataType: 'jsonp',
        data: {
            access_token:'1308630413.f73711a.f63ef74b6b054167b15a82f68bcfa794',
            count:'200'
        },
        success: function (data) {


            for(i=0; i < data.data.length; i++)
            {
                tags = data.data[i].tags
                if(tags.indexOf('elitah') !== -1)
                {
                    instaList.push(data.data[i])
                }
            }
            console.log(instaList.length)
            randArr = [];
            instaLength = instaList.length;
            if(instaLength > 7)
            {
                instaLength = 7
            }
                for(var i = 0; i < instaLength; i++)
                {
                    random = Math.round((Math.random()) * 1000)%instaList.length;
                        if(randArr.indexOf(random)>=0)
                        {
                            i--;
                            continue;
                        }
                    randArr.push(random);
                    showingImg.push(random);
                    imgList.push(instaList[random].images.standard_resolution.url);
                }
                jQuery.each( imgList, function( i, val ) {
                    var imageString = '<img src="'+ val +'" class="small slider-img">';
                        if(i == 1)
                        {
                            var imageString = '<img src="'+ val +'" class="big slider-img">';
                        }
                        else if (i == 6)
                        {
                            var imageString = '<img src="'+ val +'" class="medium slider-img">';
                        }
                    jQuery('#insta-slider').append(imageString);
                });
            setTimeout(function(){switchRandomImage();}, 1500);
        },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
    alert('Not able to connect to Instagram!');
    }
  });
}

function switchRandomImage(){

    images = jQuery('#insta-slider img');
    random = Math.round((Math.random()) * 1000)%images.length;
    randomInstaImg = Math.round((Math.random()) * 1000)%instaList.length;
    if(images.length < instaList.length)
    {
        if (jQuery.inArray(randomInstaImg,showingImg)!== -1)
        {
            switchRandomImage();
        }
        else
        {
            var img = new Image();
            img.src = instaList[randomInstaImg].images.standard_resolution.url;
            img.onload = function(){
                images.eq(random).fadeOut(200, function(){
                    images.eq(random).attr('src', img.src ).fadeIn(200, function(){
                        showingImg[random] = randomInstaImg;
                        setTimeout(function(){switchRandomImage();}, 3000);
                    });
                 });
             }
        }
    }
}

(function ($) {

    $.fn.circliful = function (options, callback) {

        var settings = $.extend({
            // These are the defaults.
            startdegree: 0,
            fgcolor: "#556b2f",
            bgcolor: "#eee",
            fill: false,
            width: 15,
            dimension: 200,
            fontsize: 22,
            percent: 50,
            animationstep: 1.0,
            iconsize: '40px',
            iconcolor: '#999',
            border: 'default',
            complete: null,
            bordersize: 10
        }, options);

        return this.each(function () {

            var customSettings = ["fgcolor", "bgcolor", "fill", "width", "dimension", "fontsize", "animationstep", "endPercent", "icon", "iconcolor", "iconsize", "border", "startdegree", "bordersize"];

            var customSettingsObj = {};
            var icon = '';
            var percent;
            var endPercent = 0;
            var obj = $(this);
            var fill = false;
            var text, info;

            obj.addClass('circliful');

            checkDataAttributes(obj);

            if (obj.data('text') != undefined) {
                text = obj.data('text');

                if (obj.data('icon') != undefined) {
                    icon = $('<i></i>')
                        .addClass('fa ' + $(this).data('icon'))
                        .css({
                            'color': customSettingsObj.iconcolor,
                            'font-size': customSettingsObj.iconsize
                        });
                }

                if (obj.data('type') != undefined) {
                    type = $(this).data('type');

                    if (type == 'half') {
                        addCircleText(obj, 'circle-text-half', (customSettingsObj.dimension / 1.45));
                    } else {
                        addCircleText(obj, 'circle-text', customSettingsObj.dimension);
                    }
                } else {
                    addCircleText(obj, 'circle-text', customSettingsObj.dimension);
                }
            }

            if ($(this).data("total") != undefined && $(this).data("part") != undefined) {
                var total = $(this).data("total") / 100;

                percent = (($(this).data("part") / total) / 100).toFixed(3);
                endPercent = ($(this).data("part") / total).toFixed(3);
            } else {
                if ($(this).data("percent") != undefined) {
                    percent = $(this).data("percent") / 100;
                    endPercent = $(this).data("percent");
                } else {
                    percent = settings.percent / 100;
                }
            }

            if ($(this).data('info') != undefined) {
                info = $(this).data('info');

                if ($(this).data('type') != undefined) {
                    type = $(this).data('type');

                    if (type == 'half') {
                        addInfoText(obj, 0.9);
                    } else {
                        addInfoText(obj, 1.25);
                    }
                } else {
                    addInfoText(obj, 1.25);
                }
            }

            $(this).width(customSettingsObj.dimension + 'px');

            var size = customSettingsObj.dimension,
                canvas = $('<canvas></canvas>').attr({
                    width: size,
                    height: size
                }).appendTo($(this)).get(0);

            var context = canvas.getContext('2d');

            var dpr = window.devicePixelRatio;
            if ( dpr ) {
                var $canvas = $(canvas);
                $canvas.css('width', size);
                $canvas.css('height', size);
                $canvas.attr('width', size * dpr);
                $canvas.attr('height', size * dpr);

                context.scale(dpr, dpr);
            }

            var container = $(canvas).parent();
            var x = size / 2;
            var y = size / 2;
            var degrees = customSettingsObj.percent * 360.0;
            var radians = degrees * (Math.PI / 180);
            var radius = size / 2.5;
            var startAngle = 2.3 * Math.PI;
            var endAngle = 0;
            var counterClockwise = false;
            var curPerc = customSettingsObj.animationstep === 0.0 ? endPercent : 0.0;
            var curStep = Math.max(customSettingsObj.animationstep, 0.0);
            var circ = Math.PI * 2;
            var quart = Math.PI / 2;
            var type = '';
            var fireCallback = true;
            var additionalAngelPI = (customSettingsObj.startdegree / 180) * Math.PI;

            if ($(this).data('type') != undefined) {
                type = $(this).data('type');

                if (type == 'half') {
                    startAngle = 2.0 * Math.PI;
                    endAngle = 3.13;
                    circ = Math.PI;
                    quart = Math.PI / 0.996;
                }
            }
            
            if ($(this).data('type') != undefined) {
                type = $(this).data('type');

                if (type == 'angle') {
                    startAngle = 2.25 * Math.PI;
                    endAngle = 2.4;
                    circ = 1.53 + Math.PI;
                    quart = 0.73 + Math.PI / 0.996;
                }
            }

            /**
             * adds text to circle
             *
             * @param obj
             * @param cssClass
             * @param lineHeight
             */
            function addCircleText(obj, cssClass, lineHeight) {
                $("<span></span>")
                    .appendTo(obj)
                    .addClass(cssClass)
                    .html(text)
                    .prepend(icon)
                    .css({
                        'line-height': lineHeight + 'px',
                        'font-size': customSettingsObj.fontsize + 'px'
                    });
            }

            /**
             * adds info text to circle
             *
             * @param obj
             * @param factor
             */
            function addInfoText(obj, factor) {
                $('<span></span>')
                    .appendTo(obj)
                    .addClass('circle-info-half')
                    .css(
                        'line-height', (customSettingsObj.dimension * factor) + 'px'
                    )
                    .text(info);
            }

            /**
             * checks which data attributes are defined
             * @param obj
             */
            function checkDataAttributes(obj) {
                $.each(customSettings, function (index, attribute) {
                    if (obj.data(attribute) != undefined) {
                        customSettingsObj[attribute] = obj.data(attribute);
                    } else {
                        customSettingsObj[attribute] = $(settings).attr(attribute);
                    }

                    if (attribute == 'fill' && obj.data('fill') != undefined) {
                        fill = true;
                    }
                });
            }

            /**
             * animate foreground circle
             * @param current
             */
            function animate(current) {

                context.clearRect(0, 0, canvas.width, canvas.height);

                context.beginPath();
                context.arc(x, y, radius, endAngle, startAngle, false);

                context.lineWidth = customSettingsObj.width + 1;

                context.strokeStyle = customSettingsObj.bgcolor;
                context.stroke();

                if (fill) {
                    context.fillStyle = customSettingsObj.fill;
                    context.fill();
                }

                context.beginPath();
                context.arc(x, y, radius, -(quart) + additionalAngelPI, ((circ) * current) - quart + additionalAngelPI, false);

                if (customSettingsObj.border == 'outline') {
                    context.lineWidth = customSettingsObj.width + customSettingsObj.bordersize;
                } else if (customSettingsObj.border == 'inline') {
                    context.lineWidth = customSettingsObj.width - customSettingsObj.bordersize;
                }

                context.strokeStyle = customSettingsObj.fgcolor;
                context.stroke();

                if (curPerc < endPercent) {
                    curPerc += curStep;
                    requestAnimationFrame(function () {
                        animate(Math.min(curPerc, endPercent) / 100);
                    }, obj);
                }

                if (curPerc == endPercent && fireCallback && typeof(options) != "undefined") {
                    if ($.isFunction(options.complete)) {
                        options.complete();

                        fireCallback = false;
                    }
                }
            }

            animate(curPerc / 2000);
            $('.mySkills').stop().animate();

        });
    };
}(jQuery));

/* Google Maps API library */
// The latitude and longitude of your business / place
var position = [59.294773, 18.087274];
 
function showGoogleMaps() {
 
    var latLng = new google.maps.LatLng(position[0], position[1]);
 
    var mapOptions = {
        zoom: 14, // initialize zoom level - the max value is 21
        streetViewControl: false, // hide the yellow Street View pegman
        scaleControl: true, // allow users to zoom the Google Map
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        center: latLng
    };
 
    map = new google.maps.Map(document.getElementById('googlemaps'),
        mapOptions);
 
    // Show the default red marker at the location
    marker = new google.maps.Marker({
        position: latLng,
        map: map,
        draggable: false,
        animation: google.maps.Animation.DROP
    });
}
 
google.maps.event.addDomListener(window, 'load', showGoogleMaps);


