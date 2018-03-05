
   
    $(".events").submit(function(event) {

      /* stop form from submitting normally */
      var city = $(".city").val();
      event.preventDefault();
      $.ajax({
            url: 'https://app.ticketmaster.com/discovery/v2/events.json?apikey=ZIZsX9ksHXMNHr8CMQkaJadiQnDHuBEk&city='+city,
            type: 'GET',
            async: true,
            dataType: "json",
        success: function(data) {
            //console.log(data.events.length);
            var st = JSON.stringify(data._embedded,null,2);
            console.log(data._embedded.events);
            //console.log(data._embedded.events[0]);
             //$(".result").html('abc');
             var eventName = '';
             var ImageUrl = '';
             var EventDate = '';
             var venue = '';
            for(var i=0;i<data._embedded.events.length;i++)
            {
               
               console.log(data._embedded.events[i]);
               eventName = data._embedded.events[i].name;
               ImageUrl = data._embedded.events[i].images[0].url;
               EventDate = data._embedded.events[i].dates.start.localDate;
               venue = data._embedded.events[i].seatmap[0].url;
              console.log(eventName);
              console.log(ImageUrl);
              console.log(EventDate);
              console.log(venue)
               // $(".result").append(JSON.stringify(data._embedded.events[i],null,2));
               $(".result").append('<tr> <td cellpadding="3">'+eventName+'</td><td cellpadding="3"><img src="'+ImageUrl+'" width="200" height="200" /></td><td cellpadding="3">'+ EventDate  +'</td> </tr>' + venue);
                 $(".result").append('<br/> <br/> <br/>');
            }
//            $.each($.parseJSON(data._embedded.events), function(key,value){
//             $(".result").append(value);
//    });
            //$(".result").text(st);
        }    
        });
      
    });
        
        