<!DOCTYPE html>
<html>
    <head>
        <title>All Tasks</title>
    </head>
    <body>

        <form method="POST" action="{{ route('add_new_task') }}">
            <input type="text" name="task_content" />
            <input type="submit" value="Add Task" />
        </form>

        <table>
            <tr>
                <th>Task</th>
                <th></th>
            </tr>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->task_content }}</td>
                    <td>
                        @if ($task->completed)
                            Completed!
                        @else
                            <form method="POST" action="{{ route('mark_task_completed', $task->id)}}">
                                <input type="submit" value="Complete" />
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </body>
</html>
