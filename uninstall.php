<?php
// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

delete_option('viet_affiliate_link_lazada_domain');
delete_site_option('viet_affiliate_link_lazada_domain');// for site options in Multisite
delete_option('viet_affiliate_link_shopee_domain');
delete_site_option('viet_affiliate_link_shopee_domain');
delete_option('viet_affiliate_link_accesstrade_domain');
delete_site_option('viet_affiliate_link_accesstrade_domain');
delete_option('viet_affiliate_link_masoffer_domain');
delete_site_option('viet_affiliate_link_masoffer_domain');
delete_option('viet_affiliate_link_ecomobi_domain');
delete_site_option('viet_affiliate_link_ecomobi_domain');

delete_option('viet_affiliate_link_lazada_prefix');
delete_site_option('viet_affiliate_link_lazada_prefix');
delete_option('viet_affiliate_link_shopee_prefix');
delete_site_option('viet_affiliate_link_shopee_prefix');
delete_option('viet_affiliate_link_accesstrade_prefix');
delete_site_option('viet_affiliate_link_accesstrade_prefix');
delete_option('viet_affiliate_link_masoffer_prefix');
delete_site_option('viet_affiliate_link_masoffer_prefix');
delete_option('viet_affiliate_link_ecomobi_prefix');
delete_site_option('viet_affiliate_link_ecomobi_prefix');
 
// drop a custom database table
//global $wpdb;
//$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}mytable");