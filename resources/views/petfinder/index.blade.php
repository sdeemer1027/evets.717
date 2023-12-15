<!-- resources/views/mypets/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">


    <h1>Petfinder Search</h1>



    <form action="{{ route('petfinder.search') }}" method="get">
        @csrf
        <label for="zip_code">Enter Zip Code:</label>
        <input type="text" id="zip_code" name="zip_code" value="" required>
        <br> 
        <label for="pet_type">Select Pet Type:</label>
        <select id="pet_type" name="pet_type" required>
            <option value="dog">Dog</option>
            <option value="cat">Cat</option>
            <option value="rabbit">Rabbit</option>
            <option value="small-furry">Small & Furry</option>
            <option value="horse">Horse</option>
            <option value="bird">Bird</option>
            <option value="scales-fins-other">Scales, Fins & Other</option>
            <option value="barnyard">Barnyard</option>
            <!-- Add more options for other pet types as needed -->
        </select>
        <label for="gender">Select Pet Gender:</label>
<select id='gender' name='gender'>
    <option value=''>Female/Male</option>
    <option value='female'>Female</option>
    <option value='male'>Male</option>
</select>



<br>

 <label for="size">Select Pet size:</label>
 {{-- 
<select id='size' name='size'>
    <option value=''>Select</option>
    <option value='small'>small</option>
    <option value='medium'>medium</option>
    <option value='large'>large</option>
    <option value='xlarge'>xlarge</option>
</select>
--}}




<input type="checkbox" id="size_small" name="sizes[]" value="small">
<label for="size_small">Small</label>

<input type="checkbox" id="size_medium" name="sizes[]" value="medium">
<label for="size_medium">Medium</label>

<input type="checkbox" id="size_large" name="sizes[]" value="large">
<label for="size_large">Large</label>

<input type="checkbox" id="size_xlarge" name="sizes[]" value="xlarge">
<label for="size_xlarge">X-Large</label>



<br>

<label for="age">Select Pet age:</label>

<input type="checkbox" id="baby" name="ages[]" value="baby">
<label for="baby">Baby</label>

<input type="checkbox" id="young" name="ages[]" value="young">
<label for="young">Young</label>

<input type="checkbox" id="adult" name="ages[]" value="adult">
<label for="adult">Adult</label>

<input type="checkbox" id="senior" name="ages[]" value="senior">
<label for="senior">Senior</label>

<br>
        <button type="submit">Search</button>
    </form>



</div>

@endsection
