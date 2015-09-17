function bit_url(url) {
  var url = url;
  var short_url;
  console.log("Long URL: " + url);
  var oauth_token = "ec4229f65d484128dc900ecf2d45bbbec552d256";
  $.get(
    'https://api-ssl.bitly.com/v3/shorten',
    { "access_token":oauth_token, "longUrl":url },
    function(v){
      short_url = v.data.url;
      console.log("Short URL: " + short_url);
      $("#genshort span").text(short_url);
      $("#genshort").show();
    },
    "jsonp"
  );
}

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
  // TODO: figure out copy-button-short
  // var copy2 = new ZeroClipboard( document.getElementById("copy-button-short") );
  // copy2.on( "ready", function( readyEvent ) {
  //   $("#copy-button-short").show();
  //   copy2.on( "aftercopy", function( event ) {
  //     event.target.style.display = "none";
  //     alert("Copied!");
  //   });
  // });

  // Form validation
  $.validate({
    onSuccess : function() {
      var text, u;
      $("#danger").hide();

      // If the URL provided matches the BASE_DOMAIN, just append utms
      if ($("#url").val().indexOf(BASE_DOMAIN) !== -1) {
        u = document.getElementById('url').value;
        u = u.match(/\/$/) ? u+'?' : u+'/?';
        text = u +
        [
          'ua='           + encodeURIComponent(document.getElementById('ua').value),
          'utm_campaign=' + encodeURIComponent(document.getElementById('campaign').value),
          'utm_source='   + encodeURIComponent(document.getElementById('source').value),
          'utm_medium='   + encodeURIComponent(document.getElementById('medium').value),
          'utm_content='  + encodeURIComponent(document.getElementById('content').value)
        ].join('&');
      } else {
        text = 'http://fwrd.in/t.php?' +
        [
          'ua='           + encodeURIComponent(document.getElementById('ua').value),
          'utm_campaign=' + encodeURIComponent(document.getElementById('campaign').value),
          'utm_source='   + encodeURIComponent(document.getElementById('source').value),
          'utm_medium='   + encodeURIComponent(document.getElementById('medium').value),
          'utm_content='  + encodeURIComponent(document.getElementById('content').value),
          'target='       + encodeURIComponent(document.getElementById('url').value)
        ].join('&');
      }
      bit_url(text);
      $("#copy-button").attr('data-clipboard-text', text);
      //$("#copy-button-short").attr('data-clipboard-text', document.getElementById("genshort").getElementsByTagName("span")[0].innerHTML );
      $("#gen span").text(text);
      $("#gen").show();
      return false;
    },

    onError : function() {
      $("#danger").show();
    }
  });
});
