<?php
/**
 * Slideshow function
 * https://www.w3schools.com/howto/howto_js_slideshow.asp
 */
function slideshow($slideIds)
{
    ob_start();
    ?>
    
    <style>
       /* * {
  box-sizing: border-box;
} */

/* Position the image container (needed to position the left and right arrows) */
.container {
  position: relative;
}

/* Hide the images by default */
.mySlides {
  display: none;
}
.mySlides img {
    max-height: 550px;
    overflow: hidden;
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

.slideshow--thumbnail-nav {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
}
.slideshow--thumbnail-nav__thumbnail {
    cursor: pointer;
    margin: 0.25rem;
}
/* Container for image text */
.caption-container {
  text-align: center;
  background-color: #222;
  padding: 2px 16px;
  color: white;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
/* .column {
  float: left;
  width: 16.66%;
} */

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}
</style>

    <!-- Slideshow container -->
     <!-- Container for the image gallery -->
<div class="container">
    <?php
        foreach( $slideIds as $key => $slideId ): 
            $slide = get_post($slideId);
            ?>
            <div class="mySlides">
                <?php echo wp_get_attachment_image( $slideId, [350, 1000] ); ?>
                <div class="mySlides--caption"><?php echo $slide->post_title; ?></div>
            </div>
        <?php endforeach; ?>

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

  <!-- Thumbnail images -->
  <div class="row slideshow--thumbnail-nav">
    <?php   
        foreach( $slideIds as $key => $slideId ): 
            $slide = get_post($slideId);
        ?>
            <div class="slideshow--thumbnail-nav__thumbnail" onclick="currentSlide(<?php echo $key+1; ?>)">
                <?php echo wp_get_attachment_image($slideId, [100,100] ); ?>
            </div>
        <?php endforeach; ?>

  </div>
</div> 
<script>
        let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("demo");
  let captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
 
    </script>
    <?php

    return ob_get_clean();
}
