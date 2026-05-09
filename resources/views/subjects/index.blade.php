<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>SUBJECTS</title>
</head>
<body>
    <h1>SUBJECTS</h1>
    
    
    <form action="/subjects/search" method="get">
        @csrf
        <input type="text" name="target">
        <input type="submit" value="SEARCH">
    </form>
    <table>
        <tbody>
            @foreach ($subjects as $subject)
            <tr>
                
            <form action="/subjects/update/{{ $subject->id }}" method="post">
        @csrf
        <td>
        <div>
            <input type="text" name="property1" value="{{ $subject->content }}">
        </div>
        </td>
        <td>  
        <button type="submit">RENEWAL!</button>
        </td>
    </form>


    <form action="/subjects/break/{{ $subject->id }}" method="post">
        @csrf
        <td>
        <button type="submit">BREAKING DOWN!!</button>
        </td>
    </form>
    
    <td>
        @foreach($subject->followings as $following)
        <form action="/subjects/update/{{ $following->id }}" method="post">
        @csrf
        <td>
        <input type="text" name="property1" value="{{ $following->content }}">
        </td>
        </form>
        @endforeach
        @foreach ($subject->followers as $follower)
        <form action="/subjects/update/{{ $follower->id }}" method="post">
            @csrf
            <td>
            <input type="text" name="property1" value="{{ $follower->content }}">
            </td>
        </form>
        @endforeach
    </td>    
    </tr>
            @endforeach
        </tbody>
    </table>
    <form action="/subjects" method="post">
        @csrf
        <div>
            <input type="text" name="property1">
        </div>
        
        <button type="submit">ADD!</button>
    </form>
</body>
</html>