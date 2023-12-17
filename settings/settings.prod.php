<?php

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
$settings['hash_salt'] = file_get_contents('../salt.prod.txt');
$settings['skip_permissions_hardening'] = FALSE;

# ================================================================
# Config split configuration.
# ================================================================
$config['config_split.config_split.dev']['status'] = FALSE;
$config['config_split.config_split.ci']['status'] = FALSE;
$config['config_split.config_split.integration']['status'] = FALSE;
$config['config_split.config_split.stage']['status'] = FALSE;
$config['config_split.config_split.preprod']['status'] = FALSE;
$config['config_split.config_split.prod']['status'] = TRUE;

# ================================================================
# Trusted host patterns.
# ================================================================
$settings['trusted_host_patterns'] = [
  '^' . preg_quote('waac.inetum.world') . '$',
  '^' . preg_quote('www.inetum.com') . '$',
  '^' . preg_quote('inetum.com') . '$',
  '^' . preg_quote('localhost') . '$',
];

# ================================================================
# Enable access to rebuild.php.
# ================================================================
$settings['rebuild_access'] = FALSE;

# ================================================================
# Logging settings
# ================================================================
$config['system.logging']['error_level'] = 'hide';

# ================================================================
# Performance settings
# ================================================================
$config['system.performance']['css']['preprocess'] = TRUE;
$config['system.performance']['css']['gzip'] = TRUE;
$config['system.performance']['js']['preprocess'] = TRUE;
$config['system.performance']['js']['gzip'] = TRUE;

# ================================================================
# XMLsitemap settings
# ================================================================
$settings['xmlsitemap_base_url'] = 'https://www.inetum.com';

# ================================================================
# Debug views settings
# ================================================================
$config['views.settings']['ui']['show']['sql_query']['enabled'] = FALSE;
$config['views.settings']['ui']['show']['performance_statistics'] = FALSE;

# ================================================================
# Expiration of temporary upload files
# ================================================================
$config['system.file']['temporary_maximum_age'] = 604800;

# ================================================================
# Redis
# ================================================================
$settings['redis.connection']['interface'] = 'PhpRedis';
$settings['redis.connection']['host'] = getenv('REDIS_HOST');
$settings['redis.connection']['port'] = getenv('REDIS_PORT');
$settings['redis.connection']['base'] = getenv('REDIS_BASE');
$settings['cache']['default'] = 'cache.backend.redis';
$settings['cache_prefix']['default'] = 'website_';

# ================================================================
# Environment indicator
# ================================================================
$config['environment_indicator.indicator']['bg_color'] = '#00aa9b';
$config['environment_indicator.indicator']['fg_color'] = '#fff';
$config['environment_indicator.indicator']['name'] = 'production';
