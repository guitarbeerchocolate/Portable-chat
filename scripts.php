<script>
(function()
{
  $('input:text:visible:first').focus();
  
  $('form').submit(function()
  {
    thisForm = $(this);
    thisName = thisForm.find('#myname');
    thisMessage = thisForm.find('#mymessage');
    thisForm.hide();
    $('img').show();
    tinyMCE.triggerSave(true, true);
    $.post('httphandler.class.php',
    {
      method:'saveMessage',
      myname:thisName.val(),
      mymessage:thisMessage.val()
    }, function(data)
    {
      $('img').hide(),
      thisForm.show(),      
      $(data).hide().prependTo("#entries").slideDown(1500);
      tinyMCE.activeEditor.setContent(''),
      tinyMCE.activeEditor.focus()
    });
    return false;
  });
})();
</script>