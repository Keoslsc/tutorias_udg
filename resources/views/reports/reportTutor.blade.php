<!DOCTYPE html>
<html>
<head>
    <title>Report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <h3 class="text-center">Social service report</h3>
        <h4 class="text-center">{{ $user->name }}</h4>
        
        @if($user->posts)
            <div class="col-md-12">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Total posts</th>
                            <th>Total interactions</th>
                            <th>Total files</th>
                            <th>Total classes</th>
                            <th>Average of posts </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $user->posts->count() }}</td>
                            <td>{{ $user->totalComments() }}</td>
                            <td>{{ $user->totalFiles() }}</td>
                            <td>{{ $user->modules->count() }}</td>
                            <td>{{  round( $user->aveg() , 1) }} / 5</td>
                        </tr>
                    </tbody>
                </table>
            </div> 

            <br>

            @foreach ($user->modules as $module)
                <table class="table table-bordered text-center">
                    <tr>
                        <th colspan="3"> {{ $module->name }} </th>
                    </tr>
                    <thead>
                        <tr>
                            <th>Post</th>
                            <th>Date</th>
                            <th>Comments</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($module->posts as $post)
                            <tr>
                                <td>{{ $post->name}}</td>
                                <td>{{ $post->created_at }}</td>
                                <td>{{ $post->comments->count() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endforeach
             
            
        @endif
    </div>
    <footer class="text-center" style="position: absolute; bottom: 0;">
        <div class="mt-3 mt-lg-0 text-center">
            This is a voucher of the social service hours.
        </div> 
    </footer>
</body>
</html>