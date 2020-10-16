<?php
/**
 * Plugin Name: Viet Affiliate Link
 * Plugin URI: https://trinhtuantai.com
 * Description: Support to change the links in article content. Links from e-commerce sites in the article content will be changed to links through markets or affiliate platforms in Vietnam. 
 * Version: 1.1.1
 * Requires at least: 5.0
 * Requires PHP: 5.4
 * Author: trinhtuantai
 * Author URI: https://trinhtuantai.com/contact
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

add_action('admin_menu', 'viet_affiliate_link_create_menu');

function viet_affiliate_link_create_menu() {
    add_menu_page('Viet Affiliate Link Settings', 'Viet Affiliate Link', 'administrator', __FILE__, 'viet_affiliate_link_settings_page',plugins_url('viet-affiliate-link/viet-affiliate-link.png'), 100);
    add_action( 'admin_init', 'viet_affiliate_link_register_settings' );
}

add_filter( 'plugin_action_links_'.plugin_basename( plugin_dir_path( __FILE__ ) . 'viet-affiliate-link.php'), 'viet_affiliate_link_plugin_settings_link' );
function viet_affiliate_link_plugin_settings_link( $links ) { 
	$url = esc_url( add_query_arg(
		'page',
		'viet-affiliate-link/viet-affiliate-link.php',
		get_admin_url() . 'admin.php'
	) );
	// Create the link.
	$settings_link = "<a href='$url'>" . __( 'Settings' ) . '</a>';
	// Adds the link to the end of the array.
	array_push(
		$links,
		$settings_link
	);
	return $links;
}

function viet_affiliate_link_register_settings() {
    register_setting( 'viet_affiliate_link', 'viet_affiliate_link_lazada_domain' );
    register_setting( 'viet_affiliate_link', 'viet_affiliate_link_shopee_domain' );
    register_setting( 'viet_affiliate_link', 'viet_affiliate_link_accesstrade_domain' );
    register_setting( 'viet_affiliate_link', 'viet_affiliate_link_masoffer_domain' );
    register_setting( 'viet_affiliate_link', 'viet_affiliate_link_ecomobi_domain' );

    register_setting( 'viet_affiliate_link', 'viet_affiliate_link_lazada_prefix' );
    register_setting( 'viet_affiliate_link', 'viet_affiliate_link_shopee_prefix' );
    register_setting( 'viet_affiliate_link', 'viet_affiliate_link_accesstrade_prefix' );
    register_setting( 'viet_affiliate_link', 'viet_affiliate_link_masoffer_prefix' );
    register_setting( 'viet_affiliate_link', 'viet_affiliate_link_ecomobi_prefix' );
}

define('VAL_LAZADA_DOMAIN', 'lazada.vn,www.lazada.vn,pages.lazada.vn,www.pages.lazada.vn,ali.lazada.vn,www.ali.lazada.vn');
define('VAL_LAZADA_PREFIX', 'https://c.lazada.vn/t/c.ZClWXd');
define('VAL_SHOPEE_DOMAIN', 'shopee.vn,www.shopee.vn');
define('VAL_SHOPEE_PREFIX', 'http://prf.hn/click/camref:1011l7sZg');
define('VAL_ACCESSTRADE_DOMAIN', 'tiki.vn,www.tiki.vn,shopee.vn,www.shopee.vn,www.lazada.vn,lazada.vn,pages.lazada.vn,www.pages.lazada.vn,ali.lazada.vn,www.ali.lazada.vn,dunlopsports.com.vn,www.dunlopsports.com.vn,www.vinabook.com,vinabook.com,www.yes24.vn,yes24.vn,fiditour.com,www.fiditour.com,www.agoda.com,agoda.com,divui.com,www.divui.com,www.gotadi.com,gotadi.com,www.atadi.vn,atadi.vn,begodi.com,www.begodi.com,www.ivivu.com,ivivu.com,cards.vpbank.com.vn,www.cards.vpbank.com.vn,sacombank.vnfiba.com,www.sacombank.vnfiba.com,citibank.vnfiba.com,www.citibank.vnfiba.com,ferosh.vn,www.ferosh.vn,kyna.vn,www.kyna.vn,www.mykingdom.com.vn,mykingdom.com.vn,booking.com,www.booking.com,www.fahasa.com,fahasa.com,shinhanbank.vnfiba.com,www.shinhanbank.vnfiba.com,benthanhtourist.com,www.benthanhtourist.com,www.vntrip.vn,vntrip.vn,dichungtaxi.com,www.dichungtaxi.com,aeoneshop.com,www.aeoneshop.com,sea.banggood.com,banggood.com,www.sea.banggood.com,www.banggood.com,mytour.vn,www.mytour.vn,www.klook.com,klook.com,fado.vn,www.fado.vn,bestprice.vn,www.bestprice.vn,vuabia.com,www.vuabia.com,www.nguyenkim.com,nguyenkim.com,thefaceshop.com.vn,www.thefaceshop.com.vn,www.bookin.vn,bookin.vn,hc.com.vn,www.hc.com.vn,travel.com.vn,www.travel.com.vn,m6.fptplay.tv,www.m6.fptplay.tv,,www.robins.vn,robins.vn,www.luxstay.net,luxstay.net,vemaybay.alotrip.vn,www.vemaybay.alotrip.vn,book.rio.vn,www.book.rio.vn,vivavivu.com,www.vivavivu.com,tima.vn,www.tima.vn,www.shb.com.vn,shb.com.vn,fptshop.com.vn,www.fptshop.com.vn,www.vuivui.com,vuivui.com,bibabo.vn,www.bibabo.vn,www.mia.vn,mia.vn,canifa.com,www.canifa.com,juno.vn,www.juno.vn,laka.vn,www.laka.vn,thecosmo.vn,www.thecosmo.vn,ifitness.vn,www.ifitness.vn,phongvu.vn,www.phongvu.vn,www.skyscanner.com.vn,skyscanner.com.vn,dhcvietnam.com.vn,www.dhcvietnam.com.vn,www.sendo.vn,sendo.vn');
define('VAL_ACCESSTRADE_PREFIX', 'https://go.isclix.com/deep_link/4919007811669368624');
define('VAL_MASOFFER_DOMAIN', 'travel.com.vn,www.travel.com.vn,www.matbao.net,matbao.net,m6.fptplay.tv,www.m6.fptplay.tv,fptplay.tv,www.fptplay.tv,www.robins.vn,robins.vn,thestone.vn,www.thestone.vn,myphamchonam.com,www.myphamchonam.com,daithanhgroup.vn,www.daithanhgroup.vn,www.vascara.com,vascara.com,doctordong.vn,www.doctordong.vn,www.shb.com.vn,shb.com.vn,atmonline.vn,www.atmonline.vn,kimangroup.com,www.kimangroup.com,mothevpbank.com,www.mothevpbank.com,www.tuticare.com,tuticare.com,trip.com,www.trip.com,www.bambooairways.com,bambooairways.com,www.kidsplaza.vn,kidsplaza.vn,marc.com.vn,www.marc.com.vn,sablanca.vn,www.sablanca.vn,coupletx.com,www.coupletx.com,aliexpress.com,www.aliexpress.com,mediamart.vn,www.mediamart.vn,viettelstore.vn,www.viettelstore.vn,dinhtibooks.com.vn,www.dinhtibooks.com.vn,www.petcity.vn,petcity.vn,www.nxbkimdong.com.vn,nxbkimdong.com.vn,newshop.vn,www.newshop.vn,kangaroovietnam.vn,www.kangaroovietnam.vn,chungxe.vn,www.chungxe.vn,maybi.store,www.maybi.store,www.nguyenkim.com,nguyenkim.com');
define('VAL_MASOFFER_PREFIX', 'https://gotrackecom.info/v0/_6m8SdBJ81c1UunxJE290Q');
define('VAL_ECOMOBI_DOMAIN', 'bibabo.vn,www.bibabo.vn,canifa.com,www.canifa.com,juno.vn,www.juno.vn,laka.vn,www.laka.vn,thecosmo.vn,www.thecosmo.vn,ifitness.vn,www.ifitness.vn,www.skyscanner.com.vn,skyscanner.com.vn,dhcvietnam.com.vn,www.dhcvietnam.com.vn,labra.vn,www.labra.vn,mytour.vn,www.mytour.vn,hnossfashion.com,www.hnossfashion.com,concung.com,www.concung.com,binhminhdigital.com,www.binhminhdigital.com,lug.vn,www.lug.vn,ladopharma.vn,www.ladopharma.vn,www.kosmebox.com,kosmebox.com,www.skinstore.vn,skinstore.vn,vexere.com,www.vexere.com,sunhouseonline.vn,www.sunhouseonline.vn');
define('VAL_ECOMOBI_PREFIX', 'http://go.ecotrackings.com//?token=azKVhfnWpUZYsjAVAPifj');

function viet_affiliate_link_settings_page() {
    ?>
    <div class="wrap">
        <h1>Cấu hình các domain cho chợ / platforms affiliate tương ứng</h1>
        <p>Các domain được cấu hình trong chợ / platforms affiliate tương ứng sẽ được chuyển thành link của chợ / platforms affiliate tương ứng</p>
        <p>Để lấy cấu trúc link bạn hãy đăng nhập vào tài khoản affiliate trên nền tảng affiliate tương ứng, tạo 1 link và copy phần url chung theo ví dụ mô tả cho cấu hình từng mục bên dưới</p>
        <p>Các domain nhập vào các domain bạn muốn chuyển link thành link affiliate tương ứng, các domain phân cách nhau bởi dấu phẩy (,) . Ví dụ: <?php echo VAL_LAZADA_DOMAIN;?></p>
        <p>Lưu ý: Affiliate cho trang TMĐT không nhất thiết phải chạy trên nên tảng affiliate do trang đó cung cấp, ví dụ bạn có thể chạy affiliate cho Lazada, Shopee thông qua AccessTrade, trong trường hợp đó hãy nhập domain lazada.vn, shopee.vn ... vào phần cấu hình domain của  AccessTrade</p>
        <?php if( isset($_GET['settings-updated']) ) { ?>
            <div id="message" class="updated">
                <p><strong><?php _e('Mọi thông tin cài đặt đã được lưu') ?></strong></p>
            </div>
        <?php } ?>
        <form method="post" action="options.php">
            <?php settings_fields( 'viet_affiliate_link' ); ?>

            <h2>Lazada Affiliate platform</h2>
            <table class="form-table">
                <tr>
                    <th><label for="viet_affiliate_link_lazada_prefix">Cấu trúc link</label></th>
                    <td>
                        <input type="text" id="viet_affiliate_link_lazada_prefix" name="viet_affiliate_link_lazada_prefix" class="large-text code" value="<?php echo get_option('viet_affiliate_link_lazada_prefix');?>">
                        <p class="description">Thay cấu hình mặc định bằng cấu trúc link trên tài khoản của bạn. VD (lấy phần in đậm): <b><?php echo VAL_LAZADA_PREFIX;?></b>?url=https%3A%2F%2Fwww.lazada.vn&sub_aff_id=subaffid&sub_id1=s1&sub_id2=s2&sub_id3=s3&sub_id4=s4</p>
                    </td>
                </tr>
                <tr>
                    <th><label for="viet_affiliate_link_lazada_domain">Các domain</label></th>
                    <td>
                        <textarea id="viet_affiliate_link_lazada_domain" name="viet_affiliate_link_lazada_domain" rows="10" cols="100" class="large-text code"><?php echo get_option('viet_affiliate_link_lazada_domain');?></textarea>
                        <p class="description">Các domain phân cách nhau bằng dấu phẩy, nếu không dùng chợ / platforms này hãy để trống</p>
                    </td>
                </tr>
            </table>

            <h2>Shopee Affiliate platform</h2>
            <table class="form-table">
                <tr>
                    <th><label for="viet_affiliate_link_shopee_prefix">Cấu trúc link</label></th>
                    <td>
                        <input type="text" id="viet_affiliate_link_shopee_prefix" name="viet_affiliate_link_shopee_prefix" class="large-text code" value="<?php echo get_option('viet_affiliate_link_shopee_prefix');?>">
                        <p class="description">Thay cấu hình mặc định bằng cấu trúc link trên tài khoản của bạn. VD (lấy phần in đậm): <b><?php echo VAL_SHOPEE_PREFIX;?></b>/destination:https%3A%2F%2Fshopee.vn/adref:'sub1/pubref:sub2</p>
                    </td>
                </tr>
                <tr>
                    <th><label for="viet_affiliate_link_shopee_domain">Các domain</label></th>
                    <td>
                        <textarea id="viet_affiliate_link_shopee_domain" name="viet_affiliate_link_shopee_domain" rows="10" cols="100" class="large-text code"><?php echo get_option('viet_affiliate_link_shopee_domain');?></textarea>
                        <p class="description">Các domain phân cách nhau bằng dấu phẩy, nếu không dùng chợ / platforms này hãy để trống</p>
                    </td>
                </tr>
            </table>

            <h2>Accesstrade Affiliate platform</h2>
            <table class="form-table">
                <tr>
                    <th><label for="viet_affiliate_link_accesstrade_prefix">Cấu trúc link</label></th>
                    <td>
                        <input type="text" id="viet_affiliate_link_accesstrade_prefix" name="viet_affiliate_link_accesstrade_prefix" class="large-text code" value="<?php echo get_option('viet_affiliate_link_accesstrade_prefix');?>">
                        <p class="description">Thay cấu hình mặc định bằng cấu trúc link trên tài khoản của bạn. VD (lấy phần in đậm): <b><?php echo VAL_ACCESSTRADE_PREFIX;?></b>?url=https%3A%2F%2Ftiki.vn&utm_source=sub1&utm_medium=sub2&utm_campaign=sub3&utm_content=sub4</p>
                    </td>
                </tr>
                <tr>
                    <th><label for="viet_affiliate_link_accesstrade_domain">Các domain</label></th>
                    <td>
                        <textarea id="viet_affiliate_link_accesstrade_domain" name="viet_affiliate_link_accesstrade_domain" rows="10" cols="100" class="large-text code"><?php echo get_option('viet_affiliate_link_accesstrade_domain');?></textarea>
                        <p class="description">Các domain phân cách nhau bằng dấu phẩy, nếu không dùng chợ / platforms này hãy để trống</p>
                    </td>
                </tr>
            </table>

            <h2>Masoffer Affiliate platform</h2>
            <table class="form-table">
                <tr>
                    <th><label for="viet_affiliate_link_masoffer_prefix">Cấu trúc link</label></th>
                    <td>
                        <input type="text" id="viet_affiliate_link_masoffer_prefix" name="viet_affiliate_link_masoffer_prefix" class="large-text code" value="<?php echo get_option('viet_affiliate_link_masoffer_prefix');?>">
                        <p class="description">Thay cấu hình mặc định bằng cấu trúc link trên tài khoản của bạn. VD (lấy phần in đậm): <b><?php echo VAL_MASOFFER_PREFIX;?></b>?url=https%3A%2F%2Fshopee.vn&aff_sub1=sub1&aff_sub2=sub2&aff_sub3=sub3&aff_sub4=sub4</p>
                    </td>
                </tr>
                <tr>
                    <th><label for="viet_affiliate_link_masoffer_domain">Các domain</label></th>
                    <td>
                        <textarea id="viet_affiliate_link_masoffer_domain" name="viet_affiliate_link_masoffer_domain" rows="10" cols="100" class="large-text code"><?php echo get_option('viet_affiliate_link_masoffer_domain');?></textarea>
                        <p class="description">Các domain phân cách nhau bằng dấu phẩy, nếu không dùng chợ / platforms này hãy để trống</p>
                    </td>
                </tr>
            </table>

            <h2>Ecomobi Affiliate platform</h2>
            <table class="form-table">
                <tr>
                    <th><label for="viet_affiliate_link_ecomobi_prefix">Cấu trúc link</label></th>
                    <td>
                        <input type="text" id="viet_affiliate_link_ecomobi_prefix" name="viet_affiliate_link_ecomobi_prefix" class="large-text code" value="<?php echo get_option('viet_affiliate_link_ecomobi_prefix');?>">
                        <p class="description">Thay cấu hình mặc định bằng cấu trúc link trên tài khoản của bạn. VD (lấy phần in đậm): <b><?php echo VAL_ECOMOBI_PREFIX;?></b>&url=https%3A%2F%2Fshopee.vn&sub1=sub1&sub2=sub2&sub3=sub3&sub4=sub4</p>
                    </td>
                </tr>
                <tr>
                    <th><label for="viet_affiliate_link_ecomobi_domain">Các domain</label></th>
                    <td>
                        <textarea id="viet_affiliate_link_ecomobi_domain" name="viet_affiliate_link_ecomobi_domain" rows="10" cols="100" class="large-text code"><?php echo get_option('viet_affiliate_link_ecomobi_domain');?></textarea>
                        <p class="description">Các domain phân cách nhau bằng dấu phẩy, nếu không dùng chợ / platforms này hãy để trống</p>
                    </td>
                </tr>
            </table>


            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}


add_filter( 'the_content', 'viet_affiliate_link_change_link' );
function viet_affiliate_link_change_link($content) {
    global $wp;
    $sub1 = urlencode(home_url($wp->request));
    $sub2 = get_author_name();
    $sub3 = urlencode(get_site_url());
    $sub4 = 'viet-affiliate-link';

    $lazada_prefix = get_option('viet_affiliate_link_lazada_prefix',VAL_LAZADA_PREFIX);
    $lazada_domain = explode(',',get_option('viet_affiliate_link_lazada_domain',VAL_LAZADA_DOMAIN));
    $shopee_prefix = get_option('viet_affiliate_link_shopee_prefix',VAL_SHOPEE_PREFIX);
    $shopee_domain = explode(',',get_option('viet_affiliate_link_shopee_domain',VAL_SHOPEE_DOMAIN));
    $accesstrade_prefix = get_option('viet_affiliate_link_accesstrade_prefix',VAL_ACCESSTRADE_PREFIX);
    $accesstrade_domain = explode(',',get_option('viet_affiliate_link_accesstrade_domain',VAL_ACCESSTRADE_DOMAIN));
    $masoffer_prefix = get_option('viet_affiliate_link_masoffer_prefix',VAL_MASOFFER_PREFIX);
    $masoffer_domain = explode(',',get_option('viet_affiliate_link_masoffer_domain',VAL_MASOFFER_DOMAIN));
    $ecomobi_prefix = get_option('viet_affiliate_link_ecomobi_prefix',VAL_ECOMOBI_PREFIX);
    $ecomobi_domain = explode(',',get_option('viet_affiliate_link_ecomobi_domain',VAL_ECOMOBI_DOMAIN));

    $doc = new DOMDocument();
    @$doc->loadHTML('<meta http-equiv="content-type" content="text/html; charset=utf-8">'.$content);
    libxml_use_internal_errors(true);
    foreach($doc->getElementsByTagName('a') as $anchor) {
        $link = $anchor->getAttribute('href');
        $link_parse = parse_url($link);
        $site_link_parse = parse_url($site_link);
        if(!isset($link_parse['host'])) {
            $link_parse['host'] = '';
        }
        if($link_parse['host'] != $site_link_parse['host']) {
            if (in_array($link_parse['host'],$accesstrade_domain)) {
                $link = urlencode($link);
                $market_link = $accesstrade_prefix.'?url='.$link.'&utm_source='.$sub1.'&utm_medium='.$sub2.'&utm_campaign='.$sub3.'&utm_content='.$sub4.'';
                $anchor->setAttribute('rel', 'nofollow');
                $anchor->setAttribute('target', '__blank');
            }elseif (in_array($link_parse['host'],$lazada_domain)) {
                $link = urlencode($link);
                $market_link = $lazada_prefix.'?url='.$link.'&sub_id1='.$sub1.'&sub_id2='.$sub2.'&sub_id3='.$sub3.'&sub_id4='.$sub4.'';
                $anchor->setAttribute('rel', 'nofollow');
                $anchor->setAttribute('target', '__blank');
            }elseif (in_array($link_parse['host'],$shopee_domain)) {
                $link = urlencode($link);
                $market_link = $shopee_prefix.'/destination:'. $link.'/adref:'.$sub1.'/pubref:'.$sub2;
                $anchor->setAttribute('rel', 'nofollow');
                $anchor->setAttribute('target', '__blank');
            }elseif (in_array($link_parse['host'],$masoffer_domain)) {
                $link = urlencode($link);
                $market_link = $masoffer_prefix.'?url='.$link.'&aff_sub1='.$sub1.'&aff_sub2='.$sub2.'&aff_sub3='.$sub3.'&aff_sub4='.$sub4.'';
                $anchor->setAttribute('rel', 'nofollow');
                $anchor->setAttribute('target', '__blank');
            }elseif (in_array($link_parse['host'],$ecomobi_domain)) {
                $link = urlencode($link);
                $market_link = $ecomobi_prefix.'&url='.$link.'&sub1='.$sub1.'&sub1='.$sub2.'&sub1='.$sub3.'&sub1='.$sub4.'';
                $anchor->setAttribute('rel', 'nofollow');
                $anchor->setAttribute('target', '__blank');
            }else {
                $market_link = $link;
            }

            $anchor->setAttribute('href', $market_link);
        }
    }
    $content = $doc->saveHTML();
    $content = preg_replace('~<(?:!DOCTYPE|/?(?:html|body))[^>]*>\s*~i', '', $content);
    $content = str_replace('<meta http-equiv="content-type" content="text/html; charset=utf-8">','',$content);
    
    return $content;
}