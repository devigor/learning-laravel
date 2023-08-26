@csrf
<input type="text" name="subject" placeholder="Title" value="{{ $support->subject ?? old('subject') }}" />
<textarea name="body" cols="30" rows="5" placeholder="Subject">{{ $support->body ?? old('body') }}</textarea>
<button type="submit">Send</button>