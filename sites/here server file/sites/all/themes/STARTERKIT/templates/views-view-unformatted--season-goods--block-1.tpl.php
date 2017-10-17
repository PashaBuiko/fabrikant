<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($title)): ?>
    <h3><?php print $title; ?></h3>
<?php endif; ?>
<?php foreach ($rows as $id => $row): ?>
        <?php if ($id == 0) {?>
        <div class="left-part">
            <div class="left-block">
                  <div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
                      <?php print $row; ?>
                  </div>
            </div>
        <? }?>
        <?php if ($id ==1) {?>
        <div class="right-block">
                   <div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
                <?php print $row; ?>
                   </div>
                <? }?>
        <?php if ($id == 2) {?>
            <div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
                <?php print $row; ?>
                </div>
            </div>
        </div>
        <? }?>
    <?php if ($id == 3) {?>
        <div class="right-part">
         <div class="upper-block">
            <div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
                <?php print $row; ?>
            </div>
    <? }?>
    <?php if ($id == 4) {?>
            <div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
                <?php print $row; ?>
            </div>
        </div>
            <? }?>

            <?php if ($id == 5) {?>
            <div class="bottom-block">
                <div<?php if ($classes_array[$id]) { print ' class="' . $classes_array[$id] .'"';  } ?>>
                    <?php print $row; ?>
                </div>
            </div>
        </div>
        <? }?>
<?php endforeach; ?>



