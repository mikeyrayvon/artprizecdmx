<?php
get_header();
?>

<main id="main-content">

<?php
if (have_posts()) {
  while (have_posts()) {
    the_post();

    $prize = get_post_meta($post->ID, '_igv_home_prize', true);
    $judges = get_post_meta($post->ID, '_igv_home_judges', true);
    $apply = get_post_meta($post->ID, '_igv_home_apply', true);
    $dates = get_post_meta($post->ID, '_igv_home_dates', true);
    $contact = get_post_meta($post->ID, '_igv_home_contact', true);
?>

  <section id="prize">
    <!--h2 class="font-size-large margin-bottom-small font-bold"><?php //the_content(); ?></h2-->
    <?php echo !empty($prize) ? apply_filters('the_content', $prize) : ''; ?>
  </section>

  <section id="judges" class="padding-top-basic">
    <h2 class="font-size-large margin-bottom-small font-bold section-border"><?php _e('[:en]Jury[:es]Jurado[:]'); ?></h2>
    <?php
      if (!empty($judges)) {
        foreach ($judges as $judge) {
          echo '<div class="judge">';
          echo '<h3 class="font-size-mid">' . $judge['name'] . '</h3>';
          echo apply_filters('the_content', $judge['bio']);
          echo '</div>';
        }
      }
    ?>
  </section>

  <section id="apply" class="padding-top-basic">
    <h2 class="font-size-large margin-bottom-small font-bold section-border"><?php _e('[:en]Apply[:es]Aplicar[:]'); ?></h2>
    <?php echo !empty($apply) ? apply_filters('the_content', $apply) : ''; ?>
  </section>

  <section id="dates" class="padding-top-basic">
    <h2 class="font-size-large margin-bottom-small font-bold section-border"><?php _e('[:en]Dates[:es]Fechas[:]'); ?></h2>
    <?php echo !empty($dates) ? apply_filters('the_content', $dates) : ''; ?>
  </section>

  <section id="contact" class="padding-top-basic">
    <h2 class="font-size-large margin-bottom-small font-bold section-border"><?php _e('[:en]Contact[:es]Contacto[:]'); ?></h2>
    <?php echo !empty($contact) ? apply_filters('the_content', $contact) : ''; ?>
  </section>
  <section id="collaborators" class="padding-top-basic padding-bottom-mid">
    <h2 class="font-size-large margin-bottom-small font-bold section-border"><?php _e('[:en]Collaborators[:es]Colaboradores[:]'); ?></h2>
    <div class="grid-row padding-top-small">
      <div class="grid-item item-s-4">
        <a href="https://terremoto.mx/"><?php get_template_part('partials/logo-terremoto.svg'); ?></a>
      </div>
    </div>
  </section>


<?php
  }
}
?>

</main>

<?php
get_footer();
?>
