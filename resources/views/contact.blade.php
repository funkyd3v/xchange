@extends('layouts.master')
@section('title')
    Contact Us
@endsection
@section('content')
<div class="flex flex-col justify-center items-center">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-lg">
      <h2 class="text-3xl font-semibold text-gray-800 text-center mb-6">Contact Us</h2>
      <p class="text-lg text-gray-600 text-center mb-6">We'd love to hear from you! Reach out to us through the following methods:</p>
      
      <div class="flex flex-col items-center space-y-4">
        @foreach ($contacts as $contact)
        @if ($contact->name == 'whatsapp')
            <!-- WhatsApp Contact -->
        <a href="https://wa.me/{{ $contact->handler }}" target="_blank" class="flex items-center space-x-3 px-4 py-2 bg-green-500 text-white rounded shadow hover:bg-green-600 transition duration-200">
          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M20.52 3.48A11.953 11.953 0 0012 1C5.383 1 0 6.383 0 13s5.383 12 12 12c1.983 0 3.903-.516 5.624-1.495l4.497 1.196-1.194-4.492A11.954 11.954 0 0023 13a11.953 11.953 0 00-2.48-9.52zM12 23C6.486 23 2 18.514 2 13S6.486 3 12 3s10 4.486 10 10-4.486 10-10 10zm3.354-13.646a1 1 0 00-1.707 1.061c.027.062 1.551 2.413 1.551 2.413s.408.647-.062 1.061c-.517.444-1.69.861-1.69.861s-1.793.276-4.086-2.018C7.41 11.202 7.125 9.409 7.125 9.409s-.417-1.173.027-1.69c.414-.469 1.061-.062 1.061-.062s2.351 1.524 2.413 1.551a1 1 0 001.061-1.707c-.09-.051-2.344-1.5-2.344-1.5a2.003 2.003 0 00-2.654.266c-.868.868-.898 2.219-.07 3.345.82 1.124 1.5 1.664 2.414 2.578.913.914 1.453 1.593 2.577 2.414 1.126.828 2.477.797 3.345-.07a2.003 2.003 0 00.266-2.654s-1.449-2.254-1.5-2.344z"/>
          </svg>
          <span class="text-lg font-medium">WhatsApp</span>
        </a>
        @endif
        
        @if ($contact->name == 'skype')
            <!-- Skype Contact -->
        <a href="skype:live:{{ $contact->handler }}?chat" target="_blank" class="flex items-center space-x-3 px-4 py-2 bg-blue-500 text-white rounded shadow hover:bg-blue-600 transition duration-200">
          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M20.97 13.74c-.28 1.38-.8 2.56-1.52 3.51-1.18 1.53-2.85 2.6-4.94 2.98a7.956 7.956 0 01-3.78-.05c-1.67-.41-3.18-1.39-4.26-2.68-1.01-1.2-1.68-2.67-1.95-4.26a7.95 7.95 0 010-3.78c.38-2.09 1.45-3.76 2.98-4.94 1.16-.89 2.55-1.51 3.99-1.78 1.65-.33 3.34-.18 4.91.51 1.52.67 2.8 1.81 3.67 3.19.79 1.26 1.25 2.7 1.29 4.11a8.051 8.051 0 01-1.55 5.11 8.06 8.06 0 01-2.82 2.68zm-1.61-5.69c-.03-.01-.06-.01-.09-.01a6.812 6.812 0 00-.32-2.38c-.28-1.08-.87-2.04-1.63-2.8-.76-.76-1.72-1.35-2.8-1.63-.75-.2-1.55-.3-2.38-.32-.83-.02-1.67.06-2.49.21a7.065 7.065 0 00-2.16 1.06c-.49.35-.94.76-1.35 1.21-.41.45-.76.94-1.07 1.48a6.866 6.866 0 00-.83 2.6 6.86 6.86 0 00.83 2.6c.3.53.66 1.02 1.07 1.48.41.45.86.86 1.35 1.21a7.065 7.065 0 002.16 1.06c.82.14 1.66.23 2.49.21.83-.02 1.63-.12 2.38-.32 1.08-.28 2.04-.87 2.8-1.63.76-.76 1.35-1.72 1.63-2.8.28-.75.46-1.56.54-2.38.08-.82.06-1.63-.05-2.42z"/>
          </svg>
          <span class="text-lg font-medium">Skype</span>
        </a>
        @endif
        @endforeach
      </div>
    </div>
  </div>
@endsection