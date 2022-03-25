<div>
    <form action="/config" method="POST">
        @csrf
        <div>
            <label for="username">database username</label>
            <input type="text" name="username">
        </div>
        <div>
            <label for="password">database username</label>
            <input type="text" name="password">
        </div>
        <div>
            <button type="submit">add configs</button>
        </div>

    </form>
</div>
