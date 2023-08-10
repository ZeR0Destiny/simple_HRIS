// // Add an event listener to each tab link
// const tabLinks = document.querySelectorAll('.nav-link');
// tabLinks.forEach(tabLink => {
//   tabLink.addEventListener('click', () => {
//     const targetTab = tabLink.getAttribute('data-bs-target');
//     const category = tabLink.getAttribute('data-category');
//     showFilesForCategory(targetTab, category);
//   });
// });

// function showFilesForCategory(targetTab, category) {
//   // Hide all tab contents
//   const tabContents = document.querySelectorAll('.tab-pane');
//   tabContents.forEach(content => {
//     content.classList.remove('show', 'active');
//   });

//   // Show the selected tab content
//   const selectedTabContent = document.querySelector(targetTab);
//   selectedTabContent.classList.add('show', 'active');

//   // Filter the files based on the selected category and display only matching rows
//   const tableRows = selectedTabContent.querySelectorAll('#file_table tbody tr');
//   tableRows.forEach(row => {
//     const rowCategory = row.getAttribute('data-category');
//     if (rowCategory === category) {
//       row.style.display = '';
//     } else {
//       row.style.display = 'none';
//     }
//   });
// }

// // Show files for the default tab on page load (assuming the default tab is "Home")
// showFilesForCategory('#home', '');

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

