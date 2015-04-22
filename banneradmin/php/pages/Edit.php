<?php
    function getChecked($key, $value)
    {
        return ($key == $value ? "checked" : '');
    }

    function getSelected($pages, $value)
    {
        foreach ($pages as $page)
        {
            if($page['page_id'] === $value['id'])
            {
                return "selected";
            }
        }
        return '';
    }
?>
<?php $this->addContent("header"); ?>
<a href="index.php">< Back</a>
<form id="editForm" method="post" action="" name="edit" id="formBanner">

    <p>Banner title:</p>
    <input type="text" name="title" value="<?php echo htmlspecialchars($this->data['title']);?>">

    <p>HTML code:</p>
    <textarea name="code" cols="100" rows="10"><?php echo htmlspecialchars($this->data['code']);?></textarea>
    <p>Pages for display: </p>
    <select multiple size="6" name="multi[]">
        <?php foreach ($this->pages as $value) { ?>
            <option value="<?php echo $value['id']; ?>" <?php echo getSelected($this->data['pages'], $value);?>>
                <?php echo $value['url']; ?>
            </option>
        <?php } ?>
    </select>

    <p>Show/Hide the banner:</p>
    <?php foreach (array('Show'=>1, 'Hide'=>0) as $key=>$value) { ?>
        <input type="radio" <?php echo getChecked($this->data['switch'], $value); ?> name="switch" value="<?php echo $value; ?>"><?php echo $key; ?>
    <?php } ?>

    <p>Views counter:</p>
    <input type="number" min="0" name="views" value="<?php echo htmlspecialchars($this->data['views']);?>">

    <p>Start date:</p>
    <input type="datetime" name="start" value="<?php echo htmlspecialchars($this->data['start']);?>">

    <p>End date:</p>
    <input type="datetime" name="end" value="<?php echo htmlspecialchars($this->data['end']);?>">

    <p>
        <input type="submit" name="save" value="Save">
    </p>
</form>
<?php $this->addContent("footer"); ?>
