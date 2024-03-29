import axios from "axios"

class Search {
  // 1. describe and create/initiate our object
  constructor() {
    document.addEventListener("DOMContentLoaded", () => {
      this.addSearchHTML()
      this.resultsDiv = document.querySelector("#search-overlay__results")
      this.openButton = document.querySelectorAll(".js-search-trigger")
      this.closeButton = document.querySelector(".search-overlay__close")
      this.searchOverlay = document.querySelector(".search-overlay")
      this.searchField = document.querySelector("#search-term")
      this.isOverlayOpen = false
      this.isSpinnerVisible = false
      this.previousValue
      this.typingTimer
      this.events()
    });
  }

  // 2. events
  events() {
    this.openButton.forEach(el => {
      el.addEventListener("click", e => {
        e.preventDefault()
        this.openOverlay()
      })
    })

    this.closeButton.addEventListener("click", () => this.closeOverlay())
    document.addEventListener("keydown", e => this.keyPressDispatcher(e))
    this.searchField.addEventListener("keyup", () => this.typingLogic())
  }

  // 3. methods (function, action...)
  typingLogic() {
    if (this.searchField.value != this.previousValue) {
      clearTimeout(this.typingTimer)

      if (this.searchField.value) {
        if (!this.isSpinnerVisible) {
          this.resultsDiv.innerHTML = '<div class="spinner-loader"></div>'
          this.isSpinnerVisible = true
        }
        this.typingTimer = setTimeout(this.getResults.bind(this), 750)
      } else {
        this.resultsDiv.innerHTML = ""
        this.isSpinnerVisible = false
      }
    }

    this.previousValue = this.searchField.value
  }

  async getResults() {
    try {
      const response = await axios.get(lcData.root_url + "/wp-json/lc/v1/search?term=" + this.searchField.value);
      const results = response.data;
  
      const pageResults = results.generalInfo.filter(item => item.postType === "page");
      const guideResults = results.generalInfo.filter(item => item.postType === "post");
  
      this.resultsDiv.innerHTML = `
      <div class="full-width-split group">
        <div class="full-width-split__one">
          <div class="full-width-split__inner">
            <h2 class="search-overlay__section-title">Pages</h2>
            ${pageResults.length ? '<ul class="link-list min-list">' : "<p>No pages match that search.</p>"}
            ${pageResults.map(item => `<li><a href="${item.permalink}">${item.title}</a>`).join("")}
            ${pageResults.length ? "</ul>" : ""}
          </div>
        </div>
        <div class="full-width-split__two">
          <div class="full-width-split__inner">
            <h2 class="search-overlay__section-title">Guides</h2>
            ${guideResults.length ? '<ul class="link-list min-list">' : "<p>No guides match that search.</p>"}
            ${guideResults.map(item => `<li><a href="${item.permalink}">${item.title}</a>`).join("")}
            ${guideResults.length ? "</ul>" : ""}
          </div>
        </div>
      </div>`;
      
      this.isSpinnerVisible = false;
    } catch (e) {
      console.log(e);
    }
  }
  

  keyPressDispatcher(e) {
    if (e.keyCode == 83 && !this.isOverlayOpen && document.activeElement.tagName != "INPUT" && document.activeElement.tagName != "TEXTAREA") {
      this.openOverlay()
    }

    if (e.keyCode == 27 && this.isOverlayOpen) {
      this.closeOverlay()
    }
  }

  openOverlay() {
    this.searchOverlay.classList.add("search-overlay--active")
    document.body.classList.add("body-no-scroll")
    this.searchField.value = ""
    setTimeout(() => this.searchField.focus(), 301)
    this.isOverlayOpen = true
    return false
  }

  closeOverlay() {
    this.searchOverlay.classList.remove("search-overlay--active")
    document.body.classList.remove("body-no-scroll")
    this.isOverlayOpen = false
  }

  addSearchHTML() {
    document.body.insertAdjacentHTML(
      "beforeend",
      `
      <div class="search-overlay">
        <div class="search-overlay__top">
          <div class="container">
            <i class="fa fa-search search-overlay__icon" aria-hidden="true"></i>
            <input type="text" class="search-term" placeholder="What are you looking for?" id="search-term">
            <i class="fa fa-window-close search-overlay__close" aria-hidden="true"></i>
          </div>
        </div>
        
        <div class="container">
          <div id="search-overlay__results"></div>
        </div>

      </div>
    `
    )
  }
}

export default Search
