# Web Proxy Detector

Detect the the following web proxies with a combination of Ajax and PHP.

hidemyass.com, kproxy.com, unblockvideos.com, tubeoxy.com, hide.me, zend2.com, proxfree.com, proxylistpro.com, proxysite.com, nordvpn.com, freeyoutubeproxy.org, proxy.zalmos.com, unblock-youtube.org, youtubeproxy.org, awebproxy.com, zacebookpk.com, maddw.com, unblockytproxy.com, bestyouproxytube.com, proxy-server.co, 12345proxy.pk, mahnor.com, skydriveforstudents.com, kuvia.eu, unblockyoutube.co, youtube-proxy.net, idolproxy.com, youtubeproxy.co, proxy.move.pk, unblocktunnel.com, awhoer.net, unblocksites.co, 4everproxy.com and many more...

### On the client

```javascript
var ajax = new XMLHttpRequest()

ajax.onreadystatechange = function(){
    if( ajax.readyState === XMLHttpRequest.DONE ){
         document.write(ajax.responseText)
    }
}

ajax.open("GET", "http://example.com/proxy.php?origin=" + window.location.origin, true)
ajax.setRequestHeader("x-client-origin", window.location.origin)
ajax.send()
```

### Back-end

```php
header('Access-Control-Allow-Origin: *');  
header("Access-Control-Allow-Headers: x-client-origin");

$expectedOrigin = "http://example.com";

$corsOrigin = isset($_SERVER["HTTP_ORIGIN"]) ? htmlspecialchars($_SERVER["HTTP_ORIGIN"]) : "";
$ajaxOrigin = isset($_SERVER["HTTP_X_CLIENT_ORIGIN"]) ? htmlspecialchars($_SERVER["HTTP_X_CLIENT_ORIGIN"]) : "";
$queryOrigin = htmlspecialchars($_GET["origin"]);

if( !empty($corsOrigin) && $corsOrigin !== $expectedOrigin ){
    die("The request was proxied through ".$corsOrigin);
}

if( $ajaxOrigin !== $expectedOrigin ){
    die("The request was proxied through ".$queryOrigin);
}

if( $queryOrigin !== $expectedOrigin ){
    die("The request was proxied through ".$queryOrigin);
}
```
