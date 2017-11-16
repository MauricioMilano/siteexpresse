<?php
    if(strpos($_SERVER['QUERY_STRING'], 'ga_tc_settings')) {
        return;
    }

?>
<style type="text/css">
    #ga_tc_notice_get_pro .notice-dismiss:after {
        content: "<?php _e('Close'); ?>";
    }

</style>

<div class="notice notice-info is-dismissible" id="ga_tc_notice_get_pro">
    <div style="float:left" class="acp_pro_banner" onclick="acp_pro_banner_show_description();">
        <div class="acp_pro_banner_title" style="float: left">
            <?php _e( 'Google Analytics Professional&nbsp;plugin', 'analytics-code'); ?>
        </div>
        <div style="clear: both;"></div>
        <div class="acp_pro_banner_features">
            <div class="acp_pro_banner_feature">
                Statistics
            </div>
            <div class="acp_pro_banner_feature">
                Data exports
            </div>
            <div class="acp_pro_banner_feature">
                White-label reports
            </div>
            <div class="acp_pro_banner_feature">
                Analytics
            </div>
        </div>
    </div>
<!--    <div style="float: right" class="acp_pro_banner_close">-->
<!--        <button type="button" class="notice-dismiss"><span>--><?php //_e('Close'); ?><!--</span></button>-->
<!--    </div>-->
<!---->
<!--    <div style="float: right; display: none;" class="acp_pro_banner_close2">-->
<!--        <button type="button" class="notice-dismiss notice-dismiss2"><span>--><?php //_e('Close'); ?><!--</span></button>-->
<!--    </div>-->

    <div style="clear: both;"></div>
    <div class="acp_pro_banner_buttons">
        <!--form method="post" action="<?php echo GA_TC_SERVER . '/billing/getPro';?>">
            <input type="hidden" name="user_email" value="<?php echo get_option('admin_email'); ?>">
            <input type="hidden" name="user_site" value="<?php echo home_url(); ?>">
            <input type="hidden" name="refer" value="<?php echo 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . rtrim($_SERVER['HTTP_HOST'], '/')."/" . ltrim($_SERVER['REQUEST_URI'], '/'); ?>">
            <input type="submit" style=";" class="acp_notice_get_pro_btn" value="Get PRO">
            <a  href="javascript:void(0)" onclick="acp_pro_banner_show_description()">Show details</a>
        </form-->
        <a  href="javascript:void(0)" onclick="acp_pro_banner_show_description()">Show details <img style="margin-bottom: -5px;" src="<?php echo  plugins_url('down.png', __FILE__); ?>"></a>

    </div>

    <div style="clear: both"></div>
    <div id="acp_pro_banner_list_features">
        <h2>Make available many professional things in your own Google Analytics like: data tables, line/pie charts, reports, exports of data and much more...</h2>
        <?php require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'pro_features.php'; ?>
        <div style="text-align: center; width: 100%">
            <form method="post" action="<?php echo GA_TC_SERVER . '/billing/getPro';?>">

                <input type="hidden" name="user_email" value="<?php echo get_option('admin_email'); ?>">
                <input type="hidden" name="user_site" value="<?php echo home_url(); ?>">
                <input type="hidden" name="refer" value="<?php echo 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . rtrim($_SERVER['HTTP_HOST'], '/')."/" . ltrim($_SERVER['REQUEST_URI'], '/'); ?>">
<!--                <div style="float: left">-->

                <div class="acp_pro_banner_buttons2">
                    <input type="submit" class="acp_notice_get_pro_btn" value="Get PRO" style="margin-left: 20px;">
<!--                </div>-->
<!--                <div style="text-align: left">-->
                    <a  href="javascript:void(0)" style="; margin: 20px 0px 0px 10px;" onclick="acp_pro_banner_hide_description()">Hide&nbsp;details <img style="margin-bottom: -5px;" src="<?php echo  plugins_url('up.png', __FILE__); ?>"></a>
<!--                </div>-->
                </div>
<!--                <div style="clear: both;"></div>-->
            </form>
        </div>
    </div>
</div>

<script >
    function acp_pro_banner_show_description() {
        jQuery('#acp_pro_banner_list_features').show('slow');
        jQuery('.acp_pro_banner_buttons').hide('slow');
    }

    function acp_pro_banner_hide_description() {
        jQuery('#acp_pro_banner_list_features').hide('slow');
        jQuery('.acp_pro_banner_buttons').show('slow');
    }

</script>
