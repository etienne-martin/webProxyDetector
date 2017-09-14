window.webProxyDetector = function(object){
    var ajax = new XMLHttpRequest()

    ajax.onreadystatechange = function(){
        if( ajax.readyState === XMLHttpRequest.DONE ){
            object.callback(JSON.parse(ajax.responseText))
        }
    }

    ajax.open("GET", object.backend + "?origin=" + window.location.origin, true)
    ajax.setRequestHeader("x-client-origin", window.location.origin)
    ajax.send()
}
