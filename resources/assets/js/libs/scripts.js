/*
 * jQuery DOM Event Handlers
 *
 * Made by Marc Zenn
 * BoojBooks Code Assesment.
 */
$(document).ready(function(){
  /*
   * Filter by Author
   * - simple filtering by author name.
   */
  $('#author-filter').on('change', function() {
      var selection = $(this).val(); // let's store our user's input selection.

      $('.book-tile').each(function(i, elem) {
        var attr = $(this).data('author');
        $(this).show(); // first make sure all books are shown.
        if(selection == 'All') {
          $(this).show()
        } else if(selection != attr) {
          $(this).hide();
        }
      });
  });


  /*
   * A quick and dirty swap() method for jQuery:
   *
   *
   * - http://blog.pengoworks.com/index.cfm/2008/9/24/A-quick-and-dirty-swap-method-for-jQuery
   *
   */
   // TODO:: persist these locations in localStorage...
  // jQuery.fn.swap = function(b){
  //   b = jQuery(b)[0];
  //   var a = this[0];
  //   var t = a.parentNode.insertBefore(document.createTextNode(''), a);
  //   b.parentNode.insertBefore(a, b);
  //   t.parentNode.insertBefore(b, t);
  //   t.parentNode.removeChild(t);
  //   return this;
  // };


  // $('.dragdrop').draggable({ revert: true, helper: "clone" });

  // $('.dragdrop').droppable({
  //   accept: ".dragdrop",
  //   activeClass: "ui-state-hover",
  //   hoverClass: "ui-state-active",
  //   drop: function( event, ui ) {
  //
  //       var draggable = ui.draggable, droppable = $(this),
  //           dragPos = draggable.position(), dropPos = droppable.position();
  //
  //       draggable.css({
  //           left: 0,
  //           top: 0
  //       });
  //
  //       droppable.css({
  //           left: 0,
  //           top: 0
  //       });
  //       draggable.swap(droppable);
  //   }
  // });

});
