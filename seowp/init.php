<?php 
/** 
 * SEOWP 
 * 
 * @package SEOWP 
 * @author Peter Till
 * @copyright 2022 Peter Till 
 * @license GPL-2.0-or-later 
 * 
 * @wordpress-plugin 
 * Plugin Name: SEOWP 
 * Plugin URI: https://github.com/petertill/seowp
 * Description: A powerful plugin that helps you to manage your SEO meta tags & gives you useful tipps about that.
 * Version: 0.0.1 
 * Author: Peter Till 
 * Author URI: https://github.com/petertill
 * Text Domain: seowp
 * License: GPL v2 or later 
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt */
?>


<?php
function seowp_main()  {
	//echo "<h1>Hey, Admin!</h1>";
	//echo "<h3 style='color: gray;'>Here you can change your SEO settings easily to get better rankings in search engines. You can also get ideas here about how to improve your SEO.</h3>";
	?>
	<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
	<h1>Hey, Admin!</h1>
	<h3 style='color: gray;'>Here you can change your SEO settings easily to get better rankings in search engines. You can also get ideas here about how to improve your SEO.</h3>
	<form method="post" action="<?php echo esc_html( admin_url( 'admin-post.php' ) ); ?>">
 
        <div id="universal-message-container">
            <h2>General information</h2>
 
            <div class="options">
                <p>
                    <label>Website title</label>
                    <br/>
                    <input type="text" name="meta-title" value="" /> Recommended: 60 characters<br>
                    <progress id="meta-title-bar" value="0" max="60"></progress><span id="meta-title-text">0</span>/60
                </p>
                <p>
                    <label>Description</label>
                    <br/>
                    <textarea rows="5" cols="20" name="meta-desc" value="" />Your description</textarea> Recommended: 137 characters<br>
                    <progress id="meta-desc-bar" value="0" max="137"></progress><span id="meta-desc-text">0</span>/137
                </p>
        </div><!-- #universal-message-container -->
        <div id="universal-message-container">
            <h2>Crawling</h2>
 
            <div class="options">
                <p>
                    <label>Keywords</label><br>
                    <span style='color: gray;'>Press [Space] to add</span>
                    <br/>
                    <div id="box">
						<ul>
							<li><input type="text" id="type"/></li>
						</ul>
					</div> Recommendation: Use min. 15 words and stop words<br>
                </p>
                <p>
                    <label>Description</label>
                    <br/>
                    <input type="text" name="name">
<!--span id="characters"><span-->
                    <progress id="progbar" value="5" max="137"></progress> <span id="prognum">0</span>/137
                </p>
        </div><!-- #universal-message-container -->
		<style>
			#box {width: 300px;}
			#box{padding:8px 2px;border:1px solid #CCCCCC;display:block}
#box input,#box input:active,#box input:focus{border:none;background:none;outline:none}
#box ul,#box li,#box input{margin:0;padding:0}
#box ul,#box li{list-style:none}
#box li,#box a{display:inline-block;margin:2px}
#box span{background-color:#EDEDED;padding:3px;color:#666666;border:1px solid #CCCCCC}
#box a{font-size:12px;line-height:12px;color:#666666;text-decoration:none;padding:1px 3px;margin-left:5px;font-weight:bold;background-color:#FFFFFF;vertical-align:top;border:1px solid #CCCCCC;margin-top:-1px}
#box a:hover{background-color:#666666;color:#FFFFFF}

/* why not? */
body{font-family:sans-serif}
#box span{border-radius:5px}
#box a{border-radius:100%;overflow:hidden}

.middle {color: green;}
.end {color: red;}
		</style>
		<script type="text/javascript">
			//answer for http://stackoverflow.com/questions/19799357/how-to-create-bounding-box-with-possible-deselect-after-space-of-each-word-enter/

function closer(){
    $('#box a').on('click', function() {
        $(this).parent().parent().remove(); 
    });
}
$('#type').keypress(function(e) {
    if(e.which == 32) {//change to 32 for spacebar instead of enter
        var tx = $(this).val();
        if (tx) {
            $(this).val('').parent().before('<li><span>'+tx+'<a href="javascript:void(0);">x</a></span></li>');
            closer();
        }
    }
});



$('input[name="meta-title"]').on('keyup keydown', updateTitleCount);
$('textarea[name="meta-desc"]').on('keyup keydown', updateDescCount);

function updateTitleCount() {
	var value = $(this).val().length;
  $('#meta-title-text').text($(this).val().length);
  $('#meta-title-bar').val($(this).val().length);
  $('#meta-title-text').removeClass("end");
  $('#meta-title-text').addClass(value < 50 ? "middle" : "end");
}

function updateDescCount() {
	var value = $(this).val().length;
  $('#meta-desc-text').text($(this).val().length);
  $('#meta-desc-bar').val($(this).val().length);
  $('#meta-desc-text').removeClass("end");
  $('#meta-desc-text').addClass(value < 120 ? "middle" : "end");
}
		</script>
        <?php
            wp_nonce_field( 'acme-settings-save', 'acme-custom-message' );
            submit_button();
        ?>
 
    </form>
<?php
}
function main_admin_menu()  {
  add_menu_page(
    'SEOWP Settings',// page title  
    'SEOWP',// menu title  
    'manage_options',// capability  
    'seowp_admin_main',// menu slug  
    'seowp_main',  // callback function
    'dashicons-tag' //icon
  );
  add_menu_page(
    'SEOWP Report',// page title  
    'SEOWP Report',// menu title  
    'manage_options',// capability  
    'seowp_admin_report',// menu slug  
    'seowp_report',  // callback function
    'dashicons-lightbulb' //icon
  );
}  
add_action( 'admin_menu', 'main_admin_menu' );







?>


<!--?php
    wp_nonce_field( 'acme-settings-save', 'acme-custom-message' );
    submit_button();
?-->
