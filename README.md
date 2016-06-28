# WordPeak

Experimental WordPress stack build on top of [Bedrock](https://roots.io/bedrock/). Plugins may not work with this structure.

## The theme

The theme use [Digster](https://github.com/frozzare/wp-digster) to render Twig views.

### style.css

You can forget about the `style.css` file and add theme information using `wordpeak_theme_headers`.

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
    'DomainPath'  => 'Domain Path',
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

## Folder structure

- `web/app` is the theme directory
- `web/content` is wp-content directory
- `web/foundation` is where you can place your non theme code

## Object cache

Since h

## License

MIT © [Fredrik Forsmo](https://github.com/frozzare)
