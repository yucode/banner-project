<?php $this->addContent("header"); ?>
<form action="index.php" method="get" id="form_search">
    <input type="text" name="search" size="50" value="<?php if(!empty($_GET['search'])) echo $_GET['search'];?>">
    <input type="submit" value="Search">
</form>
<table id="table_banner">
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    <?php foreach($this->banners as $banner): ?>
        <tr>
            <td>
                <?php echo $banner['code'];?>
            </td>
            <td>
                <?php echo htmlspecialchars($banner['title']);?>
            </td>
            <td>
                <a href="index.php?page=Edit&id=<?php echo $banner['id'];?>"><img src="images/edit.png" width="40" height="40" alt="" ></a>
            </td>
            <td>
                <a href="index.php?page=Delete&id=<?php echo $banner['id'];?>"><img src="images/delete.png" width="40" height="40" alt=""></a>
            </td>
        </tr>
    <?php endforeach ?>
</table>
<?php if(empty($this->banners)):?>
    <p>You can add banners: </p>
    <script type="text/javascript">
        document.getElementById("table_banner").style.display = 'none';
    </script>
<?php endif?>
<a href="index.php?page=Edit"><img src="images/add.png" width="80" height="40" alt="" ></a>
<?php $this->addContent("footer"); ?>