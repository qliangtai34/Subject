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
            <form action="/subjects/update/{{ $subject->id }}" method="post">
        @csrf
        <div>
            <input type="text" name="property1" value="{{ $subject->content }}">
        </div>
        <div>
            <><textarea name="property2" rows="3">{{ $subject->name }}</textarea>
        </div>
        <button type="submit">RENEWAL!</button>
    </form>
    <form action="/subjects/break/{{ $subject->id }}" method="post">
        @csrf
        <button type="submit">BREAKING DOWN!!</button>
    </form>
    <div>
        @foreach($subject->contents as $content)
        <p>{{ $content->content }}</p>
        @endforeach
    </div>
            @endforeach
        </tbody>
    </table>
    <form action="/subjects" method="post">
        @csrf
        <div>
            <input type="text" name="property1">
        </div>
        <div>
            <><textarea name="property2" rows="3"></textarea>
        </div>
        <button type="submit">ADD!</button>
    </form>
</body>
</html>