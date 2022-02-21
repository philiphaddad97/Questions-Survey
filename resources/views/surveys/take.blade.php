<!DOCTYPE html>
<html lang="en">

<head>
    <title>Survey</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('layouts.css-libs')
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/click.css')}}">


</head>

<body>

<div class="contact1">
    @include('layouts.nav-bar')

    @include('layouts.note-modal')
    @include('layouts.answers-modal')
    <div class="container-contact1">
        <div class="contact1-pic js-tilt" data-tilt>
            <img src="{{asset('images/question.svg')}}" alt="question image">
        </div>
        <div class="contact1-form validate-form">
        <span class="contact1-form-title">


            {{$survey->title}}
<div class="btn btn-warning" href="#" data-toggle="modal" data-target="#note-modal"
     style="pointer-events: auto; font-size: 10px; border-radius: 25px">
    <i data-toggle="tooltip" data-placement="top" title="Keep notes about the survey" class="fas fa-sticky-note"></i>
Keep a note
</div>



            <div id="answers-toggle" hidden  data-toggle="modal" data-target="#answers-modal"></div>

        </span>


            <div class="wrap-input1" id="question">
                {{$survey->mainQuestion->text}}

            </div>

            <div hidden>
                <input value="{{$survey->id}}" id="survey_id">
                <input value="{{$survey->mainQuestion->id}}" id="id">
            </div>

            <div id="answers-div" class="container-contact1-form-btn">
                <div class="row">
                    <div class="col-xs-2">
                        <div data-answer="Yes" onclick="answer(event)" class="contact1-form-btn yes" id="btn-yes">
                <span>
                  Yes
                  <i class="fas fa-check"></i>
                </span>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div data-answer="No" onclick="answer(event)" class="contact1-form-btn no" id="btn-no">
                <span>
                  No
                  <i class="fas fa-times"></i>
                </span>
                        </div>
                    </div>
                </div>

            </div>

            <div id="submit-div" class="container-contact1-form-btn hide">
                <div class="row">
                    <div class="col-xs-8">
                        <div onclick="submit(event)" class="contact1-form-btn normal" id="btn-yes">
                <span>
                  Submit
                  <i class="fas fa-save"></i>
                </span>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

@include('layouts.js-libs')
<script src="{{asset('js/take-survey.js')}}"></script>
</body>

</html>
