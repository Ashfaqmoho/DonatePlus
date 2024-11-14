function gotoDonation() {
  const btn = document.getElementById('donation-body');
  btn.scrollIntoView({ behavior: 'smooth' });
}

function gotoAbout() {
  const btn = document.getElementById('about');
  btn.scrollIntoView({ behavior: 'smooth' });
}

function gotoChatBot() {
  const btn = document.getElementById('help-container');
  btn.scrollIntoView({ behavior: 'smooth' });
}


document.addEventListener("DOMContentLoaded", function () {
  let slideIndex = 0;
  showSlides();

  function showSlides() {
    let slides = document.getElementsByClassName("mySlides");
    for (let i = 0; i < slides.length; i++) {
      slides[i].style.display = "none"; // Hide all slides
    }
    slideIndex++;
    if (slideIndex > slides.length) { slideIndex = 1 } // Reset to first slide after the last one
    slides[slideIndex - 1].style.display = "block"; // Show the current slide
    setTimeout(showSlides, 2000); // Change image every 2 seconds
  }
});



