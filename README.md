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
