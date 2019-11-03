<?php
    if(has_blocks()){
        $allBlocks = parse_blocks( get_the_content() );
        for ($i=0; $i < count($allBlocks); $i++) {
            if($allBlocks[$i]['blockName'] === 'core-embed/youtube'){
                $firstVideoBlock = $allBlocks[$i];
                break;
            }
        }
    };
 ?>


 <div class="card h-100 blogCard">
     <h5 class="card-header"><?php the_title(); ?></h5>
     <div class="card-body">
         <div class="row">
             <?php if($firstVideoBlock): ?>
                 <div class="col-12 fullVideo">
                     <?php echo apply_filters( 'the_content', render_block( $firstVideoBlock ) ); ?>
                 </div>
             <?php endif; ?>
             <div class="col">
                 <a href="<?php the_permalink(); ?>" class="btn btn-warning">Watch Videos</a>
             </div>
         </div>
     </div>
 </div>
