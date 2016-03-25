$(document).ready(function () {

    var MAX_LENGTH = 1001;
    var MAX_COUNT = 1000001;

    $length = $('#length');
    $count = $('#count');
    $results = $('#results');
    $submit = $('#submit');

    var regNumbers = /^[0-9]*$/;
    var validateData = function () {
        if (!regNumbers.test($length.val()))   {
            return false;
        }
        if (!regNumbers.test($count.val())) {
            return false;
        }
        if (0 > $length.val() || MAX_LENGTH < $length.val()){
            return false;
        }
        if (0 > $count.val() || MAX_COUNT < $count.val()){
            return false;
        }

        return true;
    };

    $submit.click(function (e) {
        if (validateData()) {
            $results.empty();
            $.ajax({
                url: "/api/getCodes",
                type: 'POST',
                data: {
                    length: $length.val(),
                    count: $count.val()
                },
                success: function (data) {
                    var i=0;
                    for (i; i < data.length; i++) {
                        $results.append(data[i]);
                        $results.append('<br/>');
                    }
                },
                error: function() {
                    alert("Wrong input data");
                }
            });
        } else {
            alert("Wrong input data");
        }
    });
});
