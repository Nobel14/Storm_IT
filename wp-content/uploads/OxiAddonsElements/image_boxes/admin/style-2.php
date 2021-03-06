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
$listid = '';
$listitemdata = array("", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "");
if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'OxiAddImageBoxes-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = ' ' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddImageBoxes-rows') . ''
            . '' . oxi_addons_adm_help_single_size('OxiAddImageBoxes-width') . ''
            . '' . oxi_addons_adm_help_single_size('OxiAddImageBoxes-height') . ''
            . ' OxiAddImageBoxes-CBox-bg |' . sanitize_text_field($_POST['OxiAddImageBoxes-CBox-bg']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddImageBoxes-CBox-margin') . ''
            . '' . OxiAddonsADMBoxShadowSanitize('OxiAddImageBoxes-box-shadow') . ''
            . '' . oxi_addons_adm_help_animation_senitize('OxiAddImageBoxes-animation') . ''
            . '' . oxi_addons_adm_help_single_size('OxiAddImageBoxes-heading-size') . ''
            . ' OxiAddImageBoxes-heading-color |' . sanitize_hex_color($_POST['OxiAddImageBoxes-heading-color']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddImageBoxes-heading-FontSetings') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddImageBoxes-heading-padding') . ''
            . '' . oxi_addons_adm_help_single_size('OxiAddImageBoxes-content-size') . ''
            . ' OxiAddImageBoxes-content-color |' . sanitize_hex_color($_POST['OxiAddImageBoxes-content-color']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddImageBoxes-content-FontSettings') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddImageBoxes-content-padding') . ''
            . ' OxiAddImageBoxes-B-Tab |' . sanitize_text_field($_POST['OxiAddImageBoxes-B-Tab']) . '|'
            . '' . oxi_addons_adm_help_single_size('OxiAddImageBoxes-B-FS') . ''
            . ' OxiAddImageBoxes-B-TC |' . sanitize_hex_color($_POST['OxiAddImageBoxes-B-TC']) . '|'
            . ' OxiAddImageBoxes-B-BG |' . sanitize_text_field($_POST['OxiAddImageBoxes-B-BG']) . '|'
            . '' . OxiAddonsADMHelpBorderSizeType('OxiAddImageBoxes-B-B') . ''
            . ' OxiAddImageBoxes-B-BC |' . sanitize_text_field($_POST['OxiAddImageBoxes-B-BC']) . '|'
            . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddImageBoxes-B-F') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddImageBoxes-B-BR') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddImageBoxes-B-P') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddImageBoxes-B-M') . ''
            . ' OxiAddImageBoxes-B-HTC |' . sanitize_text_field($_POST['OxiAddImageBoxes-B-HTC']) . '|'
            . ' OxiAddImageBoxes-B-HBG |' . sanitize_text_field($_POST['OxiAddImageBoxes-B-HBG']) . '|'
            . ' OxiAddImageBoxes-B-HBC |' . sanitize_text_field($_POST['OxiAddImageBoxes-B-HBC']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddImageBoxes-B-HBR') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddImageBoxes-CBox-padding') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddImageBoxes-CBox-BR') . ''
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddImageBoxes-margin') . ''
            . 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
            . '' . OxiAddonsADMHelpBorderSizeType('OxiAddImageBoxes-G-B') . ''
            . ' OxiAddImageBoxes-G-BC |' . sanitize_text_field($_POST['OxiAddImageBoxes-G-BC']) . '|'
            . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddImageBoxes-G-BR') . ''
            . '|';
        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}
if (!empty($_POST['OxiAddonsListFile']) && $_POST['OxiAddonsListFile'] == 'Submit') {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListData-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $oxilistid = (int)$_POST['oxilistid'];
        $data = 'OxiAddImageBoxes-BG-I||#||' . OxiAddonsAdminUrlConvert($_POST['OxiAddImageBoxes-BG-I']) . '||#||'
            . 'OxiAddImageBoxes-HT||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddImageBoxes-HT']) . '||#||'
            . 'OxiAddImageBoxes-BC||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddImageBoxes-BC']) . '||#||'
            . 'OxiAddImageBoxes-BT||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddImageBoxes-BT']) . '||#||'
            . 'OxiAddImageBoxes-BT-DL||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddImageBoxes-BT-DL']) . '||#||'
            . '  ||#||  ||#||'
            . '  ||#||';
        $data = sanitize_text_field($data);
        if ($oxilistid > 0) {
            $wpdb->query($wpdb->prepare("UPDATE $table_list SET files = %s WHERE id = %d", $data, $oxilistid));
        } else {
            $wpdb->query($wpdb->prepare("INSERT INTO {$table_list} (styleid, type, files) VALUES (%d, %s, %s )", array($oxiid, 'oxi-addons', $data)));
        }
    }
}
if (!empty($_POST['OxiAddonsListFileDelete']) && is_numeric($_POST['oxi-item-id'])) {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListFileDelete' . $oxitype . 'data')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $item_id = (int)$_POST['oxi-item-id'];
        $wpdb->query($wpdb->prepare("DELETE FROM {$table_list} WHERE id = %d ", $item_id));
    }
}
if (!empty($_POST['OxiAddonsListFileEdit']) && is_numeric($_POST['oxi-item-id'])) {
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
OxiDataAdminStyleNameChange();
$style = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $oxiid), ARRAY_A);
$listdata = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_list WHERE styleid = %d ", $oxiid), ARRAY_A);
$stylefiles = explode('||#||', $style['css']);
$styledata = explode('|', $stylefiles[0]);

?>
<div class="wrap">
    <?php echo OxiAddonsAdmAdminMenu($oxitype, '', '', 'yes'); ?>
    <div class="oxi-addons-wrapper">
        <div class="oxi-addons-row">
            <div class="oxi-addons-style-20-spacer"></div>
            <div class="oxi-addons-style-left">
                <form method="post" id="oxi-addons-form-submit">
                    <div class="oxi-addons-style-settings">
                        <div class="oxi-addons-tabs-content-tabs" id="oxi-addons-tabs-id-1">
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        General Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMHelpItemPerRows('OxiAddImageBoxes-rows', $styledata, 1, 'false', '.oxi-addons-admin-edit-list');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddImageBoxes-width', $styledata[5], $styledata[6], $styledata[7], 1, 'Width', 'Set Your Image Boxes Max Width', 'true', '.oxi-addons-image-box-' . $oxiid . '', 'max-width');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddImageBoxes-height', $styledata[9], $styledata[10], $styledata[11], 1, 'Height', 'Set Your Image Boxes Max Width', 'true', '');
                                        echo oxi_addons_adm_help_border('OxiAddImageBoxes-G-B', $styledata[239], $styledata[240], 'Border', 'Set Image Boxes Border Size and Type', 'true', '.oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-image');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddImageBoxes-G-BC', $styledata[243], '', 'Border Color', 'Set Border color', 'true', '.oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-image', 'border-color');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddImageBoxes-G-BR', 245, $styledata, 1, 'Border Radius', 'Set Image Boxes Button Border Radius', 'true', '.oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-image', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddImageBoxes-margin', 221, $styledata, 1, 'Margin', 'Set Image Boxes margin', 'true', '.oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-image', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Content Box
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('OxiAddImageBoxes-CBox-bg', $styledata[13], 'rgba', 'Content Background', 'Select Your Content box Background Color', '', '.oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content', 'background');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddImageBoxes-CBox-margin', 15, $styledata, 1, 'Margin', 'Set Your Icon Padding Top Bottom and Left Right', 'true', '.oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content', 'margin');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddImageBoxes-CBox-padding', 189, $styledata, 1, 'Padding', 'Set Your Icon Padding Top Bottom and Left Right', 'true', '.oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddImageBoxes-CBox-BR', 205, $styledata, 1, 'Border Radius', 'Set Image Boxes Button Border Radius', 'true', '.oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content', 'border-radius');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddImageBoxes-box-shadow', 31, $styledata, 'true', '.oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-image');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('OxiAddImageBoxes-animation', 37, $styledata, 'true', '.oxi-addons-image-box-' . $oxiid . ' ');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Heading Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddImageBoxes-heading-size', $styledata[41], $styledata[42], $styledata[43], 1, 'Font Size', 'Select Your Heading Font Size', '', '.oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content-heading', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddImageBoxes-heading-color', $styledata[45], '', 'Color', 'Select Your Heading Color', 'true', '.oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content-heading', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddImageBoxes-heading-FontSetings', 47, $styledata, 'true', '.oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content-heading');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddImageBoxes-heading-padding', 53, $styledata, 1, 'Padding', 'Set Your Heading Padding Top Bottom and Left Right', 'true', '.oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content-heading', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Content Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddImageBoxes-content-size', $styledata[69], $styledata[70], $styledata[71], 1, 'Font Size', 'Select Your Heading Font Size', 'false', '.oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content-body', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddImageBoxes-content-color', $styledata[73], '', 'Color', 'Select Your Heading Color', 'true', '.oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content-body', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddImageBoxes-content-FontSettings', 75, $styledata, 'true', '.oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content-body');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddImageBoxes-content-padding', 81, $styledata, 1, 'Padding', 'Set Your Heading Padding Top Bottom and Left Right', 'true', '.oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content-body', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Button Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_true_false('OxiAddImageBoxes-B-Tab', $styledata[97], 'Normal', '', 'New Tab', '_blank', 'Link Opening Style', 'Link Open same tab or new tab', 'true');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddImageBoxes-B-FS', $styledata[99], $styledata[100], $styledata[101], '', 'Font Size', 'Set Image Boxes Button Font Size', 'true', '.oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content-button-data', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddImageBoxes-B-TC', $styledata[103], '', 'Text Color', 'Set Image Boxes Button Text color', 'false', '.oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content-button-data', 'color');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddImageBoxes-B-BG', $styledata[105], 'rgba', 'Background Color', 'Set Image Boxes Button background color', 'true', '.oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content-button-data', 'background');
                                        echo oxi_addons_adm_help_border('OxiAddImageBoxes-B-B', $styledata[107], $styledata[108], 'Border', 'Set Image Boxes Border Size and Type', 'true', '.oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content-button-data');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddImageBoxes-B-BC', $styledata[111], '', 'Border Color', 'Set Border color', 'true', '.oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content-button-data', 'border-color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddImageBoxes-B-F', 113, $styledata, 'true', '.oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content-button-data');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddImageBoxes-B-BR', 119, $styledata, 1, 'Border Radius', 'Set Image Boxes Button Border Radius', 'true', '.oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content-button-data', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddImageBoxes-B-P', 135, $styledata, 1, 'Padding', 'Set Image Boxes Button padding', 'true', '.oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content-button-data', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddImageBoxes-B-M', 151, $styledata, 1, 'Margin', 'Set Image Boxes Button margin', 'true', '.oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content-button-data', 'margin');
                                        ?>
                                    </div>
                                    <div class="oxi-head">
                                        Button Hover Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('OxiAddImageBoxes-B-HTC', $styledata[167], '', 'Color', 'Set Image Boxes Button Hover Text color', 'false', '.oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content-button-data:hover', 'color');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddImageBoxes-B-HBG', $styledata[169], 'rgba', 'Background', 'Set Image Boxes Button Hover Text color', 'true', '.oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content-button-data:hover', 'background');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddImageBoxes-B-HBC', $styledata[171], '', 'Border Color', 'Set Border color', 'true', '.oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content-button-data:hover', 'border-color');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddImageBoxes-B-HBR', 173, $styledata, 1, 'Border Radius', 'Set Image Boxes Button Border Radius', 'true', '.oxi-addons-image-box-' . $oxiid . ' .oxi-addons-image-content-button-data:hover', 'border-radius');
                                        ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="oxi-addons-setting-save">
                            <?php echo oxiaddonssettingsavedtmmode(); ?>
                            <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                            <input type="hidden" id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[237]; ?>">
                            <input type="submit" class="btn btn-success" name="data-submit" value="Save">
                            <?php wp_nonce_field("OxiAddImageBoxes-nonce") ?>
                        </div>
                    </div>
                </form>
            </div>
            <div class="oxi-addons-style-right">
                <?php
                echo oxi_addons_list_modal_open();
                echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                echo oxi_addons_shortcode_call($oxitype, $oxiid);
                echo oxi_addons_list_rearrange('Image Boxes Rearrange', $listdata, 3, 'title');
                ?>
            </div>
            <div class="oxi-addons-style-left-preview">
                <div class="oxi-addons-style-left-preview-heading">
                    <div class="oxi-addons-style-left-preview-heading-left">
                        Preview
                    </div>
                    <div class="oxi-addons-style-left-preview-heading-right">
                        <?php echo oxi_addons_adm_help_preview_color($styledata[237]); ?>
                    </div>
                </div>
                <div class="oxi-addons-style-left-preview" style="margin-top: 0; border-top: 0px;">
                    <div class="oxi-addons-preview-data" id="oxi-addons-preview-data">
                        <?php echo oxi_image_boxes_style_2_shortcode($style, $listdata, 'admin'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="oxi-addons-list-data-modal">
    <form method="post">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data Settings</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                    echo oxi_addons_adm_help_image_upload('OxiAddImageBoxes-BG-I', $listitemdata[1], 'Background Image', 'Set your Backgroun Image.');
                    echo oxi_addons_adm_help_textbox('OxiAddImageBoxes-HT', $listitemdata[3], 'Heading Title', 'Give Your Heading Title.');
                    echo oxi_addons_adm_help_textbox('OxiAddImageBoxes-BC', $listitemdata[5], 'Body Content', 'Give Your Body Content.');
                    echo oxi_addons_adm_help_textbox('OxiAddImageBoxes-BT', $listitemdata[7], 'Button Text', 'Give Your Button Text.');
                    echo oxi_addons_adm_help_textbox('OxiAddImageBoxes-BT-DL', $listitemdata[9], 'Desire Link', 'Set Your Desire Link If you wants, Unless make it blank.');
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