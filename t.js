$(function(){

  // Copy button functionality
  var copy = new ZeroClipboard( document.getElementById("copy-button") );
  copy.on( "ready", function( readyEvent ) {
    $("#copy-button").show();
    copy.on( "aftercopy", function( event ) {
      event.target.style.display = "none";
      alert("Copied!");
    });
  });

  // Form validation
  $.validate({
    onSuccess : function() {
      var text, u;
      $("#danger").hide();
      // If it IS a FWRD.in URL, just add utm params.
      if ($("#url").val().indexOf('://fwrd.in') !== -1) {
        u = document.getElementById('url').value;
        u = u.match(/\/$/) ? u+'?' : u+'/?';
        text = u + 
        [
          'ua='           + document.getElementById('ua').value.replace(/\s+/g, '+'),
          'utm_campaign=' + document.getElementById('campaign').value.replace(/\s+/g, '+'),
          'utm_source='   + document.getElementById('source').value.replace(/\s+/g, '+'),
          'utm_medium='   + document.getElementById('medium').value.replace(/\s+/g, '+'),
          'utm_content='  + document.getElementById('content').value.replace(/\s+/g, '+')
        ].join('&');
      } else {
        text = 'https://fwrd.in/t.php?' +
        [
          'ua='           + document.getElementById('ua').value.replace(/\s+/g, '+'),
          'utm_campaign=' + document.getElementById('campaign').value.replace(/\s+/g, '+'),
          'utm_source='   + document.getElementById('source').value.replace(/\s+/g, '+'),
          'utm_medium='   + document.getElementById('medium').value.replace(/\s+/g, '+'),
          'utm_content='  + document.getElementById('content').value.replace(/\s+/g, '+'),
          'target='       + encodeURIComponent(document.getElementById('url').value)
        ].join('&');
      }
      $("#copy-button").attr('data-clipboard-text', text);
      $("#gen span").text(text);
      $("#gen").show();
      return false;
    },

    onError : function() {
      $("#danger").show();
    }
  });
});
