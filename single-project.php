<?php get_header(); ?>

<div class="single-project-container">
<section class="single-project">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="hero">
                    <div class="back-button-wrapper">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="back-button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M16.9999 10.9999H9.4099L12.7099 7.70994C12.8982 7.52164 13.004 7.26624 13.004 6.99994C13.004 6.73364 12.8982 6.47825 12.7099 6.28994C12.5216 6.10164 12.2662 5.99585 11.9999 5.99585C11.7336 5.99585 11.4782 6.10164 11.2899 6.28994L6.2899 11.2899C6.19886 11.385 6.12749 11.4972 6.0799 11.6199C5.97988 11.8634 5.97988 12.1365 6.0799 12.3799C6.12749 12.5027 6.19886 12.6148 6.2899 12.7099L11.2899 17.7099C11.3829 17.8037 11.4935 17.8781 11.6153 17.9288C11.7372 17.9796 11.8679 18.0057 11.9999 18.0057C12.1319 18.0057 12.2626 17.9796 12.3845 17.9288C12.5063 17.8781 12.6169 17.8037 12.7099 17.7099C12.8036 17.617 12.878 17.5064 12.9288 17.3845C12.9796 17.2627 13.0057 17.132 13.0057 16.9999C13.0057 16.8679 12.9796 16.7372 12.9288 16.6154C12.878 16.4935 12.8036 16.3829 12.7099 16.2899L9.4099 12.9999H16.9999C17.2651 12.9999 17.5195 12.8946 17.707 12.707C17.8945 12.5195 17.9999 12.2652 17.9999 11.9999C17.9999 11.7347 17.8945 11.4804 17.707 11.2928C17.5195 11.1053 17.2651 10.9999 16.9999 10.9999Z" fill="#171F26" />
                            </svg>
                        </a>
                    </div>

                    <h1 class="project-title"><?php the_title(); ?></h1>
                    <?php
                    if (get_field('project_subtitle')) : ?>
                        <p class="project-subtitle"><?php echo esc_html(get_field('project_subtitle')); ?></p>
                    <?php endif; ?>

                </div>

                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('large'); ?>
                <?php endif; ?>

                <?php if (get_field('project_information')) : ?>
                    <div class="project_information">
                        <?php echo get_field('project_information'); ?>
                    </div>
                <?php endif; ?>
            </article>
    <?php endwhile;
    endif; ?>

    <?php
    // Get the current post ID
    $current_id = get_the_ID();

    // Setup a custom query to fetch 2 related projects
    $related_args = array(
        'post_type' => 'project', // Change this if your post type is different
        'posts_per_page' => 2,
        'post__not_in' => array($current_id), // Exclude current project
        'orderby' => 'rand', // Or use another logic like taxonomy
    );
    $related_query = new WP_Query($related_args);
    ?>

    <?php if ($related_query->have_posts()) : ?>
        <div class="related-projects">
            <h1>Related Projects</h1>
            <div class="related-projects-grid">
                <?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="card">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('medium'); ?>
                    <?php endif; ?>

                    <?php
                    $subtitle = get_field('project_subtitle');
                    if ($subtitle) : ?>
                        <p class="caption"><?php echo esc_html(strtolower($subtitle)); ?></p>
                    <?php endif; ?>

                    <h4 class="project-title"><?php the_title(); ?></h4>
                </a>
                <?php endwhile; ?>
            </div>
                            </div>
    <?php endif; ?>

    <?php wp_reset_postdata(); ?>

    <div class="project-back-button">
    <div class="back-button-wrapper">
                        <a href="javascript:history.back()" class="back-button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M16.9999 10.9999H9.4099L12.7099 7.70994C12.8982 7.52164 13.004 7.26624 13.004 6.99994C13.004 6.73364 12.8982 6.47825 12.7099 6.28994C12.5216 6.10164 12.2662 5.99585 11.9999 5.99585C11.7336 5.99585 11.4782 6.10164 11.2899 6.28994L6.2899 11.2899C6.19886 11.385 6.12749 11.4972 6.0799 11.6199C5.97988 11.8634 5.97988 12.1365 6.0799 12.3799C6.12749 12.5027 6.19886 12.6148 6.2899 12.7099L11.2899 17.7099C11.3829 17.8037 11.4935 17.8781 11.6153 17.9288C11.7372 17.9796 11.8679 18.0057 11.9999 18.0057C12.1319 18.0057 12.2626 17.9796 12.3845 17.9288C12.5063 17.8781 12.6169 17.8037 12.7099 17.7099C12.8036 17.617 12.878 17.5064 12.9288 17.3845C12.9796 17.2627 13.0057 17.132 13.0057 16.9999C13.0057 16.8679 12.9796 16.7372 12.9288 16.6154C12.878 16.4935 12.8036 16.3829 12.7099 16.2899L9.4099 12.9999H16.9999C17.2651 12.9999 17.5195 12.8946 17.707 12.707C17.8945 12.5195 17.9999 12.2652 17.9999 11.9999C17.9999 11.7347 17.8945 11.4804 17.707 11.2928C17.5195 11.1053 17.2651 10.9999 16.9999 10.9999Z" fill="#171F26" />
                            </svg>
                            <h6>Back</h6>
                        </a>
                    </div>
                    </div>

</section>
</div>

<?php get_footer(); ?>