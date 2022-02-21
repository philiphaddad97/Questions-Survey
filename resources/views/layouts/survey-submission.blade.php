<!DOCTYPE html>
<html lang="en">

<head>
    <title>NEW SUBMISSION</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>


<body>
<div>
    <div>
        <strong>You have a submission on your "{{$data['title']}}" survey, {{$data['date']}}!!</strong>
    </div>

    <br>
    <div>
        For more information click here..
        <a href="{{route('survey.view-submissions', ['id'=>$data['id']])}}">View Submissions</a>

    </div>

</div>


</body>
</html>
