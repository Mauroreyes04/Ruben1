document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('horario');


    var calendar = new FullCalendar.Calendar(calendarEl, {
        
      initialView: 'timeGridWeek',

      locale:"es",

      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'timeGridWeek,timeGridDay' // user can switch between the two
      },


      dateClick:Function(info){
        $("#horario").modal("show");

      }

      
    });

    calendar.render();
  });