			<div class="section">
				<div>
					<div> <a href=""><img src="<?=$currentEntry['img']?>" width="169" height="163" alt=""></a>
						<h2><a href="blog.php"><?=$currentEntry['title']?></a></h2>
						<h3>Posted by <a href="#"><?=$currentEntry['author']?></a> in</h3>
						<?php
							foreach($currentEntry['catagories'] as $currentCatagory)
							{
								echo "<a href=\"blog.php\"><span>$currentCatagory</span></a>";
							}							
						?>
						<p>
							<?=$currentEntry['content']?>
						</p>
						<a href="blog.php" class="price"><?=$currentEntry['postMonth']?> <span><?=$currentEntry['postDay']?></span></a> </div>
				</div>
			</div>
