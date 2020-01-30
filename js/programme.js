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
            $.each(result, function (index, obj) {
                $.each(obj, function (index2, obj2) {
                    $("#programme_" + obj2.programme_id + 'tbody').empty();
                    var row = $('<tr>');
                    row.append('<td>' + obj2.code + '</td>');
                    row.append('<td>' + obj2.name + '</td>');
                    row.append('<td>' + obj2.duration + '</td>');
                    row.append('<td>' + +'</td>');
                    row.append('<td>' + +'</td>');
                    $("#programme_" + obj2.programme_id).append(row);
                });

            });

        }
    });
}
