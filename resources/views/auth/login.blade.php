@extends('layouts.app')
@section('title','login')
@section('content')
<div>
    <h1>login</h1>
    @if ($errors->any())
        <div>
            {{ $errors->first() }}
            
        </div>
    @endif
   <form action="{{ route('login') }}" method="POST">
    @csrf
        <div>
            <label>Email</label>
            <input 
             type="email"
             name="email" 
             id="email"
             value="{{ old('email') }}"
             required>


        </div>
        <div>
            <label>Password</label>
            <input 
             type="password"
             name="password" 
             id="password"
             required>

             <button type="submit">Login</button>
    </form>


</div>