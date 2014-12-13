/* ===========================================================
 * jQuery script for Dropper Skin Custom Inputs
 * =========================================================== */
!function($) {

  $(function() {

      ////////////////////////
      // CHECKBOX
      ////////////////////////
      var checkboxIconChecked = "icon-ok"
      $('.checkbox').each(function() {
        var $this = $(this),
            checkbox = $this.children('input:checkbox'),
            overlay = $('<span class="ctrl-overlay"/>').appendTo($this);
        
        if(checkbox[0].checked) {
          if(!checkbox[0].disabled)
            $this.addClass('checked')
          overlay.addClass(checkboxIconChecked)
        }
      })
      
      $('.checkbox').on('click',function() {
        var $this = $(this), 
            input = $this.children('input:checkbox'),
            overlay = $this.children('.ctrl-overlay');
        
        if(input[0].disabled) return;

        $this[input[0].checked ? 'addClass' : 'removeClass']('checked')
        overlay[input[0].checked ? 'addClass' : 'removeClass'](checkboxIconChecked)
        
      })

      ////////////////////////
      // RADIO
      ////////////////////////
      var radioIconChecked = "icon-circle-blank",
          radioIconUnchecked = "icon-circle";
      $('.radio').each(function() {
        var $this = $(this),
            radio = $this.children('input:radio'),
            overlay = $('<span class="ctrl-overlay"/>').appendTo($this);
        
        overlay.addClass('icon-circle')

        if(radio[0].checked) {
          if(!radio[0].disabled)
            $this.addClass('checked')
          overlay.addClass(radioIconChecked).removeClass(radioIconUnchecked)
        }
      })
      
      $('.radio').on('click',function() {
        var $this = $(this), 
            radio = $this.children('input:radio'),
            overlay = $this.children('.ctrl-overlay');

        if(radio[0].disabled) return;

        $('input:radio[name='+radio.attr('name')+']')
          .not(':disabled')
          .siblings('.ctrl-overlay').removeClass(radioIconChecked).addClass(radioIconUnchecked)
          .parent().removeClass('checked');

        
        if(radio[0].checked) {
          $this.addClass('checked')
          overlay.removeClass(radioIconUnchecked).addClass(radioIconChecked)
        }
        
      })


      ////////////////////////
      // SELECT TO DROPDOWN
      ////////////////////////

      $('select[data-toggle="dropdown-select"]').each(function() {
        var $this = $(this), $btn, elements, btnStyle = '';
        
        $this.hide();

        // convert options into li
        // saves option value intro a.rel attribute
        elements = $this.find('option').map(function() {
            return $('<li><a href="#" rel="'+$(this).attr('value')+'">' + $(this).text() + '</a></li>').get(0)
        })

        // add buttons styles
        btnStyle += $this.data('size') ? ' btn-' + $this.data('size') : '';
        btnStyle += $this.data('style') ? ' btn-' + $this.data('style') : '';

        // build required markup for dropdown buttons
        $btn = $('<div class="btn-group"/>').append(
            $('<button class="btn dropdown-toggle dropdown-select' + btnStyle + '" data-toggle="dropdown">' + $this.find('option:first').text() +' <span class="caret"></span></button>')
          ).append(
            $('<ul class="dropdown-menu"/>').append(elements)
          ).appendTo($this.parent()).find('.dropdown-select');

        // replicate custom width
        $btn.width($this.width());
        // bind click event and update text
        $btn.siblings('.dropdown-menu').on('click', 'li > a', function(e) {
            e.preventDefault();
            $btn.contents().filter(function(){ 
              return this.nodeType === 3; 
            })[0].nodeValue = $(this).text() + " ";
            // replicate into select so we can use it later on form submit
            $this.val($(this).attr('rel')).change()
        })

      })

  });

}(window.jQuery);
