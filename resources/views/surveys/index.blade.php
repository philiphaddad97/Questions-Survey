<!DOCTYPE html>
<html lang="en">

<head>
    <title>Survey</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('layouts.css-libs')
    <link rel="stylesheet" type="text/css" href="{{asset('css\main.css')}}">

</head>

<body>

<div class="contact1">
    @include('layouts.nav-bar')

    <div class="container-contact1">

        <div class="contact1-form validate-form" style="width: 100%">
        <span class="contact1-form-title">
          DO YOU LIKE TO ANSWER ON SOME YES/NO QUESTIONS?
        </span>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col">TITLE</th>
                    <th class="text-center" scope="col">DATE</th>
                    <th class="text-center" scope="col">ACTIONS</th>
                </tr>
                </thead>
                <tbody>
                @if(count($surveys)> 0)
                    @foreach($surveys as $survey)
                        <tr>
                            <th class="text-center" scope="row">{{$survey->id}}</th>
                            <td class="text-center">{{$survey->title}}</td>
                            <td class="text-center">{{$survey->created_at->diffForHumans()}}</td>
                            <td class="text-center">{!! $survey->actions !!}</td>
                        </tr>
                    @endforeach
                @else
                    <tr><th class="text-center" colspan="4"><span style="color: #9E9E9E">There is no Surveys</span></th></tr>
                @endif

                </tbody>

            </table>
        </div>
        {{$surveys->links("pagination::bootstrap-4")}}

    </div>
</div>

@include('layouts.js-libs')

</body>

</html>
