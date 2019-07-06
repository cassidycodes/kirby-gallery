# Kirby Gallery

A gallery plugin for [Kirby 2](http://getkirby.com) that uses [Zurb Foundation](http://foundation.zurb.com/).

## Installation
1. Place gallery.php in your site/plugins directory.
2. Place site/blueprints/gallery.php in your site/blueprints directory.

### Not Using Foundation?
If you are not already using Foundation, there are a couple additional steps:

1. Place foundation.css in your asstes/css directory.
2. Place the contents of assets/js in your assets/js directory.
3. In your snippets/header.php include:
```html
<?php echo css("assets/css/foundation.css") ?>
<?php echo js("assets/js/vendor/modernizr.js") ?>`
```
4. In your snippets/footer.php include:
```html
  <?php echo js("assets/js/vendor/jquery.js") ?>
  <?php echo js("assets/js/foundation.min.js") ?>
  <script>
    $(document).foundation();
  </script>
```

## Usage

Create a child page using the Gallery template and add images.

Show a gallery on a page using `<?php echo getGallery($page, $galleryUri) ?>`

Replace `$galleryUri` in the example above with the URI of the gallery page. 

## To Do
- create a Kirby Tag so that galleries can be added with `(gallery: uri)`.