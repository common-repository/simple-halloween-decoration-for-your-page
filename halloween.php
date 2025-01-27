<?php
/**
* Plugin Name: Simple Halloween Decoration For Your Page
* Text Domain: halloween-decoration
* Description: The plugin simply adds spiders and bugs that run across your site - the perfect halloween-decoration for your site!
* Version: 1.0
* Author: Maximilian Fink
* Author URI: https://maximilian-fink.de
* License: GPLv2
*/




/**
 * Generated by the WordPress Option Page generator
 * at http://jeremyhixon.com/wp-tools/option-page/
 */

class HalloweenDecoration {
	private $halloween_decoration_options;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'halloween_decoration_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'halloween_decoration_page_init' ) );
	}

	public function halloween_decoration_add_plugin_page() {
		add_options_page(
			'Halloween decoration', // page_title
			'Halloween', // menu_title
			'manage_options', // capability
			'halloween-decoration', // menu_slug
			array( $this, 'halloween_decoration_create_admin_page' ) // function
		);
	}

	public function halloween_decoration_create_admin_page() {
		$this->halloween_decoration_options = get_option( 'halloween_decoration_option_name' ); ?>

<div class="wrap">
    <h2><?php _e( 'Halloween decoration' ); ?></h2>
    <p><?php _e( 'Here you can adjust the settings for the Halloween decorations on your site.' ); ?></p>
    <?php settings_errors(); ?>

    <form method="post" action="options.php">
        <?php
					settings_fields( 'halloween_decoration_option_group' );
					do_settings_sections( 'halloween-decoration-admin' );
					submit_button();
				?>
    </form>
</div>
<?php }

	public function halloween_decoration_page_init() {
		register_setting(
			'halloween_decoration_option_group', // option_group
			'halloween_decoration_option_name', // option_name
			array( $this, 'halloween_decoration_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'halloween_decoration_setting_section', // id
			'Options', // title
			array( $this, 'halloween_decoration_section_info' ), // callback
			'halloween-decoration-admin' // page
		);

		add_settings_field(
			'activate_spiders_0', // id
			'Activate spiders', // title
			array( $this, 'activate_spiders_0_callback' ), // callback
			'halloween-decoration-admin', // page
			'halloween_decoration_setting_section' // section
		);

		add_settings_field(
			'approximate_number_of_spiders_1', // id
			'Number of spiders', // title
			array( $this, 'approximate_number_of_spiders_1_callback' ), // callback
			'halloween-decoration-admin', // page
			'halloween_decoration_setting_section' // section
		);

		add_settings_field(
			'activate_bugs_2', // id
			'Activate bugs', // title
			array( $this, 'activate_bugs_2_callback' ), // callback
			'halloween-decoration-admin', // page
			'halloween_decoration_setting_section' // section
		);

		add_settings_field(
			'approximate_number_of_bugs_3', // id
			'Number of bugs', // title
			array( $this, 'approximate_number_of_bugs_3_callback' ), // callback
			'halloween-decoration-admin', // page
			'halloween_decoration_setting_section' // section
		);
	}

	public function halloween_decoration_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['activate_spiders_0'] ) ) {
			$sanitary_values['activate_spiders_0'] = $input['activate_spiders_0'];
		}

		if ( isset( $input['approximate_number_of_spiders_1'] ) ) {
			$sanitary_values['approximate_number_of_spiders_1'] = $input['approximate_number_of_spiders_1'];
		}

		if ( isset( $input['activate_bugs_2'] ) ) {
			$sanitary_values['activate_bugs_2'] = $input['activate_bugs_2'];
		}

		if ( isset( $input['approximate_number_of_bugs_3'] ) ) {
			$sanitary_values['approximate_number_of_bugs_3'] = $input['approximate_number_of_bugs_3'];
		}

		return $sanitary_values;
	}

	public function halloween_decoration_section_info() {
		
	}

	public function activate_spiders_0_callback() {
		printf(
			'<input type="checkbox" name="halloween_decoration_option_name[activate_spiders_0]" id="activate_spiders_0" value="activate_spiders_0" %s> <label for="activate_spiders_0">Activate spiders as decoration</label>',
			( isset( $this->halloween_decoration_options['activate_spiders_0'] ) && $this->halloween_decoration_options['activate_spiders_0'] === 'activate_spiders_0' ) ? 'checked' : ''
		);
	}

	public function approximate_number_of_spiders_1_callback() {
		?> <select name="halloween_decoration_option_name[approximate_number_of_spiders_1]" id="approximate_number_of_spiders_1">
    <?php $selected = (isset( $this->halloween_decoration_options['approximate_number_of_spiders_1'] ) && $this->halloween_decoration_options['approximate_number_of_spiders_1'] === 'veryfew') ? 'selected' : '' ; ?>
    <option value="veryfew" <?php echo $selected; ?>>Verry few (0-2)</option>
    <?php $selected = (isset( $this->halloween_decoration_options['approximate_number_of_spiders_1'] ) && $this->halloween_decoration_options['approximate_number_of_spiders_1'] === 'few') ? 'selected' : '' ; ?>
    <option value="few" <?php echo $selected; ?>>A few (3-5)</option>
    <?php $selected = (isset( $this->halloween_decoration_options['approximate_number_of_spiders_1'] ) && $this->halloween_decoration_options['approximate_number_of_spiders_1'] === 'medium') ? 'selected' : '' ; ?>
    <option value="medium" <?php echo $selected; ?>>Medium (6-10)</option>
    <?php $selected = (isset( $this->halloween_decoration_options['approximate_number_of_spiders_1'] ) && $this->halloween_decoration_options['approximate_number_of_spiders_1'] === 'many') ? 'selected' : '' ; ?>
    <option value="many" <?php echo $selected; ?>>Many (11-15)</option>
    <?php $selected = (isset( $this->halloween_decoration_options['approximate_number_of_spiders_1'] ) && $this->halloween_decoration_options['approximate_number_of_spiders_1'] === 'agreatmany') ? 'selected' : '' ; ?>
    <option value="agreatmany" <?php echo $selected; ?>>A great Many (16-25)</option>
    <?php $selected = (isset( $this->halloween_decoration_options['approximate_number_of_spiders_1'] ) && $this->halloween_decoration_options['approximate_number_of_spiders_1'] === 'invasion') ? 'selected' : '' ; ?>
    <option value="invasion" <?php echo $selected; ?>>Invasion (26+)</option>
</select>
<?php
	}

	public function activate_bugs_2_callback() {
		printf(
			'<input type="checkbox" name="halloween_decoration_option_name[activate_bugs_2]" id="activate_bugs_2" value="activate_bugs_2" %s> <label for="activate_bugs_2">Activate bugs as decoration</label>',
			( isset( $this->halloween_decoration_options['activate_bugs_2'] ) && $this->halloween_decoration_options['activate_bugs_2'] === 'activate_bugs_2' ) ? 'checked' : ''
		);
	}

	public function approximate_number_of_bugs_3_callback() {
		?> <select name="halloween_decoration_option_name[approximate_number_of_bugs_3]" id="approximate_number_of_bugs_3">
    <?php $selected = (isset( $this->halloween_decoration_options['approximate_number_of_bugs_3'] ) && $this->halloween_decoration_options['approximate_number_of_bugs_3'] === 'veryfew') ? 'selected' : '' ; ?>
    <option value="veryfew" <?php echo $selected; ?>>Verry few (0-2)</option>
    <?php $selected = (isset( $this->halloween_decoration_options['approximate_number_of_bugs_3'] ) && $this->halloween_decoration_options['approximate_number_of_bugs_3'] === 'few') ? 'selected' : '' ; ?>
    <option value="few" <?php echo $selected; ?>>A few (3-5)</option>
    <?php $selected = (isset( $this->halloween_decoration_options['approximate_number_of_bugs_3'] ) && $this->halloween_decoration_options['approximate_number_of_bugs_3'] === 'medium') ? 'selected' : '' ; ?>
    <option value="medium" <?php echo $selected; ?>>Medium (6-10)</option>
    <?php $selected = (isset( $this->halloween_decoration_options['approximate_number_of_bugs_3'] ) && $this->halloween_decoration_options['approximate_number_of_bugs_3'] === 'many') ? 'selected' : '' ; ?>
    <option value="many" <?php echo $selected; ?>>Many (11-15)</option>
    <?php $selected = (isset( $this->halloween_decoration_options['approximate_number_of_bugs_3'] ) && $this->halloween_decoration_options['approximate_number_of_bugs_3'] === 'agreatmany') ? 'selected' : '' ; ?>
    <option value="agreatmany" <?php echo $selected; ?>>A great Many (16-25)</option>
    <?php $selected = (isset( $this->halloween_decoration_options['approximate_number_of_bugs_3'] ) && $this->halloween_decoration_options['approximate_number_of_bugs_3'] === 'invasion') ? 'selected' : '' ; ?>
    <option value="invasion" <?php echo $selected; ?>>Invasion (26+)</option>
</select>
<?php
	}

}
if ( is_admin() )
	$halloween_decoration = new HalloweenDecoration();

/* 
 * Retrieve this value with:
 * $halloween_decoration_options = get_option( 'halloween_decoration_option_name' ); // Array of All Options
 * $activate_spiders_0 = $halloween_decoration_options['activate_spiders_0']; // Activate spiders
 * $approximate_number_of_spiders_1 = $halloween_decoration_options['approximate_number_of_spiders_1']; // Approximate number of spiders
 * $activate_bugs_2 = $halloween_decoration_options['activate_bugs_2']; // Activate bugs
 * $approximate_number_of_bugs_3 = $halloween_decoration_options['approximate_number_of_bugs_3']; // Approximate number of bugs
*/






// Loads the bug JS
function load_scripts() {
    // Register the script 
    wp_register_script( 'bug-script-mf', plugins_url( '/bug-min.js', __FILE__ ) );

    // Enqueue the script:
    wp_enqueue_script( 'bug-script-mf' );
}
add_action( 'wp_enqueue_scripts', 'load_scripts' );




// Main part - include the script in the footer of each page
add_action( 'wp_footer', 'spiderscript' );
function spiderscript(){
    $halloween_decoration_options = get_option( 'halloween_decoration_option_name' ); // Array of All Options
    $activate_spiders_0 = $halloween_decoration_options['activate_spiders_0']; // Activate spiders
    $approximate_number_of_spiders_1 = $halloween_decoration_options['approximate_number_of_spiders_1']; // Approximate number of spiders
    $activate_bugs_2 = $halloween_decoration_options['activate_bugs_2']; // Activate bugs
    $approximate_number_of_bugs_3 = $halloween_decoration_options['approximate_number_of_bugs_3']; // Approximate number of bugs
    
    
    if ($activate_spiders_0 != '') {
        
        if($approximate_number_of_spiders_1 == 'veryfew') {
            echo'<script>new SpiderController({minBugs:0,maxBugs:3,mouseOver:"nothing"});</script>';
        }
        
        if($approximate_number_of_spiders_1 == 'few') {
            echo'<script>new SpiderController({minBugs:3,maxBugs:5,mouseOver:"nothing"});</script>';
        }
        
        if($approximate_number_of_spiders_1 == 'medium') {
            echo'<script>new SpiderController({minBugs:6,maxBugs:10,mouseOver:"nothing"});</script>';
        }
        
        if($approximate_number_of_spiders_1 == 'many') {
            echo'<script>new SpiderController({minBugs:11,maxBugs:15,mouseOver:"nothing"});</script>';
        }
        
        if($approximate_number_of_spiders_1 == 'agreatmany') {
            echo'<script>new SpiderController({minBugs:16,maxBugs:25,mouseOver:"nothing"});</script>';
        }
        
        if($approximate_number_of_spiders_1 == 'invasion') {
            echo'<script>new SpiderController({minBugs:26,maxBugs:100,mouseOver:"nothing"});</script>';
        }
    }
    
    
    if ($activate_bugs_2 != '') {
        
        if($approximate_number_of_bugs_3 == 'veryfew') {
            echo'<script>new BugController({minBugs:0,maxBugs:3,mouseOver:"nothing"});</script>';
        }
        
        if($approximate_number_of_bugs_3 == 'few') {
            echo'<script>new BugController({minBugs:3,maxBugs:5,mouseOver:"nothing"});</script>';
        }
        
        if($approximate_number_of_bugs_3 == 'medium') {
            echo'<script>new BugController({minBugs:6,maxBugs:10,mouseOver:"nothing"});</script>';
        }
        
        if($approximate_number_of_bugs_3 == 'many') {
            echo'<script>new BugController({minBugs:11,maxBugs:15,mouseOver:"nothing"});</script>';
        }
        
        if($approximate_number_of_bugs_3 == 'agreatmany') {
            echo'<script>new BugController({minBugs:16,maxBugs:25,mouseOver:"nothing"});</script>';
        }
        
        if($approximate_number_of_bugs_3 == 'invasion') {
            echo'<script>new BugController({minBugs:26,maxBugs:100,mouseOver:"nothing"});</script>';
        }
    }
    
}



?>
