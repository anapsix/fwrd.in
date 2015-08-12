<?php

$pattern = '/(facebookexternalhit|GoogleBot|Facebot|LinkedInBot|Twitterbot)/i';
$agent   = filter_input(INPUT_SERVER, 'HTTP_USER_AGENT', FILTER_SANITIZE_ENCODED);
$redir   = isset($_GET['target']) ? $_GET['target'] : 'http://fwrd.in/?hello_stranger';
if(preg_match($pattern,$agent)){
  header('Location:'.rawurldecode($redir));
  die();
}

?>
<!DOCTYPE html>
<html>
  <head>
    <title> </title>
    <meta name="robots" content="noindex, nofollow">

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      var target = document.location.href.match(/target=([^&]+)/) || [undefined, 'http://fwrd.in/?hello_stranger'];
      var ua = document.location.href.match(/ua=([^&]+)/);

      ga('create', ua[1], 'auto');
      ga('create', 'UA-66089254-1' , 'auto', {'name':'internal'}); // FWRD.in usage tracking
      ga('internal.send', 'pageview', {
        "hitCallback": function() {
         ga('send', 'pageview', {
           "hitCallback": function() {
             console.log("redirecting to " + decodeURIComponent(target[1]));
             window.location = decodeURIComponent(target[1]);
           }
         });
       }
      });
    </script>
  </head>
</html>
