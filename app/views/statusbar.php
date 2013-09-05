<?php
/**
 * An element that renders the Sledgehammer statusbar.
 *
 * @param bool $placeholder  true:Render a placeholder <div> with the same height as the statusbar.
 */
$hideStatusbar = (Sledgehammer\ENVIRONMENT !== 'development');
if (isset($_GET['debug'])) {
  $hideStatusbar = !$_GET['debug'];
}
if ($hideStatusbar) {
  return;
}

echo '<link rel="stylesheet" href="'.asset('/core/css/debug.css').'">';
$placeholder = isset($placeholder) ? $placeholder : true;
if ($placeholder) {
  echo "<div class=\"statusbar-placeholder\"></div>";
}
?>
<div class="statusbar" id="statusbar">
  <a href="javascript:document.getElementById('statusbar').style.display='none';return false" class="statusbar-close">&times;</a>
  <?php Sledgehammer\statusbar(); ?><span class="statusbar-divider">, </span><span id="statusbar-debugr" class="statusbar-tab"><a href="http://debugr.net/" target="_blank">debugR</a></span>
  <script type="text/javascript">
  (function () {
    if (!window.addEventListener) { // IE lt 9
      return;
    }

    var counter = 0;
    window.addEventListener('message', function (e) {
      if (e.data.debugR && e.data.label === 'sledgehammer-statusbar') {
        counter++;
        var statusbar = document.getElementById('statusbar-debugr');
        if (counter === 1) {
          statusbar.innerHTML= '<span>Ajax: <b id="statusbar-debugr-count"></b> requests<div id="statusbar-debugr-popout" class="statusbar-popout"></div></span>';
        }
        document.getElementById('statusbar-debugr-count').innerHTML = counter;
        var popout = document.getElementById('statusbar-debugr-popout');
        var div = document.createElement('div');
        var filename = e.data.url.replace(/^.*[\/\\]/g, '');
        if (filename.length > 20) {
          filename = filename.substr(0, 19) + '&hellip;';
        }
        div.innerHTML = '<b>' + filename  + '</b> ' + e.data.message;
        popout.appendChild(div);
      }
  }, false);
  document.documentElement.setAttribute('data-debugR', 'active'); // Signal the extension that the eventlistener is active.
  })();
  </script>
</div>