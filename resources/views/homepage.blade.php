<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('layouts.css-libs')
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">

</head>

<body>
<div class="contact1">
    <div class="container-contact1">
        @include('layouts.nav-bar')

        <div class="contact1-form validate-form">
        <span class="contact1-form-title">
          What are you gonna do?
        </span>

            <div class="container-contact1-form-btn">
                <div class="row">
                    <div class="col-xs-4">
                        <div onclick="route('{{route('survey.index')}}')" class="contact1-form-btn normal" id="btn-no">
                            <span>
                              Take Survey
                              <i class="fas fa-poll-h"></i>
                            </span>
                        </div>
                    </div>

                    <div class="col-xs-2">

                        <div onclick="route('{{route('survey.create')}}')" class="contact1-form-btn normal" id="btn-yes">
                            <span>
                              Add Survey
                              <i class="fas fa-plus"></i>
                           </span>
                        </div>

                    </div>

                </div>

            </div>
        </div>
        <div class="contact1-pic js-tilt" data-tilt>
            <img src="{{asset('images/hompage.svg')}}" alt="homepage clip art">
        </div>
    </div>
</div>

@include('layouts.js-libs')

</body>

</html>
