<div class="wpallexport-collapsed wpallexport-section">
	<div class="wpallexport-content-section" style="margin-top:10px;">
		<div class="wpallexport-collapsed-header" style="padding-left: 25px;">
			<h3><?php _e('Advanced Options','wp_all_export_plugin');?></h3>	
		</div>
		<div class="wpallexport-collapsed-content" style="padding: 0;">
			<div class="wpallexport-collapsed-content-inner">				
				<table class="form-table" style="max-width:none;">
					<tr>
						<td colspan="3">																									
							<div class="input" style="margin:5px 0px;">
								<label for="records_per_request"><?php _e('In each iteration, process', 'wp_all_export_plugin');?> <input type="text" name="records_per_iteration" class="wp_all_export_sub_input" style="width: 40px;" value="<?php echo esc_attr($post['records_per_iteration']) ?>" /> <?php _e('records', 'wp_all_export_plugin'); ?></label>
								<span>
                                    <a href="#help" class="wpallexport-help" style="position: relative; top: -2px;" title="<?php _e('WP All Export must be able to process this many records in less than your server\'s timeout settings. If your export fails before completion, to troubleshoot you should lower this number.', 'wp_all_export_plugin'); ?>">?</a>
							    </span>
                            </div>
							<div class="input" style="margin:5px 0px;">														
								<input type="hidden" name="export_only_new_stuff" value="0" />
								<input type="checkbox" id="export_only_new_stuff" name="export_only_new_stuff" value="1" <?php echo $post['export_only_new_stuff'] ? 'checked="checked"': '' ?> />
								<label for="export_only_new_stuff"><?php printf(__('Only export %s once', 'wp_all_export_plugin'), empty($post['cpt']) ? __('records', 'wp_all_export_plugin') : wp_all_export_get_cpt_name($post['cpt'], 2, $post)); ?></label>
								<span>
                                    <a href="#help" class="wpallexport-help" style="position: relative; top: 0;" title="<?php _e('If re-run, this export will only include records that have not been previously exported.', 'wp_all_export_plugin'); ?>">?</a>
							    </span>
                            </div>
							<div class="input" style="margin:5px 0px;">
								<input type="hidden" name="export_only_modified_stuff" value="0" />
								<input type="checkbox" <?php if(in_array('users', $post['cpt']) || in_array('taxonomies', $post['cpt']) || in_array('shop_customer', $post['cpt']) ) { ?> disabled="disabled" <?php } ?> id="export_only_modified_stuff" name="export_only_modified_stuff" value="1" <?php echo $post['export_only_modified_stuff'] ? 'checked="checked"': '' ?> />
								<label for="export_only_modified_stuff"><?php printf(__('Only export %s that have been modified since last export', 'wp_all_export_plugin'), empty($post['cpt']) ? __('records', 'wp_all_export_plugin') : wp_all_export_get_cpt_name($post['cpt'], 2, $post)); ?></label>
                                <span>
                                    <a href="#help" class="wpallexport-help" style="position: relative; top: -2px;"
                                        <?php if(in_array('users', $post['cpt']) ) { ?>
                                            title="<?php _e('This feature it not available for user exports.', 'wp_all_export_plugin'); ?>"
                                        <?php } else if(in_array('taxonomies', $post['cpt'])) { ?>
                                            title="<?php _e('This feature it not available for taxonomies exports.', 'wp_all_export_plugin'); ?>"
                                        <?php } else if(in_array('shop_customer', $post['cpt'])) { ?>
                                            title="<?php _e('This feature it not available for customer exports.', 'wp_all_export_plugin'); ?>"
                                        <?php } else { ?>
                                            title="<?php _e('If re-run, this export will only include records that have been modified since last export run.', 'wp_all_export_plugin'); ?>"
                                        <?php } ?>
                                    >?</a>
                                </span>
                            </div>

                            <?php if ( in_array('shop_customer', $post['cpt']) ) { ?>
                                <div class="input" style="margin:5px 0px;">
                                    <input type="hidden" name="export_only_customers_that_made_purchases" value="0" />
                                    <input type="checkbox" id="export_only_customers_that_made_purchases" name="export_only_customers_that_made_purchases" value="1" <?php echo $post['export_only_customers_that_made_purchases'] ? 'checked="checked"': '' ?> />
                                    <label for="export_only_customers_that_made_purchases"><?php _e('Only export customers who have made a purchase', 'wp_all_export_plugin'); ?></label>
                                    <span>
                                        <a href="#help" class="wpallexport-help" style="position: relative; top: 0;" title="<?php _e('If enabled, only customers who have actually made purchases will be exported.', 'wp_all_export_plugin'); ?>">?</a>
                                    </span>
                                </div>
                            <?php } ?>

							<div class="input" style="margin:5px 0px;">
								<input type="hidden" name="include_bom" value="0" />
								<input type="checkbox" id="include_bom" name="include_bom" value="1" <?php echo $post['include_bom'] ? 'checked="checked"': '' ?> />
								<label for="include_bom"><?php _e('Include BOM in export file', 'wp_all_export_plugin') ?></label>
                                <span>
                                    <a href="#help" class="wpallexport-help" style="position: relative; top: 0;" title="<?php _e('The BOM will help some programs like Microsoft Excel read your export file if it includes non-English characters.', 'wp_all_export_plugin'); ?>">?</a>
                                </span>
                            </div>
							<div class="input" style="margin:5px 0px;">
								<input type="hidden" name="creata_a_new_export_file" value="0" />
								<input type="checkbox" id="creata_a_new_export_file" name="creata_a_new_export_file" value="1" <?php echo $post['creata_a_new_export_file'] ? 'checked="checked"': '' ?> />
								<label for="creata_a_new_export_file"><?php _e('Create a new file each time export is run', 'wp_all_export_plugin') ?></label>				
								<span>
                                    <a href="#help" class="wpallexport-help" style="position: relative; top: 0;" title="<?php _e('If disabled, the export file will be overwritten every time this export run.', 'wp_all_export_plugin'); ?>">?</a>
							    </span>
                            </div>
                            <?php if($post['export_to'] == 'csv') { ?>
                            <div class="input" style="margin:5px 0px;">
                                <input type="hidden" name="split_large_exports" value="0"/>
                                <input type="checkbox" id="split_large_exports" name="split_large_exports"
                                       class="switcher"
                                       value="1" <?php echo $post['split_large_exports'] ? 'checked="checked"' : '' ?> />
                                <label for="split_large_exports"><?php _e('Split large exports into multiple files', 'wp_all_export_plugin') ?></label>
                                <span class="switcher-target-split_large_exports pl17"
                                      style="display:block; clear: both; width: 100%;">
									<div class="input pl17" style="margin:5px 0px;">							
										<label for="records_per_request"><?php _e('Limit export to', 'wp_all_export_plugin'); ?></label> <input
                                                type="text" name="split_large_exports_count"
                                                class="wp_all_export_sub_input" style="width: 50px;"
                                                value="<?php echo esc_attr($post['split_large_exports_count']) ?>"/> <?php _e('records per file', 'wp_all_export_plugin'); ?>
									</div>																				
								</span>
                            </div>
                            <?php
                            }
                            ?>

                            <?php
                            if(current_user_can(PMXE_Plugin::$capabilities)) {
                            ?>
                            <div class="input" style="margin:5px 0px;">
                                <input type="hidden" name="allow_client_mode" value="0"/>
                                <input type="checkbox" id="allow_client_mode" name="allow_client_mode"
                                       value="1" <?php echo $post['allow_client_mode'] ? 'checked="checked"' : '' ?> />
                                <label for="allow_client_mode"><?php _e('Allow non-admins to run this export in Client Mode', 'wp_all_export_plugin') ?></label>
                                <span>
                                    <a href="#help" class="wpallexport-help" style="position: relative; top: 0;" title="<?php _e('When enabled, users with access to Client Mode will be able to run this export and download the export file. Go to All Export > Settings to give users access to Client Mode'); ?>">?</a>
							    </span>
                            </div>
                            <?php } ?>
							<br>
							<hr>
							<p style="text-align:right;">
								<div class="input">
									<label for="save_import_as" style="width: 103px;"><?php _e('Friendly Name:','wp_all_export_plugin');?></label> 
									<input type="text" name="friendly_name" title="<?php _e('Save friendly name...', 'pmxi_plugin') ?>" style="vertical-align:middle; background:#fff !important;" value="<?php echo esc_attr($post['friendly_name'] ? $post['friendly_name']: $this->getFriendlyName($post)) ?>" />
								</div>
							</p>
						</td>
					</tr>											
				</table>
			</div>
		</div>
	</div>
</div>	