$(function(){
  // PEGANDO PERMISSÕES DO USUÁRIO
  var form_getUserPermissions = $("#form_getUserPermissions");
  var user_permissions = $.get(form_getUserPermissions.attr('action'));
  // PEGANDO PERMISSÕES DO USUÁRIO

  var modal_new_event = $(".new_event");
  var modal_delete_event = $(".delete_event");

  var event_day = $("#event_day");
  var end_of_the_event = $("#end_of_the_event");
  
  var form_new_event = $("#form_modal_new_event");
  var form_get_list_events = $("#form_modal_get_list_events");
  var form_update_event = $("#form_modal_update_event");
  var form_get_info = $("#form_modal_get_info");

  var form_delete_event = $("#form_modal_delete_event");
  var selecteds_targets = form_delete_event.find('#selecteds_targets');

  events = $.get(form_get_list_events.attr('action'), function(events) {
    return events;
  }).done(function(){
    var list_events = events['responseJSON'];
    // console.log(list_events);

    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      height: 650,
      locale: 'pt-br',
      plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid', 'list' ],
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },
      navLinks: true, // can click day/week names to navigate views
      selectable: true,
      selectMirror: true,
      select: function(arg) {
        if (userHasThisPermission('admin.calendar.newEvent')) {
          modal_new_event.modal('show');

          event_day.val(formatedDate(arg.start) + ' 0:0');
          end_of_the_event.val(formatedDate(arg.end, true) + ' 0:0');
        }
        // var title = prompt('Nome do evento:');
        // if (title) {
        //   calendar.addEvent({
        //     title: title,
        //     start: arg.start,
        //     end: arg.end,
        //     allDay: arg.allDay
        //   })
        // }
        calendar.unselect()
      },
      editable: true,
      eventDrop: function(info) {
        if (userHasThisPermission('admin.calendar.updateEvent')) {
          var end_of_the_event;
          var event_day = FormatDateUTC(info.event.start);

          if (info.event.end == null) {
            var end_of_the_event = null;
          } else {
            end_of_the_event = FormatDateUTC(info.event.end);
          }

          var _token = form_update_event.find("input[name='_token']").val();
          $.post(form_update_event.attr('action'), {
            _token: _token,
            id: info.event.groupId,
            event_day: event_day,
            end_of_the_event: end_of_the_event,

          }, function(data, textStatus, xhr) {
            // console.log(data);
          });
        } else {
          info.revert();
        }
        // if (!confirm("Are you sure about this change?")) {
        // }
      },
      eventLimit: true, // allow "more" link when too many events
      events: list_events,
      eventClick: function(info) {
        if (userHasThisPermission('admin.calendar.get_info')) {
          var _token = form_get_info.find("input[name='_token']").val();
          $.post(form_get_info.attr('action'), {
            _token: _token,
            id: info.event.groupId

          }, function(data, textStatus, xhr) {
            selecteds_targets.find('span').remove();

            form_delete_event.find("input[name='id']").val(data['event']['id']);
            form_delete_event.find("input[name='name']").val(data['event']['name']);
            form_delete_event.find("input[name='event_day']").val(data['event']['event_day']);
            if (data['event']['end_of_the_event'] == null) {
              form_delete_event.find("input[name='end_of_the_event']").val(data['event']['event_day']);
            } else {
              form_delete_event.find("input[name='end_of_the_event']").val(data['event']['end_of_the_event']);
            }

            $.each(data['selecteds_targets'], function(index, val) {
              selecteds_targets.append(
                "<span style='border-radius: 2px; padding: 5px 8px 5px;' class='label label-default mr-5'>"+val+"</span>"
              );
            });

            modal_delete_event.modal('show');
          });
        }

        // change the border color just for fun
        // info.el.style.borderColor = 'red';
      }
    });
    calendar.render();
  });

  


  if ($('#event_day').length > 0) {
    /* Datetimepicker Init*/
    $('#event_day').datetimepicker({
      locale: 'pt',
      useCurrent: false,
      format: 'DD-MM-YYYY H:m',
      icons:
      {
        time: "fa fa-clock-o",
        date: "fa fa-calendar",
        up: "fa fa-arrow-up",
        down: "fa fa-arrow-down"
      },
    }).on('dp.show', function() {
      if($(this).data("DateTimePicker").date() === null)
      $(this).data("DateTimePicker").date(moment());
    });     
  }
  if ($('#end_of_the_event').length > 0) {
    /* Datetimepicker Init*/
    $('#end_of_the_event').datetimepicker({
      locale: 'pt',
      useCurrent: false,
      format: 'DD-MM-YYYY H:m',
      icons:
      {
        time: "fa fa-clock-o",
        date: "fa fa-calendar",
        up: "fa fa-arrow-up",
        down: "fa fa-arrow-down"
      },
    }).on('dp.show', function() {
      if($(this).data("DateTimePicker").date() === null)
      $(this).data("DateTimePicker").date(moment());
    });     
  }

  // NOVO EVENTO
  form_new_event.on('submit', function(event) {
    event.preventDefault();

    var name = $(this).find("input[name='name']");
    var event_day = $(this).find("input[name='event_day']");
    var end_of_the_event = $(this).find("input[name='end_of_the_event']");
    var target_of_the_event_id = $(this).find("select[name='target_of_the_event_id[]']");
    var msg_error = $(this).find("#msg_error");
    var btn_save_event = $(this).find("#btn_save_event");

    btn_save_event.attr('disabled', 'true');
    var _token = $(this).find("input[name='_token']").val();
    $.post(form_new_event.attr('action'), {
      _token: _token,
      name: name.val(),
      event_day: event_day.val(),
      end_of_the_event: end_of_the_event.val(),
      target_of_the_event_id: target_of_the_event_id.val()

    }, function(data, textStatus, xhr) {
      // console.log(data);
    })
    .done(function(data){
      if (data == 'false') {
        ShowAndHideMsgError();
        searchInputInvalid()
      } else {
        location.reload();
      }
    })
    .always(function(){
      setTimeout(function(){
        btn_save_event.removeAttr('disabled');
      }, 500)
    });


    function ShowAndHideMsgError()
    {
      msg_error.css('visibility', 'visible');
      setTimeout(function(){
        msg_error.css('visibility', 'hidden');
      }, 2500);
    }

    function searchInputInvalid()
    {
      if (name.val().length == 0) {
        name.css('border', 'solid 1px red');
      } else {
        name.css('border', 'solid 1px #dedede');
      }
      if (target_of_the_event_id.val() == null) {
        target_of_the_event_id.prevAll('button').css('border', 'solid 1px red');
      } else {
        target_of_the_event_id.prevAll('button').css('border', 'solid 1px #dedede');
      }
    }
  });

  // RESET MODAL
  modal_new_event.on('hide.bs.modal', function(event) {
    var name = $(this).find("input[name='name']");
    var target_of_the_event_id = $(this).find("select[name='target_of_the_event_id[]']");

    name.val('');

    name.css('border', 'solid 1px #dedede');
    target_of_the_event_id.prevAll('button').css('border', 'solid 1px #dedede');
    target_of_the_event_id.val('default');
    target_of_the_event_id.selectpicker("refresh");
  });

  function formatedDate(date, end)
  {
    if (end == true) {
      dia  = (date.getDate() - 1).toString();
    } else {
      dia  = date.getDate().toString();
    }
    diaF = (dia.length == 1) ? '0'+dia : dia,
    mes  = (date.getMonth()+1).toString(), //+1 pois no getMonth Janeiro começa com zero.
    mesF = (mes.length == 1) ? '0'+mes : mes,
    anoF = date.getFullYear();

    return diaF+"-"+mesF+"-"+anoF;
  }

  function FormatDateUTC(date)
  {
    date_f = date.getUTCFullYear();
    date_f += ((date.getUTCMonth() + 1).toString().length > 1)
       ? "-"+(date.getUTCMonth() + 1) 
       : "-0"+(date.getUTCMonth() + 1);
    date_f += (date.getUTCDate().toString().length > 1) 
      ? "-"+date.getUTCDate() 
      : "-0"+date.getUTCDate();
    date_f += ((date.getUTCHours() - 3).toString().length > 1)
      ? " "+(date.getUTCHours() - 3)
      : " 0"+(date.getUTCHours() - 3);
    date_f += (date.getUTCMinutes().toString().length > 1)
      ? ":"+date.getUTCMinutes()
      : ":0"+date.getUTCMinutes();

    return date_f;
  }

  function userHasThisPermission(route)
  {
    if ($.inArray(route, user_permissions['responseJSON']) != -1) {
      return true;
    } else {
      return false;
    }
  }
});
