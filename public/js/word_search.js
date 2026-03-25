document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('word_search');
    const words = document.querySelectorAll('.word_grid .word');

    searchInput.addEventListener('input', function () {
        const query = this.value.toLowerCase();
        words.forEach(function (wordEl) {
            const wordText = wordEl.textContent.toLowerCase();
            wordEl.style.display = wordText.includes(query) ? '' : 'none';
        });
    });
});