document.addEventListener('DOMContentLoaded', function () {
    const ratingInput = document.getElementById('rating');
    const ratingValue = document.getElementById('rating_value');
    if (!ratingInput || !ratingValue) return;

    ratingInput.addEventListener('input', function () {
        ratingValue.textContent = this.value;
    });
});