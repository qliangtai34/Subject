<!DOCTYPE html>
<html lang="ja">
<body>
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