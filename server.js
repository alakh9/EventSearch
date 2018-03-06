$(document).ready(function() {
    //alert($(".city").val());
   var table = $('#events').DataTable();
    table.clear();
       $(".city").val('');
     if($.cookie('city'))
     {
         
          $.ajax({
            url: 'https://app.ticketmaster.com/discovery/v2/events.json?apikey=ZIZsX9ksHXMNHr8CMQkaJadiQnDHuBEk&city='+$.cookie('city'),
            type: 'GET',
            async: true,
            dataType: "json",
            success: function(data) {
            //console.log(data.events.length);
            var st = JSON.stringify(data._embedded,null,2);
            //console.log(data._embedded.events);
            console.log(data._embedded.events[0]);
             //$(".result").html('abc');
             var eventName = '';
             var ticketurl = '';
             var EventDate = '';
             var saveEvent = '';
            for(var i=0;i<data._embedded.events.length;i++)
            {
               
               console.log(data._embedded.events[i]);
               eventName = data._embedded.events[i].name;
               ticketurl = "<a target='_blank' href='"+data._embedded.events[i].url+"'> Get Ticket </a>";
               EventDate = data._embedded.events[i].dates.start.localDate;
               saveEvent = "<a href='saveevent.php?ename="+eventName+"&url="+data._embedded.events[i].url+"&date="+EventDate+"'> Save </a>";
              console.log(eventName);
              console.log(ticketurl);
              console.log(EventDate);
              table.row.add( [ eventName, ticketurl, EventDate,saveEvent ] ).draw().node();
               // $(".tableresut").append(JSON.stringify(data._embedded.events[i],null,2));
               //$(".tableresut").append('<tr> <td cellpadding="3">'+eventName+'</td><td cellpadding="3"><img src="'+ImageUrl+'" width="200" height="200" /></td><td cellpadding="3">'+ EventDate  +'</td> </tr>');
               //  $(".tableresut").append('<br/> <br/> <br/>');
            }
//            $.each($.parseJSON(data._embedded.events), function(key,value){
//             $(".result").append(value);
//    });
            //$(".result").text(st);
        }    
        });
         
     }

   
    $(".events").submit(function(event) {
        //alert($(".city").val());
      /* stop form from submitting normally */
      var city = $(".city").val();
      table.clear();
       $.cookie('city', city); // var city = 'mumbzi'

      event.preventDefault();
      
      $.ajax({
            url: 'https://app.ticketmaster.com/discovery/v2/events.json?apikey=ZIZsX9ksHXMNHr8CMQkaJadiQnDHuBEk&city='+city,
            type: 'GET',
            async: true,
            dataType: "json",
            success: function(data) {
            //console.log(data.events.length);
            var st = JSON.stringify(data._embedded,null,2);
            //console.log(data._embedded.events);
            console.log(data._embedded.events[0]);
             //$(".result").html('abc');
             var eventName = '';
             var ticketurl = '';
             var EventDate = '';
             var saveEvent = '';
            for(var i=0;i<data._embedded.events.length;i++)
            {
               
               console.log(data._embedded.events[i]);
               eventName = data._embedded.events[i].name;
               ticketurl = "<a target='_blank' href='"+data._embedded.events[i].url+"'> Get Ticket </a>";
               EventDate = data._embedded.events[i].dates.start.localDate;
               saveEvent = "<a href='saveevent.php?ename="+eventName+"&url="+data._embedded.events[i].url+"&date="+EventDate+"'> Save </a>";
              console.log(eventName);
              console.log(ticketurl);
              console.log(EventDate);
              table.row.add( [ eventName, ticketurl, EventDate,saveEvent ] ).draw().node();
               // $(".tableresut").append(JSON.stringify(data._embedded.events[i],null,2));
               //$(".tableresut").append('<tr> <td cellpadding="3">'+eventName+'</td><td cellpadding="3"><img src="'+ImageUrl+'" width="200" height="200" /></td><td cellpadding="3">'+ EventDate  +'</td> </tr>');
               //  $(".tableresut").append('<br/> <br/> <br/>');
            }
//            $.each($.parseJSON(data._embedded.events), function(key,value){
//             $(".result").append(value);
//    });
            //$(".result").text(st);
        }    
        });
      
    });
        
  } );      