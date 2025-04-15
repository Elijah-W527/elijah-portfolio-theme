<?php

$args = array(
    'post_type'      => 'project',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
);

$projects = new WP_Query($args);

?>
<section class="tab-buttons">
    <div class="tab-buttons-wrapper">
        <button class="tab-button active" data-tab="portfolio">
            <h6>Portfolio</h6>
        </button>
        <button class="tab-button" data-tab="about">
            <h6>About</h6>
        </button>
    </div>
</section>
<div id="portfolio-content" class="tab-content active">
    <section class="portfolio-section">
        <div class="projects-wrapper">
            <?php
            $count = 0;
            while ($projects->have_posts()) : $projects->the_post();
                $count++;
                $hidden_class = $count > 6 ? 'hidden-project' : '';
            ?>
                <a href="<?php the_permalink(); ?>" class="card <?php echo $hidden_class; ?>">
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
    </section>
    <?php if ($projects->found_posts > 6) : ?>
        <div class="load-more-wrapper">
            <button class="load-more-button button" id="load-more-button">
                <h6>Load More</h6>
            </button>
        </div>
    <?php endif; ?>
</div>

<?php
/**
 * About Section (for use inside the Portfolio module tabs)
 */
$sub_text = get_sub_field('sub_text');


?>

<div id="about-content" class="tab-content" style="display: none;">
    <section class="about-section">

        <!-- About Me -->
        <?php if ($sub_text): ?>
            <div class="about-me">
                <p><?= esc_html($sub_text); ?></p>
            </div>
        <?php endif; ?>

        <!-- Work Experience -->
        <?php if (have_rows('work_experience')): ?>
            <div class="info-section work-experience">
                <h1>Work Experience</h1>
                <?php while (have_rows('work_experience')): the_row(); ?>
                    <div class="experience-item">
                        <?php if ($job_title = get_sub_field('job_title')): ?>
                            <h3 class="job-title"><?= esc_html($job_title); ?></h3>
                        <?php endif; ?>

                        <div class="sub-section">
                        <?php if ($job_date = get_sub_field('job_date')): ?>
                            <p class="date-card smaller-caption"><?= esc_html($job_date); ?></p>
                        <?php endif; ?>

                        <?php if ($company = get_sub_field('company_name_state')): ?>
                            <p class="company"><?= esc_html($company); ?></p>
                        <?php endif; ?>
                        </div>

                        <?php if ($desc = get_sub_field('job_description')): ?>
                            <div class="job-description">
                                <?= wp_kses_post($desc); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

        <!-- Education-->
        <?php if (have_rows('education')): ?>
            <div class="info-section education">
                <h1>Education</h1>
                <div class="sub-section">
                <?php while (have_rows('education')): the_row(); ?>
                    <div class="education-item">

                        <?php if ($date_span= get_sub_field('date_span')): ?>
                            <h4 class="date-card smaller-caption"><?= esc_html($date_span); ?></h4>
                        <?php endif; ?>

                        <?php if ($title = get_sub_field('title')): ?>
                            <h3 class="title"><?= esc_html($title); ?></h3>
                        <?php endif; ?>

                        <?php if ($university = get_sub_field('university')): ?>
                            <p class="university"><?= esc_html($university); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
                </div>

            </div>
        <?php endif; ?>

        <!-- Hard Skills-->
        <?php if (have_rows('hard_skills')): ?>
            <div class="info-section hard_skills">
                <h1>Hard Skills</h1>
                <div class="row">
                <?php while (have_rows('hard_skills')): the_row(); ?>
                    <div class="hard_skills-item">
                        <?php if ($skill_image = get_sub_field('skill_image')): ?>
                            <div class="skill-image">
                                <img src="<?= esc_url($skill_image['url']); ?>" alt="<?= esc_attr($skill_image['alt']); ?>" />
                            </div>
                        <?php endif; ?>

                        <div class="projects-completed">
                        <?php if ($number_of_projects = get_sub_field('number_of_projects')): ?>
                            <p class="number_of_projects caption"><?= esc_html($number_of_projects); ?> Projects</p>
                        <?php endif; ?>

                        <?php if ($skill_title= get_sub_field('skill_title')): ?>
                            <p class="skill_title"><?= esc_html($skill_title); ?></p>
                        <?php endif; ?>
                        </div>
                </div>
                <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Soft Skills-->
        <?php if (have_rows('soft_skills')): ?>
            <h1>Soft Skills</h1>
            <div class="info-section soft_skills">
                <?php while (have_rows('soft_skills')): the_row(); ?>
                    <div class="soft_skills-item">
                        <?php if ($soft_skill= get_sub_field('soft_skill')): ?>
                            <h6 class="soft_skill"><?= esc_html($soft_skill); ?></h6>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

    </section>
</div>

<?php wp_reset_postdata(); ?>