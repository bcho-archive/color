(function()
{
    var url = "http://localhost/color/color.php?limit=15";

    /*
    var change_parent = function(elements, callback)
    {
        for(var i = 0;i < elements.length;i++)
        {
            var parent_element = elements[i].parentElement;
            callback(elements[i], parent_element);
        }
    }

    var change_color = function(child_element, parent_element)
    {
        parent_element.style.backgroundColor = child_element.textContent;
    }
    */

    $.getJSON(url, function(result)
    {
        var r = document.getElementById("main_content");
        r.innerHTML = template.render("main_content_tmpl", {"colors": result});
    });

    /*
    $(document).ready(function() {
        var color_name = document.getElementsByClassName('color_box_content');
        console.log(color_name);
        console.log($(".color_box_content"));
        change_parent(color_name, change_color);
    });
    */
})();
