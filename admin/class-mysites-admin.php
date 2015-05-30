<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://lucianotonet.com
 * @since      1.0.0
 *
 * @package    Mysites
 * @subpackage Mysites/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Mysites
 * @subpackage Mysites/admin
 * @author     Luciano Tonet <contato@lucianotonet.com>
 */
class Mysites_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Mysites_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Mysites_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/mysites-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Mysites_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Mysites_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/mysites-admin.js', array( 'jquery' ), $this->version, false );

	}
	
	


	public function mysites_add_admin_menu(  ) { 
		// https://codex.wordpress.org/Function_Reference/add_options_page
		add_options_page( 'MySites', 'MySites', 'manage_options', 'mysites', array( $this, 'mysites_options_page' ) );

	}


	public function mysites_settings_init(  ) { 

		register_setting( 'pluginPage', 'mysites_settings' );

		add_settings_section(
			'mysites_pluginPage_section', 
			__( 'Firebase conection', 'mysites' ), 
			'mysites_settings_section_callback', 
			'pluginPage'
		);

		add_settings_field( 
			'mysites_text_field_0', 
			__( 'Database URL', 'mysites' ), 
			'mysites_text_field_0_render', 
			'pluginPage', 
			'mysites_pluginPage_section' 
		);

		add_settings_field( 
			'mysites_text_field_1', 
			__( 'Token', 'mysites' ), 
			'mysites_text_field_1_render', 
			'pluginPage', 
			'mysites_pluginPage_section' 
		);

		add_settings_field( 
			'mysites_text_field_2', 
			__( 'Path', 'mysites' ), 
			'mysites_text_field_2_render', 
			'pluginPage', 
			'mysites_pluginPage_section' 
		);


		function mysites_text_field_0_render(  ) { 

			$options = get_option( 'mysites_settings' );
			?>
			<input type='text' name='mysites_settings[mysites_text_field_0]' value='<?php echo $options['mysites_text_field_0']; ?>'>
			<?php

		}


		function mysites_text_field_1_render(  ) { 

			$options = get_option( 'mysites_settings' );
			?>
			<input type='text' name='mysites_settings[mysites_text_field_1]' value='<?php echo $options['mysites_text_field_1']; ?>'>
			<?php

		}


		function mysites_text_field_2_render(  ) { 

			$options = get_option( 'mysites_settings' );
			?>
			<input type='text' name='mysites_settings[mysites_text_field_2]' value='<?php echo $options['mysites_text_field_2']; ?>'>
			<?php

		}


		function mysites_settings_section_callback(  ) { 

			echo __( 'Create an app at <a href="https://www.firebase.com/" target="_blank">Firebase.com</a> and place the database secrets here.', 'mysites' );

		}
	}


	public function mysites_options_page(  ) { 

		?>
		<form action='options.php' method='post'>
			
			<h2>MySites settings</h2>
			
			<?php
			settings_fields( 'pluginPage' );
			do_settings_sections( 'pluginPage' );
			submit_button();
			?>
			
		</form>
		<?php

	}

}
