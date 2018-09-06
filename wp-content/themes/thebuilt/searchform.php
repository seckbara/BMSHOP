<?php
/**
 * The template for displaying search forms in TheBuilt
 *
 * @package TheBuilt
 */
?>
	<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="search" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php echo esc_html__('Type keyword(s) here', 'thebuilt' ); ?>" />
		<input type="submit" class="submit btn" id="searchsubmit" value="<?php echo esc_html__( 'Search', 'thebuilt' ); ?>" />
	</form>
