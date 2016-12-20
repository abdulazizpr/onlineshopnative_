$('button[data-toggle=popover]').popover({ 
    html : true,
    //trigger: "click", // може да се смени
    content: function() {
      return $('#popover_content_wrapper').html();
    }
});