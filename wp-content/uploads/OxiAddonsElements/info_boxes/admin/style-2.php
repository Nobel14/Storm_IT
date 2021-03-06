<?php
if (!defined('ABSPATH'))
    exit;
oxi_addons_user_capabilities();
global $wpdb;
$oxitype = sanitize_text_field($_GET['oxitype']);
$oxiid = (int) $_GET['styleid'];
$table_name = $wpdb->prefix . 'oxi_div_style';
$table_list = $wpdb->prefix . 'oxi_div_list';


if (!empty($_REQUEST['_wpnonce'])) {
    $nonce = $_REQUEST['_wpnonce'];
}
$listid = '';
$listitemdata = array("", "", "", "", "", "", "", "");
if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'OxiAddInfoBanner-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = '' . OxiAddonsADMHelpItemPerRowsSanitize('OxiAddIconBoxes-par-rows') . ''
                . 'OxiAddInfo-box-BG|' . sanitize_text_field($_POST['OxiAddInfo-box-BG']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddInfo-box-padding') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddInfo-box-margin') . ''
                . '' . oxi_addons_adm_help_single_size('OxiAddInfo-box-icon-size') . ''
                . 'OxiAddInfo-box-icon-color|' . sanitize_hex_color($_POST['OxiAddInfo-box-icon-color']) . '|'
                . 'OxiAddInfo-box-icon-BG-color|' . sanitize_hex_color($_POST['OxiAddInfo-box-icon-BG-color']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddInfo-box-icon-weight') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddInfo-box-icon-border-radius') . ''
                . 'OxiAddInfo-box-icon-position|' . sanitize_text_field($_POST['OxiAddInfo-box-icon-position']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddInfo-box-icon-padding') . ''
                . 'OxiAddInfo-box-icon-hover-color|' . sanitize_hex_color($_POST['OxiAddInfo-box-icon-hover-color']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddInfo-box-icon-hover-border-radius') . ''
                . 'OxiAddInfo-box-icon-BG-hover-color|' . sanitize_hex_color($_POST['OxiAddInfo-box-icon-BG-hover-color']) . '|'
                . '' . oxi_addons_adm_help_single_size('OxiAddInfo-box-heading-size') . ''
                . ' OxiAddInfo-box-heading-color|' . sanitize_hex_color($_POST['OxiAddInfo-box-heading-color']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddInfo-box-heading') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddInfo-box-heading-padding') . ''
                . '' . oxi_addons_adm_help_single_size('OxiAddInfo-box-content-size') . ''
                . ' OxiAddInfo-box-content-color|' . sanitize_hex_color($_POST['OxiAddInfo-box-content-color']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddInfo-box-content') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddInfo-box-content-padding') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddInfo-box-animation') . ''
                . 'oxi-addons-preview-BG|' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . '|||||||||';

        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}


if (!empty($_POST['OxiAddonsListFile']) && $_POST['OxiAddonsListFile'] == 'Submit') {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListData-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $oxilistid = (int) $_POST['oxilistid'];
        $data = ' OxiAddInfoBanner-heading-text ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddInfoBanner-heading-text']) . '||#||'
                . 'OxiAddInfoBanner-content ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddInfoBanner-content']) . '||#||'
                . 'OxiAddInfoBanner-i-class ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddInfoBanner-i-class']) . '||#||'
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
        $item_id = (int) $_POST['oxi-item-id'];
        $wpdb->query($wpdb->prepare("DELETE FROM {$table_list} WHERE id = %d ", $item_id));
    }
}
if (!empty($_POST['OxiAddonsListFileEditdata']) && is_numeric($_POST['oxi-item-id'])) {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListFileEdit' . $oxitype . 'data')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $item_id = (int) $_POST['oxi-item-id'];
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
//echo '<pre>';
//print_r($styledata);
//echo '</pre>';
?>
<div class="wrap">    
    <?php echo OxiAddonsAdmAdminMenu($oxitype, '', '', 'yes'); ?>
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
                                        <div class="oxi-head">
                                            Info Box Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMHelpItemPerRows('OxiAddIconBoxes-par-rows', $styledata, 1, 'false', '');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddInfo-box-BG', $styledata[5], 'rgba', 'Background color', 'Set info box Background Color', '', '.oxi-add-info-box' . $oxiid . ' .oxi-info-body', 'background');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddInfo-box-padding', 7, $styledata, 1, 'Padding', 'Set Your Info Box Padding', 'true', '.oxi-add-info-box-' . $oxiid . '-padding', 'padding');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddInfo-box-margin', 23, $styledata, 1, 'Margin', 'Set Your Info Box  Margin', 'true', '.oxi-add-info-box' . $oxiid . ' .oxi-info-body', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Animation
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_Animation('OxiAddInfo-box-animation', 161, $styledata, 'true', '');
                                            ?>
                                        </div>
                                    </div>                                                       
                                </div>
                                <div class="oxi-addons-col-6"> 
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Icon Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddInfo-box-icon-size', $styledata[39], $styledata[40], $styledata[41], 1, 'Font Size', 'Select Your Icon Font Size', 'true', '.oxi-add-info-box' . $oxiid . ' .oxi-info-icon', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddInfo-box-icon-color', $styledata[43], '', 'Color', 'Select Your Icon Color', 'false', '.oxi-add-info-box' . $oxiid . ' .oxi-info-icon-icons', 'color');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddInfo-box-icon-BG-color', $styledata[45], '', 'Background Color', 'Select your Icon Background Color', '', '.oxi-add-info-box' . $oxiid . ' .oxi-info-icon-icons', 'background');
                                            echo oxi_addons_adm_help_number_dtm('OxiAddInfo-box-icon-weight', $styledata[47], $styledata[48], $styledata[49], 1, 'Width & Height', 'Set your icon width', 'true', '', '');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddInfo-box-icon-border-radius', 51, $styledata, 1, 'Border Radius', 'Set Your icon Border Radius', 'true', '.oxi-add-info-box' . $oxiid . ' .oxi-info-icon-icons', 'border-radius');
                                            echo oxi_addons_adm_help_Text_Align('OxiAddInfo-box-icon-position', $styledata[67], 'Text-align', 'Select Your Icon Postion', 'true', '.oxi-add-info-box' . $oxiid . ' .oxi-info-icon', 'text-align');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddInfo-box-icon-padding', 69, $styledata, 1, 'Icon Padding', 'Set icon Padding', 'true', '.oxi-add-info-box' . $oxiid . ' .oxi-info-icon', 'padding');
                                            ?>
                                        </div>
                                        <div class="oxi-head">
                                            Icon Hover Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_MiniColor('OxiAddInfo-box-icon-hover-color', $styledata[85], '', 'Icon Hover Color', 'Select Your Icon Hover Color', 'false', '.oxi-add-info-box' . $oxiid . ' .oxi-info-body:hover .oxi-info-icon-icons', 'color');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddInfo-box-icon-hover-border-radius', 87, $styledata, 1, 'Border Radius', 'Set hover Icon  border radius ', 'true', '.oxi-add-info-box' . $oxiid . ' .oxi-info-body:hover .oxi-info-icon-icons','border-radius');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddInfo-box-icon-BG-hover-color', $styledata[103], '', 'Background Color', 'Select Your Icon Hover Background Color', 'false', '.oxi-add-info-box' . $oxiid . ' .oxi-info-body:hover .oxi-info-icon-icons', 'background');
                                            ?>
                                        </div>
                                    </div>            
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Heading Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddInfo-box-heading-size', $styledata[105], $styledata[106], $styledata[107], 1, 'Font Size', 'Select Your Heading Font Size','', '.oxi-add-info-box' . $oxiid . ' .oxi-info-title', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddInfo-box-heading-color', $styledata[109], '', 'Color', 'Select Your Heading Color', 'false', '.oxi-add-info-box' . $oxiid . ' .oxi-info-title', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddInfo-box-heading', 111, $styledata, 'true', '.oxi-add-info-box' . $oxiid . ' .oxi-info-title');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddInfo-box-heading-padding', 117, $styledata, 1, 'Padding', 'Set Your Heading Padding', 'true', '.oxi-add-info-box' . $oxiid . ' .oxi-info-title', 'padding');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Content Settings
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo oxi_addons_adm_help_number_dtm('OxiAddInfo-box-content-size', $styledata[133], $styledata[134], $styledata[135], 1, 'Font Size', 'Select Your Content Font Size', '', '.oxi-add-info-box' . $oxiid . ' .oxi-info-contetn', 'font-size');
                                            echo oxi_addons_adm_help_MiniColor('OxiAddInfo-box-content-color', $styledata[137], '', 'Text Color', 'Select Your Content Color', 'false', '.oxi-add-info-box' . $oxiid . ' .oxi-info-contetn', 'color');
                                            echo OxiAddonsADMHelpFontSettings('OxiAddInfo-box-content', 139, $styledata, 'true', '.oxi-add-info-box' . $oxiid . ' .oxi-info-contetn');
                                            echo oxi_addons_adm_help_padding_margin('OxiAddInfo-box-content-padding', 145, $styledata, 1, 'Padding', 'Set Your Content Padding', 'true', '.oxi-add-info-box' . $oxiid . ' .oxi-info-contetn', 'padding');
                                            ?>
                                        </div>
                                    </div>                                 
                                </div>
                            </div> 
                        </div>
                        <div class="oxi-addons-setting-save">
                            <?php echo oxiaddonssettingsavedtmmode(); ?>
                            <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                            <input type="hidden"  id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[165]; ?>">
                            <input type="submit" class="btn btn-success" name="data-submit" value="Save">
                            <?php wp_nonce_field("OxiAddInfoBanner-nonce") ?>
                        </div>

                    </div>

                </form>

            </div>
            <div class="oxi-addons-style-right">
                <?php
                echo oxi_addons_list_modal_open();
                echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                echo oxi_addons_shortcode_call($oxitype, $oxiid);
                echo oxi_addons_list_rearrange('Icon Boxes Rearrange', $listdata, 1, 'title');
                ?>
            </div>
            <div class="oxi-addons-style-left-preview">
                <div class="oxi-addons-style-left-preview-heading">
                    <div class="oxi-addons-style-left-preview-heading-left">
                        Preview
                    </div>
                    <div class="oxi-addons-style-left-preview-heading-right">
                        <?php echo oxi_addons_adm_help_preview_color($styledata[165]); ?>
                    </div>
                </div>
                <div class="oxi-addons-preview-data" id="oxi-addons-preview-data">
                    <?php echo oxi_info_boxes_style_2_shortcode($style, $listdata, 'admin') ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="oxi-addons-list-data-modal" >
    <form method="post">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">                    
                    <h4 class="modal-title">Data Settings</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                    echo oxi_addons_adm_help_textbox('OxiAddInfoBanner-heading-text', $listitemdata[1], 'Heading Text', 'Set your Heading text');
                    echo oxi_addons_adm_help_form_textarea('OxiAddInfoBanner-content', $listitemdata[3], 'Content', 'Write your content box short details', 'false');
                    echo oxi_addons_adm_help_textbox('OxiAddInfoBanner-i-class', $listitemdata[5], 'Icon Class', 'Set your Icon Class');
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
<script type="text/javascript">
    jQuery("#OxiAddInfo-box-icon-weight").on("change", function () {
        var value1 = jQuery(this).val();
        jQuery("<style type='text/css'> #oxi-addons-preview-data .oxi-add-info-box-<?php echo $oxiid ?> .oxi-info-icon,  #oxi-addons-preview-data .oxi-icons{height:" + value1 + "px; } </style>").appendTo("#oxi-addons-preview-data");
        jQuery("<style type='text/css'> #oxi-addons-preview-data .oxi-add-info-box-<?php echo $oxiid ?> .oxi-info-icon,  #oxi-addons-preview-data .oxi-icons{width:" + value1 + "px; } </style>").appendTo("#oxi-addons-preview-data");
    });
</script>
