<?php
/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt,
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Thiết lập MySQL - Bạn có thể lấy các thông tin này từ host/server ** //
/** Tên database MySQL */
define( 'DB_NAME', 'flycam' );

/** Username của database */
define( 'DB_USER', 'root' );

/** Mật khẩu của database */
define( 'DB_PASSWORD', '' );

/** Hostname của database */
define( 'DB_HOST', 'localhost' );

/** Database charset sử dụng để tạo bảng database. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Kiểu database collate. Đừng thay đổi nếu không hiểu rõ. */
define('DB_COLLATE', '');

/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         't#tDd{c0q5:#*r+SG/+m2` ,D?LWegM4S4+kYTJ*DnZoXd4rT6o#*xkkap{9A<3y' );
define( 'SECURE_AUTH_KEY',  '4N gEB(duXr~GO%8+b>e#`%:%PFSr.FAj,t2KbtJd(H[d)!EZyv<I#oiIz@A}8AI' );
define( 'LOGGED_IN_KEY',    '4(X?~MA=3Xt3IO67o5>PW{F!CZI~{y(LmBentCpWx:u(:2Jh5)YaZ?:R;e23=:V~' );
define( 'NONCE_KEY',        'R)yE#RW1u%4QLb,,@I&;m$0viyjzfEh8uy;@n=SX?w8^a-W3.vy2S-O}Y`c]{Kj3' );
define( 'AUTH_SALT',        '#xNd~kNDim2BD&rLuo-3_VC6aV5=x5c5g2;,C+,|_z2;/x$sI){nUfk0Gx7/4YES' );
define( 'SECURE_AUTH_SALT', 'FeD,gSX.uH#G,|5]YG9%r=U)B&YyWkbqMRg(-5dxJRQ[2#PAw$xMO,Y(@x/ZUU94' );
define( 'LOGGED_IN_SALT',   'G[Ris0rIW?tn4r/g*Yaz>p9r^ N$xO7L3N>.h#aV1$SgvR: sm[$3K*X?W+vQlWe' );
define( 'NONCE_SALT',       'I^I}f31@3+Q7Kd4!=>l.$g3_$drX*`Um2WwI)J>g;!!/Ct[6Xgfi2b=mMo-w+nv=' );

/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix  = 'wp_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true);
define( 'WP_AUTO_UPDATE_CORE', false );
define('WP_HOME','http://localhost/flycam/');
define('WP_SITEURL','http://localhost/flycam/');
/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');
