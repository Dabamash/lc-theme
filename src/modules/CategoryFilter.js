class CategoryFilter {
    constructor() {
        this.form = document.querySelector(".category-filter-form");
        this.checkboxes = this.form.querySelectorAll(".category-filter-checkbox");
        this.labels = this.form.querySelectorAll(".category-filter-label");
        this.addEventListeners();
    }

    addEventListeners() {
        this.labels.forEach((label, index) => {
            label.addEventListener('click', (e) => {
                e.preventDefault();
                this.toggleCheckbox(index);
                this.submitForm();
            });
        });
    }

    toggleCheckbox(index) {
        const checkbox = this.checkboxes[index];
        checkbox.checked = !checkbox.checked;
        if (checkbox.checked) {
            this.labels[index].classList.add('highlighted');
        } else {
            this.labels[index].classList.remove('highlighted');
        }
    }

    submitForm() {
        const formData = new FormData(this.form);
        formData.append('action', 'my_filter'); // This tells WordPress which AJAX action to trigger
        formData.append('nonce', lcData.nonce); // Add the nonce for security
    
        fetch(lcData.ajax_url, { // Use the localized AJAX URL
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            document.querySelector('.recent-posts-container').innerHTML = data;
        })
        .catch(error => {
            console.error('Error fetching posts:', error);
        });
    }
}

export default CategoryFilter;
