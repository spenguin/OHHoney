<?php
/**
 * Shop Hours Settings
 */

add_action( 'admin_menu', 'shop_hours_submenu' );

function shop_hours_submenu()
{
    add_submenu_page(
        'options-general.php', // parent page slug
        'Set Shop Opening and Closing Hours',
        'Shop Hours Settings',
        'manage_options',
        'shop_hours_settings',
        'show_hours_settings_page_callback',
        10 // menu position
    );
}

function show_hours_settings_page_callback()
{
    ?>
        <div class="wrap">
            <h1><?php echo get_admin_page_title(); ?></h1>
            <form method="post" action="options-general.php?page=shop_hours_settings">
                <?php
                    do_settings_sections( 'shop_hours_settings' ); // just a page slug
                    submit_button(); // "Save Changes" button
                ?>
            </form>
        </div>

    <?php
}

add_action( 'admin_init', 'shop_hours_settings_fields' );

function shop_hours_settings_fields() 
{
	// I created variables to make the things clearer
	$page_slug = 'shop_hours_settings';
	$option_group = 'shop_hours_settings_options'; 
    
	// 1. create section
	add_settings_section(
		'shop_hours_settings_section_id', // section ID
		'', // title (optional)
		'', // callback function to display the section (optional)
		$page_slug
	);

	// 2. register fields
	register_setting( $option_group, 'shop_hours', 'shop_hours_settings_sanitize_radio' );

	// 3. add fields
	add_settings_field(
		'shop_hours',
		'Shop Hours Control',
		'shop_hours_fields', // function to print the field
		$page_slug,
		'shop_hours_settings_section_id' // section ID
	);    
}

// custom callback function to print radio field HTML
function shop_hours_fields( $args ) { //pvd($_POST);
    if( isset($_POST['submit']))
    {
        $display_shop_hours = isset($_POST['display_shop_hours'] ) ? $_POST['display_shop_hours'] : [];
        update_option('display_shop_hours', $display_shop_hours);
    }
	$display_shop_hours = get_option( 'display_shop_hours' ); 
	?>
        <table>
            <tr>
                <td>&nbsp;</td>
                <td>Monday</td>
                <td>Tuesday</td>
                <td>Wednesday</td>
                <td>Thursday</td>
                <td>Friday</td>
                <td>Saturday</td>
                <td>Sunday</td>
            </tr>
            <tr>
                <td>Opening</td>
                <?php
                    foreach( $display_shop_hours["'o'"] as $key => $time ): ?>
                        <td><input name="display_shop_hours['o'][<?php echo $key; ?>]" value="<?php echo $time; ?>" type="time" /></td>
                <?php endforeach; ?>
            </tr>
            <tr>
                <td>Closing</td>
                 <?php
                    foreach( $display_shop_hours["'c'"] as $key => $time ): ?>
                        <td><input name="display_shop_hours['c'][<?php echo $key; ?>]" value="<?php echo $time; ?>" type="time" /></td>
                <?php endforeach; ?>
            </tr>
        </table>
	<?php
}