

$(function () {

  var calendarCont = $('#calendar-cont .calendar-day');
  var calendarMonth = $('#calendar-cont .calendar-month')
  var lengthCont = calendarCont.width();
  var totalDays = lengthCont / 120;
  var nowDate = new Date();

  function addCalendarDay(curDate){
    var newDate = curDate;
    var today = curDate.getDate();
    var inData = '<i class="fas fa-chevron-left"></i>';
    var dayArr = ["SUN","MON","TUE","WED","THU","FRI","SAT"];
    calendarCont.attr('data-active', curDate);
    calendarMonth.html(curDate.toLocaleString('default', { month: 'long' }));
    for (var i = 0; i < totalDays; i++) {
      inData += `<div class="calendar-box${newDate.getDate() == today ? ' active' : ''}"><h4>${newDate.getDate()}</h4><h6>${dayArr[newDate.getDay()]}</h6></div>`;
      newDate.setDate(newDate.getDate() + 1);
    }
    inData += '<i class="fas fa-chevron-right"></i>';
    calendarCont.html(inData);
  }

  addCalendarDay(nowDate);
 
  calendarCont.on('click', 'i.fa-chevron-right', function () {
    var activeDate = new Date(calendarCont.attr('data-active'));
    activeDate.setDate(activeDate.getDate() + 1);
    addCalendarDay(activeDate);
  });

  calendarCont.on('click', 'i.fa-chevron-left', function () {
    var activeDate = new Date(calendarCont.attr('data-active'));
    activeDate.setDate(activeDate.getDate() - 1);
    addCalendarDay(activeDate);
  });

	

 
	

})