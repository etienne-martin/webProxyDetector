# Web Proxy Detector

Detect the the following web proxies with a combination of Ajax and PHP:

hidemyass.com, kproxy.com, unblockvideos.com, tubeoxy.com, hide.me, zend2.com, proxfree.com, proxylistpro.com, proxysite.com, nordvpn.com, freeyoutubeproxy.org, proxy.zalmos.com, unblock-youtube.org, youtubeproxy.org, awebproxy.com, zacebookpk.com, maddw.com, unblockytproxy.com, bestyouproxytube.com, proxy-server.co, 12345proxy.pk, mahnor.com, skydriveforstudents.com, kuvia.eu, unblockyoutube.co, youtube-proxy.net, idolproxy.com, youtubeproxy.co, proxy.move.pk, unblocktunnel.com, awhoer.net, unblocksites.co, 4everproxy.com and many more...

# Usage

1. Update the `$expectedOrigin` variable in [webProxyDetector.php](https://github.com/etienne-martin/webProxyDetector/blob/master/webProxyDetector.php) with your domain name.

2. Upload webProxyDetector.php to your web server.

3. Embed [webProxyDetector.js](https://github.com/etienne-martin/webProxyDetector/blob/master/webProxyDetector.js) in your site.

4. Call the `webProxyDetector` function like so:

```javascript
webProxyDetector({
    backend: "http://example.com/webProxyDetector.php",
    callback: function(response){
        if( response.isProxy ){
            alert("The request was proxied through", response.proxy)
        }else{
            alert("No web proxy detected")
        }	
    }
})
```
