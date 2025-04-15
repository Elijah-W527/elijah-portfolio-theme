// tab-buttons
document.addEventListener('DOMContentLoaded', function () {
    const tabButtons = document.querySelectorAll('.tab-button');
    const contents = document.querySelectorAll('.tab-content');

    // Check if there is a saved active tab in localStorage
    const savedTab = localStorage.getItem('activeTab');
    
    // Set default tab to portfolio if no saved tab is found
    const activeTab = savedTab ? savedTab : 'portfolio';

    // Activate the saved or default tab
    tabButtons.forEach(button => {
        const tab = button.getAttribute('data-tab');
        if (tab === activeTab) {
            button.classList.add('active');
            document.getElementById(`${tab}-content`).style.display = 'block';
        } else {
            button.classList.remove('active');
            document.getElementById(`${tab}-content`).style.display = 'none';
        }
    });

    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            const tab = button.getAttribute('data-tab');

            // Save the clicked tab as the active tab in localStorage
            localStorage.setItem('activeTab', tab);

            tabButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');

            contents.forEach(content => {
                content.style.display = 'none';
            });

            document.getElementById(`${tab}-content`).style.display = 'block';
        });
    });
});

// document.addEventListener('DOMContentLoaded', function () {
//     const tabButtons = document.querySelectorAll('.tab-button');
//     const contents = document.querySelectorAll('.tab-content');

//     tabButtons.forEach(button => {
//         button.addEventListener('click', () => {
//             const tab = button.getAttribute('data-tab');

//             tabButtons.forEach(btn => btn.classList.remove('active'));
//             button.classList.add('active');

//             contents.forEach(content => {
//                 content.style.display = 'none';
//             });

//             document.getElementById(`${tab}-content`).style.display = 'block';
//         });
//     });
// });

// load more projects button
document.addEventListener("DOMContentLoaded", function () {
    const loadMoreBtn = document.getElementById("load-more-button");
    let visibleCount = 0;
    const increment = 4;

    function showNextProjects() {
        const hiddenProjects = document.querySelectorAll(".card.hidden-project");
        const toShow = Array.from(hiddenProjects).slice(0, increment);
        toShow.forEach(card => {
            card.classList.remove("hidden-project");
        });
        visibleCount += toShow.length;

        if (document.querySelectorAll(".card.hidden-project").length === 0) {
            loadMoreBtn.style.display = "none";
        }
    }

    loadMoreBtn.addEventListener("click", showNextProjects);
});
