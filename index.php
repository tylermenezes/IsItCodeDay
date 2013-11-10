<!DOCTYPE html>
<html>
<head>
    <title>Is It CodeDay?</title>
    <style type="text/css">
        body {
            background: black;
            color: white;
        }

        h1 {
            font-size: 10em;
            text-align: center;
            font-family: sans-serif;
        }
    </style>
</head>
<body>
    <h1><?php

        $endpoint = 'http://api.codeday.org/events/next.json';
        $content = file_get_contents($endpoint);
        $data = json_decode($content);

        $next_codedays = $data->result;
        if (count($next_codedays) > 0) {
            $next_event_starts = strtotime($next_codedays[0]->date);
            $next_event_ends = strtotime($next_codedays[0]->end_date);

            $starts_day = (floor($next_event_starts/(60*60*24)) * 60*60*24);
        }

        if ($starts_day <= time() && $next_event_ends > time()) {
            echo "YES";
        } else {
            echo "NO";
        }
    ?></h1>
</body>
</html>
