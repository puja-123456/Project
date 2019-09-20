<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

$current_url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$picture_url = base_url().'assets/designs/images/blog/Mirzakhani_original.jpg';


$this->load->view("blog/header");
?>

<br>
<div class="row">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-xs-12 col-sm-12">
				<ol class="breadcrumb inner-breadcrumb">
					<li><a href="<?php echo base_url(); ?>">Home</a></li>
					<li><a href="#">Blog</a></li>
					<li><a href="#">Meet Maryam, the only female to get greatest honour of Mathematics</a></li>
				</ol>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-8 col-sm-12 col-xs-12 blog-content">
		<h2>
			<strong>
				Meet Maryam, the only female to get greatest honour of Mathematics
			</strong>
		</h2>
		<br>
		<div class="col-md-6 col-sm-12 col-xs-12">
			<img src="<?php echo $picture_url; ?>">
		</div>
		<p>
			On 13<sup>th</sup> August 2014, a female professor was given the "Nobel Prize of Mathematics". Stanford Mathematics professor, Maryam Mirzakhani is the only female winner of the greatest prize in Mathematics, the Fields Medals, since its inception in 1936.
		</p>
		<p>
			The Fields medal is a prize awarded to two, three or four Mathematicians under 40 years of age at the International Congress of the International Mathematics Union (IMU). This meeting takes place every 4 years. The Fields medal is referred to as the highest honour a Mathematician can receive. This award is often equated in stature with the Nobel Prize.
		</p>
		<div class="text-center blog-ad">
			<a href="<?php echo base_url(); ?>olympiad-test-practice">Free Saturday Online Mock Test for Olympiads</a>
		</div>
		<p>
			Theoretical Mathematics, which read like a foreign language by those outside of Mathematics, was the specialization of Maryam Mirzakhani.  Mastering approaches like Ergodic theory, Symplectic Geometry, Moduli spaces, etc. allowed Maryam to seek her dream for describing the Geometric and dynamic complexities of curved surfaces - spheres and doughnut shapes. 
		</p>
		<p>
			Mirzakhani joined the faculty of Stanford University in 2008, where she served as a professor of Mathematics.
		</p>
		<p>
			Despite the enormous applications of her work, Mirzakhani said she enjoyed pure mathematics because of the elegance and longevity of the questions she studied.
		</p>
		<div class="text-center blog-ad">
			<a href="<?php echo base_url(); ?>buy">Buy India's Most Exclusive Olympiad Preparatory Content</a>
		</div>
		<p>
			A self-professed “slow” mathematician, Mirzakhani’s colleagues describe her as ambitious, resolute and fearless in the face of problems others would not, or could not, tackle. She denied herself the easy path, choosing instead to tackle thornier issues. Her preferred method of working on a problem was to doodle on large sheets of white paper, scribbling formulas on the periphery of her drawings. Her young daughter described her mother at work as “painting”.
		</p>
		<p>
			Unfortunately, she is no more with us. She died after having a long battle with cancer. Her contributions as both a scholar and a role model are significant and enduring, and she will be dearly missed around the world.
		</p>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div id="fb_comment">
				<div class="fb-comments" data-href="<?php echo $current_url; ?>" data-width="400" data-numposts="4"></div>
			</div>
		</div>
	</div>
	<div class="col-md-2 col-sm-12 col-xs-12 right-links">
		<div class="well">
			<button style="color:#fff" class="btn btn-block btn-primary" onclick="return shareOnFacebook('<?php echo $current_url; ?>','10 tips to increase concentration among kids')">Share on Facebook</button>
			<button style="color:#fff" class="whatsapp btn btn-block btn-success" data-text="Why is it important to participate in Olympiad Exams? Read it all here..." data-link="<?php echo $current_url; ?>">Share on WhatsApp</button>
		</div>

		<div class="well">
			<h4><a href="<?php echo base_url(); ?>courses/sof">Know More about Olympiads</a></h4>
			<ul style="padding-left:20px;">
				<li><a href="<?php echo base_url(); ?>cyber-olympiad">Cyber Olympiads</a></li>
				<li><a href="<?php echo base_url(); ?>math-olympiad">Math Olympiads</a></li>
				<li><a href="<?php echo base_url(); ?>english-olympiad">English Olympiads</a></li>
				<li><a href="<?php echo base_url(); ?>science-olympiad">Science Olympiads</a></li>
			</ul><br>
			<h4><a href="<?php echo base_url(); ?>olympiad-test-practice">Saturday Online Free Practice</a></h4>
			<h4><a href="<?php echo base_url(); ?>contact">Contact Us</a></h4>
		</div>
	</div>
</div>

<?php 
$this->load->view("blog/footer");
?>
