document.addEventListener("DOMContentLoaded", function() {
    const spinner = document.getElementById('page-spinner');
    spinner.classList.remove('hidden');
    setTimeout(function() {
        spinner.classList.add('hidden');
    }, 1000);
});
