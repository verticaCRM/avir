<!--++++++++++++++ Footer Section Start +++++++++++++++++++++++++-->
<div id="footerOuterSeparator"></div>
	<div id="divFooter" class="theme-background1-dk">
		<?php gmwd_map( 1, 1); ?>
		<div class="container">
			<div class="divPanel">
				<div class="row">
					<?php if (!dynamic_sidebar('home-ft')) : ?>
					<?php endif; // end primary widget area  ?>
				</div>
				<div class="row">
					<div class="col-md-12">
						<?php if ( has_nav_menu( 'secondary' ) ) : ?>
						<nav role="navigation" class="navigation site-navigation secondary-navigation">
							<?php wp_nav_menu( array( 'theme_location' => 'secondary','menu_id' => 'nava','depth'=>-1 ) ); ?>
						</nav>
						<?php endif; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<p>
							<span class="copyright"> &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>, <?php _e( 'All Rights Reserved.'); ?></span><br>
							<a href="http://businessbrokerscrm.com/" target="blank">Powered by Business Brokers CRM</a>
						</p>
					</div>
				</div>
				<br />
			</div>
		</div>
	</div>
<?php wp_footer(); ?>
</body></html>
