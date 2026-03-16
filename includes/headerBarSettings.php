<?php
/**
 * Header Bar Settings
 */

add_action( 'admin_menu', 'headerBarSubmenu' );
add_action( 'admin_init', 'headerBarSettingsFields' );

function headerBarSubmenu()
{
    add_submenu_page(
        'options-general.php', // parent page slug
        'Set Header Bar Settings',
        'Header Bar Settings',
        'manage_options',
        'headerBarSettings',
        'showHeaderBarSettingsPage_cb',
        10 // menu position
    );
}

function showHeaderBarSettingsPage_cb()
{
?>
    <div class="wrap">
        <h1><?php echo get_admin_page_title(); ?></h1>
        <form method="post" action="options-general.php?page=headerBarSettings">
            <?php
                do_settings_sections( 'headerBarSettings' ); // just a page slug
                submit_button(); // "Save Changes" button
            ?>
        </form>
    </div>

<?php        
}

function headerBarSettingsFields() 
{
	// I created variables to make the things clearer
	$page_slug = 'headerBarSettings';
	$option_group = 'headerBarSettings_Options'; 
    
	// 1. create section
	add_settings_section(
		'headerBarSettings_SectionId', // section ID
		'', // title (optional)
		'', // callback function to display the section (optional)
		$page_slug
	);

	// 2. register fields
	register_setting( $option_group, 'headerBar', 'shop_hours_settings_sanitize_radio' );

	// 3. add fields
	add_settings_field(
		'headerBar',
		'Header Bar Control',
		'headerBar_fields', // function to print the field
		$page_slug,
		'headerBarSettings_SectionId' // section ID
	);    
}

// custom callback function to print radio field HTML
function headerBar_fields( $args ) 
{ //pvd($_POST);
    if( isset($_POST['submit']))
    {
        $displayHeaderBar = isset($_POST['displayHeaderBar'] ) ? $_POST['displayHeaderBar'] : ['text'=>'', 'url'=>''];
        update_option('displayHeaderBar', $displayHeaderBar);
    }
	$displayHeaderBar = get_option( 'displayHeaderBar' ); 
	?>
        <table>
            <tr>
                <td>Header Bar text: </td>
                <td><input type="text" name='displayHeaderBar[text]' value="<?php echo $displayHeaderBar['text']; ?>"></td>
            </tr>
            <tr>
                <td>Header Bar link:</td>
                <td><input type="text" name='displayHeaderBar[url]' value="<?php echo $displayHeaderBar['url']; ?>"></td>
            </tr>
        </table>
	<?php
}

