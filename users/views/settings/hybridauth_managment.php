<div class="box">
    <fieldset>
        <legend>Hybrid Authentication Enable</legend>
    <?php echo form_open(SITE_AREA . '/settings/users/hybridauth_managment', 'class="form-horizontal"'); ?>
        <?php if($hybridauth_enabled === TRUE):?>
            <?php echo form_hidden('enable', '0');?>
            <?php echo form_submit('enable_save', lang('us_disable'), 'class="btn btn-danger"'); ?>
        <?php else:?>
        <?php echo form_hidden('enable', '1');?>
            <?php echo form_submit('enable_save', lang('us_enable'), 'class="btn btn-primary"'); ?>
        <?php endif;?>
            <?php echo form_close(); ?>
    </fieldset>
</div>

<div class="admin-box">
    <?php echo form_open(SITE_AREA . '/settings/users/hybridauth_managment', 'class="form-horizontal"'); ?>
    <fieldset>
        <legend>Hybrid Authentication Providers</legend>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th><?php e(lang('us_enabled')); ?></th>
                    <th><?php e(lang('us_provider')); ?></th>
                    <th><?php e(lang('us_key_id')); ?></th>
                    <th><?php e(lang('us_secret')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($providers as $provider => $value): ?>
                <tr>
                    <td><input type="checkbox" name="<?php echo $provider ;?>_enabled" value="<?php echo $value['enabled'] ?>" <?php echo $value['enabled'] === TRUE ? 'checked="1"':'' ?> /></td>
                    <td><?php echo $provider;?></td>
                    <?php if(isset($value['keys'])): ?>
                    <td><input type="text" name="<?php echo $provider;?>_key" value="<?php echo $value['keys']['key'] ?>"> </td>
                    <td><input type="text" name="<?php echo $provider;?>_secret" value="<?php echo $value['keys']['secret'] ?>"> </td>
                    <?php else: ?>
                    <td><input type="text" value="" disabled="" readonly="" ></td>
                    <td><input type="text" value="" disabled="" readonly=""></td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">
                        <input type="submit" name="save" class="btn btn-primary" value="<?php e(lang('us_save_settings')); ?>" />
                    </td>
                </tr>
            </tfoot>
        </table>
        
        
    </fieldset>
    <?php echo form_close(); ?>
</div>
