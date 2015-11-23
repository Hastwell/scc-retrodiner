<!-- begin main footer -->
	</div>
	<div id="footer">
		<div>
			<ul>
				<li class="first">
					<h2>Delivery Hotline</h2>
					<!--<h3>Call 0-123-456-789</h3>-->
					<h3>Call 0 118 9998 81999 119725 Extension 3</h3>
					<ul>
						<li>
							<a href="http://www.freewebsitetemplates.com/go/facebook" class="facebook"></a>
						</li>
						<li>
							<a href="http://www.freewebsitetemplates.com/go/twitter" class="twitter"></a>
						</li>
						<li>
							<a href="http://www.freewebsitetemplates.com/go/googleplus" class="googleplus"></a>
						</li>
					</ul>
				</li>
				<li>
					<a href="index.html"><img class="logo" src="images/logo-footer.png" alt=""></a>
					<ul class="navigation">
						<?php
							foreach( $pageDetails as $iterPageId => $iterPageDetails )
							{
								if( isset( $iterPageDetails['navbar_linkTitle'] ) ) // has a link entry for this page?
								{
									/* allows literal HTML with loads of escapes inside of a foreach loop
									 * This creates each individual navbar element */
									?>
										<li><a href="<?=$iterPageDetails['url']?>"><?=$iterPageDetails['navbar_linkTitle']?></a></li>
									<?php
								}
							}
						?>

					</ul>
					<span>&copy; 1987-<?=date('Y')?> RetroDiner.com<br />All Rights Reserved</span>
				</li>
				<li class="last">
					<h2>Follow Us By Email</h2>
					<form action="index.html">
						<input type="text" name="subscribe" value="Enter Your Email Here...">
						<input type="submit" value="">
					</form>
				</li>
			</ul>
		</div>
	</div>
</body>
</html>
