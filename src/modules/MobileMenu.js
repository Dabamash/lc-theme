class MobileMenu {
  constructor() {
    this.menu = document.querySelector(".site-header__menu");
    this.openButton = document.querySelector(".site-header__menu-trigger");
    this.menuIcon = this.openButton.querySelector("i"); // Get the <i> element
    this.events();
  }

  events() {
    this.openButton.addEventListener("click", () => this.openMenu());
  }

  openMenu() {
    this.menu.classList.toggle("site-header__menu--active");

    // Toggle the icon
    if (this.menuIcon.classList.contains("fa-bars")) {
      this.menuIcon.classList.remove("fa-bars");
      this.menuIcon.classList.add("fa-window-close");
    } else {
      this.menuIcon.classList.remove("fa-window-close");
      this.menuIcon.classList.add("fa-bars");
    }
  }
}

export default MobileMenu;
