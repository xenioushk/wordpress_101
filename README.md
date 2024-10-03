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

### Get all the installed plugin list

```bash
wp plugin list
```

### Update all the plugins

```bash
wp plugin update --all
```

### Activate a plugin

```bash
wp plugin activate my-awesome-plugin
```

### Deactivate a plugin

```bash
wp plugin deactivate my-awesome-plugin
```

### Create an admin user

Add your username and email. The following command will return a password.

```bash
wp user create YOUR_USER_NAME your.email@example.com --role=administrator
```

### Cron job & Transient API

Check this [example code](/AppCronManager.php).

## Acknowlegement

- [bluewindlab.net](https://bluewindlab.net)
