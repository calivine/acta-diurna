<form action="{{ route('comments.store') }}" method="POST">
    @csrf
    <fieldset>
        <div class="text-input-container">
            <input name="author" type="text" placeholder="Author">
        </div>
        <div class="text-input-container">
            <input name="subject" type="text" placeholder="Subject">
        </div>
        <div class="text-input-container">
            <textarea name="body" name="" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="text-input-container">
            <button class="btn btn-primary" type="submit" >Post Reply</button>
        </div>
    </fieldset>
</form>