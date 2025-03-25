# Useful and frequently used WordPress functions.

## ✅ WP-Cli Commands

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

## ✅ Cron job & Transient API

Check this [example code](/AppCronManager.php).

## ✅ Function comment style

```php
/**
 * List of views served by this composer.
 *
 * @var array
 * @return array
 */
```

## ✅ Shortcode Class example

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

// Initialize the class
new My_Shortcode();
```

## ✅ Allow custom post types to use theme templates

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

## ✅ Access REST-API end points

Just change the text `petitions` to `posts` for displaying all the posts.

### Get all CPT

Check all your CPT REST routes dynamically.

```bash
GET /wp-json/wp/v2
```

### All Petitions

Returns a list of petition posts.

```bash
GET /wp-json/wp/v2/petitions
```

### Single Petition by ID

Returns the petition post with ID 123.

```bash
GET /wp-json/wp/v2/petitions/123
```

### Filter by Custom Taxonomy (petitions_category)

Returns petitions assigned to the petitions_category term ID 10.

```bash
GET /wp-json/wp/v2/petitions?petitions_category=10
```

### Pagination Example

Returns the second page with 5 petitions per page.

```bash
GET /wp-json/wp/v2/petitions?per_page=5&page=2
```

### Order by Date or Title

```bash
GET /wp-json/wp/v2/petitions?orderby=date&order=desc
GET /wp-json/wp/v2/petitions?orderby=title&order=asc
```

### Search by Keyword

Returns petitions that contain the keyword `child`.

```bash
GET /wp-json/wp/v2/petitions?search=child
```

### Filter by Meta Field (sign_count)

```bash
GET /wp-json/wp/v2/petitions?meta_key=sign_count&orderby=meta_value_num
```

### Get Embedded Featured Images and Author

`_embed` loads featured images, authors, and related objects to reduce additional calls.

```bash
GET /wp-json/wp/v2/petitions?_embed
```

## Expose the Meta Field to the REST API

By default, not all meta fields are available via REST API. You must register your `sign_count` meta key with `show_in_rest => true` when registering the meta.

```php
function register_petitions_meta() {
    register_post_meta('petitions', 'sign_count', [
        'type'         => 'integer',
        'single'       => true,
        'show_in_rest' => true, //Must be true
    ]);
}
add_action('init', 'register_petitions_meta');
```

Now, sign_count will be accessible as part of the `meta` object.
