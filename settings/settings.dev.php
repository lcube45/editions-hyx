<?php

/**
 * Assertions.
 *
 * The Drupal project primarily uses runtime assertions to enforce the
 * expectations of the API by failing when incorrect calls are made by code
 * under development.
 *
 * @see http://php.net/assert
 * @see https://www.drupal.org/node/2492225
 *
 * If you are using PHP 7.0 it is strongly recommended that you set
 * zend.assertions=1 in the PHP.ini file (It cannot be changed from .htaccess
 * or runtime) on development machines and to 0 in production.
 *
 * @see https://wiki.php.net/rfc/expectations
 */
assert_options(ASSERT_ACTIVE, TRUE);
\Drupal\Component\Assertion\Handle::register();

# ================================================================
# Database credentials.
# ================================================================
$databases['default']['default'] = [
  'database' => getenv('DB_DATABASE'),
  'username' => getenv('DB_USER'),
  'password' => getenv('DB_PASSWORD'),
  'prefix' => getenv('DB_PREFIX'),
  'host' => getenv('DB_HOSTNAME'),
  'port' => getenv('DB_PORT'),
  'namespace' => getenv('DB_NAMESPACE'),
  'driver' => getenv('DB_DRIVER'),
];

# ================================================================
# Specific settings.
# ================================================================
$settings['skip_permissions_hardening'] = TRUE;
$settings['hash_salt'] = file_get_contents('../salt.txt');

# ================================================================
# Config split configuration.
# ================================================================
$config['config_split.config_split.dev']['status'] = TRUE;
$config['config_split.config_split.ci']['status'] = FALSE;
$config['config_split.config_split.prod']['status'] = FALSE;

# ================================================================
# Trusted host patterns.
# ================================================================
$settings['trusted_host_patterns'] = [
  '^' . preg_quote('editions-hyx.test') . '$',
];

# ================================================================
# Disable page cache and other cache bins
# ================================================================
#$settings['cache']['bins']['render'] = 'cache.backend.null';
#$settings['cache']['bins']['dynamic_page_cache'] = 'cache.backend.null';

/*
$cache_bins = array('bootstrap','config','data','default','discovery','dynamic_page_cache','entity','menu','migrate','render','rest','static','toolbar');
foreach ($cache_bins as $bin) {
  $settings['cache']['bins'][$bin] = 'cache.backend.null';
}
*/

# ================================================================
# Logging settings
# ================================================================
$config['system.logging']['error_level'] = 'all';

# ================================================================
# Performance settings
# ================================================================
$config['system.performance']['css']['preprocess'] = FALSE;
$config['system.performance']['css']['gzip'] = FALSE;
$config['system.performance']['js']['preprocess'] = FALSE;
$config['system.performance']['js']['gzip'] = FALSE;

# ================================================================
# XMLsitemap settings
# ================================================================
$settings['xmlsitemap_base_url'] = 'http://editions-hyx.test';

# ================================================================
# Debug views settings
# ================================================================
$config['views.settings']['ui']['show']['sql_query']['enabled'] = TRUE;
$config['views.settings']['ui']['show']['performance_statistics'] = TRUE;

# ================================================================
# Expiration of temporary upload files
# ================================================================
$config['system.file']['temporary_maximum_age'] = 604800;
