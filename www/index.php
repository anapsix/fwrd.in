<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="robots" content="noindex, nofollow">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FWRD.in URL Generator</title>
    <link data-cfasync="false" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link data-cfasync="false" href="style.css" rel="stylesheet">
    <script data-cfasync="false" type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link href='//fonts.googleapis.com/css?family=Raleway:200,300,400,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-66089254-1', 'auto');
      ga('send', 'pageview');
    </script>
    <script>
    <?php
      writeToJavascript('BASE_DOMAIN',            BASE_DOMAIN);
      writeToJavascript('GA_TRACKING_ID',         GA_TRACKING_ID);
      writeToJavascript('ENABLE_BITLY_TRACKING',  ENABLE_BITLY_TRACKING);
    ?>
    </script>
  </head>
  <body>
    <a href="https://github.com/anapsix/fwrd.in"><img style="position: absolute; top: 0; right: 0; border: 0; z-index:100" src="https://camo.githubusercontent.com/a6677b08c955af8400f44c6298f40e7d19cc5b2d/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f677261795f3664366436642e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_gray_6d6d6d.png"></a>
    <div class="container">
      <div class="row">
        <div class="col-xs-12" id="header"><h3>FWRD.in <span>URL Generator</span></h3></div>
      </div>
      <div class="row">
        <!-- Form Controls -->
        <div class="col-md-6">
          <form id="form">
            <div class="form-group has-feedback">
              <label>Google Analytics Property ID</label>
              <input class="form-control" name="ua" type="text" id="ua" placeholder="e.g. UA-12345678-1" required autofocus="true" data-validation="custom" data-validation-regexp="^(UA-[0-9-]+)$" data-validation-error-msg="That doesn't appear to be a valid UA">
              <div class="form-control-feedback" aria-hidden="true">
                <div class="feedback-left"></div>
                <div class="feedback-right"></div>
              </div>
            </div>
            <div class="form-group has-feedback">
              <label>External Site URL</label>
              <input data-validation="url" class="form-control" name="url" type="text" id="url" placeholder="e.g. http://www.forbes.com/article-title" required autofocus="true" data-validation-error-msg="That doesn't appear to be a valid URL">
              <div class="form-control-feedback" aria-hidden="true">
                <div class="feedback-left"></div>
                <div class="feedback-right"></div>
              </div>
            </div>
            <div class="form-group has-feedback">
              <label>Campaign Name (utm_campaign)</label>
              <input class="form-control" name="campaign" type="text" id="campaign" placeholder="e.g. Awesome Promo Bonanza" required data-validation="custom" data-validation-regexp="^([a-z0-9A-Z ]+)$" data-validation-error-msg="Please only use letters, numbers and spaces.">
              <div class="form-control-feedback" aria-hidden="true">
                <div class="feedback-left"></div>
                <div class="feedback-right"></div>
              </div>
            </div>
            <div class="form-group has-feedback">
              <label>Source (utm_source)</label>
              <input class="form-control" name="source" type="text" id="source" placeholder="e.g. Facebook" required data-validation="custom" data-validation-regexp="^([a-z0-9A-Z ]+)$" data-validation-error-msg="Please only use letters, numbers and spaces.">
              <div class="form-control-feedback" aria-hidden="true">
                <div class="feedback-left"></div>
                <div class="feedback-right"></div>
              </div>
            </div>
            <div class="form-group has-feedback">
              <label>Medium (utm_medium)</label>
              <input class="form-control" name="medium" type="text" id="medium" placeholder='e.g. cpc (note: use "first" to attribute any conversion to this campaign/source' required data-validation="custom" data-validation-regexp="^([a-z0-9A-Z ]+)$" data-validation-error-msg="Please only use letters, numbers and spaces.">
              <div class="form-control-feedback" aria-hidden="true">
                <div class="feedback-left"></div>
                <div class="feedback-right"></div>
              </div>
            </div>
            <div class="form-group has-feedback">
              <label>Content / Ad ID (utm_content)</label>
              <input class="form-control" name="content" type="text" id="content" placeholder="e.g. ad20150222a" data-validation-optional="true" data-validation="custom" data-validation-regexp="^([a-z0-9A-Z ]+)$" data-validation-error-msg="Please only use letters, numbers and spaces.">
              <div class="form-control-feedback" aria-hidden="true">
                <div class="feedback-left"></div>
                <div class="feedback-right"></div>
              </div>
            </div>
            <br/>
            <button class="btn btn-mine" id="submit">Create Link</button>
          </form>
        </div>

        <!-- Helper text -->
        <div class="col-md-6 helper-text">
          <br/>
          <p>Use this tool to create tracked links to your site's pages as well as external content pages, such as articles about your product/site.</p>
          <p>This link can be shortened after it's created, through Bit.ly, Po.st or other link tracking/shortening services.</p>
          <br/>
          <div id="break-header">
            <div class="left-break"></div>
            <div class="center-break"><span class="bh1">Naming</span> <span class="bh2">Conventions</span></div>
            <div class="right-break"></div>
          </div>
            <table class="table table-condensed">
            <tr>
              <td><strong>GA Property ID</strong></td>
              <td>Google's UA code, identifying your property in Google Analytics.</td>
            </tr>
            <tr>
              <td><strong>External Site URL</strong></td>
              <td>Any URL, including protocol. For example, "http://google.com" or "https://google.com".</td>
            </tr>
            <tr>
              <td><strong>Campaign Name</strong></td>
              <td>This should be a thematic grouping or marketing initiative. For example, an initiative driving traffic to a calculator landing page may be called "blog takeover" across sources.</td>
            </tr>
            <tr>
              <td><strong>Source</strong></td>
              <td>The inventory source for the media. For example, Facebook, Taboola or Twitter.</td>
            </tr>
            <tr>
              <td><strong>Medium</strong></td>
              <td>The inventory source or type. For example, Facebook, MoPub or email.</td>
            </tr>
            <tr>
              <td><strong>Content / Ad ID</strong></td>
              <td>A unique identifier for this ad/creative. Creative assets should be stored internally under the same name.</td>
            </tr>
          </table>
        </div>
        <div class="col-xs-12">
          <br/>
          <div class="alert-info alert" id="gen">
            <span></span>
            <div id="copy-button" title="Copy">Copy</div>
          </div>
          <div class="alert-info alert" id="genshort">
            <span></span>
            <div id="copy-button-short" title="Copy">Copy</div>
          </div>
          <div class="alert alert-danger" id="danger">
            <span class="fa-stack fa-lg">
              <i class="fa fa-circle-o fa-stack-2x"></i>
              <i class="fa fa-times fa-stack-1x"></i>
            </span>
            &nbsp;<strong>ERROR:</strong>&nbsp; Please be sure to complete the form correctly.</div>
          </div>
        </div>
      </div>
    </div>

    <script data-cfasync="false" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.1.47/jquery.form-validator.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/zeroclipboard/2.2.0/ZeroClipboard.min.js"></script>
    <script data-cfasync="false" src="t.js"></script>
  </body>
</html>
