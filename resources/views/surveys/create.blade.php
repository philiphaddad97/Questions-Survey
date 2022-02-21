<!DOCTYPE html>
<html lang="en">

<head>
    <title>Survey</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('layouts.css-libs')
    <link rel="stylesheet" type="text/css" href="{{asset('css\create-survey.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css\click.css')}}">

</head>

<body>
<div class="contact1">
    @include('layouts.nav-bar')
    <div class="container-contact1">
        <form class="contact1-form validate-form" id='form'>

        <span class="contact1-form-title">
          CREATE YOUR SURVEY
        </span>
            <div class="row">
                <div class="col-md-10">
                    <div class="wrap-input1 validate-input" data-validate="Survey Title is required">
                        <input required class="input1" type="text" id="title" name="title" placeholder="Survey Title"
                               autocomplete="off">
                    </div>
                </div>

                <div class="col-md-10">
                    <div class="wrap-input1 validate-input" data-validate="Survey Title is required">
                        <input  class="input1" type="email" id="email" name="email" placeholder="Email (optional)"
                               autocomplete="off">
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="container-contact1-form-btn">
                        <div onclick="addRow()" class="contact1-form-btn add" id="add-btn">
                <span>
                  <i class="fas fa-plus"></i>
                </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="container-contact1-form-btn">
                        <button type="sumbit" value="submit" class="contact1-form-btn yes">
                <span>
                  <i class="fas fa-save"></i>
                </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1 row-info">
            <span>
              #1
            </span>
                </div>
                <div class="col-md-7">
                    <div class="validate-input" data-validate="Enter The Question">
                        <input required class="question input1" type="text"  placeholder="Enter the Question"
                               autocomplete="off">
                    </div>
                </div>
                <div class="col-md-1 row-info">
            <span style="font-size: smaller">
              Main Question
            </span>
                    <input hidden value="-1" name="answer[]">
                </div>

                <div class="col-md-1 row-info">
            <span>
              Root
            </span>
                    <input hidden value="-1" name="parent[]">

                </div>
            </div>
        </form>
    </div>
</div>
@include('layouts.js-libs')
<script src="{{asset('js/create-survey.js')}}"></script>

</body>

</html>
