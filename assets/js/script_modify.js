function call_ajax(url, content) {
    var getdata = '';
    $.ajax({
        url: url,
        data: content + "&csrf_gadget=" + hashtag,
        type: "POST",
        dataType: "html",
        async: false,
        success: function (data) {
            //    console.log(data);
            getdata = data;
        }
    });
    return getdata;
}
function call_ajax_json(url, content) {
    var getdata = '';
    $.ajax({
        url: url,
        data: content + "&csrf_gadget=" + hashtag,
        type: "POST",
        dataType: "json",
        async: false,
        success: function (data) {
            //    console.log(data);
            getdata = data;
        }
    });
    return getdata;
}