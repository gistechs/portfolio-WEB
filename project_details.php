<?php require('config/db.php');

// get ID
$id = pg_escape_string($conn, $_GET['id']);

// Create Query
$query = 'SELECT * FROM project WHERE p_id = ' . $id;

// Get Result
$result = pg_query($conn, $query);

// Fetch data
$post = pg_fetch_assoc($result);
// var_dump($posts);

// Free Result
pg_free_result($result);

// Close Connection
pg_close($conn);

?>

<?php include('inc/header.php'); ?>
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Portfoio Details</h2>
        <ol>
          <li><a href="https://ea-portfolio.herokuapp.com/">Home</a></li>
          <li>Portfoio Details</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Portfolio Details Section ======= -->
  <section id="portfolio-details" class="portfolio-details">
    <div class="container">

      <div class="portfolio-details-container">

        <div class="owl-carousel portfolio-details-carousel">
          <img src="assets/img/portfolio/<?php echo $post['p_link']; ?>-1.jpg" class="img-fluid" alt="">
          <img src="assets/img/portfolio/<?php echo $post['p_link']; ?>-2.jpg" class="img-fluid" alt="">
          <img src="assets/img/portfolio/<?php echo $post['p_link']; ?>-3.jpg" class="img-fluid" alt="">
        </div>

        <div class="portfolio-info">
          <h3>Project information</h3>
          <ul>
            <li><strong>Category</strong>: <?php echo $post['p_category']; ?></li>
            <li><strong>Project URL</strong>: <a href="<?php echo $post['url']; ?>"><?php echo $post['p_url']; ?></a></li>
            <li><strong>Tools</strong>: <?php echo $post['p_tools']; ?></li>
          </ul>
        </div>

      </div>

      <div class="portfolio-description">
        <h2><?php echo $post['p_title']; ?></h2>
        <p>
          <?php echo $post['p_desc']; ?>
        </p>
      </div>

    </div>
  </section><!-- End Portfolio Details Section -->

</main><!-- End #main -->
<?php include('inc/footer.php'); ?>