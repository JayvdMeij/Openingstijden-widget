jQuery(function(){


        
            var currentdate = new Date();
            var weekday = [];
            weekday[0] = "Sunday";
            weekday[1] = "Monday";
            weekday[2] = "Tuesday";
            weekday[3] = "Wednesday";
            weekday[4] = "Thursday";
            weekday[5] = "Friday";
            weekday[6] = "Saturday";

            var currentday = weekday[currentdate.getDay()];

            var currentTimeHours = currentdate.getHours();
            currentTimeHours = currentTimeHours < 10 ? "0" + currentTimeHours : currentTimeHours;
            var currentTimeMinutes = currentdate.getMinutes();
            var timeNow = currentTimeHours + "" + currentTimeMinutes;

            var currentdayID = ".l-oh-d-" + currentday; //gets todays weekday and turns it into id
            jQuery('.l-oh').each(function(){
                jQuery(currentdayID).toggleClass("today"); //this works at hightlighting today
            });

            var openTimeSplit = jQuery(currentdayID).children(".opens").text().split(":");

            var openTimeHours = openTimeSplit[0];
            openTimeHours = openTimeHours < 10 ? "0" + openTimeHours : openTimeHours;

            var openTimeMinutes = openTimeSplit[1];
            var openTimex = openTimeSplit[0] + openTimeSplit[1];

            var closeTimeSplit = jQuery(currentdayID).children(".closes").text().split(":");

            var closeTimeHours = closeTimeSplit[0];
            closeTimeHours = closeTimeHours < 10 ? "0" + closeTimeHours : closeTimeHours;

            var closeTimeMinutes = closeTimeSplit[1];
            var closeTimex = closeTimeSplit[0] + closeTimeSplit[1];

            if (timeNow >= openTimex && timeNow <= closeTimex) {
                jQuery(".openorclosed").toggleClass("open");
            } else {
                jQuery(".openorclosed").toggleClass("closed");
            }

            if (timeNow >= openTimex && timeNow <= closeTimex) {
                jQuery(".indicator").toggleClass("open");
            } else {
                jQuery(".indicator").toggleClass("closed");
            }

});