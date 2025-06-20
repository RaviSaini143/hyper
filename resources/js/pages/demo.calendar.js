/**
 * Theme: Hyper - Responsive Bootstrap 5 Admin Dashboard
 * Author: Coderthemes
 * Component: Full-Calendar
 */

import bootstrap from 'bootstrap/dist/js/bootstrap.min';
import { Calendar } from '@fullcalendar/core';
import { Draggable } from '@fullcalendar/interaction';
import interactionPlugin from '@fullcalendar/interaction';
import timeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';
import dayGridPlugin from '@fullcalendar/daygrid';
import bootstrapPlugin from '@fullcalendar/bootstrap';

!function ($) {
  "use strict";

  var CalendarApp = function () {
    this.$body = $("body"),
      this.$modal = new bootstrap.Modal(document.getElementById('event-modal'), { backdrop: 'static' }),
      this.$calendar = $('#calendar'),
      this.$formEvent = $("#form-event"),
      this.$btnNewEvent = $("#btn-new-event"),
      this.$btnDeleteEvent = $("#btn-delete-event"),
      this.$btnSaveEvent = $("#btn-save-event"),
      this.$modalTitle = $("#modal-title"),
      this.$calendarObj = null,
      this.$selectedEvent = null,
      this.$newEventData = null
  };


  /* on click on event */
  CalendarApp.prototype.onEventClick = function (info) {
    this.$formEvent[0].reset();
    this.$formEvent.removeClass("was-validated");

    this.$newEventData = null;
    this.$btnDeleteEvent.show();
    this.$modalTitle.text('Edit Event');
    this.$modal.show();
    this.$selectedEvent = info.event;
    $("#event-title").val(this.$selectedEvent.title);
    $("#event-category").val(this.$selectedEvent.classNames[0]);
  },

    /* on select */
    CalendarApp.prototype.onSelect = function (info) {
      this.$formEvent[0].reset();
      this.$formEvent.removeClass("was-validated");

      this.$selectedEvent = null;
      this.$newEventData = info;
      this.$btnDeleteEvent.hide();
      this.$modalTitle.text('Add New Event');

      this.$modal.show();
      this.$calendarObj.unselect();
    },

    /* Initializing */
    CalendarApp.prototype.init = function () {
      /*  Initialize the calendar  */
      var today = new Date($.now());

      // var Draggable = FullCalendar.Draggable;
      var externalEventContainerEl = document.getElementById('external-events');

      // init dragable
      new Draggable(externalEventContainerEl, {
        itemSelector: '.external-event',
        eventData: function (eventEl) {
          return {
            title: eventEl.innerText,
            className: $(eventEl).data('class')
          };
        }
      });

      var defaultEvents = [{
        title: 'Meeting with Mr. Shreyu',
        start: new Date($.now() + 158000000),
        end: new Date($.now() + 338000000),
        className: 'bg-warning'
      },
      {
        title: 'Interview - Backend Engineer',
        start: today,
        end: today,
        className: 'bg-success'
      },
      {
        title: 'Phone Screen - Frontend Engineer',
        start: new Date($.now() + 168000000),
        className: 'bg-info'
      },
      {
        title: 'Buy Design Assets',
        start: new Date($.now() + 338000000),
        end: new Date($.now() + 338000000 * 1.2),
        className: 'bg-primary',
      }];

      var $this = this;

      // cal - init
      $this.$calendarObj = new Calendar($this.$calendar[0], {
        plugins: [dayGridPlugin, bootstrapPlugin, interactionPlugin, listPlugin, timeGridPlugin],
        slotDuration: '00:15:00', /* If we want to split day time each 15minutes */
        slotMinTime: '08:00:00',
        slotMaxTime: '19:00:00',
        themeSystem: 'bootstrap',
        bootstrapFontAwesome: false,
        buttonText: {
          today: 'Today',
          month: 'Month',
          week: 'Week',
          day: 'Day',
          list: 'List',
          prev: 'Prev',
          next: 'Next'
        },
        initialView: 'dayGridMonth',
        handleWindowResize: true,
        height: $(window).height() - 200,
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        },
        initialEvents: defaultEvents,
        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar !!!
        // dayMaxEventRows: false, // allow "more" link when too many events
        selectable: true,
        dateClick: function (info) { $this.onSelect(info); },
        eventClick: function (info) { $this.onEventClick(info); }
      });

      $this.$calendarObj.render();

      // on new event button click
      $this.$btnNewEvent.on('click', function (e) {
        $this.onSelect({ date: new Date(), allDay: true });
      });

      // save event
      $this.$formEvent.on('submit', function (e) {
        e.preventDefault();
        var form = $this.$formEvent[0];

        // validation
        if (form.checkValidity()) {
          if ($this.$selectedEvent) {
            $this.$selectedEvent.setProp('title', $("#event-title").val());
            $this.$selectedEvent.setProp('classNames', [$("#event-category").val()]);
          } else {
            var eventData = {
              title: $("#event-title").val(),
              start: $this.$newEventData.date,
              allDay: $this.$newEventData.allDay,
              className: $("#event-category").val()
            }
            $this.$calendarObj.addEvent(eventData);
          }
          $this.$modal.hide();
        } else {
          e.stopPropagation();
          form.classList.add('was-validated');
        }
      });

      // delete event
      $($this.$btnDeleteEvent.on('click', function (e) {
        if ($this.$selectedEvent) {
          $this.$selectedEvent.remove();
          $this.$selectedEvent = null;
          $this.$modal.hide();
        }
      }));
    },

    //init CalendarApp
    $.CalendarApp = new CalendarApp, $.CalendarApp.Constructor = CalendarApp

}(window.jQuery),

  //initializing CalendarApp
  function ($) {
    "use strict";
    $.CalendarApp.init()
  }(window.jQuery);
