<?php $this->beginContent('//layouts/main'); ?>
<div class="container mt-5">
        <div class="row">
            <div class="col-md-8 bg-light border">
			<?php echo $content; ?>
            </div>
          
			<?php get_sidebar(); ?>
            
        </div>
    </div>

<?php $this->endContent(); ?>