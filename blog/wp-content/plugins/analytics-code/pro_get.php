<?php
    $show_description = isset($_GET['description'])
?>
<div class="ga_tc_pro_chart" style="display: table-cell;">
<div >
    <img src="<?php echo plugins_url( 'pro_charts.png', __FILE__ ); ?>" onclick="document.getElementById('acp_get_pro_btn').click();" style="margin-left:-20px; cursor: pointer; width: 900px">
    <h2 style="margin-top: 20px;"> Use Professional Google Analytics Code plugin</h2>
    <div class="slogan">Make available many professional things in your own Google Analytics like: data tables, line/pie charts,<br>reports, exports of data and much more...</div>
    <div class="info" style="width: 650px;">
        <?php if(!$show_description): ?>
            <button onclick="jQuery(this).hide(); jQuery('#acp_pro_description').show('slow'); jQuery('#acp_get_pro_btn').css('marginTop', '100px')";>Show description</button>
        <?php endif; ?>
        <div id="acp_pro_description" <?php if(!$show_description): ?>style="display: none;"<?php endif; ?>>
            <b>The following features are available in the Google Analytics PRO plugin:</b>
            <?php require dirname(__FILE__) . DIRECTORY_SEPARATOR .'pro_features.php'; ?>
        </div>
    </div>
</div>
<div>
    <form method="post" action="<?php echo GA_TC_SERVER . '/billing/getPro';?>">
        <input type="hidden" name="user_email" value="<?php echo get_option('admin_email'); ?>">
        <input type="hidden" name="user_site" value="<?php echo home_url(); ?>">
        <input type="hidden" name="refer" value="<?php echo 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . rtrim($_SERVER['HTTP_HOST'], '/')."/" . ltrim($_SERVER['REQUEST_URI'], '/'); ?>">
        <input type="submit" class="acp_get_pro_btn" id="acp_get_pro_btn" value="Get PRO">
    </form>
</div>
</div>