@if ($errors->any())
  @foreach ($errors->all() as $error)
    <div class="card-panel red">
      <span class="white-text">{{ $error }}</span>
    </div>
  @endforeach
@endif
