<?php
    if(has_blocks()){
        $allBlocks = parse_blocks( get_the_content() );
        for ($i=0; $i < count($allBlocks); $i++) {
            if($allBlocks[$i]['blockName'] == 'core/gallery'){
                $firstGalleyBlock = $allBlocks[$i];
                break;
            }
        }
    };
 ?>

<div class="card h-100 border border-danger blogCard">
    <div class="card-body">
        <h5 class="card-title"><?php the_title(); ?></h5>
        <?php if(isset($firstGalleyBlock)): ?>
            <?php echo apply_filters( 'the_content', render_block( $firstGalleyBlock ) ); ?>
        <?php endif; ?>
        <a href="<?php the_permalink(); ?>" class="btn btn-danger btn-block">View Image</a>
    </div>
</div>
