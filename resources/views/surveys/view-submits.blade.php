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
          {{$survey->title??"Survey Title"}}
        </span>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col">DATE</th>
                    <th class="text-center" scope="col">ANSWERS</th>
                    <th class="text-center" scope="col">NOTES</th>
                </tr>
                </thead>
                <tbody>
                @foreach($submits as $submit)
                    <tr>
                        <th class="text-center" scope="row">{{$submit->id}}</th>
                        <td class="text-center">{{$submit->created_at->diffForHumans()}}</td>
                        <td class="text-center">
                            @if($submit->answers)
                                <ul>
                                    @foreach($submit->answers as $answer)
                                        <li>{{$answer->question_no. '. '.$answer->text . ': ' . $answer->answer}}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </td>
                        <td class="text-center">
                            @if(count($submit->notes) > 0)
                                <ul>
                                    @foreach($submit->notes as $note)
                                        <li>{{$note->text}}</li>
                                    @endforeach
                                </ul>
                            @else
                                <span style="color: #9E9E9E">No Notes Added</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>

    </div>
</div>

@include('layouts.js-libs')

</body>

</html>
