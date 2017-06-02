window.listPlayerTmpl = null;

jQuery.get('/js/teams/_list_players.hbs', function (fileTmpl) {
      window.listPlayerTmpl = Handlebars.compile(fileTmpl);
}, 'html');
