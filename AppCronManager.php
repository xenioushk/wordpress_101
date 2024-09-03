<?php

/**
* A simple WordPress cron job manager class
* @since: 1.0
* @author: Mahbub Alam Khan
* @created: 03.09.2024
* @updated: 03.09.2024
*/

class AppCronManager{

  public $api_url;

  public function __construct()
  {

    $limit = rand(2,5);
    // Define the API URL   
    $this->api_url = "https://jsonplaceholder.typicode.com/users/1/todos?_limit={$limit}"; // Replace with your API endpoint

    // Register a Custom Cron Schedule
    add_filter('cron_schedules', [$this, 'custom_cron_schedules']);

    // Schedule the Cron Job
    add_action( 'wp', [$this,'custom_schedule_cron_job'] );

    // Define the Cron Job Function
    add_action( 'custom_cron_job_hook', [$this,'custom_cron_job_function']);

    $this->readTransientData();

  }

  // Add a custom interval for 5 minutes

  public function custom_cron_schedules($schedules):array {
    $schedules['every_five_minutes'] = array(
        'interval' => 300, // 300 seconds = 5 minutes
        'display'  => esc_html__( 'Every 5 Minutes' ),
    );
    return $schedules;
  }

  // Schedule the event if it's not already scheduled
  public function custom_schedule_cron_job() {

    // return 1;
      if ( ! wp_next_scheduled( 'custom_cron_job_hook' ) ) {
          wp_schedule_event( time(), 'every_five_minutes', 'custom_cron_job_hook' );
      }
  }

  // Function to be executed by the cron job
  public function custom_cron_job_function() {
    
      $response = wp_remote_get( $this->api_url );

      if ( is_wp_error( $response ) ) {
          return; // Exit if there's an error
      }

      $body = wp_remote_retrieve_body( $response );
      $data = json_decode( $body, true );

      if ( ! empty( $data ) ) {
          // Store data in a transient for 5 minutes (300 seconds)
          set_transient( 'custom_api_data', $data, 300 );
      }
  
  }

  public function readTransientData(){
    // Retrieve data from the transient
    $api_data = get_transient( 'custom_api_data' );

    if ( false !== $api_data ) {
        // Data is available and valid, do something with it
        // Example: Display data
        echo '<pre>';
        print_r( $api_data );
        echo '</pre>';
    } else {
        // Data is not available or expired
        echo 'No data available or transient expired.';
    }
  
  }

}

// Initialize Class.

new AppCronManager();