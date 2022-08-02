
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendario');
    var calendar = new FullCalendar.Calendar(calendarEl, {

      defaultView: 'year',
      locale: "es",
      headerToolbar: {
        left: 'prev next today',
        center: 'title',
        right: 'dayGridMonth timeGridWeek listWeek'
      },
      events: baseURL + "/calendario/show",
    });
    calendar.render();
  });