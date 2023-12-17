<?php

// get environment context
$environment = getenv('APP_ENVIRONMENT') ? getenv('APP_ENVIRONMENT') : 'dev';

// generic settings variables
$settings['file_scan_ignore_directories'] = ['node_modules', 'bower_components'];
$settings['entity_update_batch_size'] = 50;
$settings['custom_translations_directory'] = '../translations';
$settings['update_free_access'] = FALSE;
$settings['rebuild_access'] = FALSE;

// config folder
$settings['config_sync_directory'] = '../config/sync';

// public file path
$settings['file_public_path'] = 'upload/public';

// private file path
$settings['file_private_path'] = '../private';

// chmod files & folders
$settings['file_chmod_directory'] = 0775;
$settings['file_chmod_file'] = 0664;

// check if environment settings file is here
if (file_exists($app_root . '/../settings/settings.' . $environment . '.php')) {
  require_once $app_root . '/../settings/settings.' . $environment . '.php';
  $settings['container_yamls'][] = $app_root . '/../settings/services/services.' . $environment . '.yml';
}
