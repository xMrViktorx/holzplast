<?php
if (!function_exists('formatPrice')) {
  function formatPrice($price)
  {
    $price = number_format($price, 0, ",", " ");

    return $price . ' Ft';
  }
}
