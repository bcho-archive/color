(function() {
    var color_name = document.getElementsByClassName('color_box_content');

    var change_color = function(child_element, parent_element) {
        parent_element.style.backgroundColor = child_element.textContent;
    }

    var change_parent = function(elements, callback) {
        for (var i = 0;i < elements.length;i++) {
            var parent_element = elements[i].parentElement;
            callback(elements[i], parent_element);
        }
    }

    change_parent(color_name, change_color);
})();
