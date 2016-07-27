# WordPeak

Experimental WordPress stack build on top of [Bedrock](https://github.com/roots/bedrock). Plugins may not work with this structure.

## Multiple themes

If you would like to create child themes you need to use multiple themes, just create `web/themes` and delete `web/app` directory.

## The theme

> This is only valid if you use a single theme and not multiple themes.

The base theme use [Digster](https://github.com/frozzare/wp-digster) to render Twig views.

### style.css

You can forget about the `style.css` file and add theme information using `wordpeak_theme_headers`. This data will be stored in the WordPress cache.

```php
add_filter( 'wordpeak_theme_headers', function ( $headers ) {
  return array_merge( $headers, [
    'Name'        => 'Theme Name',
    'ThemeURI'    => 'Theme URI',
    'Description' => 'Description',
    'Author'      => 'Author',
    'AuthorURI'   => 'Author URI',
    'Version'     => 'Version',
    'Template'    => 'Template',
    'Status'      => 'Status',
    'Tags'        => 'Tags',
    'TextDomain'  => 'Text Domain',
    'DomainPath'  => 'Domain Path'
  ] );
} );
```

Default theme headers:

```
'Author'      => 'Fredrik Forsmo',
'AuthorURI'   => 'https://frozzare.com',
'Description' => 'Just a theme',
'Name'        => 'Custom theme',
'Version'     => '1.0.0'
```

### screenshot.png

Change theme screenshot uri. For example, to use a screenshot that exists in `app` directory:

```php
add_filter( 'wordpeak_theme_screenshot_uri', function () {
  return '/app/screenshot.png';
} );
```

## Folder structure

- `web/app` is the theme directory (only valid if you use a single theme)
- `web/content` is wp-content directory
- `web/foundation` is where you can place your non theme code

## Object cache

> This is only valid if you use a single theme and not multiple themes.

WordPeak store some information in the WordPress cache and with object cache we needed to fix some things for multisites and which group key should be used when. The cache function does support [WP Redis](https://github.com/pantheon-systems/wp-redis) from Pantheon, other object cache plugins may not work and may break the `style.css` cache.

## Helper functions

- `wp_is_dev` - Check whether currently running a live or dev environment.

## License

MIT © [Fredrik Forsmo](https://github.com/frozzare)
