document.addEventListener('DOMContentLoaded', function () {
    const flashcard = document.getElementById('flashcard');
    if (!flashcard) return;

    flashcard.addEventListener('click', function () {
        flashcard.classList.toggle('flipped');
    });
});
