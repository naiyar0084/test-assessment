@csrf

<div>
    <label>Title</label><br>
    <input type="text"
           name="title"
           value="{{ old('title', $listing->title ?? '') }}"
           required>
</div>

<div>
    <label>Description</label><br>
    <textarea name="description" rows="4" required>{{ old('description', $listing->description ?? '') }}</textarea>
</div>

<div>
    <label>Category</label><br>
    <input type="text"
           name="category"
           value="{{ old('category', $listing->category ?? '') }}"
           required>
</div>

<div>
    <label>City</label><br>
    <input type="text"
           name="city"
           value="{{ old('city', $listing->city ?? '') }}"
           required>
</div>

<div>
    <label>Suburb</label><br>
    <input type="text"
           name="suburb"
           value="{{ old('suburb', $listing->suburb ?? '') }}"
           required>
</div>

<div>
    <label>Pricing Model</label><br>
    <select name="pricing_model" required>
        <option value="">Select</option>
        <option value="hourly"
            @selected(old('pricing_model', $listing->pricing_model ?? '') === 'hourly')>
            Hourly
        </option>
        <option value="fixed"
            @selected(old('pricing_model', $listing->pricing_model ?? '') === 'fixed')>
            Fixed
        </option>
    </select>
</div>

<div>
    <label>Price</label><br>
    <input type="number"
           name="price"
           step="0.01"
           value="{{ old('price', $listing->price ?? '') }}"
           required>
</div>

<br>

<button type="submit" style="background-color:gray;">
    {{ $buttonText ?? 'Save Listing' }}
</button>
