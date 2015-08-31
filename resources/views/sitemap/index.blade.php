<?php echo '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL; ?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  @foreach ($routes as $route)
  <sitemap>
    <loc>{{ $route }}</loc>
  </sitemap>
  @endforeach
</sitemapindex>
