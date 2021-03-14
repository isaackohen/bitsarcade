$.on('/gamelist', function() {
   

       // $('.slots_small_poster').Lazy();

        $('.img-small-slots').lazy({
            effect: 'fadeIn',
            effectTime: '50',
            visibleOnly: true
        });



  $('#gamelist-search').keydown(function(){
 
   // Search text
   var text = $(this).val().toLowerCase();
 
   // Hide all content class element
   $('.slots_small_poster').hide();

   $('.img-small-slots').lazy({
          bind: "event"
        });

   // Search 
   $('.slots_small_poster').each(function(){
 
    if($(this).text().toLowerCase().indexOf(""+text+"") != -1 ){
     $(this).closest('.slots_small_poster').show();
    }
  });
 });




}, ['/css/pages/gamelist.css']);
