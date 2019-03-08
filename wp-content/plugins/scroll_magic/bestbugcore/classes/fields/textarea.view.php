<div class="bb-field-row" <?php echo $dependency ?>>
    <div class="bb-label">
        <label for="<?php echo esc_attr($field['param_name']) ?>">
            <?php if(!empty($field['heading'])) esc_html_e($field['heading']) ?>
        </label>
    </div>
    <div class="bb-field" style="max-width: none">
        <textarea id="<?php echo esc_attr($field['param_name']) ?>" class="bb-textfield" name="<?php echo esc_attr($field['param_name']) ?>" type="text" value="" ><?php echo esc_attr($field['value']) ?></textarea>
        <div class="bb-desc">
            <?php if(!empty($field['description'])) echo '<br/>'.($field['description']) ?>
        </div>
    </div>
</div>