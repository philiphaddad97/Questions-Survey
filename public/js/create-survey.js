let row = `            <div class="row">
                <div  class="question_no col-md-1 row-info">
            <span> #1
            </span>
                </div>
                <div class="col-md-7">
                    <div class="validate-input" data-validate="Enter The Question">
                        <input class="question input1" required type="text" placeholder="Enter the Question"
                               autocomplete="off">
                    </div>
                </div>
                <div class="status col-md-1 row-info">
            <span>
              Yes
            </span>
                    <input required hidden  value="Yes" />
                </div>

                <div class="parent_no col-md-1 row-info">
            <span>
              #1
            </span>
                    <input class="input1" required hidden  value="Yes" />
                </div>
                <div onclick="deleteRow(event)"  class="col-md-1 row-info">
                    <span  class="btn btn-danger">
                        <i class="fas fa-trash"></i>
                    </span>

                </div>
            </div>
`;

function addRow() {
    let node = document.createTextNode(row);
    let form = $("#form");
    form.append(row);

    reset();

}

function getQuestions() {
    let questions = [];
    $('.question').each(function () {
        questions.push($(this).val());
    });

    return questions;
}

function reset() {
    let counter = 2;
    $('.question_no').each(function () {
        $(this).find('span').text("#" + counter++);
    })
    let isYes = true;
    $('.status').each(function () {
        let status;
        if (isYes) {
            status = 'Yes';
        } else {
            status = 'No';
        }
        isYes = !isYes;
        $(this).find('span').text(status);
        $(this).find('input').val(status);
    });

    counter = 1;

    $('.parent_no').each(function () {
        counter++;
        $(this).find('span').text(`#${parseInt(counter >> 1)}`);
        $(this).find('input').val(counter >> 1);

    });


}


function deleteRow(e) {
    $(e.target).parent().remove();
    reset();
}


$(document).ready(function () {


    $("form").on("submit", function (event) {
        event.preventDefault();


        let title = $('#title').val();
        let email = $('#email').val();
        let questions = getQuestions();
        data = {
            'email': email,
            'title': title,
            'questions': questions
        };

        $.ajax({
            type: 'POST',
            url: ajaxurl + 'surveys/store',
            data: data,

            success: function (data) {
                console.log(data);
                window.location.href = ajaxurl + 'surveys';
            },
            error: function () {
                alert('An error was encountered.');
            }
        });


    });
});
