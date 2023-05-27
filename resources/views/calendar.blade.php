<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
    <hi>カレンダー</h1>  
    <table class="table table-borderd">
        <tr>
            <th> 日</th>
            <th> 月</th>
            <th> 火</th>
            <th> 水</th>
            <th> 木</th>
            <th> 金</th>
            <th> 土</th>
        </tr>
        @foreach ($calendarWeek as $week)
        <tr>
            @foreach ($week as $day)
               <td>{{ $day }}</td>
            @endforeach
		</tr>
        @endforeach
    </table>
</div>


</body>
</html>

    