@extends('layouts.app-guest')

@push('styles')
  <style>
    .txt-type > .txt {
      border-right: 0.2rem solid #777777;
    }
  </style>
@endpush

@section('content')
  <div class="h-screen">
    <div class="w-full h-full flex flex-col justify-center bg-white ">
      <h1 class="font-bold">Joshua Ryan Velasquez The&nbsp;
        <span class="txt-type" data-wait="3000" data-words='["Developer", "Designer", "Vimmer", "Typist", "Mortal"]'></span>
      </h1>
      <h2>Welcome To My Website</h2>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    // ES6 Class
    class TypeWriter {
      constructor(txtElement, words, wait = 3000) {
        this.txtElement = txtElement;
        this.words = words;
        this.txt = '';
        this.wordIndex = 0;
        this.wait = parseInt(wait, 10);
        this.type();
        this.isDeleting = false;
      }

      type() {
        // Current index of data-word
        const current = this.wordIndex % this.words.length;
        // Get full text of current data-word
        const fullTxt = this.words[current];

        // Check if deleting
        if(this.isDeleting) {
          // Remove char
          this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
          // Add char
          this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        // Insert txt into element (span)
        this.txtElement.innerHTML = `<span class="txt">${this.txt}</span>`;

        // Init Type Speed
        let typeSpeed = 300;

        if(this.isDeleting) {
          typeSpeed /= 2;
        }

        // If word is complete 
        if(!this.isDeleting && this.txt === fullTxt) {
          // Make pause at end of word
          typeSpeed = this.wait;
          // Set delete to true
          this.isDeleting = true;
        } else if(this.isDeleting && this.txt === '') {
          this.isDeleting = false;
          // Move to the next word
          this.wordIndex++;
          // Pause before start typing
          typeSpeed = 500;
        }

        setTimeout(() => this.type(), typeSpeed);
      }
    }

    // Init on DOM Load
    document.addEventListener('DOMContentLoaded', init);

    // Init App
    function init() {
      const txtElement = document.querySelector('.txt-type');
      const words = JSON.parse(txtElement.getAttribute('data-words'));
      const wait = txtElement.getAttribute('data-wait');

      // Init TypeWriter
      new TypeWriter(txtElement, words, wait);
    }
  </script>
@endpush
