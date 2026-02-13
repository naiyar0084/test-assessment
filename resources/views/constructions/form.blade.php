@php
$labels = ['For Sell', 'For Rent'];
$segments = ['Residential', 'Commercial'];
$types = [
    'DDA Flats', 'Builder Floors', 'Farmhouse', 'Kothi', 'Villa', 'Flats',
    'Hotels', 'Office Space', 'Warehouses', 'Shops', 'Showrooms'
];
$furnishingOptions = ['Unfurnished', 'Semi-Furnished', 'Fully Furnished'];
@endphp

<div class="form-group">
    <label>Title</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $property->title ?? '') }}">
</div>

<!-- <div class="form-group">
    <label>Slug</label>
    <input type="text" name="slug" class="form-control" value="{{ old('slug', $property->slug ?? '') }}">
</div> -->

<!-- <div class="form-group">
    <label>Description</label>
    <textarea name="description" class="form-control">{{ old('description', $property->description ?? '') }}</textarea>
</div> -->

<div class="form-group">
    <label>Label</label>
    <select name="label" class="form-control">
        @foreach($labels as $label)
            <option value="{{ $label }}" {{ (old('label', $property->label ?? '') == $label) ? 'selected' : '' }}>{{ $label }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>Segment</label>
    <select name="segment" class="form-control">
        @foreach($segments as $segment)
            <option value="{{ $segment }}" {{ (old('segment', $property->segment ?? '') == $segment) ? 'selected' : '' }}>{{ $segment }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>Type</label>
    <select name="type" class="form-control">
        @foreach($types as $type)
            <option value="{{ $type }}" {{ (old('type', $property->type ?? '') == $type) ? 'selected' : '' }}>{{ $type }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>Price</label>
    <input type="text" name="price" class="form-control" value="{{ old('price', $property->price ?? '') }}">
</div>

<div class="form-group">
    <label>Area</label>
    <input type="text" name="area" class="form-control" value="{{ old('area', $property->area ?? '') }}">
</div>

<div class="form-group">
    <label>Location</label>
    <textarea name="location" class="form-control">{{ old('location', $property->location ?? '') }}</textarea>
</div>

<div class="form-group">
    <label>Bedrooms</label>
    <input type="number" name="bedrooms" class="form-control" value="{{ old('bedrooms', $property->bedrooms ?? '') }}">
</div>

<div class="form-group">
    <label>Bathrooms</label>
    <input type="number" name="bathrooms" class="form-control" value="{{ old('bathrooms', $property->bathrooms ?? '') }}">
</div>

<!-- <div class="form-group">
    <label>Balconies</label>
    <input type="number" name="balconies" class="form-control" value="{{ old('balconies', $property->balconies ?? '') }}">
</div>

<div class="form-group">
    <label>Kitchen</label>
    <input type="number" name="kitchen" class="form-control" value="{{ old('kitchen', $property->kitchen ?? '') }}">
</div>

<div class="form-check mt-2">
    <input class="form-check-input" type="checkbox" name="dining_hall" value="1" {{ old('dining_hall', $property->dining_hall ?? false) ? 'checked' : '' }}>
    <label class="form-check-label">Dining Hall</label>
</div> -->

<!-- <div class="form-group">
    <label>Floor No</label>
    <input type="number" name="floor_no" class="form-control" value="{{ old('floor_no', $property->floor_no ?? '') }}">
</div>

<div class="form-group">
    <label>Total Floors</label>
    <input type="number" name="total_floors" class="form-control" value="{{ old('total_floors', $property->total_floors ?? '') }}">
</div> -->

<div class="form-group">
    <label>Furnishing</label>
    <select name="furnishing" class="form-control">
        <option value="">-- Select --</option>
        @foreach($furnishingOptions as $option)
            <option value="{{ $option }}" {{ (old('furnishing', $property->furnishing ?? '') == $option) ? 'selected' : '' }}>{{ $option }}</option>
        @endforeach
    </select>
</div>

<div class="form-check mt-2">
    <label class="form-check-label">Parking</label>
    <input class="form-check-input" type="checkbox" name="parking" value="1" {{ old('parking', $property->parking ?? false) ? 'checked' : '' }}>
    
</div>

<div class="form-group mt-3">
    <label>Image</label>
    <input type="file" name="image" class="form-control">
    @if(!empty($property->image))
        <img src="{{ asset('storage/'.$property->image) }}" width="100" class="mt-2">
    @endif
</div>

<div class="form-group">
    <label>Status</label>
    <select name="status" class="form-control">
        <option value="draft" {{ old('status', $property->status ?? '') == 'draft' ? 'selected' : '' }}>Draft</option>
        <option value="published" {{ old('status', $property->status ?? '') == 'published' ? 'selected' : '' }}>Published</option>
    </select>
</div>

<!-- <button type="submit" class="btn btn-success mt-3">Save</button> -->
