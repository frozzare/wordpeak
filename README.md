# WordPeak

Experimental WordPress stack build on top of [Bedrock](https://github.com/roots/bedrock). Plugins may not work with this structure.

## The theme

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

You may not like that you're screenshot is in `app` directory, this can be changed with `wordpeak_screenshot_uri` filter. For example, to use a screenshot that exists in `content` directory:

```php
add_filter( 'wordpeak_screenshot_uri', function () {
  return '/content/screenshot.png';
} );
```

## Folder structure

- `web/app` is the theme directory
- `web/content` is wp-content directory
- `web/foundation` is where you can place your non theme code

## Object cache

WordPeak store some information in the WordPress cache and with object cache we needed to fix some things for multisites and which group key should be used when. The cache function does support [WP Redis](https://github.com/pantheon-systems/wp-redis) from Pantheon, other object cache plugins may not work and may break the `style.css` cache.

## Helper functions

- `wp_is_dev` - Check whether currently running a live or dev environment.

## License

MIT © [Fredrik Forsmo](https://github.com/frozzare)
