const tabLinks = document.querySelectorAll('.nav-link');
tabLinks.forEach(tabLink => {
    tabLink.addEventListener('click', () => {
        const targetTab = tabLink.getAttribute('data-bs-target');
        showTabContent(targetTab);
    });
});

function showTabContent(targetTab) {
    // Hide all tab contents
    const tabContents = document.querySelectorAll('.tab-pane');
    tabContents.forEach(tabContent => {
        tabContent.classList.remove('show', 'active');
    });

    // Show the selected tab content
    const selectedTabContent = document.querySelector(targetTab);
    selectedTabContent.classList.add('show', 'active');
}

