<?php
if (!defined('ABSPATH'))
    exit;
oxi_addons_user_capabilities();
global $wpdb;
$oxitype = sanitize_text_field($_GET['oxitype']);
$oxiid = (int) $_GET['styleid'];
$table_name = $wpdb->prefix . 'oxi_div_style';

if (!empty($_REQUEST['_wpnonce'])) {
    $nonce = $_REQUEST['_wpnonce'];
}

if (!empty($_POST['data-submit']) && $_POST['data-submit'] == 'Save') {
    if (!wp_verify_nonce($nonce, 'oxi-addons-button-nonce')) {
        die('You do not have sufficient permissions to access this page.');
    } else {
        $data = 'oxi-addons-preview-BG |' . sanitize_text_field($_POST['oxi-addons-preview-BG']) . '|'
                .'oxi_addons-button-link-opening |' . sanitize_text_field($_POST['oxi_addons-button-link-opening']) . '|'
                . '||'
                . '' . oxi_addons_adm_help_single_size('oxi_addons-button-width') . ''
                . '' . oxi_addons_adm_help_single_size('oxi_addons-button-height') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-button-padding') . ''
                . '' . oxi_addons_adm_help_padding_margin_senitize('oxi-addons-button-margin') . ''
                . '' . oxi_addons_adm_help_animation_senitize('oxi_addons-button-animation') . ''
                . '' . OxiAddonsADMBoxShadowSanitize('OxiAddInfo-button-shadow') . '' 
                
                . '' . oxi_addons_adm_help_single_size('oxi_addons-button-font-size') . ''
                . '' . OxiAddonsADMHelpFontSettingsSanitize('oxi_addons-button-fs') . ''
                
                . ' oxi_addons-button-color |' . sanitize_hex_color($_POST['oxi_addons-button-color']) . '|'
                . ' oxi_addons-button-bg-color |' . sanitize_text_field($_POST['oxi_addons-button-bg-color']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAdd-button-BG-border') . ''
                . '' . OxiAddonsADMHelpBorderSanitize('OxiAdd-button-BG-border-CS') . '|'
                . ' oxi-addons-button-border-radius |' . sanitize_text_field($_POST['oxi-addons-button-border-radius']) . '|'
                
                . ' oxi_addons-button-hover-color |' . sanitize_hex_color($_POST['oxi_addons-button-hover-color']) . '|'
                . ' oxi_addons-button-hover-bg-color-1 |' . sanitize_text_field($_POST['oxi_addons-button-hover-bg-color-1']) . '|'
                . '' . oxi_addons_adm_help_padding_margin_senitize('OxiAdd-button-hover-BG-border') . ''
                . '' . OxiAddonsADMHelpBorderSanitize('OxiAdd-button-BG-border-hover-CS') . '|'
                . ' oxi-addons-button-hover-border-radius |' . sanitize_text_field($_POST['oxi-addons-button-hover-border-radius']) . '|'
                
                . ' ||'
                . ' ||'
                . ' ||'
                . ' ||'
                . '||#||  ||#||'
                . 'oxi_addons-button-text ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi_addons-button-text']) . '||#||'
                . 'oxi_addons-button-id ||#||' . OxiAddonsADMHelpTextSenitize($_POST['oxi_addons-button-id']) . '||#||'
                . 'oxi_addons-button-link ||#||' . OxiAddonsAdminUrlConvert($_POST['oxi_addons-button-link']) . '||#||'
                . '|';


        $data = sanitize_text_field($data);
        $wpdb->query($wpdb->prepare("UPDATE $table_name SET css = %s WHERE id = %d", $data, $oxiid));
    }
}
OxiDataAdminStyleNameChange();
$style = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d ", $oxiid), ARRAY_A);
$stylefiles = explode('||#||', $style['css']);
$styledata = explode('|', $stylefiles[0]);

// echo '<pre>';
// print_r($styledata);
// echo '</pre>';
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
                                        Button Information
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_textbox('oxi_addons-button-text', $stylefiles[3], 'Button Text', 'Write the text for the button here', 'false', '.oxi-addons-align-' . $oxiid . ' .oxi-button-' . $oxiid . '');
                                        echo oxi_addons_adm_help_textbox('oxi_addons-button-id', $stylefiles[5], 'Button ID', 'If you want to add CSS ID, write down here', 'true');
                                        echo oxi_addons_adm_help_textbox('oxi_addons-button-link', $stylefiles[7], 'Desire Link', 'Add link/URL to link your button', 'true');
                                        echo oxi_addons_adm_help_true_false('oxi_addons-button-link-opening', $styledata[3], 'Normal', '', 'New Tab', '_blank', 'Link Opening', 'Select the Link Opening type', 'true');
                                        ?>
                                        
                                    </div>                                               
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        General
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('oxi_addons-button-width', $styledata[7], $styledata[8], $styledata[9], 1, 'Width', 'Customize the button width with Responsive Size', 'fales', '.oxi-addons-align-' . $oxiid . ' .oxi-addons-button-align', 'width');                                        
                                        echo oxi_addons_adm_help_number_dtm('oxi_addons-button-height', $styledata[11], $styledata[12], $styledata[13], 1, 'height', 'Customize the button height with Responsive Size', 'fales', '.oxi-addons-align-' . $oxiid . ' .oxi-addons-button-align', 'height');                                        
                                        echo oxi_addons_adm_help_padding_margin('oxi-addons-button-padding', 15, $styledata, 1, 'Padding', 'Customize button padding either Easy or Advance mode', 'true', '.oxi-addons-align-' . $oxiid . ' .oxi-button-' . $oxiid . '', 'padding');
                                        echo oxi_addons_adm_help_padding_margin('oxi-addons-button-margin', 31, $styledata, 1, 'Margin', 'Customize button margin either Easy or Advance mode', 'true', '.oxi-addons-align-' . $oxiid . ' .oxi-addons-button-body', 'padding');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Animation
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_Animation('oxi_addons-button-animation', 47, $styledata, 'true', '.oxi-button-' . $oxiid . '');
                                        ?>
                                    </div>
                                </div>
                                <div class="oxi-addons-content-div">
                                        <div class="oxi-head">
                                            Box Shadow
                                        </div>
                                        <div class="oxi-addons-content-div-body">
                                            <?php
                                            echo OxiAddonsADMhelpBoxShadow('OxiAddInfo-button-shadow', 51, $styledata, 'true', '.oxi-addons-align-' . $oxiid . ' .oxi-button-' . $oxiid . '');
                                            ?>
                                        </div>
                                    </div>
                            </div>
                            <div class="oxi-addons-col-6">
                                <div class="oxi-addons-content-div">
                                    <div class="oxi-head">
                                        Button Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_number_dtm('oxi_addons-button-font-size', $styledata[57], $styledata[58], $styledata[59], 1, 'Font Size', 'Customize the button font size, based on Pixels', '', '.oxi-addons-align-' . $oxiid . ' .oxi-button-' . $oxiid . '', 'font-size');
                                        echo OxiAddonsADMHelpFontSettings('oxi_addons-button-fs', 61, $styledata, 'true', '.oxi-addons-align-' . $oxiid . ' .oxi-button-' . $oxiid . '');
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-button-color', $styledata[67], '', 'Color', 'Customize the Button active color', '', '.oxi-addons-align-' . $oxiid . ' .oxi-button-' . $oxiid . '', 'color');
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-button-bg-color', $styledata[69], 'rgba', 'Background Color', 'Customize the Button Active Background color, either in gradient or solid color mode', 'fales', '.oxi-addons-align-' . $oxiid . ' .oxi-addons-button-align', 'background');
                                        echo oxi_addons_adm_help_padding_margin('OxiAdd-button-BG-border', 71, $styledata, 1, 'Border', 'set Info box border','true', '.oxi-addons-align-' . $oxiid . ' .oxi-button-' . $oxiid . '', 'border-width');
                                        echo OxiAddonsADMhelpBorder('OxiAdd-button-BG-border-CS', 87, $styledata, 'true', '.oxi-addons-align-' . $oxiid . ' .oxi-button-' . $oxiid . '');
                                        echo oxi_addons_adm_help_number('oxi-addons-button-border-radius', $styledata[91], '1', 'Border Radius', 'Set border radius. 0 value for angular border, 50 for rounded', 'true', '.oxi-addons-align-' . $oxiid . ' .oxi-button-' . $oxiid . '', 'border-radius');
                                        ?>
                                    </div>
                                    <div class="oxi-head">
                                        Hover Settings
                                    </div>
                                    <div class="oxi-addons-content-div-body">
                                        <?php
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-button-hover-color', $styledata[93], '', 'Color', 'Customize the Button hover view color', '', '.oxi-addons-align-' . $oxiid . ' .oxi-button-' . $oxiid . ':hover', 'color');
                                        echo oxi_addons_adm_help_MiniColor('oxi_addons-button-hover-bg-color-1', $styledata[95], '', 'Background', 'Customize the Button Hover Background color, either in gradient or solid color mode', '', '.oxi-addons-align-' . $oxiid . ' .oxi-button-' . $oxiid . ':hover::before', 'box-shadow');
                                        echo oxi_addons_adm_help_padding_margin('OxiAdd-button-hover-BG-border', 97, $styledata, 1, 'Border', 'set Info box border','true', '.oxi-addons-align-' . $oxiid . ' .oxi-button-' . $oxiid . ':hover', 'border-width');
                                        echo OxiAddonsADMhelpBorder('OxiAdd-button-BG-border-hover-CS', 113, $styledata, 'true', '.oxi-addons-align-' . $oxiid . ' .oxi-button-' . $oxiid . ':hover');
                                        echo oxi_addons_adm_help_number('oxi-addons-button-hover-border-radius', $styledata[117], '1', 'Border Radius', 'Set border radius. 0 value for angular border, 50 for rounded', 'true', '.oxi-addons-align-' . $oxiid . ' .oxi-button-' . $oxiid . ':hover', 'border-radius');
                                        
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
                            <?php wp_nonce_field("oxi-addons-button-nonce") ?>
                        </div>
                    </div>
                </form>

            </div>
            <div class="oxi-addons-style-right">
                <?php
                echo oxi_addons_shortcode_namechange($oxiid, $style['name']);
                echo oxi_addons_shortcode_call($oxitype, $oxiid);
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
                    <?php echo do_shortcode('[oxi_addons  id="' . $oxiid . '"]'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
