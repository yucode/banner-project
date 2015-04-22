<iframe
    id="banner"
    src=""
    scrolling="no"
    allowtransparency="true"
    width=""
    height=""
    style="display: none;">
</iframe>
<script type="text/javascript">
    var page = '<?php echo $this->page;?>';
    var id = '<?php if(!empty($_GET['id'])) echo $_GET['id'];?>';
    checkBanner(page, id);
//    document.getElementById("banner").setAttribute("src", '../banneradmin/iframe.php?page=' + page +'&id=' + id);
//    document.getElementById("banner").setAttribute("width", 300);
//    document.getElementById("banner").setAttribute("height", 240);
//    document.getElementById("banner").setAttribute("style", "border:0; display: block;");
</script>