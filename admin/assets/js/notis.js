document.addEventListener('DOMContentLoaded', () => {
    const notis = document.querySelector('.notis');
    const closeIcon = document.querySelector('.close');
    const progress = document.querySelector('.progress-bar');

    // Function to show the notification
    const showNotification = () => {
        notis.classList.add("active");
        progress.classList.add("active");

        setTimeout(() => {
            notis.classList.remove("active");
        }, 5000);

        setTimeout(() => {
            progress.classList.remove("active");
        }, 5300);
    };

    // Check if the 'showNotis' parameter is set in the URL
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('showNotis')) {
        showNotification();
    }

    closeIcon.addEventListener('click', () => {
        notis.classList.remove("active");

        setTimeout(() => {
            progress.classList.remove("active");
        }, 300);
    });
});