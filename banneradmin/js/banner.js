function checkBanner(page, id)
{
    var request = new XMLHttpRequest();
    var url = '../banneradmin/iframe.php?page=' + page +'&id=' + id;
    //set false to swith off the dummy banner
    var showDummy = true;

    request.open("GET", url + '&js=true' + (showDummy ? '&dummy=true' : ''));
    request.onreadystatechange = function() {
        if(request.readyState == 4)
        {
            var data = JSON.parse(request.responseText);
            if (data)
            {
                document.getElementById("banner").setAttribute("src", url);
                document.getElementById("banner").setAttribute("width", 300);
                document.getElementById("banner").setAttribute("height", 240);
                document.getElementById("banner").setAttribute("style", "border:0; display: block;");
            }
        }
    };
    request.send(null);
}