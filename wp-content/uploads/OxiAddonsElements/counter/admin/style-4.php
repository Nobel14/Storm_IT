<?php
if (!defined('ABSPATH'))
    exit;
oxi_addons_user_capabilities();
global $wpdb;
$oxitype = sanitize_text_field($_GET['oxitype']);
$oxiid = (int)$_GET['styleid'];
$table_name = $wpdb->prefix . 'oxi_div_style';
$table_list = $wpdb->prefix . 'oxi_div_list';

if (!empty($_REQUEST['_wpnonce'])) {
    $nonce = $_REQUEST['_wpnonce'];
}
$listitemdata = array('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
$listid = '';
if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'oxi-addons-counter-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
            . '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddonsCounter-Item-per-row') . ''
            . '' . OxiAddonsBGImageSanitize('OxiAddonsCounter-G-BG') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsCounter-G-P') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsCounter-G-M') . ''
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsCounter-Shadow') . ''
            . ' OxiAddonsCounter-duration |' . sanitize_text_field($_POST['OxiAddonsCounter-duration']) . '|'
            . ' OxiAddonsCounter-delay |' . sanitize_text_field($_POST['OxiAddonsCounter-delay']) . '|'
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsCounter-number-FS') . ''
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsCounter-number-F') . ''
            . ' OxiAddonsCounter-number-C |' . sanitize_hex_color($_POST['OxiAddonsCounter-number-C']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsCounter-number-P') . ''
            . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsCounter-title-FS') . ''
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddonsCounter-title-F') . ''
            . ' OxiAddonsCounter-title-C |' . sanitize_hex_color($_POST['OxiAddonsCounter-title-C']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsCounter-title-P') . ''
            . ' OxiAddPR-TC-Serial |' . sanitize_text_field($_POST['OxiAddPR-TC-Serial']) . '|'
            . '||#||  ||#||'
            . '|';
        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}
if (!empty($_POST['OxiAddonsListFile']) && $_POST['OxiAddonsListFile'] == 'Submit') {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListData-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $oxilistid = sanitize_textarea_field($_POST['oxilistid']);
        $data = 'OxiADDC-number||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiADDC-number']) . '||#||'
            . 'OxiADDC-title||#||' . OxiAddonsAdminUrlConvert($_POST['OxiADDC-title']) . '||#||'
            . '||#||  ||#||';
        if ($oxilistid > 0) {
            $data = sanitize_text_field($data);
            $wpdb->query($wpdb->prepare("UPDATE $table_list SET files = %s WHERE id = %d", $data, $oxilistid));
        } else {
            $data = sanitize_text_field($data);
            $wpdb->query($wpdb->prepare("INSERT INTO {$table_list} (styleid, type, files) VALUES (%d, %s, %s )", array($oxiid, 'oxi-addons', $data)));
        }
    }
}
if (!empty($_POST['OxiAddonsListFileEdit']) && is_numeric($_POST['oxi-item-id'])) {
    $nonce = $_REQUEST['_wpnonce'];
    if (!wp_verify_nonce($nonce, 'OxiAddonsListFileEdit' . $oxitype . 'data')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $item_id = (int)$_POST['oxi-item-id'];
        $data = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_list WHERE id = %d ", $item_id), ARRAY_A);
        $listitemdata = explode('||#||', $data['files']);
        $listid = $data['id'];
        echo '<script type="text/javascript"> jQuery(document).ready(function () {setTimeout(function() { jQuery("#oxi-addons-list-data-modal").modal("show")  }, 500); });</script>';
    }
}
if (!empty($_POST['OxiAddonsListFileDelete']) && is_numeric($_POST['oxi-item-id'])) {
    $nonce = $_REQUEST['_wpnonce'];
    if (!wp_verify_nonce($nonce, 'OxiAddonsListFileDelete' . $oxitype . 'data')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $item_id = (int)$_POST['oxi-item-id'];
        $wpdb->query($wpdb->prepare("DELETE FROM {$table_list} WHERE id = %d ", $item_id));
    }
}
OxiDataAdminStyleNameChange();
$style = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $oxiid), ARRAY_A);
$listdata = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_list WHERE styleid = %d ORDER by id ASC", $oxiid), ARRAY_A);
$stylefiles = explode('||#||', $style['css']);
$styledata = explode('|', $stylefiles[0]);
// echo '<pre>';
// print_r($styledata);
// echo '</pre>'
?>
<div class="wrap">
    <?php echo OxiAddonsAdmAdminMenu($oxitype, '', '', ''); ?>
    <div class="oxi-addons-wrapper">
        <div class="oxi-addons-row">
            <div class="oxi-addons-style-20-spacer"></div>
            <div class="oxi-addons-style-left">
                <form method="post" id="oxi-addons-form-submit">
                    <div class="oxi-addons-style-settings">
                        <div class="oxi-addons-tabs-wrapper">
                            <div class="oxi-addons-tabs-content-tabs" id="oxi-tabs-id-1">
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-addons-content-div">
                                            <div class="oxi-head">
                                                Counter Data Serialize
                                            </div>
                                            <div class="oxi-addons-content-div-body">
                                                <?php
                                                echo OxiAddonsADMHelpDataSerialize($styledata[109]);
                                                ?>
                                            </div>
                                        </div>
                                        <div class="oxi-head">
                                            General
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpItemPerRows('OxiAddonsCounter-Item-per-row', $styledata, 3, 'false', '.oxi-addons-admin-edit-list', 'true', '.oxi-addons-admin-edit-list');
                                            echo OxiAddonsADMHelpBGImage('OxiAddonsCounter-G-BG', $styledata, 7, 'true', '.oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-counter ', 'background');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsCounter-G-P', 11, $styledata, 1, 'Padding', 'Set Counter Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-counter ', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsCounter-G-M', 27, $styledata, 1, 'Margin', 'Set Counter Margin', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-counter-' . $oxiid . '', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddonsCounter-Shadow', 43, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . '  .oxi-addons-counter ');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-col-6">
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Counter Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number('OxiAddonsCounter-duration', $styledata[49], 0.1, 'Counter Duration', 'Counter Duration works as Second, Set how long you want to Count', 'false', '', '');
                                            echo oxi_addons_adm_help_number('OxiAddonsCounter-delay', $styledata[51], 0.01, 'Counter Delay', 'Counter Delay works for Counter deley, How long your property need to wait before Counting', 'false', '', '');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Number Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsCounter-number-FS', $styledata[53], $styledata[54], $styledata[55], '1', 'Font Size', 'Set counter Number  Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-number', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsCounter-number-C', $styledata[63], '', 'Color', 'Set counter Number  Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-number', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsCounter-number-F', 57, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-number');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsCounter-number-P', 65, $styledata, 1, 'Padding', 'Set  counter Number Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-number', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Title Setting
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddonsCounter-title-FS', $styledata[81], $styledata[82], $styledata[83], '1', 'Font Size', 'Set counter title Font Size', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-title', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddonsCounter-title-C', $styledata[91], '', 'Color', 'Set counter title Text color', 'false', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-title', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddonsCounter-title-F', 85, $styledata, 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-title');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddonsCounter-title-P', 93, $styledata, 1, 'Padding', 'Set counter title Padding', 'true', '.oxi-addons-wrapper-' . $oxiid . ' .oxi-addons-title', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="oxi-addons-setting-save">
                            <?php echo oxiaddonssettingsavedtmmode(); ?>
                            <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                            <input type="hidden" id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[1]; ?>">
                            <input type="submit" class="btn btn-primary" name="data-submit" value="Save">
                            <?php wp_nonce_field("oxi-addons-counter-nonce") ?>
                        </div>
                    </div>
                </form>
            </div>
            <div class="oxi-addons-style-right">
                <?php
                echo oxi_addons_list_modal_open();
                echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                echo oxi_addons_shortcode_call($oxitype, $oxiid);
                echo oxi_addons_list_rearrange('Counter Rearrange', $listdata, 3, 'title');
                ?>
            </div>
            <div class="oxi-addons-style-left-preview">
                <div class="oxi-addons-style-left-preview-heading">
                    <div class="oxi-addons-style-left-preview-heading-left">
                        Preview
                    </div>
                    <div class="oxi-addons-style-left-preview-heading-right">
                        <?php echo oxi_addons_adm_help_preview_color($styledata[1]); ?>
                    </div>
                </div>
                <div class="oxi-addons-preview-data" id="oxi-addons-preview-data">
                    <?php echo oxi_counter_style_4_shortcode($style, $listdata, 'admin'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="oxi-addons-list-data-modal">
    <form method="post">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Counter Settings</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                    echo oxi_addons_adm_help_modal_textbox('OxiADDC-title', $listitemdata[3], 'Title', 'Give Your Title Text, Unless make it blank');
                    echo oxi_addons_adm_help_modal_textbox('OxiADDC-number', $listitemdata[1], 'Number', 'Give Your Counter Number, Unless make it blank');
                    ?>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="oxilistid" name="oxilistid" value="<?php echo $listid; ?>">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" name="OxiAddonsListFile" id="OxiAddonsListFile" value="Submit">
                    <?php wp_nonce_field("OxiAddonsListData-nonce") ?>
                </div>
            </div>
        </div>
    </form>
</div>