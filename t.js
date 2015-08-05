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
        text = 'http://fwrd.in/t.php?' +
        [
          'ua='           + document.getElementById('ua').value.replace(/\s+/g, '+'),
          'utm_campaign=' + document.getElementById('campaign').value.replace(/\s+/g, '+'),
          'utm_source='   + document.getElementById('source').value.replace(/\s+/g, '+'),
          'utm_medium='   + document.getElementById('medium').value.replace(/\s+/g, '+'),
          'utm_content='  + document.getElementById('content').value.replace(/\s+/g, '+'),
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
