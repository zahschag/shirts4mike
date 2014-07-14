<?php

?>

				<div class="pagination">

					<?php $i = 0; ?>
					<?php while ($i < $total_pages) : ?>
						<?php $i += 1; ?>
						<?php if ($i == $current_page) : ?>
							<span><?php echo $i; ?></span>
						<?php else : ?>
							<a href="./?pg=<?php echo $i; ?>"><?php echo $i; ?></a>
						<?php endif; ?>
					<?php endwhile; ?>

				</div>