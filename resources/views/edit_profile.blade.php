<!-- resources/views/edit_profile.blade.php -->

@extends('layouts.app')

@section('content')
    <div>    <div class="container mt-5">
        <h1 class="mb-4">Edit Profile</h1>

        <form action="{{ route('updateProfile') }}" method="post">
            @csrf
            <!-- Include your profile fields here -->

             <table class="table  table-striped">
                            <tr>
                                <td>Field</td>
                                <td>Current</td>
                                <td>Change To</td> 
                            </tr>
                            <tr>
                                <td><label for="name">Name:</label></td>
                                <td>{{ auth()->user()->name }}</td>
                                <td><input type="text" id="name" name="name" value="{{ auth()->user()->name }}" required></td> 
                            </tr>
                             <tr>
                                <td><label for="Email">Email:</label></td>
                                <td>{{ auth()->user()->email }}</td>
                                <td><input type="text" id="email" name="email" value="{{ auth()->user()->email }}" required></td> 
                            </tr>
                             <tr>
                                <td><label for="fname">First Name:</label></td>
                                <td>{{ auth()->user()->fname }}</td>
                                <td><input type="text" id="fname" name="fname" value="{{ auth()->user()->fname }}" required></td> 
                            </tr>
                             <tr>
                                <td><label for="lname">Last Name:</label></td>
                                <td>{{ auth()->user()->lname }}</td>
                                <td><input type="text" id="lname" name="lname" value="{{ auth()->user()->lname }}" required></td> 
                            </tr>
                             <tr>
                                <td> <label for="phone">Phone:</label></td>
                                <td></td>
                                <td><input type="text" id="phone" name="phone" value="{{ auth()->user()->phone }}" required></td> 
                            </tr>
                             <tr>
                                <td> <label for="address">Address</label></td>
                                <td></td>
                                <td><input type="text" id="address" name="address" value="{{ auth()->user()->address }}" required></td> 
                            </tr>
                             <tr>
                                <td> <label for="address2">Address extra</label></td>
                                <td>{{ auth()->user()->address2 }}</td>
                                <td><input type="text" id="address2" name="address2" value="{{ auth()->user()->address2 }}" ></td> 
                            </tr>
                            <tr>
                                <td><label for="city">City</label></td>
                                <td>{{ auth()->user()->city }}</td>
                                <td><input type="text" id="city" name="city" value="{{ auth()->user()->city }}"></td> 
                            </tr>
                            <tr>
                                <td><label for="state">State</label></td>
                                <td>{{ auth()->user()->state }}</td>
                                <td><input type="text" id="state" name="state" value="{{ auth()->user()->state }}" ></td> 
                            </tr>
                            <tr>
                                <td><label for="zip">Zip:</label></td>
                                <td>{{ auth()->user()->zip }}</td>
                                <td><input type="text" id="zip" name="zip" value="{{ auth()->user()->zip }}" required></td> 
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><button type="submit">Update Profile</button></td> 
                            </tr>
            </table>


{{-- 
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6"></div>
            </div>
              <div class="row">              
                <div class="col-md-6"></div>
                <div class="col-md-6"></div>
            </div>

--}}
            <!-- Add more fields as needed -->

            
        </form>
    </div>
     </div>
@endsection
