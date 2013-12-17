<section class="main__content">
	<article class="main__editor">
		<h1 class="main__editor--heading"><a href="<?php echo DIRECTORY; ?>admin/listing/table/pages" class="back-button icon-arrow-left"></a>pages Edit</h1>
		<form class="main__editor--form" method="post" enctype="multipart/form-data">
			<?php echo $feedback; ?>
			<input type="hidden" name="pages[id]" value="<?php echo $id; ?>" />

			<p>
				<label>Page</label>
				<select name="pages[main_pages_id]">
					<option value="">Select...</option>
					<option value="1" <?php echo( $main_pages_id == 1 ? 'selected="selected"' : '' ); ?>>Page A</option>
					<option value="2" <?php echo( $main_pages_id == 2 ? 'selected="selected"' : '' ); ?>>Page B</option>
					<option value="3" <?php echo( $main_pages_id == 3 ? 'selected="selected"' : '' ); ?>>Page C</option>
					<option value="4" <?php echo( $main_pages_id == 4 ? 'selected="selected"' : '' ); ?>>Page D</option>
				</select>
			</p>

			<p><label>Title:</label><input type="text" name="pages[title]" class="medium_input" value="<?php echo $title; ?>"></p>
			Content <textarea class="js-wysiwyg" name="pages[content]"><?php echo $content; ?></textarea>

			<h2>Header Image</h2>
			<div class="js-upload-container" data-type="image" data-name="header-image"></div>
			<?php if( !!$image_imgname ) : ?>
				<div id="<?php echo $image_imgname; ?>" class="image_<?php echo $image_id; ?>">
			        <span class="images_holder"><img src="<?php echo DIRECTORY; ?>_admin/assets/uploads/images/281/<?php echo $image_imgname; ?>" /></span>
			        <ol class="hoz btns">
			            <input type="hidden" name="image" value="<?php echo $image_imgname; ?>" />
			            <input type="button" class="del-image js-delete-image delete-btn" data-id="<?php echo $image_id; ?>" data-imagename="<?php echo $image_imgname; ?>"  data-type="<?php echo $image_imgname; ?>" value="Delete" />
			        </ol>
			    </div>
			<?php endif; ?>

			<h2>Banner Images</h2>
			<div class="js-upload-container" data-type="image" data-name="banner-images"></div>

			<div id="image-list-multi-js"></div>
			<input type="file" name="file_upload" class="upload-fix" id="multi-image-page" />

			<?php if ( !!$gallery_items ) : ?>
				<?php foreach ( $gallery_items as $item ) : ?>
				    <div id="<?php echo $item['imgname'] ?>" class="image_<?php echo $item[ 'id' ]; ?>">
				        <span class="images_holder"><img src="<?php echo DIRECTORY; ?>_admin/assets/uploads/images/281/<?php echo $item[ 'imgname' ]; ?>" /></span>
				        <ol class="hoz btns">
				            <input type="hidden" name="multi-image[<?php echo $item[ 'imgname' ]; ?>][id]" value="<?php echo $item[ 'id' ]; ?>" />
				            <input type="hidden" name="multi-image[<?php echo $item[ 'imgname' ]; ?>][imgname]" value="<?php echo $item[ 'imgname' ]; ?>" />

				            <p><label>URL: </label><input type="text" name="image_urls[]" class="medium_input" value="<?php echo $item[ 'url' ]; ?>" /></p>

				            <input type="button" class="del-image js-delete-image delete-btn" data-id="<?php echo $item[ 'id' ]; ?>" data-imagename="<?php echo $item[ 'imgname' ]; ?>"  data-type="<?php echo $item[ 'imgname' ]; ?>" value="Delete" />
				        </ol>
				    </div>
				<?php endforeach; ?>
			<?php endif; ?>

			<div class="js-uploads-container" data-type="document"></div>
			<input type="hidden" name="pages[uploads_id]" value="<?php echo $uploads_id; ?>" />
			<?php if ( !!$uploads ) : ?>
				<?php foreach( $uploads as $upload ) : ?>
					<div class="js-existing-upload-container">
						<input type="text" name="uploads[title]" value="<?php echo $upload[ 'title' ]; ?>" /> - <button type="button" class="js-delete-upload" data-id="<?php echo $upload[ 'id' ]; ?>" data-upload-name="<?php echo $upload[ 'name' ]; ?>">X Delete</button>
						<input type="hidden" name="uploads[id]" value="<?php echo $upload[ 'id' ]; ?>" />
						<input type="hidden" name="uploads[name]" value="<?php echo $upload[ 'name' ]; ?>" />
					</div>
				<?php endforeach; ?>
			<?php endif; ?>

			<h2>Links</h2>

			<?php if( !!$links ) : ?>
				<div class="js-link-area">
					<?php foreach( $links as $link ) : ?>
						<div>
							<input type="hidden" name="pages[links][id][]" value="<?php echo $link['id']; ?>" />
							<p><label>Title:</label><input type="text" name="pages[links][title][]" class="medium_input" value="<?php echo $link['title']; ?>"></p>
							<p><label>URL: </label><input type="text" name="pages[links][url][]" class="medium_input" value="<?php echo $link['url']; ?>"></p><hr>
							<p><a href="#" class="js-delete-link" data-id="<?php echo $link['id']; ?>">Delete - </a></p>
						</div>
					<?php endforeach; ?>
				</div>
			<?php else : ?>
				<div class="js-link-area">
					<input type="hidden" name="pages[links][id][]" value="<?php echo $link['id']; ?>" />
					<p><label>Title:</label><input type="text" name="pages[links][title][]" class="medium_input" value="<?php echo $link['title']; ?>"></p>
					<p><label>URL: </label><input type="text" name="pages[links][url][]" class="medium_input" value="<?php echo $link['url']; ?>"></p><hr>
				</div>
			<?php endif; ?>

			<p><a href="#" class="js-add-another-link">Add another +</a></p>

			<h2>SEO</h2>
			<p><label>Meta title:</label><input type="text" name="pages[meta_title]" class="medium_input" value="<?php echo $meta_title; ?>"></p>
			<p><label>Meta Description:</label><input type="text" name="pages[meta_description]" class="medium_input" value="<?php echo $meta_description; ?>"></p>

			<p><input type="submit" name="submit" value="Save" /></p>
		</form>
	</article>
</section>
<script>
	var image_count = <?php echo ( !!$image ? '0' : '0' ); ?>;
	var document_count = <?php echo ( !!$uploads_id && !!$upload_name ? '0' : '0' ); ?>
</script>