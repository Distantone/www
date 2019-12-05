/* Function NYEDays()
   Purpose: Calculate the number of days between New Year's and a given date

   Variables
   CheckDay: A date object containing the given date
   XYear: The 4-digit year value of the given date
   XDay: December 31 in the year of the given date
   DayCount: The number of days between New Year's Eve and the given date
*/

function NYEDays(CheckDay) 
{
   var XYear=CheckDay.getFullYear();
   var XDay=new Date("December, 31, 2014");
   XDay.setFullYear(XYear);
   var DayCount=(XDay-CheckDay)/(1000*60*60*24);
   DayCount=Math.round(DayCount);
   return DayCount;
}

