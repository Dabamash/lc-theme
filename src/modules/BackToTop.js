class BackToTopButton {
    constructor() {
      this.button = document.querySelector(".back-to-top");
      this.addEventListeners();
    }
  
    addEventListeners() {
      window.addEventListener("scroll", () => this.toggleVisibility());
      this.button.addEventListener("click", (e) => this.scrollToTop(e));
    }
  
    toggleVisibility() {
      if (window.scrollY > 200) {
        this.button.style.display = "block";
      } else {
        this.button.style.display = "none";
      }
    }
  
    scrollToTop(e) {
      e.preventDefault();
      window.scrollTo({ top: 0, behavior: "smooth" });
    }
  }
  
  export default BackToTopButton;
  