<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>This is the test page</h1>
    @foreach($groups as $group)
        <h1>Group {{ $group }}</h1>
        <ul>
            @foreach(${$group} as $single_group)
                <li>{{ $single_group->subject->subject_name }}</li>
            @endforeach
        </ul>
    @endforeach
</body>
</html>