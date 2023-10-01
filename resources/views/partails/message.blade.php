@if(session()->has('success'))

<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong></strong> {{session('success')}}.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

 @endif


 @if(session()->has('error'))

<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong></strong> {{session('error')}}.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

 @endif