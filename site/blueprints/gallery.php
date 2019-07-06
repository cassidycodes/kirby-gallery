<?php if(!defined('KIRBY')) exit ?>

title: Gallery
pages: false
files:
  type:
    - image
  sortable: true
fields:
  title:
    label: Title
    type:  text
  galleryImages:
    label: Gallery Images
    type: checkboxes
    options: images
  galleryOptions:
    label: Options:
    type: radio
    default: cover
    options:
      cover: Use first image as cover image.
      thumbs: Show gallery as thumnails.