var protocol        = location.protocol;
var URLdomain       = window.location.host;
var url             = protocol + "//" + URLdomain;
jQuery.noConflict();
jQuery.ajax({
  url: url + "/competition-details",
  type: "GET",
  async: true,
  success: function (data) {
    var competition_data     = jQuery.parseJSON(data);
    competition_data.date_now = moment().format('YYYY-MM-DD HH');
    competition_data.date_ymd = moment().format('YYYY-MM-DD');
    competition_data.date_competition = moment(competition_data.date).format('YYYY-MM-DD HH');
    competitions_app.competition_details = competition_data;
    console.info(competitions_app);
  }
});