<div class="page-header-search">
    <form action="<?php echo esc_url(home_url()); ?>" method="get">
        <input 
        type="text" 
        placeholder="<?php echo esc_attr__( 'Search', 'orions' ); ?>" 
        id="search" 
        name="s" 
        class="input-field" 
        value="<?php the_search_query(); ?>"
        required>
        <button type="submit">
            <i class="fas fa-search"></i>
        </button>
    </form>
</div>