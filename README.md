# Useful and frequently used WordPress functions.

## WP-Cli Commands

### Get wp-cli version

```bash
wp --info
```

### Update all the themes

```bash
wp theme update --all
```

### Create a new plugin

Navigate to `wp-content/plugins/`. Then run this command to create a new plugin called `my-awesome-plugin`.

```bash
wp scaffold plugin my-awesome-plugin
```

![create_a_wordpress_plugin_with_wpcli](/previews/create_a_wordpress_plugin_with_wpcli.jpg)

### Update all the plugins

```bash
wp plugin update --all
```

### Cron job & Transient API

Check this [example code](/AppCronManager.php).

### Function comment style

```php
/**
 * List of views served by this composer.
 *
 * @var array
 * @return array
 */
```

### Shortcode Class example

```php
class My_Shortcode{
  public function __construct(){
    $this->register_shortcode();
  }

  public function register_shortcode(){
    add_shortcode('shortcode_tag', [$this, 'get_shortcode_output']);
  }

  public function get_shortcode_output($atts){
    return "Hello world";
  }
}

// Initalize the class.
new My_Shortcode();
```

### Allow custom post types to use theme templates

👉 Open a template file for the currently active theme. Our targeted custom post types are 'bwl_kb' and 'portfolio'.

👉 We would like to use full-width template for those post types. So, we have edited the `template-full-width.php` file and
included the following code.

👉 The `Template Post Type` section in the commented area is allowing the custom post types to use the `template-full-width.php` file.

```php
/**
 *
 * Template Name: Full Width Template
 * Template Post Type: post, page, bwl_kb, portfolio
 * The template for displaying the contents without any sidebar.
 *
 * @package BwlKdeskTheme
 */
```

Now, if you go to the add/edit page of the portfolio or bwl_kb, you will be able to use the full-width template. ,🚀

![use_custom_post_type_theme_full_width_template](/previews/use_custom_post_type_theme_full_width_template.jpg)
