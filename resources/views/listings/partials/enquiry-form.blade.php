@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<form method="POST" action="{{ route('enquiry.store') }}">
    @csrf

    <input type="hidden" name="listing_id" value="{{ $listing->id }}">

    <input name="name" placeholder="Your name" required><br><br>
    <input name="email" type="email" placeholder="Your email" required><br><br>
    <textarea name="message" placeholder="Message" required></textarea><br><br>

    <button type="submit" style="background-color: gray;">Send Enquiry</button>
</form>
