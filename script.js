function scrollToSection(sectionId) {
  const section = document.getElementById(sectionId);
  if (section) {
    section.scrollIntoView({ behavior: "smooth" });
  }
}

document.addEventListener("DOMContentLoaded", function () {
  const aboutLink = document.querySelector('a[href="#about"]');
  const contactLink = document.querySelector('a[href="#contact"]');
  const homeLink = document.querySelector('a[href="#home"]');
  const navLinks = document.querySelectorAll(".nav-link-scroll");

  if (aboutLink) {
    aboutLink.addEventListener("click", function (e) {
      e.preventDefault();
      scrollToSection("about");
      navLinks.forEach(function (navLink) {
        navLink.classList.remove("active");
      });
      this.classList.add("active");
    });
  }

  if (contactLink) {
    contactLink.addEventListener("click", function (e) {
      e.preventDefault();
      scrollToSection("contact");
      navLinks.forEach(function (navLink) {
        navLink.classList.remove("active");
      });
      this.classList.add("active");
    });
  }

  if (homeLink) {
    homeLink.addEventListener("click", function (e) {
      e.preventDefault();
      window.scrollTo({ top: 0, behavior: "smooth" });
      navLinks.forEach(function (navLink) {
        navLink.classList.remove("active");
      });
      this.classList.add("active");
    });
  }

  navLinks.forEach(function (link) {
    link.addEventListener("click", function (e) {
      e.preventDefault();
      const sectionId = this.getAttribute("href").slice(1);
      scrollToSection(sectionId);
      navLinks.forEach(function (navLink) {
        navLink.classList.remove("active");
      });
      this.classList.add("active");
    });
  });
});
