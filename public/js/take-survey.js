function updateQuestion(text) {
    document.getElementById("question").innerHTML = text;
    return;
}

function updateId(id) {
    $('#id').val(id);
}

var answers = [];
var fullAnswers = [];
var notes = [];
var counter = 1;

var survey_id = $('#survey_id').val();


function answer(e) {
    let id = $('#id').val();
    let element = $(e.target);
    let answer = element.data('answer');

    fullAnswers.push(
        counter + ". " + $('#question').text() + ': ' + answer
    );
    counter++;
    answers.push({
        id: id,
        answer: answer,
    });

    $.ajax({
        type: 'GET',
        url: ajaxurl + 'surveys/next-question',
        data: {
            survey_id: survey_id,
            id: parseInt(id),
            answer: answer,
        },
        success: function (data) {

            if (data.message === 'success') {
                updateQuestion(data.data.text);

                if (data.data.status === 'finished') {
                    $('#answers-div').addClass('hide');
                    $('#submit-div').removeClass('hide');

                    console.log(fullAnswers);
                    if(fullAnswers === null || fullAnswers.length === 0){
                        $('#answers-list').append(
                            `<li>There is no Answers!</li>`
                        );
                    } else {
                        fullAnswers.forEach((item, index)=>{
                            $('#answers-list').append(
                                `<li>`+item+`</li>`
                            );
                        });
                    }


                    if(notes === null || notes.length === 0){
                        $('#notes-list').append(
                            `<li>There is no Notes!</li>`
                        );
                    } else {
                        notes.forEach((item, index)=>{
                            $('#notes-list').append(
                                `<li>`+item+`</li>`
                            );
                        });
                    }


                    $('#answers-toggle').click();
                } else {
                    updateId(data.data.id);
                }
            } else {
                alert('Something went wrong!!');
                window.location.href.reload();
            }

        },
        error: function () {
            alert('An error was encountered.');
        }
    });


}

function submit(e) {

    let element = $(e.target);
    element.addClass('hide');
    $('#reload-btn').addClass('hide');

    $.ajax({
        type: 'POST',
        url: ajaxurl + 'surveys/submit',
        data: {
            survey_id: survey_id,
            notes: notes,
            answers: answers
        },
        success: function (data) {
            $(window).unbind('beforeunload');
            window.location.href = ajaxurl + 'surveys';

        },
        error: function () {
            alert('An error was encountered.');
        }
    });

}


function addNote() {
    let text = $('#note').val();
    if (text === "") return;
    notes.push(text);
    console.log(notes);
    $('#note').val("");
}


$(function () {
    $(window).on('beforeunload', function () {
        return "";
    });
});

function reload()
{
    window.location.reload();
}
