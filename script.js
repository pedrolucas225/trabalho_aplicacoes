  function showPage(pageId) {
        var pages = document.querySelectorAll('.page');
        for (var i = 0; i < pages.length; i++) {
            pages[i].style.display = 'none';
        }

        var page = document.getElementById(pageId);
        if (page) {
            page.style.display = 'block';
        } 
    }
showPage('inicio');