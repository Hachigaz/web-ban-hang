document.addEventListener('DOMContentLoaded', function() {
    restoreLeftSectionContent(); // Restore left section content
    // Attach event listeners to inputs inside left section
    document.querySelectorAll('.left-section input').forEach(function(input) {
        input.addEventListener('change', function() {
            saveInputValue(input);
            restoreInputValue(input);
        });
    });
});
function restoreLeftSectionContent() {
    var leftSectionContent = localStorage.getItem('leftSectionContent');
    if (leftSectionContent) {
        var leftSection = document.querySelector('.left-section');
        leftSection.innerHTML = leftSectionContent;
        toggleNoItemVisibility();
    }
}
