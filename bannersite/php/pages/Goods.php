<?php $this->addContent("head"); ?>
<?php $this->addContent("header"); ?>
<div id="content">
    <div id="mainContent">

        <h1>Goods</h1>
        <h2>Special offers:</h2>
        <img class="itemImage" src="images/item1.jpg" alt="bike" width="250" height="150" />
        <div id="itemDesc">
            <h3>Caterham Bike</h3>
            <p>SLike its road-car business – and its back marker Formula One team – Caterham has no ambition to
                challenge the established Japanese and Italian motorcycle brands, but says it will offer a unique
                alternative for those looking for something a little out of the ordinary.</p>
            <p class="price">$1890.99</p>
        </div>
        <p class="clear" />
        <img class="itemImage" src="images/item2.jpg" alt="bike" width="250" height="150" />
        <div id="itemDesc">
            <h3>Mercedes Surfboard</h3>
            <p>The mercedes-benz design studio have just delivered their latest surfboard made entirely of
                portuguese cork to hawaiian big-wave surfer garrett mcnamara.</p>
            <p class="price">$500</p>
        </div>

    </div> <!-- mainContent -->

    <div id="sideBar">
        <?php $this->addContent("iframe"); ?>
    </div>
    <p class="clear" />
</div> <!-- content -->

<?php $this->addContent("footer"); ?>
