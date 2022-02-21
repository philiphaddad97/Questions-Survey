var ajaxurl = window.location.href;

var user = Math.random().toString(36).substring(2, 5) + Math.random().toString(36).substring(2, 5);


if(ajaxurl.includes("http://localhost/survey/public/")){
    ajaxurl = 'http://localhost/survey/public/';
} else if (ajaxurl.includes("127.0.0.1:8000")){
    ajaxurl = "http://127.0.0.1:8000/";
} else {
    alert("please manually check the ajax url, something went wrong!");
}


function route(url) {
    window.location = url;
    return;
}
