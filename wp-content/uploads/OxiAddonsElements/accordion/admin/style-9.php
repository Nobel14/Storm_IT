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
$listitemdata = array('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
$listid = '';
if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'oxi-addons-accordion-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                . ' OxiAddonsAC-9-G-initial-open |' . sanitize_text_field($_POST['OxiAddonsAC-9-G-initial-open']) . '|'
                . '' . OxiAddonsBGImageSanitize('OxiAddonsAC-9-G-BG') . ''
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsAC-9-G-B') . ''
                . ' OxiAddonsAC-9-G-BC |' . sanitize_hex_color($_POST['OxiAddonsAC-9-G-BC']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAC-9-G-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAC-9-G-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAC-9-G-M') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsAC-9-G-Shadow') . ''
                . '' . oxi_addons_adm_help_animation_senitize('OxiAddonsAC-9-animation') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddons-AC-9-T-FS') . ''
                . ' OxiAddons-AC-9-T-C |' . sanitize_hex_color($_POST['OxiAddons-AC-9-T-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddons-AC-9-T2') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddons-AC-9-T-P') . ''
                . ' OxiAddons-AC-9-T-HC |' . sanitize_hex_color($_POST['OxiAddons-AC-9-T-HC']) . '|'
                . ' OxiAddonsAC-9-OI-BG |' . sanitize_text_field($_POST['OxiAddonsAC-9-OI-BG']) . '|'
                . ' OxiAddonsAC-9-OI-HBG |' . sanitize_text_field($_POST['OxiAddonsAC-9-OI-HBG']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAC-9-OI-FS') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAC-9-OI-WH') . ''
                . ' OxiAddonsAC-9-OI-C |' . sanitize_hex_color($_POST['OxiAddonsAC-9-OI-C']) . '|'
                . ' OxiAddonsAC-9-OI-HC |' . sanitize_hex_color($_POST['OxiAddonsAC-9-OI-HC']) . '|'
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsAC-9-OI-B') . ''
                . ' OxiAddonsAC-9-OI-BC |' . sanitize_hex_color($_POST['OxiAddonsAC-9-OI-BC']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAC-9-OI-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAC-9-OI-M') . ''
                . ' OxiAddonsAC-9-CI-BG |' . sanitize_text_field($_POST['OxiAddonsAC-9-CI-BG']) . '|'
                . ' OxiAddonsAC-9-CI-HBG |' . sanitize_text_field($_POST['OxiAddonsAC-9-CI-HBG']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAC-9-CI-FS') . ''
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddonsAC-9-CI-WH') . ''
                . ' OxiAddonsAC-9-CI-C |' . sanitize_hex_color($_POST['OxiAddonsAC-9-CI-C']) . '|'
                . ' ||'
                . '' . OxiAddonsADMHelpBorderSizeType('OxiAddonsAC-9-CI-B') . ''
                . ' OxiAddonsAC-9-CI-BC |' . sanitize_text_field($_POST['OxiAddonsAC-9-CI-BC']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAC-9-CI-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddonsAC-9-CI-M') . ''
                . ' OxiAddons-AC-9-D-BC |' . sanitize_text_field($_POST['OxiAddons-AC-9-D-BC']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddons-AC-9-D-FS') . ''
                . ' OxiAddons-AC-9-D-C |' . sanitize_hex_color($_POST['OxiAddons-AC-9-D-C']) . '|'
                . '' . OxiAddonsADMHelpFontSettingsSanitize('OxiAddons-AC-9-D2') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsAC-9-D-Shadow') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddons-AC-9-D-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddons-AC-9-D-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddons-AC-9-D-M') . ''
                . ' ||'
                . ' OxiAddonsAC-9-G-opening-type |' . sanitize_text_field($_POST['OxiAddonsAC-9-G-opening-type']) . '|'
                
                . ' OxiAddons-AC-9-N-BC |' . sanitize_text_field($_POST['OxiAddons-AC-9-N-BC']) . '|'
                . '' . oxi_addons_adm_help_number_dtm_senitize('OxiAddons-AC-9-N-FS') . ''
                . ' OxiAddons-AC-9-N-C |' . sanitize_hex_color($_POST['OxiAddons-AC-9-N-C']) . '|'
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddonsAC-9-N-Shadow') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddons-AC-9-N-BR') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddons-AC-9-N-P') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAddons-AC-9-N-M') . ''
                . '||#||'
                . ' OxiAddons-AC-9-OI ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddons-AC-9-OI']) . '||#|| '
                . ' OxiAddons-AC-9-CI ||#||' . OxiAddonsAdminFontAwesomeSenitize($_POST['OxiAddons-AC-9-CI']) . '||#|| '
                . ' ||#||';

        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}

if (!empty($_POST['OxiAddonsListFile']) && $_POST['OxiAddonsListFile'] == 'Submit') {
    if (!wp_verify_nonce($nonce, 'OxiAddonsListData-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $oxilistid = sanitize_textarea_field($_POST['oxilistid']);
        $data = ' ||#||OxiAddons-AC-EG ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddons-AC-EG']) . '||#|| '
                . ' OxiAddons-AC-EG-IN ||#||' . OxiAddonsADMHelpTextSenitize($_POST['OxiAddons-AC-EG-IN']) . '||#|| ';
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
        $item_id = (int) $_POST['oxi-item-id'];
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
        $item_id = (int) $_POST['oxi-item-id'];
        $wpdb->query($wpdb->prepare("DELETE FROM {$table_list} WHERE id = %d ", $item_id));
    }
}
OxiDataAdminStyleNameChange();
$style = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $oxiid), ARRAY_A);
$listdata = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_list WHERE styleid = %d ORDER BY id ASC", $oxiid), ARRAY_A);
$stylefiles = explode('||#||', $style['css']);
$styledata = explode('|', $stylefiles[0]);
?>
<div class="wrap">
     <?php echo OxiAddonsAdmAdminMenu($oxitype, '', '', ''); ?>
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
                                        Initial Opening
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsAdminInitialOpen('OxiAddonsAC-9-G-initial-open', $styledata[3], 'Initial Opening', 'Set Which Events You want to Open Initially', 'false');
                                        ?>
                                        <div class="form-group row">
                                            <label for="OxiAddonsAC-9-G-opening-type" class="col-sm-6 col-form-label" data-toggle="tooltip" data-placement="top" title="" >Opening Type</label>
                                            <div class="col-sm-6">
                                                <select class="form-control" id="OxiAddonsAC-1-G-opening-type" name="OxiAddonsAC-9-G-opening-type">
                                                    <option value="one-by-one" <?php
                                                    if ($styledata[281] == 'one-by-one') {
                                                        echo 'selected';
                                                    };
                                                    ?>>One by One</option>
                                                    <option value="randomly"    <?php
                                                    if ($styledata[281] == 'randomly') {
                                                        echo 'selected';
                                                    };
                                                    ?>>Randomly</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        General
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMHelpBGImage('OxiAddonsAC-9-G-BG', $styledata, 5, 'true', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-N-H-' . $oxiid . '', 'background');
                                        echo oxi_addons_adm_help_border('OxiAddonsAC-9-G-B', $styledata[9], $styledata[10], 'Border', 'Set your Body Border Size and Type', 'true', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-N-H-' . $oxiid . '');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAC-9-G-BC', $styledata[13], '', 'Border Color', 'Set Your Body  Border Color', 'true', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-N-H-' . $oxiid . '', 'border-color');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsAC-9-G-BR', 15, $styledata, '1', 'Border Radius', 'Set your body Border Radius', 'true', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-N-H-' . $oxiid . '', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsAC-9-G-P', 31, $styledata, '1', 'Padding', 'Set your body Padding', 'true', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-N-H-' . $oxiid . '', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsAC-9-G-M', 47, $styledata, '1', 'Margin', 'Set your body Margin', 'true', '.oxi-addons-AC-N-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>
                                </div>
                                 <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Description
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('OxiAddons-AC-9-D-BC', $styledata[211], 'rgba', 'Background', 'Set Your Description Color', 'false', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-N-C-' . $oxiid . '-b', 'background');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddons-AC-9-D-FS', $styledata[213], $styledata[214], $styledata[215], 1, 'Font Size', 'Set Your Description Font Size', 'true', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-N-C-' . $oxiid . '-b', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddons-AC-9-D-C', $styledata[217], '', 'Color', 'Set Your Date Color', 'false', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-N-C-' . $oxiid . '-b', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddons-AC-9-D2', 219, $styledata, 'true', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-N-C-' . $oxiid . '-b');
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddonsAC-9-D-Shadow', 225, $styledata, 'true', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-N-C-' . $oxiid . '-b');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddons-AC-9-D-BR', 231, $styledata, '1', 'Border Radius', 'Set your Description Padding', 'true', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-N-C-' . $oxiid . '-b', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddons-AC-9-D-P', 247, $styledata, '1', 'Padding', 'Set your Description Padding', 'true', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-N-C-' . $oxiid . '-b', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddons-AC-9-D-M', 263, $styledata, '1', 'Margin', 'Set your Description Padding', 'true', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-N-C-' . $oxiid . '', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Box Shadow
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddonsAC-9-G-Shadow', 63, $styledata, 'true', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-N-H-' . $oxiid . '');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('OxiAddonsAC-9-animation', 69, $styledata, 'true', '.oxi-addons-AC-N-' . $oxiid . '');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Number
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('OxiAddons-AC-9-N-BC', $styledata[283], 'rgba', 'Background', 'Set Your Number Color', 'false', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-number', 'background');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddons-AC-9-N-FS', $styledata[285], $styledata[186], $styledata[215], 1, 'Font Size', 'Set Your Number Font Size', 'true', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-number', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddons-AC-9-N-C', $styledata[289], '', 'Color', 'Set Your Number Color', 'false', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-number', 'color');
                                        echo OxiAddonsADMhelpBoxShadow('OxiAddonsAC-9-N-Shadow', 291, $styledata, 'true', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-number');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddons-AC-9-N-BR', 297, $styledata, '1', 'Border Radius', 'Set your Number Padding', 'true', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-number', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddons-AC-9-N-P', 313, $styledata, '1', 'Padding', 'Set your Number Padding', 'true', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-number', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddons-AC-9-N-M', 329, $styledata, '1', 'Margin', 'Set your Number Padding', 'true', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-number', 'margin');
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Title
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('OxiAddons-AC-9-T-FS', $styledata[73], $styledata[74], $styledata[75], 1, 'Font Size', 'Set Your Title Font Size', 'true', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-N-H-' . $oxiid . ' .oxi-addons-AC-N-heading-data', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddons-AC-9-T-C', $styledata[77], '', 'Color', 'Set Your Title Color', 'false', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-N-H-' . $oxiid . ' .oxi-addons-AC-N-heading-data', 'color');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddons-AC-9-T-HC', $styledata[101], '', 'Hover Color', 'Set Your Title Color', 'false', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-N-H-' . $oxiid . '.active .oxi-addons-AC-N-heading-data, .oxi-addons-ac-H-' . $oxiid . ':hover  .oxi-addons-AC-N-heading-data', 'color');
                                        echo OxiAddonsADMHelpFontSettings('OxiAddons-AC-9-T2', 79, $styledata, 'true', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-N-H-' . $oxiid . ' .oxi-addons-AC-N-heading-data');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddons-AC-9-T-P', 85, $styledata, '1', 'Padding', 'Set your Title Padding', 'true', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-N-H-' . $oxiid . ' .oxi-addons-AC-N-heading-data', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Opening Icon
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textbox('OxiAddons-AC-9-OI', $stylefiles[2], 'Icon Class', 'Set Your Opening Icon, Supported native Language', 'false');
                                         echo oxi_addons_adm_help_number_dtm('OxiAddonsAC-9-OI-WH', $styledata[111], $styledata[112], $styledata[113], '1', 'Icon Widht', 'Set Your Opening Icon Font Size', 'true');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAC-9-OI-BG', $styledata[103], 'rgba', 'Background', 'Set Your Opening Icon Hover Background', 'false', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-N-H-' . $oxiid . ' .oxi-addons-AC-N-deactive', 'background');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsAC-9-OI-FS', $styledata[107], $styledata[108], $styledata[109], '1', 'Icon Size', 'Set Your Opening Icon Font Size', 'true', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-N-H-' . $oxiid . ' .oxi-addons-AC-N-deactive', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAC-9-OI-C', $styledata[115], '', 'Icon Color', 'Set Your Opening Icon  Color', 'false', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-N-H-' . $oxiid . ' .oxi-addons-AC-N-deactive', 'color');
                                        echo oxi_addons_adm_help_border('OxiAddonsAC-9-OI-B', $styledata[119], $styledata[120], 'Border', 'Set your Opening Icon Border Size and Type', 'true', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-N-H-' . $oxiid . ' .oxi-addons-AC-N-deactive');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAC-9-OI-BC', $styledata[123], '', 'Border Color', 'Set Your Opening Icon  Border Color', 'false', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-N-H-' . $oxiid . ' .oxi-addons-AC-N-deactive', 'border-color');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsAC-9-OI-BR', 125, $styledata, '1', 'Border Radius', 'Set your Opening Icon Border Radius', 'true', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-N-H-' . $oxiid . ' .oxi-addons-AC-N-deactive', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsAC-9-OI-M', 141, $styledata, '1', 'Margin', 'Set your Opening Icon Padding', 'true', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-N-H-' . $oxiid . ' .oxi-addons-AC-N-deactive', 'padding');
                                        $NOJS = array(
                                            array('OxiAddonsAC-9-OI-WH', 'Icon Width')
                                        );
                                        echo OxiAddonsADMHelpNoJquery($NOJS);
                                        ?>
                                    </div>
                                    <div class="oxi-head">
                                        Closing Icon
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textbox('OxiAddons-AC-9-CI', $stylefiles[4], 'Icon Class', 'Set Your Closing Icon, Supported native Language', 'false');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsAC-9-CI-WH', $styledata[165], $styledata[166], $styledata[167], '1', 'Icon Widht', 'Set Your Closing Icon Font Size', 'true', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-N-H-' . $oxiid . '', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAC-9-CI-BG', $styledata[157], 'rgba', 'Background', 'Set Your Closing Icon Hover Background', 'false', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-N-H-' . $oxiid . '.active .oxi-addons-AC-N-active', 'background');
                                        echo oxi_addons_adm_help_number_dtm('OxiAddonsAC-9-CI-FS', $styledata[161], $styledata[162], $styledata[163], '1', 'Icon Size', 'Set Your Closing Icon Font Size', 'true', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-N-H-' . $oxiid . '.active .oxi-addons-AC-N-active', 'font-size');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAC-9-CI-C', $styledata[169], '', 'Icon Color', 'Set Your Closing Icon  Color', 'false', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-N-H-' . $oxiid . '.active .oxi-addons-AC-N-active', 'color');
                                        echo oxi_addons_adm_help_border('OxiAddonsAC-9-CI-B', $styledata[173], $styledata[174], 'Border', 'Set your Closing Icon Border Size and Type', 'true', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-N-H-' . $oxiid . '.active .oxi-addons-AC-N-active', 'border');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAC-9-CI-BC', $styledata[177], '', 'Border Color', 'Set Your Closing Icon  Border Color', 'false', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-N-H-' . $oxiid . '.active .oxi-addons-AC-N-active', 'border-color');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsAC-9-CI-BR', 179, $styledata, '1', 'Border Radius', 'Set your Closing Icon Border Radius', 'true', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-N-H-' . $oxiid . '.active .oxi-addons-AC-N-active', 'border-radius');
                                        echo oxi_addons_adm_help_padding_margin('OxiAddonsAC-9-CI-M', 195, $styledata, '1', 'Margin', 'Set your Closing Icon Padding', 'true', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-N-H-' . $oxiid . '.active .oxi-addons-AC-N-active', 'padding');
                                        $NOJS = array(
                                            array('OxiAddonsAC-9-CI-WH', 'Icon Width')
                                        );
                                        echo OxiAddonsADMHelpNoJquery($NOJS);
                                        ?>
                                    </div>
                                    <div class="oxi-head">
                                       Hover Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAC-9-OI-HBG', $styledata[105], 'rgba', 'Background Hover', 'Set Your Opening Icon Hover Background', 'false', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-N-H-' . $oxiid . ':hover .oxi-addons-AC-N-deactive', 'background');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAC-9-OI-HC', $styledata[117], '', 'Icon Hover Color', 'Set Your Opening Icon  Color', 'false', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-N-H-' . $oxiid . ':hover .oxi-addons-AC-N-deactive', 'color');
                                        echo oxi_addons_adm_help_MiniColor('OxiAddonsAC-9-CI-HBG', $styledata[159], '', 'Border Hover Color', 'Set Your Opening Icon Hover Background', 'false', '.oxi-addons-AC-N-' . $oxiid . ' .oxi-addons-AC-N-H-' . $oxiid . ':hover .oxi-addons-AC-N-deactive', 'border-color');
                                        ?>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="oxi-addons-setting-save">
                            <?php echo oxiaddonssettingsavedtmmode(); ?>
                            <button type="button" class="btn btn-danger" id="oxi-addons-setting-reload">Reset</button>
                            <input type="submit" class="btn btn-success" name="data-submit" value="Save">
                            <input type="hidden"  id="oxi-addons-preview-BG" name="oxi-addons-preview-BG" value="<?php echo $styledata[1]; ?>">
                            <?php wp_nonce_field("oxi-addons-accordion-nonce") ?>
                        </div>
                    </div>
                </form>
            </div>
            <div class="oxi-addons-style-right">
                <?php
                echo oxi_addons_list_modal_open();
                echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                echo oxi_addons_shortcode_call($oxitype, $oxiid);
                echo oxi_addons_list_rearrange('Accordion Rearrange', $listdata, 2, 'title');
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
                    <?php echo oxi_accordion_style_9_shortcode($style, $listdata, 'admin'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="oxi-addons-list-data-modal" >
    <form method="post">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">                    
                    <h4 class="modal-title">Accordion Settings</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                    echo oxi_addons_adm_help_textbox('OxiAddons-AC-EG', $listitemdata[2], 'Title', 'Set Your Title, Supported native Language', 'false');
                    echo oxi_addons_adm_help_model_rich_text_box('OxiAddons-AC-EG-IN', $listitemdata[4], 'Info Text', 'Give Your Info text Here', 'false');
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
