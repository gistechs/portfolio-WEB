<?php
require_once('config/db.php');
require_once('config/config.php');

//Create Query
$query = 'SELECT * FROM about';

//Get Result
$result = pg_query($conn, $query);

//Fetch data
$info = pg_fetch_array($result);

//Free result
pg_free_result($result);

// Message vars
$msg = '';
$msgClass = '';

//Check for submit
if (filter_has_var(INPUT_POST, 'submit')) {
  // Get form data
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $message = htmlspecialchars($_POST['message']);
  $subject = htmlspecialchars($_POST['subject']);

  // Check required fields
  if (!empty($email) && !empty($name) && !empty($message) && !empty($subject)) {
    // Pass
    // Check Email
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
      // Failed
      $msg = 'Please use valid email';
      $msgClass = 'alert-danger';
    } else {
      // Passed
      $toEmail = 'engkuazrull@gmail.com';
      $success = '';
      if ($success != false) {
        // Email Sent
        $msg = 'Your email has been sent';
        $msgClass = 'alert-success';
      } else {
        // Failed
        $msg = 'Your email was not sent';
        $msgClass = 'alert-danger';
      }
    }
  } else {
    // Failed
    $msg = 'Please fill in all fields';
    $msgClass = 'alert-danger';
  }
};
?>

<?php include('inc/header.php') ?>

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex flex-column justify-content-center align-items-center">
  <div class="hero-container" data-aos="fade-in">
    <h1><?= $info['shname']; ?></h1>
    <p>I'm <span class="typed" data-typed-items="<?= $info['frtext']; ?>"></span></p>
  </div>
</section><!-- End Hero -->

<main id="main">

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container">

      <div class="section-title">
        <h2>About</h2>
        <p><?= $info['fulldesc']; ?></p>
      </div>

      <div class="row">
        <div class="col-lg-4" data-aos="fade-right">
          <img src="assets/img/profile-img.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
          <h3><?= $info['fullname']; ?></h3>
          <p class="font-italic">
            <?= $info['sdesc']; ?>
          </p>
          <div class="row">
            <div class="col-lg-6">
              <ul>
                <li><i class="icofont-rounded-right"></i> <strong>Birthday:</strong> <?= $info['birthday']; ?></li>
                <li><i class="icofont-rounded-right"></i> <strong>Website:</strong> <?= $info['website']; ?></li>
                <li><i class="icofont-rounded-right"></i> <strong>Phone:</strong> <?= $info['phone']; ?></li>
                <li><i class="icofont-rounded-right"></i> <strong>City:</strong> <?= $info['city']; ?></li>
              </ul>
            </div>
            <div class="col-lg-6">
              <ul>
                <li><i class="icofont-rounded-right"></i> <strong>Age:</strong> <?= $info['age']; ?></li>
                <li><i class="icofont-rounded-right"></i> <strong>Degree:</strong> <?= $info['degree']; ?></li>
                <li><i class="icofont-rounded-right"></i> <strong>Email:</strong> <?= $info['email']; ?></li>
                <li><i class="icofont-rounded-right"></i> <strong>Status:</strong> <?= $info['status']; ?></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

    </div>


    <!-- ======= Resume Section ======= -->
    <section id="resume" class="resume">
      <div class="container">

        <div class="section-title">
          <h2>Resume</h2>
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="fade-up">
            <h3 class="resume-title">Education</h3>
            <?php
            $query2 = 'SELECT * FROM ed ORDER BY created_at DESC';
            $result2 = pg_query($conn, $query2);
            while ($info2 = pg_fetch_array($result2)) {
            ?>
              <div class="resume-item">
                <h4><?= $info2['ed_title']; ?></h4>
                <h5><?= $info2['ed_year']; ?></h5>
                <h5>GCPA: <?= $info2['ed_cgpa']; ?></h5>
                <p><em><?= $info2['ed_place']; ?></em></p>
                <p><?= $info2['ed_desc']; ?></p>
              </div>
            <?php
            }
            pg_free_result($result2);
            ?>
          </div>
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <h3 class="resume-title">Professional Experience</h3>
            <?php
            $query3 = 'SELECT * FROM exp ORDER BY created_at DESC';
            $result3 = pg_query($conn, $query3);
            while ($info3 = pg_fetch_array($result3)) {
            ?>
              <div class="resume-item">
                <h4><?= $info3['ex_title']; ?></h4>
                <h5><?= $info3['ex_year']; ?></h5>
                <p><em><?= $info3['ex_place']; ?></em></p>
                <p><?= $info3['ex_desc']; ?></p>
              </div>
            <?php
            }
            pg_free_result($result3);
            ?>
          </div>
        </div>

      </div>
    </section><!-- End Resume Section -->


    <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Skills</h2>
        </div>

        <div class="row skills-content">
          <div class="col-lg-6" data-aos="fade-up">
            <?php
            $query4 = "SELECT * FROM skill WHERE s_type='gis' ";
            $result4 = pg_query($conn, $query4);
            while ($info4 = pg_fetch_array($result4)) {
            ?>
              <div class="progress">
                <span class="skill"><?= $info4['s_name']; ?><i class="val"><?= $info4['s_value']; ?>%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="<?= $info4['s_value']; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            <?php
            }
            pg_free_result($result4);
            ?>
          </div>

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <?php
            $query5 = "SELECT * FROM skill WHERE s_type='coding' ";
            $result5 = pg_query($conn, $query5);
            while ($info5 = pg_fetch_array($result5)) {
            ?>
              <div class="progress">
                <span class="skill"><?= $info5['s_name']; ?><i class="val"><?= $info5['s_value']; ?>%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="<?= $info5['s_value']; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            <?php
            }
            pg_free_result($result5);
            ?>
          </div>

        </div>

      </div>
    </section><!-- End Skills Section -->


    <section class="awards section-bg" id="awards">
      <div class="container">
        <div class="section-title">
          <h2>Extra-Curricular Activities</h2>
        </div>
        <ul class="fa-ul mb-0">
          <?php
          $query6 = 'SELECT * FROM award ORDER BY created_at DESC';
          $result6 = pg_query($conn, $query6);
          while ($info6 = pg_fetch_array($result6)) {
          ?>
            <li>
              <span class="fa-li"><i class="fas fa-<?= $info6['aw_class']; ?> text-warning"></i></span>
              <?= $info6['aw_desc']; ?>
            </li>
          <?php
          }
          pg_free_result($result6);
          ?>
        </ul>
      </div>
    </section>


    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Projects</h2>
          <p>A selection of projects that i'm has worked. Click on each project to get information about what programming languages, tools, technologies and platform being used.</p>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">
          <?php
          $query7 = 'SELECT * FROM project ORDER BY created_at DESC';
          $result7 = pg_query($conn, $query7);
          while ($info7 = pg_fetch_array($result7)) {
          ?>
            <div class="col-lg-4 col-md-6 portfolio-item">
              <div class="portfolio-wrap">
                <img src="assets/img/portfolio/<?= $info7['p_link']; ?>.jpg" class="img-fluid" alt="">
                <div class="portfolio-links" title="<?= $info7['p_link']; ?>">
                  <a href="assets/img/portfolio/<?= $info7['p_link']; ?>.jpg" data-gall="portfolioGallery" class="venobox" title="Image"><i class="bx bx-plus"></i></a>
                  <a href="<?php echo ROOT_URL; ?>project_details.php?id=<?= $info7['p_id']; ?>" target="_blank" title="Visit <?= $info7['p_title']; ?>"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          <?php
          }
          pg_free_result($result7);
          ?>
        </div>

      </div>
    </section><!-- End Portfolio Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Feel free to get in touch with me. Reach me via form below. (P/S: Form not working due to free hosting platform)</p>
        </div>

        <div class="row" data-aos="fade-in">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Location:</h4>
                <p><?= $info['location']; ?></p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p><?= $info['email']; ?></p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Call:</h4>
                <p><?= $info['phone']; ?></p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7976.279753523942!2d103.51860299706472!3d1.6619948361174663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d0828b65fc5d33%3A0xf08b66527f943e23!2zMcKwMzknNDcuOCJOIDEwM8KwMzEnMjAuNiJF!5e0!3m2!1sen!2smy!4v1592845157860!5m2!1sen!2smy" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <div class="container">
              <?php if ($msg != '') : ?>
                <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
              <?php endif; ?>
              <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" name="email" class="form-control">
                </div>
                <div class="form-group">
                  <label>Subject</label>
                  <input type="text" name="subject" class="form-control">
                </div>
                <div class="form-group">
                  <label for="name">Message</label>
                  <textarea class="form-control" name="message" rows="10"></textarea>
                </div>
                <div class="text-center"><button class="btn btn-primary" type="submit" name="submit">Send Message</button></div>
              </form>
            </div>

          </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->
<?php pg_close($conn); ?>
<?php include('inc/footer.php') ?>