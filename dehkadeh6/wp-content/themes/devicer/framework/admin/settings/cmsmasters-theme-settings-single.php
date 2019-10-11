<?php 
/**
 * @package 	WordPress
 * @subpackage 	Devicer
 * @version		1.0.0
 * 
 * Admin Panel Post, Project, Profile Settings
 * Created by CMSMasters
 * 
 */


function devicer_options_single_tabs() {
	$tabs = array();
	
	
	$tabs['post'] = esc_attr__('Post', 'devicer');
	
	if (CMSMASTERS_PROJECT_COMPATIBLE && class_exists('Cmsmasters_Projects')) {
		$tabs['project'] = esc_attr__('Project', 'devicer');
	}
	
	if (CMSMASTERS_PROFILE_COMPATIBLE && class_exists('Cmsmasters_Profiles')) {
		$tabs['profile'] = esc_attr__('Profile', 'devicer');
	}
	
	
	return apply_filters('cmsmasters_options_single_tabs_filter', $tabs);
}


function devicer_options_single_sections() {
	$tab = devicer_get_the_tab();
	
	
	switch ($tab) {
	case 'post':
		$sections = array();
		
		$sections['post_section'] = esc_attr__('Blog Post Options', 'devicer');
		
		
		break;
	case 'project':
		$sections = array();
		
		$sections['project_section'] = esc_attr__('Portfolio Project Options', 'devicer');
		
		
		break;
	case 'profile':
		$sections = array();
		
		$sections['profile_section'] = esc_attr__('Person Block Profile Options', 'devicer');
		
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	
	return apply_filters('cmsmasters_options_single_sections_filter', $sections, $tab);
} 


function devicer_options_single_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = devicer_get_the_tab();
	}
	
	
	$options = array();
	
	
	$defaults = devicer_settings_single_defaults();
	
	
	switch ($tab) {
	case 'post':
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'devicer' . '_blog_post_layout', 
			'title' => esc_html__('Layout Type', 'devicer'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => $defaults[$tab]['devicer' . '_blog_post_layout'], 
			'choices' => array( 
				esc_html__('Right Sidebar', 'devicer') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'devicer') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'devicer') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'devicer' . '_blog_post_title', 
			'title' => esc_html__('Post Title', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_blog_post_title'] 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'devicer' . '_blog_post_date', 
			'title' => esc_html__('Post Date', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_blog_post_date'] 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'devicer' . '_blog_post_cat', 
			'title' => esc_html__('Post Categories', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_blog_post_cat'] 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'devicer' . '_blog_post_author', 
			'title' => esc_html__('Post Author', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_blog_post_author'] 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'devicer' . '_blog_post_comment', 
			'title' => esc_html__('Post Comments', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_blog_post_comment'] 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'devicer' . '_blog_post_tag', 
			'title' => esc_html__('Post Tags', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_blog_post_tag'] 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'devicer' . '_blog_post_like', 
			'title' => esc_html__('Post Likes', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_blog_post_like'] 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'devicer' . '_blog_post_nav_box', 
			'title' => esc_html__('Posts Navigation Box', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_blog_post_nav_box'] 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'devicer' . '_blog_post_nav_order_cat', 
			'title' => esc_html__('Posts Navigation Order by Category', 'devicer'), 
			'desc' => esc_html__('enable', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_blog_post_nav_order_cat'] 
		);
		
		if (class_exists('Cmsmasters_Content_Composer')) {
			$options[] = array( 
				'section' => 'post_section', 
				'id' => 'devicer' . '_blog_post_share_box', 
				'title' => esc_html__('Sharing Box', 'devicer'), 
				'desc' => esc_html__('show', 'devicer'), 
				'type' => 'checkbox', 
				'std' => $defaults[$tab]['devicer' . '_blog_post_share_box'] 
			);
		}
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'devicer' . '_blog_post_author_box', 
			'title' => esc_html__('About Author Box', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_blog_post_author_box'] 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'devicer' . '_blog_more_posts_box', 
			'title' => esc_html__('More Posts Box', 'devicer'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => $defaults[$tab]['devicer' . '_blog_more_posts_box'], 
			'choices' => array( 
				esc_html__('Show Related Posts', 'devicer') . '|related', 
				esc_html__('Show Popular Posts', 'devicer') . '|popular', 
				esc_html__('Show Recent Posts', 'devicer') . '|recent', 
				esc_html__('Hide More Posts Box', 'devicer') . '|hide' 
			) 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'devicer' . '_blog_more_posts_count', 
			'title' => esc_html__('More Posts Box Items Number', 'devicer'), 
			'desc' => esc_html__('posts', 'devicer'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['devicer' . '_blog_more_posts_count'], 
			'min' => '2', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'devicer' . '_blog_more_posts_pause', 
			'title' => esc_html__('More Posts Slider Pause Time', 'devicer'), 
			'desc' => esc_html__("in seconds, if '0' - autoslide disabled", 'devicer'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['devicer' . '_blog_more_posts_pause'], 
			'min' => '0', 
			'max' => '20' 
		);
		
		
		break;
	case 'project':
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'devicer' . '_portfolio_project_title', 
			'title' => esc_html__('Project Title', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_portfolio_project_title'] 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'devicer' . '_portfolio_project_details_title', 
			'title' => esc_html__('Project Details Title', 'devicer'), 
			'desc' => esc_html__('Enter a project details block title', 'devicer'), 
			'type' => 'text', 
			'std' => $defaults[$tab]['devicer' . '_portfolio_project_details_title'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'devicer' . '_portfolio_project_date', 
			'title' => esc_html__('Project Date', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_portfolio_project_date'] 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'devicer' . '_portfolio_project_cat', 
			'title' => esc_html__('Project Categories', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_portfolio_project_cat'] 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'devicer' . '_portfolio_project_author', 
			'title' => esc_html__('Project Author', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_portfolio_project_author'] 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'devicer' . '_portfolio_project_comment', 
			'title' => esc_html__('Project Comments', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_portfolio_project_comment'] 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'devicer' . '_portfolio_project_tag', 
			'title' => esc_html__('Project Tags', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_portfolio_project_tag'] 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'devicer' . '_portfolio_project_like', 
			'title' => esc_html__('Project Likes', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_portfolio_project_like'] 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'devicer' . '_portfolio_project_link', 
			'title' => esc_html__('Project Link', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_portfolio_project_link'] 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'devicer' . '_portfolio_project_share_box', 
			'title' => esc_html__('Sharing Box', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_portfolio_project_share_box'] 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'devicer' . '_portfolio_project_nav_box', 
			'title' => esc_html__('Projects Navigation Box', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_portfolio_project_nav_box'] 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'devicer' . '_portfolio_project_nav_order_cat', 
			'title' => esc_html__('Projects Navigation Order by Category', 'devicer'), 
			'desc' => esc_html__('enable', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_portfolio_project_nav_order_cat'] 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'devicer' . '_portfolio_project_author_box', 
			'title' => esc_html__('About Author Box', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_portfolio_project_author_box'] 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'devicer' . '_portfolio_more_projects_box', 
			'title' => esc_html__('More Projects Box', 'devicer'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => $defaults[$tab]['devicer' . '_portfolio_more_projects_box'], 
			'choices' => array( 
				esc_html__('Show Related Projects', 'devicer') . '|related', 
				esc_html__('Show Popular Projects', 'devicer') . '|popular', 
				esc_html__('Show Recent Projects', 'devicer') . '|recent', 
				esc_html__('Hide More Projects Box', 'devicer') . '|hide' 
			) 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'devicer' . '_portfolio_more_projects_count', 
			'title' => esc_html__('More Projects Box Items Number', 'devicer'), 
			'desc' => esc_html__('projects', 'devicer'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['devicer' . '_portfolio_more_projects_count'], 
			'min' => '2', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'devicer' . '_portfolio_more_projects_pause', 
			'title' => esc_html__('More Projects Slider Pause Time', 'devicer'), 
			'desc' => esc_html__("in seconds, if '0' - autoslide disabled", 'devicer'), 
			'type' => 'number', 
			'std' => $defaults[$tab]['devicer' . '_portfolio_more_projects_pause'], 
			'min' => '0', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'devicer' . '_portfolio_project_slug', 
			'title' => esc_html__('Project Slug', 'devicer'), 
			'desc' => esc_html__('Enter a page slug that should be used for your projects single item', 'devicer'), 
			'type' => 'text', 
			'std' => $defaults[$tab]['devicer' . '_portfolio_project_slug'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'devicer' . '_portfolio_pj_categs_slug', 
			'title' => esc_html__('Project Categories Slug', 'devicer'), 
			'desc' => esc_html__('Enter page slug that should be used on projects categories archive page', 'devicer'), 
			'type' => 'text', 
			'std' => $defaults[$tab]['devicer' . '_portfolio_pj_categs_slug'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'devicer' . '_portfolio_pj_tags_slug', 
			'title' => esc_html__('Project Tags Slug', 'devicer'), 
			'desc' => esc_html__('Enter page slug that should be used on projects tags archive page', 'devicer'), 
			'type' => 'text', 
			'std' => $defaults[$tab]['devicer' . '_portfolio_pj_tags_slug'], 
			'class' => '' 
		);
		
		
		break;
	case 'profile':
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'devicer' . '_profile_post_title', 
			'title' => esc_html__('Profile Title', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_profile_post_title'] 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'devicer' . '_profile_post_details_title', 
			'title' => esc_html__('Profile Details Title', 'devicer'), 
			'desc' => esc_html__('Enter a profile details block title', 'devicer'), 
			'type' => 'text', 
			'std' => $defaults[$tab]['devicer' . '_profile_post_details_title'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'devicer' . '_profile_post_cat', 
			'title' => esc_html__('Profile Categories', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_profile_post_cat'] 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'devicer' . '_profile_post_comment', 
			'title' => esc_html__('Profile Comments', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_profile_post_comment'] 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'devicer' . '_profile_post_like', 
			'title' => esc_html__('Profile Likes', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_profile_post_like'] 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'devicer' . '_profile_post_nav_box', 
			'title' => esc_html__('Profiles Navigation Box', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_profile_post_nav_box'] 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'devicer' . '_profile_post_nav_order_cat', 
			'title' => esc_html__('Profiles Navigation Order by Category', 'devicer'), 
			'desc' => esc_html__('enable', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_profile_post_nav_order_cat'] 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'devicer' . '_profile_post_share_box', 
			'title' => esc_html__('Sharing Box', 'devicer'), 
			'desc' => esc_html__('show', 'devicer'), 
			'type' => 'checkbox', 
			'std' => $defaults[$tab]['devicer' . '_profile_post_share_box'] 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'devicer' . '_profile_post_slug', 
			'title' => esc_html__('Profile Slug', 'devicer'), 
			'desc' => esc_html__('Enter a page slug that should be used for your profiles single item', 'devicer'), 
			'type' => 'text', 
			'std' => $defaults[$tab]['devicer' . '_profile_post_slug'], 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'devicer' . '_profile_pl_categs_slug', 
			'title' => esc_html__('Profile Categories Slug', 'devicer'), 
			'desc' => esc_html__('Enter page slug that should be used on profiles categories archive page', 'devicer'), 
			'type' => 'text', 
			'std' => $defaults[$tab]['devicer' . '_profile_pl_categs_slug'], 
			'class' => '' 
		);
		
		
		break;
	}
	
	
	return apply_filters('cmsmasters_options_single_fields_filter', $options, $tab);
}

