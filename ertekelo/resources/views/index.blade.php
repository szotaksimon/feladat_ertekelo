<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rating Tasks</title>
</head>
<body>
    <table style="text-align: center;">
        <tr>
            <th>ID</th>
            <th>Task Name</th>
            <th>URL</th>
            <th>Comment</th>
            <th>Rating</th>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->URL }}</td>
                    <td>{{ $task->rating }}</td>
                    <td>{{ $task->comment }}</td>
                    <td>
                        <form">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Törlés</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tr>
    </table>
</body>
</html>