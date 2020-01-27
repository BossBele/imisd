var all_course;

function addNewCourse() {
    var form = $('#new_course').serialize();

    $.ajax({
        url: course_url,
        type: "post",
        dataType: "json",
        data: form,
        success: function (result) {
            if (result[0].message == "success") {
                alert('Course added');
                $('#new_course').trigger("reset");
            }else {
                alert('Course exists');
                $('#update_course').trigger("reset");
            }

        }
    });
}

function updateCourse() {
    var form = $('#update_course').serialize();

    $.ajax({
        url: course_update_url,
        type: "post",
        dataType: "json",
        data: form,
        success: function (result) {
            if (result[0].message == "success") {
                alert('Course added');
                $('#update_course').trigger("reset");
            } else {
                alert('Course exists');
                $('#update_course').trigger("reset");
            }

        }
    });
}

function retrieveCourse() {
    // var retrieve_course = "yes";
    var data = {retrieve: "yes", edit: "1"};
    $.ajax({
        url: course_retrieve_url,
        type: "get",
        dataType: "json",
        data: data,
        success: function (result) {
            try{
                document.getElementById('edit_form').style.display = 'block';
                document.getElementById('update_form').style.display = 'none';
            }catch (e) {
                console.log(e);
            }
            $('#table_courses tbody').empty();
            all_course = result;
            $.each(result, function (index, obj) {
                var row = $('<tr>');
                row.append('<td>' + obj.code + '</td>');
                row.append('<td>' + obj.name + '</td>');
                row.append('<td>' + obj.duration + '</td>');
                row.append('<td>' + +'</td>');
                row.append('<td><ul class="uk-iconnav"><li><a id="update_btn" onclick="updateCourses(' + index + ')" uk-icon="icon: file-edit"></a></li><li><a href="#" uk-icon="icon: trash"></a></li> </ul></td>');
                $('#table_courses').append(row);
            });
        }
    });
}

$('#edit_course').on('click', function () {
    retrieveCourse();
});

function updateCourses(index) {
    if (all_course != []) {
        document.getElementById('edit_form').style.display = 'none';
        document.getElementById('update_form').style.display = 'block';
        var data = all_course[index];
        document.getElementById('course_id').value = data.id;
        document.getElementById('code_edit').value = data.code;
        document.getElementById('name_edit').value = data.name;
        document.getElementById('duration_edit').value = data.duration;
    }
}

