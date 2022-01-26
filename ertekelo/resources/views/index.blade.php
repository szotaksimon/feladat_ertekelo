<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rating Tasks</title>

    <style>
        table, td, th{
            border: 1px solid black
        }
        td, th{
            height: 40px;
        }
        #ok-gomb{
            background-color: lightgreen;
            border-radius: 5px;
        }
        #torles-gomb{
            background-color: tomato;
            border-radius: 5px;
            height: 40px;

        }
        #torles-td{
            border-left: none;
        }
        #edit-td{
            border-right: none;
        }
        #edit-td input{
            height: 40px;
        }
        .main{
            width: 1500px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .comment{
            width: 250px;
            overflow: auto;
        }
        
    </style>
</head>
<body>
    <div class="main">
        <table style="text-align: center;">
            <tr>
                <th>ID</th>
                <th>Task Name</th>
                <th>URL</th>
                <th>Rating</th>
                <th>Comment</th>
                <th>Operations</th>
                <th></th>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->name }}</td>
                        <td>{{ $task->URL }}</td>
                        <td>{{ $task->rating }}</td>
                        <td>
                            <div class="comment">
                                {{ $task->comment }}
                            </div>
                        </td>
                        <td id="edit-td">
                            <form method="POST" action="{{ route('tasks.update', $task->id) }}">
                                @method('PATCH')
                                @csrf
                                <input type="number" name="rating" style="width: 30px;" value="{{ $task->rating }}">
                                <input type="text" name="comment" style="width: 200px;" value="{{ $task->comment }}">
                                <input type="submit" value="Ok." id="ok-gomb">
                            </form>
                        </td>
                        <td id="torles-td">
                            <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" id="torles-gomb">Törlés</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tr>
        </table>
    </div>
</body>
</html>