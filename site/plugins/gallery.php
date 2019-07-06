<?php

function getGalleryImageNames($page) {
  return str::split($page->galleryImages());
}

function hasCoverImage($page) {
  return $page->galleryOptions() == "cover";
}

function getThumbOpts($coverimage) {
  switch ($coverimage) {
    case false:
      return array('width' => 130, 'height' => 130, 'crop' => true);
      break;
    default:
      return array('width' => 800, 'height' => 300, 'crop' => true);
      break;
  }
}

function getGalleryThumb($page, $gallery_img, $coverimage = true) {
  $img        = brick('img');
  $image      = $page->image($gallery_img);
  $thumb_opts = getThumbOpts($coverimage);
  $img->attr('src', thumb($image, $thumb_opts)->url());
  $img->data('caption', $image->caption());
  return $img;
}

function assembleImages($page) {
  $listItems = array();
  $images    = getGalleryImageNames($page);
  $cover     = hasCoverImage($page);

  foreach ($images as $key => $image) {
    $thumb = getGalleryThumb($page, $image, $cover);
    $attrs = array( 'class' => 'th', 'href' => $page->image($image)->url() );
    $a     = html::tag("a", $thumb, $attrs);
    $li    = brick("li");
    if($cover && $key == 0) $li->addClass("clearing-featured-img");
    $li->html($a);
    array_push($listItems, $li->toString());
  }
  return implode($listItems, "");
}

function assembleGallery($page) {
  $ul     = brick("ul");
  $ul->addClass("gallery clearing-thumbs");
  $ul->data("clearing", " ");
  $ul->html(assembleImages($page));
  if(hasCoverImage($page)) $ul->addClass("clearing-feature");
  return $ul;
}

function getGallery($page, $galleryUri) {
  $galleryPage = $page->children()->find($galleryUri);
  return assembleGallery($galleryPage);
}

?>