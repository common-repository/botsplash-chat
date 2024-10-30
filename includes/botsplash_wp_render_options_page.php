<?php
/*
 * Inserts the html into the Admin > Settings > Botsplash options page
 *
 * @package Botsplash Chat
 * @subpackage Botsplash WP Chat Render Options Page
 * @since 1.0.0
 */
?>
<style type="text/css">
	.bos-heading {
		margin: 0;
		padding: 0;
	}
	.bos-subheading {
		margin-bottom: 10px;
	}
  .bos-logo {
    display: block;
    margin: 0 auto;
  }
</style>
<table class="form-table">
	<tbody>
		<tr>
			<th>
        <img
          src="<?php echo plugins_url( '../images/logo-150.png', __FILE__ ); ?>"
          alt="Botsplash Logo"
          class="bos-logo"
        />
			</th>
			<td>
				<h1 class="bos-heading">Botsplash Chat</h1>
				<div class="wrap">
					<form method="post" action="options.php">
					<?php settings_fields( 'botsplash_wp_options_group' ); ?>
					<?php do_settings_sections( 'botsplash_wp_admin' ); ?>

					</form>
				</div>
			</td>
		</tr>
		<tr>
			<th></th>
			<td>
				<h2>Follow these steps to get the "Botsplash App ID"</h2>

				<table>
					<tr>
						<td>
							<h3>New to botsplash?</h3>
							<ul>
							<li>1. <a href="https://botsplash.com/app/#/signup" target="_blank">Sign up</a> for botsplash account.</li>
							<li>2. Follow instrucitons and setup your channels and notifications.</li>
							<li>3. In the Live Chat screen, copy the the "App ID" and paste it in the above textbox.</li>
							</ul>
							<h3>Already have an Account?</h3>
							<ul>
								<li>1. <a href="https://botsplash.com/app/#/login" target="_blank">Login</a> to your botsplash account.</li>
								<li>2. On the top right corner, click on your profile, click settings and select App Info left tab.</li>
								<li>3. Copy the "App ID" and paste it in the above textbox.</li>
							</ul>
						</td>
						<td>
							<iframe width="460" height="259" src="https://www.youtube.com/embed/nIPl0iz7kgM" frameborder="0" allowfullscreen></iframe>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</tbody>
</table>
