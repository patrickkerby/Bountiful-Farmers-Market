<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Vendors extends Controller
{
  public function vendorLoop()
  {
      $vendor_items = get_posts([
          'post_type' => 'vendors',
          'posts_per_page'=>'200',
      ]);
  
      return array_map(function ($post) {
          return apply_filters('the_content', $post->post_content);
      }, $vendor_items);
  }
  
}
