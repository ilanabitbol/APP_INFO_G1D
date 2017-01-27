<?php 
include("entete.php");
session_start();
?>
<section id="contact" class="home-section2 text-center">
		<div class="heading-contact">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					<div class="section-heading">
					<h2>Get in touch</h2>
					<i class="fa fa-2x fa-angle-down"></i>

					</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		<div class="container">
			<?php if(array_key_exists('errors', $_SESSION)): ?>
			<div class="alert alert-danger">
				<?= implode('<br>', $_SESSION['errors']); ?>
			</div>
			<?php unset($_SESSION['errors']); endif;?>
			<?php if(array_key_exists('success', $_SESSION)): ?>
			<div class="alert alert-success">
				Votre email a bien été envoyé
			</div>
			<?php endif;?>
		<div class="row">
			<div class="col-lg-2 col-lg-offset-5">
				<hr class="marginbot-50">
			</div>
		</div>
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="boxed-grey">
                <form id="contact-form"  method="post" action="post_contact.php">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Name</label>
                            <input name="nom" type="text" class="form-control" id="name" placeholder="Enter name" value="<?= isset($_SESSION['inputs']['nom']) ? $_SESSION['inputs']['nom'] : ''; ?>" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email Address</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input name="email" type="email" class="form-control" id="email" placeholder="Enter email" required="required" value="<?= isset($_SESSION['inputs']['email']) ? $_SESSION['inputs']['email'] : ''; ?>" /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Subject</label>
							<input name="objet" type="text" class="form-control" id="name" placeholder="Your object" value="<?= isset($_SESSION['inputs']['objet']) ? $_SESSION['inputs']['objet'] : ''; ?>" required="required" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Message</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Message"><?= isset($_SESSION['inputs']['message']) ? $_SESSION['inputs']['message'] : '' ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-skin pull-right" id="btnContactUs">
                            Envoyer</button>
                    </div>
                </div>
                </form>
            </div>
        </div>

		<div class="col-lg-12">
			<div class="widget-contact"><br/>
				<h5>Student Office</h5>

				<address>
				  <strong>Reader-D2, Inc.</strong><br>
				  10 Rue de Vanves, Issy-les-Moulineaux<br>
				  France<br>
				  <abbr title="Phone">P:</abbr> +33 (0)659348890
				</address>

				<address>
				  <strong>Email</strong><br>
				  <a href="mailto:#">app.g1d.2019@gmail.com</a>
				</address>
			</div>
		</div>
    </div>

		</div>
	</section>
<?php 	unset($_SESSION['success']);
    unset($_SESSION['inputs']);
    unset($_SESSION['errors']);
    ?>