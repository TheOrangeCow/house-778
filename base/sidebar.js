function toggleSection(index) {
    var sections = document.getElementsByClassName('section-content');
    for (var i = 0; i < sections.length; i++) {
        if (i !== index) {
            sections[i].style.display = 'none';
        }
    }
    var content = document.getElementById('section-' + index);
    if (content.style.display === "none" || content.style.display === "") {
        content.style.display = "block";
    } else {
        content.style.display = "none";
    }
}

