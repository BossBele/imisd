var all_courses;

function retrieveCourseByProgramme(programme_id) {
    var data = {retrieve_course_by_programme: "yes", programme: programme_id};
    $.ajax({
        url: request_link,
        type: "get",
        dataType: "json",
        data: data,
        success: function (result) {
            switch (programme_id) {
                case 6:
                    $('#programme_health tbody').empty();

                    $.each(result, function (index, obj) {
                        var row = $('<tr>');
                        row.append('<td>' + obj.code + '</td>');
                        row.append('<td>' + obj.name + '</td>');
                        row.append('<td>' + obj.duration + '</td>');
                        row.append('<td>' + +'</td>');
                        row.append('<td>' + +'</td>');
                        // row.append('<td><ul class="uk-iconnav"><li><a id="update_btn" onclick="updateCourses(' + index + ')" uk-icon="icon: file-edit"></a></li><li><a onclick="deleteCourses(' + index + ')" uk-icon="icon: trash"></a></li> </ul></td>');
                        $('#programme_health').append(row);
                    });
                    break;
                case 5:
                    $('#programme_finance tbody').empty();

                    $.each(result, function (index, obj) {
                        var row = $('<tr>');
                        row.append('<td>' + obj.code + '</td>');
                        row.append('<td>' + obj.name + '</td>');
                        row.append('<td>' + obj.duration + '</td>');
                        row.append('<td>' + +'</td>');
                        row.append('<td>' + +'</td>');
                        // row.append('<td><ul class="uk-iconnav"><li><a id="update_btn" onclick="updateCourses(' + index + ')" uk-icon="icon: file-edit"></a></li><li><a onclick="deleteCourses(' + index + ')" uk-icon="icon: trash"></a></li> </ul></td>');
                        $('#programme_finance').append(row);
                    });
                    break;
                default:
                    break;

            }

        }
    });
}

function retrieveAllCourseByProgramme() {
    var data = {retrieve_all_course_by_programme: "yes", programme: 0};
    $.ajax({
        url: request_link,
        type: "get",
        dataType: "json",
        data: data,
        success: function (result) {
            all_courses = result;
            $.each(result, function (index, obj) {
                $.each(obj, function (index2, obj2) {
                    $("#programme_" + obj2.programme_id + 'tbody').empty();
                    var row = $('<tr>');
                    row.append('<td>' + obj2.code + '</td>');
                    row.append('<td>' + obj2.name + '</td>');
                    row.append('<td>' + obj2.duration + '</td>');
                    row.append('<td>' + obj2.dates + '</td>');
                    row.append('<td><a class="application-link" onclick="applyCourse(' + index + ')" href="#application-modal" uk-toggle>Apply</a></td>');
                    $("#programme_" + obj2.programme_id).append(row);
                });

            });

        }
    });
}

function saveApplicant() {
    var form = $('#applicant_form').serialize();

    $.ajax({
        url: course_url,
        type: "post",
        dataType: "json",
        data: form,
        success: function (result) {
            console.log(result);
            if (result[0].message == "success") {
                alert('Application Submitted');
                $('#applicant_form').trigger("reset");
            } else {
                alert('Please retry');
                $('#applicant_form').trigger("reset");
            }

        }
    });


}

function applyCourse(index) {
    if (all_courses != []) {

        $("#course-options option").remove();
        $('#course-options').append($('<option>', {
            value: '',
            text: 'Select Programme',
            selected: true,
            disabled: true
        }));
        $.each(all_courses[index], function (detail, name) {
            $('#course-options').append($('<option>', {value: name.id, text: name.name}));
        });

    }


    if (!index) {
        $("#course-options option").remove();
        $('#course-options').append($('<option>', {
            value: '',
            text: 'Select Programme',
            selected: true,
            disabled: true
        }));
        $.each(all_courses, function (index, obj) {
            $.each(obj, function (index2, obj2) {
                $('#course-options').append($('<option>', {value: obj2.id, text: obj2.name}));
            });

        });
    }
}
