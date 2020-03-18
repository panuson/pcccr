$(document).ready(function() {
    $("#lightgallery").lightGallery(); 
});

$(document).ready(function(){
    $('.single-item').slick({
    dots: false,
    touchMove: true,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 5000,
    fade: true,
    cssEase: 'linear',
    arrows: false,
    });
});

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
  
    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'dayGrid', 'timeGrid', 'list', 'bootstrap','googleCalendar' ],
      timeZone: 'Asia/Bangkok',
      themeSystem: 'bootstrap',
      height: 'auto',
      header: {
        left: 'prev,next today',
        center: 'title',
        right: false
      },
      
      locale: 'th',
      weekNumbers: false,
      eventLimit: true, // allow "more" link when too many events
      googleCalendarApiKey: 'AIzaSyDiCnMkD7RKN-iqLjWKujSGRJMe6Gdpg2c',
        events: {
        googleCalendarId: 'th.th#holiday@group.v.calendar.google.com',
        className: 'gcal-event' // an option!
        }
        
    });
    calendar.render();
  });

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendarlist');
  
    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: [ 'dayGrid', 'timeGrid', 'list', 'bootstrap','googleCalendar' ],
        timeZone: 'Asia/Bangkok',
        themeSystem: 'bootstrap',
        defaultView: 'listMonth',
        locale: 'th',
        height: 'auto',
        titleFormat:
            { year: 'numeric', month: 'short' } ,

        header: {
        center: false,
        right: 'today prev,next'
        },
        eventLimit: true,
        googleCalendarApiKey: 'AIzaSyDddu-1Xb-7dPoVs_5UKtTNXa0qKfSRMTM',
        events: {
        googleCalendarId: 'th.th#holiday@group.v.calendar.google.com',
        className: 'gcal-event' // an option!
        }
        });
  
    calendar.render();
  })
