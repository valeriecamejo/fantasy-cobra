
function players_journey (championship, date, journey, callback) {

   res = $.get('/player/journey/' + championship + '/' + date + '/' + journey, function (data) {

     callback(data);

   }, 'json');
}
