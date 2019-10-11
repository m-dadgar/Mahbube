<!-- Tabs to click ajax -->
<ul class="nav-tabs hidden-sm hidden-xs<?php echo ($icon_cat != '')?' have-icon owl-carousel':''; ?>">
<?php
$icon_cat = explode(',', $icon_cat);
$i=0;
if ( $show_tab_all == '1' ) { ?>
<li class="cat-allcat">
	<?php if ( isset($icon_cat[$i]) && $icon_cat[$i] ) { ?>
		<a href="#allcat_<?php echo $uq; ?>" data-toggle="tab" data-cat="" title="<?php echo esc_attr__('All', 'mbstore-shortcodes'); ?>">
			<?php echo wp_get_attachment_image($icon_cat[$i], 'full'); ?>
		</a>
	<?php } else { ?>
		<a href="#allcat_<?php echo $uq; ?>" data-toggle="tab" data-cat="" title="<?php echo esc_attr__('All', 'mbstore-shortcodes'); ?>">
			<span><?php echo esc_html__('All', 'mbstore-shortcodes'); ?></span>
		</a>
	<?php } ?>
</li>
<?php
	$i++;
} ?>
<?php
$tabs = explode(',', $cat_tab);
foreach ( $tabs as $tab ) :
	$cat = get_term_by('slug', $tab, 'product_cat'); ?>
	<li class="cat-<?php echo esc_attr( $tab ); ?>">
		<?php if ( isset($icon_cat[$i]) && $icon_cat[$i] ) { ?>
			<a href="#<?php echo esc_attr( $tab ).'_'.$uq; ?>" data-toggle="tab" data-cat="<?php echo esc_attr( $tab ); ?>" title="<?php echo $cat->name; ?>">
				<?php echo wp_get_attachment_image($icon_cat[$i], 'full'); ?>
			</a>
		<?php } else { ?>
			<a href="#<?php echo esc_attr( $tab ).'_'.$uq; ?>" data-toggle="tab" data-cat="<?php echo esc_attr( $tab ); ?>" title="<?php echo $cat->name; ?>">
				<span><?php echo $cat->name; ?></span>
			</a>
		<?php } ?>
	</li>
<?php
	$i++;
endforeach; ?>
</ul>
<ul class="tab-drop-nav hidden-lg hidden-md">
    <li class="dropdown pull-right tabdrop hidden-lg hidden-md">
        <a href="#" data-toggle="dropdown" class="dropdown-toggle ion-navicon fa fa-bars"></a>
        <ul class="dropdown-menu">
        	<?php
			if ( $show_tab_all == '1' ) { ?>
			<li class="cat-allcat">
				<a href="#allcat_<?php echo $uq; ?>" data-toggle="tab" data-cat=""><?php echo esc_html__('All', 'mbstore-shortcodes'); ?></a>
			</li>
			<?php
			}
            foreach ( $tabs as $tab ) :
				$cat = get_term_by('slug', $tab, 'product_cat'); ?>
				<li class="cat-<?php echo esc_attr( $tab ); ?>">
					<a href="#<?php echo esc_attr( $tab ).'_'.$uq; ?>" data-toggle="tab" data-cat="<?php echo esc_attr( $tab ); ?>"><?php echo $cat->name; ?></a>
				</li>
			<?php
			endforeach; ?>
        </ul>
    </li>
</ul>